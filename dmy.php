<html>
<head>
<title>Date/month/year vise search</title>
<link rel="stylesheet" href="\microproject\dmy.css" type="text/css">
</head>
<body>
	<h1><center>DAY/MONTH WISE SEARCH</center></h1>
	<div class="container">
	<div class="day">
	<form method="POST" action="" name="date">
	<label class="text">Date:</label>
	<input type="date" name="dat"/><br><br>
	<input type="Submit" name="Submit" value="Search" class="btn"/>
	<button type="submit" class="btn" formaction="index.php">Home</button>
	</form>
		<?php
			include("connection.php");
			if(isset($_POST['Submit']))
			{
				$day=$_POST['dat'];
				$querydate="SELECT COUNT(*) AS num_students FROM gate_reg  WHERE DATE(entry_time)='$day'";
				$resultdate=$conn->query($querydate);
				if($resultdate !== false) 
				{
        // Fetch the result
        		$row = $resultdate->fetchArray(SQLITE3_ASSOC);
        
        // Display the result
		if ($row) {
			$studentCount = $row['num_students'];
			echo "Number of students who used the library in $day: $studentCount";
		} else {
			echo "No students used the library in $mon/$year";
		}		
			}
			}
?>
</div>
<div class="month">
	<form name="monthdropdown" method="POST">
			<label class="text">Select month:</label>
			<select name="monthdropdown">
			<option value="select">select</option>
			<option value="01">January</option>
			<option value="02">February</option>
			<option value="03">March</option>
			<option value="04">April</option>
			<option value="05">May</option>
			<option value="06">June</option>
			<option value="07">July</option>
			<option value="08">August</option>
			<option value="09">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>
		<br><br>
		<label class="text">Select year:</label>
		<select name="yrdropdown">
			<option value="select">select</option>
			<option value="2023">2023</option>
			<option value="2024">2024</option>
		</select>
			<br><br>
			<input type="Submit" name="Submit" value="search" class="btn"/>
			<button type="submit" class="btn" formaction="index.php">Home</button>
		</form>
		<?php
				include("connection.php");
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
				if(isset($_POST["monthdropdown"]))
					{
						$mon=$_POST["monthdropdown"];
						$year=$_POST["yrdropdown"];
					$querymonth="SELECT COUNT(*) AS student_count FROM gate_reg WHERE strftime('%m',entry_time) = '$mon' AND strftime('%Y',entry_time) = '$year'";
					$resultmonth=$conn->query($querymonth);
					if($resultmonth !== false) 
				{
        // Fetch the result
        		$row = $resultmonth->fetchArray(SQLITE3_ASSOC);
        
        // Display the result
		if ($row) {
			$studentCount = $row['student_count'];
			echo "Number of students who used the library in $mon/$year: $studentCount";
		} else {
			echo "No students used the library in $mon/$year";
		}		
			}
		}
	}
		?>
		</div>
		</div>
</body>
</html>

