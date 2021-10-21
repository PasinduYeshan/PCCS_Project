<!DOCTYPE html>
<html>
<head>
  <title>Higher Officers page</title>
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
    
    <form action="action_page.php" method="post" target=_self> 
      
        <input type="radio" id="overall_report" name="report" value="overall_report">
        <label for="overall_report">Overall report</label><br>
        <input type="radio" id="branch_report" name="report" value="branch_report">
        <label for="branch_report">Branch report</label><br>
        <input type="submit" value="Submit">
      
    </form>
  </div>
</body>
</html>