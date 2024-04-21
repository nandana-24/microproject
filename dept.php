<html>
<head>
	<title>Dept</title>
	<link rel="stylesheet" href="dep.css" type="text/css">
</head>
<body>
		<?php
// Connect to SQLite database
$db = new SQLite3('library_new.db');
/*try{
if ($db) {
	echo "Database connection successful.";
} else {
	echo "Database connection failed.";
}

// Close database connection
}catch (Exception $e) {
// If an exception occurs, catch and handle it
echo "Database connection failed: " . $e->getMessage();
}*/

// Execute SQLite query
$results = $db->query("SELECT DISTINCT dep FROM users WHERE dep IS NOT NULL;");

// Begin HTML form
echo '<h1 class="head"><center>DEPARTMENT WISE SEARCH</center></h1>';
echo '<form method="POST" name="dropdown">';
echo '<label for="dropdown" class="text">Select a department:</label>';
echo '<select name="deptdropdown" class="dropdown">';

// Populate dropdown options with query results
echo "<option value='select'>Select</option>";
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    echo "<option value=\"{$row['dep']}\">{$row['dep']}</option>";
}

// Close HTML form
echo '</select>';
echo '<br><br><input type="submit" value="Submit" class="btn">';
echo '   <button type="submit" class="btn" formaction="index.php">Home</button>';
echo '</form><br>';

	include("connection.php");
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
	if(isset($_POST["deptdropdown"]))
		{
			$dep=$_POST["deptdropdown"];
		$querystudent="SELECT u.adm_no, u.roll_no, u.name, u.dep,g.entry_time,g.exit_time FROM gate_reg g JOIN users u ON g.ref_rfid = u.rfid WHERE u.dep= '$dep'";
		$resultstudent=$conn->query($querystudent);
		echo "<table border='1'>
                                <tr>
                                        <th>Admission number</th>
                                        <th>Roll number</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Entry time</th>
                                        <th>Exit time</th>
                                </tr>";
		while ($row = $resultstudent->fetchArray(SQLITE3_ASSOC)) {
			echo "<table border='1'><tr>
					<td>{$row['adm_no']}</td>
					<td>{$row['roll_no']}</td>
					<td>{$row['name']}</td>
					<td>{$row['dep']}</td>
					<td>{$row['entry_time']}</td>
					<td>{$row['exit_time']}</td>
				  </tr></table>";
		}
	}
}
	?>
</body>
</html>
