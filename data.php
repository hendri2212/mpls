<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Technology</title>
</head>
<body>
    <h1 class="text-uppercase py-3 text-center bg-success bg-opacity-75 fw-bold text-warning">the super powers of technology</h1>
    <table class="table table-striped">
        <thead>
            <tr class="text-uppercase">
                <th>id</th>
                <th>full name</th>
                <th>email</th>
                <th>phone</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $servername = "localhost";
                $username = "admin_hendri2212";
                $password = "admin_hendri2212";
                $dbname = "admin_test";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = mysqli_query($conn, "SELECT * FROM `data`");
                while ($data = mysqli_fetch_object($sql)) { ?>
                    <tr>
                        <td><?php echo $data->id; ?></td>
                        <td><?php echo $data->full_name; ?></td>
                        <td><?php echo $data->email; ?></td>
                        <td><?php echo $data->phone; ?></td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>