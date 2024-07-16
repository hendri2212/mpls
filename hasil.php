<?php
    // Read the raw POST data
    $json = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $datas = json_decode($json, true);

    // Process the data (for example, store it in a database, perform some calculations, etc.)
    // Here we simply prepare a response
    $response = [
        'status' => 'success',
        'received' => $datas
    ];

    // Set the Content-Type header to application/json
    header('Content-Type: application/json');

    // Send the response as a JSON string
    echo json_encode($response);

    // Save to database
    $servername = "localhost";
    $username = "admin_hendri2212";
    $password = "admin_hendri2212";
    $dbname = "admin_test";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    foreach ($datas as $data) {
        $sql = "INSERT INTO data (full_name, email, phone) VALUES ('".$data['name']."', '".$data['email']."', '".$data['tel']."')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
?>