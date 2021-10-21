<!DOCTYPE html>

<head>
    <title>Report details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container p-3 my-3 bg-dark text-white">
        <div class="alert alert-success">
        
        <?php
            $reportType=$_POST['report']; 
        ?>
        <?php
            if  ($reportType=="overall_report"){
                echo "Enter details to produce overall report";
                echo '
                    <form action="OverallReport.php" method="post">
                    <p>
                        <label for="from_date">From:</label>
                        <input type="date" name="from_date" id="from_date">
                    </p>
                    <p>
                        <label for="to_date">To:</label>
                        <input type="date" name="to_date" id="to_date">
                    </p>
                    <label for="submitButton">Generate Report</label>
                    <input type="submit" name="submit" id="submitButton">
                </form>';
            }
            else if  ($reportType=="branch_report"){
                echo "Enter details to produce branch report";
                echo '<form action="branchReport.php" method="post">
                    <p>
                        <label for="from_date">From:</label>
                        <input type="date" name="from_date" id="from_date">
                    </p>
                    <p>
                        <label for="to_date">To:</label>
                        <input type="date" name="to_date" id="to_date">
                    </p>
                    <p>
                    <label for="submitButton">Generate Report</label>
                    <label for="branch">Choose a branch:</label>
                    <select name="branch" id="branch">
                        <option value="branch1">branch1</option>
                        <option value="branch2">branch2</option>
                        <option value="branch3">branch3</option>
                        <option value="branch4">branch4</option>
                        <option value="branch5">branch5</option>
                    </select> 
                    </p>
                    <input type="submit" name="submit" id="submitButton">
                </form>';
            }
        
        ?>
        </div>
    <p></p>
</div>
</body>
</html>