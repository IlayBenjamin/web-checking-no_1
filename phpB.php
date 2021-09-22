<?php

/**
 * <pre>
 *
 * $archive = new TarArchive
 * $archive->open($archiveFileName);
 *
 * $archive->addFile('/foo/bar.txt');
 * $archive->addFile('/foo/foo.txt');
 *
 * $archive->close();
 *
 * </pre>
 *
 * @author Petr Prochazka
 * @license New BSD (part is Apache License; i hope it's fine ;])
 */
class TarArchive extends Object
{
	/** Zlib */
	const GZ = 'gz';

	/** Bzip2 */
	const BZ2 = 'bz2';

	const TMP_EXT = '~.tmp';
	const TMP_COMPRESS_EXT = '~.compress.tmp';

	/** @var resource */
	private $tar;

	/** @var string */
	private $filename;

	/** @var string|NULL self::GZ, self::BZ2 */
	public $compress = NULL;


	/**
	 * Open a ZIP file archive (overwite exist file)
	 *
	 * @param string
	 * @throws NotWritableException
	 * @return TarArchive $this
	 */
	public function open($file)
	{
		$this->filename = $file;
		$this->tar = fopen($file . self::TMP_EXT, 'w');
		if (!$this->tar)
		{
			throw new NotWritableException($file . self::TMP_EXT);
		}
		return $this;
	}

	/**
	 * Adds a file to a TAR archive from the given path.
	 *
	 * @param string
	 * @param string|NULL null mean basename($filename)
	 * @param int|NULL null mean detect filemtime
	 * @throws FileNotFoundException
	 * @return TarArchive $this
	 */
	public function addFile($filename, $archivname = NULL, $mtime = NULL)
	{
		$archivname = $archivname === NULL ? basename($filename) : $archivname;
		$mtime = $mtime === NULL ? filemtime($filename) : $mtime;

		$outer = $this->getTarHeaderFooter($archivname, filesize($filename), $mtime);
		fwrite($this->tar, $outer[0]);

		if (!($f = fopen($filename, 'r')))
		{
			throw new FileNotFoundException($filename);
		}

		stream_copy_to_stream($f, $this->tar);
		fclose($f);
		fwrite($this->tar, $outer[1]);

		return $this;
	}

	/**
	 * Close the active archive.
	 *
	 * @return TarArchive $this
	 */
	public function close()
	{
		if (!$this->tar) throw new InvalidStateException("Archiv isn't opened or already closed.");
		fwrite($this->tar, pack("x512"));
		fclose($this->tar);
		$this->tar = NULL;

		$tmp = $this->filename . self::TMP_EXT;
		if ($this->compress)
		{
			$tmpcompress = $this->filename . self::TMP_COMPRESS_EXT;
			$this->compress($tmp, $tmpcompress, $this->compress);
			unlink($tmp);
			rename($tmpcompress, $this->filename);
		}
		else rename($tmp, $this->filename);

		return $this;
	}

	/**
	 * @see self::close()
	 */
	public function __destruct()
	{
		if ($this->tar) $this->close();
	}

	/**
	 * Compress TAR archive.
	 *
	 * @param string
	 * @param string
	 * @param self::GZ, self::BZ2
	 * @throws InvalidStateException
	 * @throws FileNotFoundException
	 * @throws NotWritableException
	 */
	private function compress($src, $out = NULL, $mode = 'gz')
	{
		if ($mode !== self::BZ2 AND $mode !== self::GZ)
			throw new InvalidStateException('Unknown mode: '. $mode);

		if ($out === NULL) $out = "$src.$mode";

		if (!file_exists($src) OR !is_readable($src))
			throw new FileNotFoundException($src);
		if ((file_exists($out) AND !is_writable($out)) OR (!file_exists($out) AND !is_writable(dirname($out))))
			throw new NotWritableException($out);

		$srcRes = fopen($src, "rb");
		if ($mode === self::BZ2)
		{
			$outRes = bzopen($out, "w");
			$write = 'bzwrite';
			$close = 'bzclose';
		}
		else if ($mode === self::GZ)
		{
			$outRes = gzopen($out, "w9");
			$write = 'gzwrite';
			$close = 'gzclose';
		}

		while (!feof($srcRes))
			$write($outRes, fread($srcRes, 51200));

		fclose($srcRes);
		$close($outRes);
		return true;
	}

	/**
	 * Header and footer for file.
	 *
	 * @author Jakub Vrána | Adminer 2.2.1
	 * @author Petr Procházka little modification
	 * @license Apache License, Version 2.0
	 *
	 * @param string
	 * @param int
	 * @param int
	 * @return array (0 => header, 1 => footer)
	 */
	private function getTarHeaderFooter($filename, $filesize, $filemtime)
	{
		$return = pack("a100a8a8a8a12a12", $filename, 644, 0, 0, decoct($filesize), decoct($filemtime));
		$checksum = 8*32; // space for checksum itself
		for ($i=0; $i < strlen($return); $i++) {
			$checksum += ord($return{$i});
		}
		$return .= sprintf("%06o", $checksum) . "\0 ";
		return array(
			$return . str_repeat("\0", 512 - strlen($return)),
			str_repeat("\0", 511 - ($filesize + 511) % 512)
		);
	}
}

class NotWritableException extends IOException {}
