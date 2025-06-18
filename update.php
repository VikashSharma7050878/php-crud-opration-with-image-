<?php

include("./database.php");


$id = $_GET['id'];
$select = 'SELECT * FROM data';
$execute = mysqli_query($connect, $select);
$row = mysqli_fetch_array($execute);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MySite</a>
            <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="./form.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./display.php">display</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form Section -->
    <div class="container mt-5">
        <h2 class="mb-4">update form</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="fullName" value="<?php echo $row[1]; ?>">
            </div>
            <div class="mb-3">
                <label for="emailAddress" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="emailAddress" value="<?php echo $row[2]; ?>">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Your file</label>
                <input type="file" name="file" class="form-control" id="emailAddress" value="<?php echo $row[3]; ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">submit</button>
        </form>
    </div>

    <?php

    include("./database.php");

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $image = $_FILES['file']['name'];
        $img_folder = "img/" . $image;
        $image_tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($image_tmp, $img_folder);

        $update = "UPDATE `data` SET `name`='$name',`email`='$email',`file`='$image' WHERE `id`='$id'";
        $ex = mysqli_query($connect, $update);
         
        echo " <script> alert('updated  data') </script> ";

        if ($ex) {

           
            header("location:display.php");
        } else {
            echo " <script> alert('fail !,insert data');</script> ";
            header("location:display.php");
        }
    }

    ?>
</body>

</html>