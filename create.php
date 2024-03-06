<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PHP Image CRUD</title>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>PHP image CRUD - insert image</h3>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Student Name</label>
                                <input type="text" name="stu_name" class="form-control" required placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="">Student Class</label>
                                <input type="text" name="stu_class" class="form-control" required placeholder="Enter class">
                            </div>
                            <div class="form-group">
                                <label for="">Student Phone</label>
                                <input type="text" name="stu_phone" class="form-control" required placeholder="Enter phone number">
                            </div>
                            <div class="form-group">
                                <label for="">Student Name</label>
                                <input type="file" name="stu_image" class="form-control" required>
                            </div>
                            <div class="form-group py-3">
                                <button name=" required" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>