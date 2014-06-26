 <?php
    $dbHost = "localhost";
    $dbUser = "root"; 
    $dbPass = "";
    $dbDatabase = "racuni";
    
    mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database.");
    mysql_select_db($dbDatabase)or die("Couldn't select the database.");
    mysql_query ("SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
	mysql_set_charset('utf8_unicode_ci');
?>