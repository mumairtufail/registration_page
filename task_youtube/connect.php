<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die('Connection Error: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error occurred during registration: " . $stmt->error;
        }
        
        $stmt->close();
    }
    
    $conn->close();
?>
