<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'php_image_crud');

// data insert part

if (isset($_POST['save_stu_image'])) {
    $name = $_POST['stu_name'];
    $class = $_POST['stu_class'];
    $phone = $_POST['stu_phone'];
    $image = $_FILES['stu_image']['name'];

    $random = rand(000, 999);
    $random = str_pad($random, 3, '0', STR_PAD_LEFT);
    $image = $random . $image;
    $tmp_name = $_FILES["stu_image"]["tmp_name"];

    $allowed_extension = array('gif', 'png', 'PNG', 'jpg', 'jpeg', 'pdf');
    $filename = $image;
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extension)) {
        $_SESSION['status'] = "Allowed extension only => 'gif', 'png', 'jpg', 'jpeg', 'pdf'";
        header('location: create.php');
    } else {
        $query = "INSERT INTO student (stu_name, stu_class, stu_phone, stu_image) VALUES ('$name', '$class', '$phone', '$image')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            move_uploaded_file($tmp_name, "upload/" . $image);
            $_SESSION['status'] = "Data stored successfully";
            header('location: create.php');
        } else {
            $_SESSION['status'] = "Data Not stored...!";
            header('location: create.php');
        }
    }
}
// Update part

if (isset($_POST['update_stu_image'])) {

    $stu_id = $_POST['stu_id'];
    $name = $_POST['stu_name'];
    $class = $_POST['stu_class'];
    $phone = $_POST['stu_phone'];

    $new_image = $_FILES['stu_image']['name'];
    $old_image = $_POST['stu_old_img'];

    $random = rand(000, 999);
    $random = str_pad($random, 3, '0', STR_PAD_LEFT);
    $new_image = $random . $new_image;
    $tmp_name = $_FILES["stu_image"]["tmp_name"];

    if ($new_image != '') {
        $update_filename =  $new_image;
    } else {
        $update_filename = $old_image;
    }
    $query = "UPDATE student SET stu_name='$name', stu_class='$class', stu_phone='$phone', stu_image='$update_filename' WHERE id='$stu_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if ($new_image != '') {
            move_uploaded_file($tmp_name, "upload/" . $new_image);
            unlink("upload/" . $old_image);
        }
        $_SESSION['status'] = "Data Updated successfully.";
        header('location: index.php');
    } else {
        $_SESSION['status'] = "Data Not Updated successfully....!!";
        header('location: index.php');
    }
}

// Delete part

if (isset($_POST['delete_stu_img'])) {
    $id = $_POST['delete_id'];
    $stu_image = $_POST['del_stu_image'];

    $query = "DELETE FROM student WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        unlink("upload/" . $stu_image);
        $_SESSION['status'] = "Data Delete successfully!";
        header('location: index.php');
    } else {
        $_SESSION['status'] = "Data Not Delete successfully....!!";
        header('location: index.php');
    }
}
