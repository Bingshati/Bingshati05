<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $tag = $_POST['tag'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $address = $_POST['address'];
    $des = $_POST['des'];
    $price = $_POST['price'];

    $fileName = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];

    if (!file_exists('upload')) mkdir('upload');
    $location = 'upload/' . $fileName;

    if (move_uploaded_file($filetmp, $location)) {
        $con = new mysqli("localhost", "root", "", "event");

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            $stmt = $con->prepare("INSERT INTO music (m_name, m_tag, m_date, m_time, m_loc, m_des, m_price, m_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $name, $tag, $date, $time, $address, $des, $price, $location);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Successfully submitted";
            } else {
                $_SESSION['message'] = "Error: " . $stmt->error;
            }

            $stmt->close();
            $con->close();
        }
    } else {
        $_SESSION['message'] = "Failed to upload image";
    }

    header("Location: index.php");
    exit();
}
?>
