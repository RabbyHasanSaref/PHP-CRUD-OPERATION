<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include "db_con.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        echo "
        <script>
            document.addEventListener('DOMContentLoaded', function(event) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms deletion, make an AJAX call to delete the record
                        fetch('?id=$id&confirm_delete=1')
                            .then(response => response.text())
                            .then(data => {
                                Swal.fire(
                                    'Deleted!',
                                    'The record has been deleted.',
                                    'success'
                                ).then(() => {
                                    window.location.href = 'index.php';
                                });
                            })
                            .catch(error => {
                                Swal.fire(
                                    'Error!',
                                    'An error occurred while deleting the record.',
                                    'error'
                                );
                            });
                    } else {
                        window.location.href = 'index.php';
                    }
                });
            });
        </script>";
    }

    if(isset($_GET['id']) && isset($_GET['confirm_delete']) && $_GET['confirm_delete'] == 1) {
        $id = $_GET['id'];

        $sql = "DELETE FROM students WHERE id = '$id'";
        $result = $con->query($sql);

        if($result === TRUE) {
            echo "Delete";
        } else {
            echo "error";
        }
        exit; 
    }
    ?>

    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js'></script>
</body>
</html>
