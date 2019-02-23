
<!DOCTYPE HTML>  
<html>
<head>
<title>Basic PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300" type="text/css" />
  <link rel="stylesheet" href="mystyle.css">
<style>
  .error {color: #FF0000;}
</style>
</head>
<body>  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 
<a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dataform.csv" download>Download CSV</a>
      </li>
    </ul>
  </div>
</nav>


<?php

$nameErr = $emailErr = $subjectIDErr = $subjectNameErr = $scoreMaxErr = $selectFileErr = "";
$name = $email = $subjectID = $subjectName = $scoreMax = $selectFile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["subjectID"])) {
    $subjectIDErr = "Subject ID is required";
  } else {
    $subjectID = test_input($_POST["subjectID"]);
    if (!preg_match("/^[0-9]*$/",$subjectID)) {
      $subjectIDErr = "Invalid Subject ID format";
    }
  }
    if (empty($_POST["subjectName"])) {
      $subjectNameErr = "Subject Name is required";
    } else {
      $subjectName = test_input($_POST["subjectName"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$subjectName)) {
        $subjectNameErr = "Only letters and white space allowed";
      }
    }
    if (empty($_POST["scoreMax"])) {
      $scoreMaxErr = "Score Max is required";
    } else {
      $scoreMax = test_input($_POST["scoreMax"]);
      if (!preg_match("/^[0-9]*$/",$scoreMax)) {
        $scoreMaxErr = "Invalid Score Max format";
      }
    }
    if (empty($_POST["fileToUpload"])) {
      $selectFileErr = "No File Selected";
    } 
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Calculate  maximum, minimum and mean</h1>

<form enctype="multipart/form-data" action="pagedata.php" method="post"
  <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="container">  
    <div class="form-group">
      <label>Name</label>
      <input type="text" class="form-control" name="name"  aria-describedby="emailHelp" placeholder="Enter name">
      <span class="error"> <?php echo $nameErr;?></span>
    </div>
    <div class="form-group">
      <label>Subject ID</label>
      <input type="text" class="form-control" name="subjectID"  aria-describedby="emailHelp" placeholder="Enter subject ID">
      <span class="error"> <?php echo $subjectIDErr;?></span>
    </div>
    <div class="form-group">
      <label>Subject Name</label>
      <input type="text" class="form-control" name="subjectName"  aria-describedby="emailHelp" placeholder="Enter subject name">
      <span class="error"> <?php echo $subjectNameErr;?></span>
    </div>
    <div class="form-group">
      <label>Full Score</label>
      <input type="text" class="form-control" name="scoreMax"  aria-describedby="emailHelp" placeholder="Enter full score">
      <span class="error"> <?php echo $scoreMaxErr;?></span>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" name="email"  aria-describedby="emailHelp" placeholder="Enter email">
      <span class="error"> <?php echo $emailErr;?></span>
    </div>
    <span class="input-group-text">
      <input type="file" name ="fileToUpload" accept=".csv">
    </span>
    <span type="submit" class="btn btn-dark">
      <input type="submit" class="btn btn-dark" value="SUBMIT">
    </span>
    
  </div>  
</form>


<?php


?>

</body>
</html>
