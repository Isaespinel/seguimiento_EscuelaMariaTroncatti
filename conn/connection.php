<?php
try{
$conn = new PDO('mysql:host=localhost; dbname=maria_troncatti', 'root', '');
} catch(PDOException $e){
   echo "Error: ". $e->getMessage();
   die();
}
?>