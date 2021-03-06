<?php

 include_once 'Database.php';

 if(isset($_POST['name']) && isset($_POST['description'])){
   if(!$_POST['name'] == NULL && !$_POST['description'] == NULL){

   $name = $_POST['name'];
   $description = $_POST['description'];

   try{
     $createQuery = "INSERT INTO tasks(name, description, created_at)
                    VALUES(:name, :desc, now())";

    $statement = $conn->prepare($createQuery);
    $statement->execute(array(":name" => $name, ":desc" => $description));

    if($statement->rowCount() === 1){
      echo "Record Inserted";
    }
   } catch (PDOException $ex){
     echo "An error occured " .$ex->getMessage();
   }
 } else {
 echo "Please fill in the form!";
}
}
