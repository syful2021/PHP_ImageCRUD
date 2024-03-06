<?php session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP CRUD - Insert Image </title>
</head>

<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header bg-warning ">
                        <h3>PHP image CRUD - Edit Data</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "php_image_crud");
                        $id = $_GET['id'];
                        $query = "SELECT * FROM student WHERE id = '$id' ";
                        $query_run = mysqli_query($conn, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $row) {
                                
                        ?>
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="stu_id" value="<?php echo $row['id'];?>" >

                                    <div class="form-group">
                                        <label for="">Student Name</label>
                                        <input type="text" name="stu_name" value="<?php echo $row['stu_name'];?>" class="form-control" required placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Student Class</label>
                                        <input type="text" name="stu_class" value="<?php echo $row['stu_class'];?>" class="form-control" required placeholder="Enter class">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Student Phone</label>
                                        <input type="text" name="stu_phone" value="<?php echo $row['stu_phone'];?>" class="form-control" required placeholder="Enter phone number">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Student Image</label>
                                        <input type="file" name="stu_image" class="form-control" required>
                                        <input type="hidden" name="stu_old_img" value="<?php echo $row['stu_image'];?>"  >
                                    </div>
                                    <div class="form-group py-3 ">
                                        <button name="update_stu_image" class=" btn btn-primary">Update</button>
                                        <button class=" btn btn-dark "><a href="index.php" class="text-decoration-none text-white">Back</a></button>
                                    </div>
                                </form>
                        <?php
                            }
                        } else {
                            echo "No record availabel";
                        }

                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>