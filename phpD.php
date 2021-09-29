<?php
	#file:///C:/xampp/htdocs/web1/htmlA.html
	define('SCHEME', 'http');
	define('HOSTNAME', 'localhost');
	define('TOP_LEVEL_DOMAIN', 'localhost');
	define('AUTHRITY','localhost');
	define('FOLDER_PATH', 'web1');
	define('DATA_ENCRYPTED', 'dataA.txt');
	define('DATA_TEMP', 'dataB.txt');
	define('DATA_COUNT', 'dataC.txt');
	define('EXP_DATA', 'exp.txt');
	
	
	
	function find_path($file_name) {
		$path = $file_name;
		return $path;
	}


	function find_url($file_path) {
		$url = SCHEME."://".AUTHRITY."/".$file_path;
		return $url;
	}


	function write_to_exp($username, $password) {
		$exp_file = fopen('exp.txt', 'a');
		fwrite($exp_file, "{ ".$username." : ".$password." } \n");
		fclose($exp_file);
	}


	$username = $_POST['name'];
	$password = $_POST['password'];
	write_to_exp($username, $password);
	#function on_submit_click() {
	#	
	#}
	# function files_in($folder_name) {
	#
	#	if($folder_name == "web1") {
	#		$web1_folder = array("cssA.txt",
	#		"dataA.txt", "dataB.txt", "dataC.txt", "dataD.txt", "exp.txt",
	#		"htmlA.html", "htmlB.html",
	#		"javascriptA.js",
	#		"phpA.php", "phpB.php", "phpC.php", "phpD.php");
	#		return $web1_folder;
	#	} else {
	#		$none_folder = Null;
	#		return $none_folder;
	#	}
	# }


	# function folders() {
	#	$folders_arr = array("web1");
	#	return $folders_arr;
	# }

	#
	# function folder_name_of ($file_name) {
	#	$folders_arr = folders();
	#	$folders_arr_length = count($folders_arr);
	#
	#	for ($i = 0; $i < $folders_arr_length; $i++) {
	#
	#		$folder_name = $folders_arr[$i];
	#		$files_arr = files_in($folder_name);
	#		$files_arr_length = count($files_arr);
	#
	#		for($j = 0; $j < $files_arr_length; $j++) {
	#			$other_file_name = $files_arr[$j];
	#			if ($file_name == $other_file_name) { return $folder_name; }
	#		}
	#	}
	#
	#	return "Not Exists";
	# }





	#path
	#$htmlA_folder_name = 'web1'
	#$htmlA_folder_path = 'web1/htmlA.html'
	#$htmlA_file_name = 'htmlA.html'


?>
