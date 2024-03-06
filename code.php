<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'php_image_crud');


if (isset($_POST['save_stu_image'])) {
    $name = $_POST['stu_name'];
    $class = $_POST['stu_class'];
    $phone = $_POST['stu_phone'];
    $image = $_FILES['stu_image']['name'];

    $allowed_extension = array('gif', 'png', 'jpg', 'jpeg', 'pdf');
    $filename = $image;
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extension)) {
        $_SESSION['status'] = "Allowed extension only => 'gif', 'png', 'jpg', 'jpeg', 'pdf'";
        header('location: create.php');
    } else {
        // not mendatory file exists
        if (file_exists("upload/" . $image)) {
            $filename = $image;
            $_SESSION['status'] = "Image already Exist...!!" . $filename;
            header("location: create.php");
        } else {
            $query = "INSERT INTO student (stu_name, stu_class, stu_phone, stu_image) VALUES ('$name', '$class', '$phone', '$image')";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                move_uploaded_file($_FILES["stu_image"]["tmp_name"], "upload/" . $_FILES["stu_image"]["name"]);
                $_SESSION['status'] = "Data stored successfully";
                header('location: create.php');
            } else {
                $_SESSION['status'] = "Data Not stored...!";
                header('location: create.php');
            }
        }
    }
}
