<!DOCTYPE html>

<head>
    <title>Branch report</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href = "LogInStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+2:500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container p-3 my-3 bg-dark text-white">
        Branch report from <?php echo $_POST['from_date']?> to <?php echo $_POST['to_date'] ?>
        <?php 
            $branch = (isset($_POST['branch']) ? $_POST['branch'] : null);
        ?>
        <p></p>
    </div>
</body>
</html>