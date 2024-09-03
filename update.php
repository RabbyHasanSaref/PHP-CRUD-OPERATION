<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="insert.php">Add New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Student List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    include "db_con.php";

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['fullname'];  
        $email = $_POST['email'];
        $course = $_POST['course'];
        $phone = $_POST['phone'];

        $sql = "UPDATE students SET fullname = '$name', email = '$email', course = '$course', phone = '$phone' WHERE id = '$id'";
        $result = $con->query($sql);
        if($result === TRUE){
            echo "
            <script>
            document.addEventListener('DOMContentLoaded', function(event) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Data Update Successfully',
                    icon: 'success'
                }).then(function() {
                    window.location.href = 'index.php';
                });
            });
            </script>";
        }else{
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $con->error . "</div>";
        }
    }


    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM students WHERE id = '$id'";
        $result = $con->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $name = $row['fullname'];
                $email = $row['email'];
                $course = $row['course'];
                $phone = $row['phone'];
            }
            ?>


        <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Update</h4>
                    </div>
                    <div class="card-body">

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">Full Name</label>
                                <input type="text" name="fullname" value="<?php echo $name; ?>" required class="form-control" />
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="">Email ID</label>
                                <input type="email" name="email" value="<?php echo $email; ?>"  required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Course</label>
                                <input type="text" name="course" value="<?php echo $course; ?>" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Phone No</label>
                                <input type="text" name="phone" value="<?php echo $phone; ?>" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="update" value="Submit" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

       <?php 
    }

    }
    ?>

    <footer class="bg-light text-center text-lg-start mt-4">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">About Us</h5>
                    <p>
                        This is a simple PHP CRUD application to demonstrate basic database operations with a user-friendly interface.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Quick Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#" class="text-dark">Home</a></li>
                        <li><a href="#" class="text-dark">Student List</a></li>
                        <li><a href="#" class="text-dark">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li>Email: info@phpcurd.com</li>
                        <li>Phone: +8801730283920</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3 bg-dark text-white">
            © 2024 Developed by TMSS ICT LTD
        </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
