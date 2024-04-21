<html>
    <head>
        <title> Library</title>
        <link rel="stylesheet" href="\microproject\style.css" type="text/css">
    </head>
    <body>
    <div class="header">
		<img src="clg logo.png" width=700px height=150px><br><br><br><br>
		<h1><center>Library Management system</center></h1>   
	</div><br><br>
	<p id="desc">Choose one from below for following functionalities</p>
	<div class="menu">
		<nav>
			<ul>
				<li id="el1"><a href="dept.php">Department access</a></li>
                <li><a href="stud.php"> Manage Student</a></li>
                <li><a href="dmy.php">Date wise access</a></li>
                <li><a href="freq.php"> Frequent times</a></li>
			</ul>
		</nav>
	</div>
    <?php
        include("connection.php");
    ?>
    </body>
    </html>
        <!--$queryDetailedReport = "SELECT u.adm_no, u.roll_no, u.name, u.dep, u.year, g.entry_time, g.exit_time
        FROM gate_reg g
        JOIN users u ON g.ref_rfid = u.rfid";

    $resultDetailedReport = $conn->query($queryDetailedReport);

    while ($row = $resultDetailedReport->fetchArray(SQLITE3_ASSOC)) {
        echo "<table><tr>
                <td>{$row['adm_no']}</td>
                <td>{$row['roll_no']}</td>
                <td>{$row['name']}</td>
                <td>{$row['dep']}</td>
                <td>{$row['year']}</td>
                <td>{$row['entry_time']}</td>
                <td>{$row['exit_time']}</td>
              </tr></table>";
    }*/
    /*$querystudent='SELECT u.adm_no, u.roll_no, u.name, u.dep,g.entry_time,g.exit_time FROM gate_reg g JOIN users u ON g.ref_rfid = u.rfid WHERE g.entry_time like "2023-12-14%"';
    if(isset($_POST["Submit"]))
    {
        $uname=$_POST['name'];
        //echo $uname;
    $querystudent='SELECT u.adm_no, u.roll_no, u.name, u.dep,g.entry_time,g.exit_time FROM gate_reg g JOIN users u ON g.ref_rfid = u.rfid';//WHERE u.name = "$uname"';
    $resultstudent=$conn->query($querystudent);
    while ($row = $resultstudent->fetchArray(SQLITE3_ASSOC)) {
        echo "<table><tr>
                <td>{$row['adm_no']}</td>
                <td>{$row['roll_no']}</td>
                <td>{$row['name']}</td>
                <td>{$row['dep']}</td>
                <td>{$row['entry_time']}</td>
                <td>{$row['exit_time']}</td>
              </tr></table>";
    }
}*/
    ?>-->