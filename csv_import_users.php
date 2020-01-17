<?php
  $databasehost = "localhost"; 
  $databasename = "process"; 
  $databasetable = "users"; 
  $databaseusername="cc"; 
  $databasepassword = "xxxxxxxx"; 
  $fieldseparator = ","; 
  $lineseparator = "\n"; // PHP_EOL
  $csvfile = $_FILES['file']['tmp_name'];


  if(!file_exists($csvfile)) 
  {
    die("Fichier non trouvé...");
  }
  try 
  {
    $pdo = new PDO(
                  "mysql:host=$databasehost;dbname=$databasename;charset=utf8", 
                  $databaseusername, 
                  $databasepassword,
                  array
                  (
                    PDO::MYSQL_ATTR_LOCAL_INFILE => true,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                  )
                  );
  } 
  catch (PDOException $e) 
  {
    die("database connection failed: ".$e->getMessage());
  }
  $affectedRows = $pdo->exec
  (
    "LOAD DATA LOCAL INFILE "
    .$pdo->quote($csvfile)
    ." INTO TABLE `$databasetable` FIELDS TERMINATED BY "
    .$pdo->quote($fieldseparator)
    ." LINES TERMINATED BY "
    .$pdo->quote($lineseparator)
    . " (email, société, département)"
  );
  header('Refresh: 2; URL = index_import_users.php');
  echo "$affectedRows utilisateurs ajoutés\n";
  
?>