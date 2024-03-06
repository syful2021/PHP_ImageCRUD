<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Display Image</title>
</head>

<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-success ">
            <h4 class="text-white">Display Image in CRUD</h4>
          </div>
          <div class="card-body ">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "php_image_crud");
            $query = "SELECT * FROM student" ;
            $query_run = mysqli_query($conn, $query);
         
            ?>
            <table class="table table-responsive">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Class</th>
                  <th>Phone</th>
                  <th>Image</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              <?php
                if(mysqli_num_rows($query_run) > 0)    //record is there or not
                {
                  foreach($query_run as $row )
                  {
                    ?>
                      <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['stu_name'] ?></td>
                        <td><?php echo $row['stu_class'] ?></td>
                        <td><?php echo $row['stu_phone'] ?></td>
                        <td>
                          <img src="<?php echo "upload/" .$row['stu_image'] ?>" width="100px" height="80px" alt="image">
                        </td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info ">Edit</a>
                        </td>
                        <td>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php
                  }

                }else{
                  ?>
                    <tr>
                      <td>No record available!</td>
                    </tr>
                  <?php
                }
              ?>
              </tbody>
             
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>






  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>