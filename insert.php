<?php

 include ("./database.php");

 if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['file']['name'];
    $img_folder = "img/".$image;
    $image_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($image_tmp,$img_folder);

    $insert = "INSERT INTO data VALUES('','$name','$email','$image')";
    $ex = mysqli_query($connect,$insert);

    if($ex){
        echo " <script> alert('insert data');</script> ";
        header("location:form.html");
    }
    else{
        echo " <script> alert('fail !,insert data');</script> ";
        header("location:form.html");
    }
 }

?>