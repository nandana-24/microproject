<html>
<head>
	<title>Student</title>
	<link rel="stylesheet" href="dep.css" type="text/css">
</head>
<body>
	<h1 class="head"><center>STUDENT WISE SEARCH</center></h1>
	<form name="student" method="POST">
		<label class="text">Enter student name:</label>
			<input type="text" name="nam"/><br><br>
		<input type="Submit" name="submit" value="Search" class="btn" />
		<button type="submit" class="btn" formaction="index.php">Home</button>
	</form>
<?php
	include("connection.php");
	if(isset($_POST['submit']))
	{
		$name=$_POST['nam'];
        //$name=strtolower($name);
	$querystudent="SELECT u.adm_no, u.roll_no, u.name, u.dep,g.entry_time,g.exit_time FROM gate_reg g JOIN users u ON g.ref_rfid = u.rfid WHERE u.name= '$name'";
	$resultstudent=$conn->query($querystudent);
if ($resultstudent) {
    // Check if any rows were returned
    if ($resultstudent->fetchArray(SQLITE3_ASSOC) !== false) {
        // Output the results table header
        echo "<table border='1'>
                <tr>
                    <th>Admission number</th>
                    <th>Roll number</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Entry time</th>
                    <th>Exit time</th>
                </tr>";
        
        // Output the results
        while ($row = $resultstudent->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>
                    <td>{$row['adm_no']}</td>
                    <td>{$row['roll_no']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['dep']}</td>
                    <td>{$row['entry_time']}</td>
                    <td>{$row['exit_time']}</td>
                  </tr>";
        }

        // Close the table
        echo "</table>";
    } else {
        // No students found message
        echo "No students found.";
    }
} else {
    // Error occurred
    echo "Error executing query.";
}
	}
?>
</body>
</html>