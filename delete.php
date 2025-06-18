<?php

    include ("./database.php");

    $id = $_GET['id'];

    $delete = "DELETE FROM data WHERE id ='$id'";
    $execute = mysqli_query($connect,$delete);
    header("location:display.php");
    

?>