<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MySite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
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
    <div class="container my-5">
        <h2 class="text-center mb-4">User Table</h2>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">File</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>

            <?php $connect = mysqli_connect("localhost", "root", "", "kv") or die("error"); ?>

            <?php
            $select = "SELECT * FROM data";
            $execute = mysqli_query($connect,$select);

            while($rows = mysqli_fetch_array($execute)){
                ?>
                <tr>
                <td><?php echo $rows[0];?></td>
                <td><?php echo $rows[1];?></td>
                <td><?php echo $rows[2];?></td>
                <td><img src="img/<?php echo $rows[3];?>" alt="product" height="100px" width="100px"></td>
                <td>
                    <a href="update.php?id=<?php echo $rows[0];?>"><button class="btn btn-primary btn-sm me-2">Update</button></a>
                    <a href="delete.php?id=<?php echo $rows[0];?>"><button class="btn btn-danger btn-sm">Delete</button></a>
                </td>
            </tr><?php
            }
            ?>
           
            
        </table>
    </div>


</body>

</html>