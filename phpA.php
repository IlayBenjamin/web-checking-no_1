
<?php

$textFile = new TextFile('dataA.txt');

// Write without erasing without return line break at the end

$textFile->write('test');

// Write without erasing with return line break at the end

$textFile->write('test', true);

// Write with erasing without return line break at the end

$textFile->write('test', false, TextFile\Writer::class);

// Write with erasing with return line break at the end

$textFile->write('test', true, TextFile\Writer::class);