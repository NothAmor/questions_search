<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'questions';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(!$conn) {
    die("Connection failed! Contact website admin!" . mysqli_error($conn));
} else {
    echo '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        body {
            text-align: center;
            margin: 0 auto;
            display: block;
        }
        table {
            margin: 0 auto;
            align: center;
        }
        .box {
            width: 500px;
            line-height: 30px;
            display: block;
            margin: 0 auto;
        }
    </style>

    <div class="header">
        <h3>Question Search</h3>
    </div>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Question Search</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            </ul>
            <p class="navbar-text"><?php require_once('db.php'); ?></p>
        </div>
        </div>
    </nav>

    <div class="box">
        <h1>Search Questions</h1>
        <form action="" method="POST">
            <div class="input-group">
                <div class="input-group" style="width:500px; text-align:center;">
                    <input type="text" name="question" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <input type="submit" class="btn btn-success" value="Search">
                    </span>
                  </div><!-- /input-group -->
            </div>
        </form>
    </div>

    <br />

    <?php

    if($_POST['question'] != null) {
        $sql = "SELECT * FROM `questions` WHERE question LIKE '%".$_POST['question']."%' ";

        echo "<table border=1 style='width:1100px; text-align:center;' class='table table-bordered table-hover'><tr><th>Question</th><th>Answer</th></tr>";
        // echo "<tr><th>".$_POST['question']."</th>";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><th>".$row['question']."</th>";
            echo "<th>".$row['answer']."</th></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>