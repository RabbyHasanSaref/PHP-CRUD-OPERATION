<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CURD</title>
</head>
<body>
    <?php
        $servername = 'localhost';
        $dbusername = 'root';
        $dbpassword = 'root';
        $database = 'curd';

        $con = new mysqli($servername, $dbusername, $dbpassword, $database);

    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }else{
        // echo "Database Connected";
    }
    ?>
</body>
</html>