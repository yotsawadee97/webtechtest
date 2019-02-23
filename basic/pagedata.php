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
    body {
	width: 100wh;
	height: 90vh;
	color: #fff;
	background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
	background-size: 400% 400%;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

h1,
h6 {
	font-family: 'Open Sans';
	font-weight: 300;
	text-align: center;
	position: absolute;
	top: 45%;
	right: 0;
	left: 0;
}
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
            <a class="nav-link" href="data.csv" download>Download CSV </a>
        </li>
        </ul>
    </div>
    </nav>
    <div class="container">  
    <?php
        $file = fopen(basename($_FILES["fileToUpload"]["name"]),"r");
        $stdID = array();
        $stdName = array();
        $score = array();
        $sum = 0;
        $mean = 0;
        $max = 0;
        $min = $_POST["scoreMax"];
        $i = 0;
        while(($row = fgetcsv($file,0,","))!== FALSE) {
        if($i!==0){
                $stdID[] = $row[0];
                $stdName[] = $row[1];
                $score[] = $row[2];
                $sum += $row[2];
            }
            $i++;
        }
        $mean = $sum/($i-1);
        for ($j = 0; $j <= $i-2; $j++) {
            if((int)$score[$j] < (int)$min)
            $min = $score[$j];
          }
        for ($j = 0; $j <= $i-2; $j++) {
            if($score[$j] > $max)
            $max = $score[$j];
        }
    echo "mean: " .number_format($mean,2,'.','');
    echo "<br>";
    echo "score min: " .($min);
    echo "<br>";
    echo "score max: " .($max);
?>
<table class="table table-hover">
        <thead >
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Score</th>
                </tr>
        </thead>
        <tbody>
            <?php
            $file = fopen(basename($_FILES["fileToUpload"]["name"]),"r");
            $stdID = array();
            $nameStd = array();
            $score = array();
            $i = 0;
            while(($row = fgetcsv($file,0,","))!== FALSE) {
            if($i!==0){
                    $stdID[] = $row[0];
                    $nameStd[] = $row[1];
                    $score[] = $row[2];
                }
                $i++;
            }   
            for ($j = 0; $j <= $i-2; $j++) {
                echo "<tr>";
                echo "<th> $stdID[$j]";
                echo "<th>$stdName[$j]";
                echo "<th>$score[$j]";
                echo "</th></th></th>";
            }
            ?>
        </tbody>
    </table>
    </div>


</body>
</html>
