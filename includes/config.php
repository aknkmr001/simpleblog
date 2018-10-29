<?php	error_reporting(E_ALL);?>
<?php
ob_start();
session_start();

//database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'root');
define('DBNAME', 'simpleblog_01');

$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME,DBUSER,DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//set timezone
date_default_timezone_set('Asia/Tokyo');

//load classes as needed
#function __autoload($class){
spl_autoload_register(function ($class){
	$class = strtolower($class);

	//if call from within /assets abjust the path
	$classpath = 'classes/class.'.$class . '.php';
	if ( file_exists($classpath)) {
		require_once $classpath;
	}

	//if call from within admin abjust the path
	$classpath = '../classes/class.'.$class . '.php';
	if ( file_exists($classpath)) {
		require_once $classpath;
	}

	//if call from within admin abjust the path
	$classpath = '../../classes/class.'.$class . '.php';
	if ( file_exists($classpath)) {
		require_once $classpath;
	}


});

$user = new User($db);

?>
