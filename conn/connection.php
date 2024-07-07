<?php
try{
$conn = new PDO('mysql:host=localhost; dbname=proyecto_tesis', 'root', '');
} catch(PDOException $e){
   echo "Error: ". $e->getMessage();
   die();
}
?>