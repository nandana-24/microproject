<html>
    <head>
        <title>Frequent times</title>
        <link rel="stylesheet" href="dep.css" type="text/css">
</head>
<body>
    <form>
<h1 class="head"><center>FREQUENT TIMES</center></h1>
<?php
// Establish a connection to the SQLite database
include("connection.php");

// Define the SQL query
$queryvisit = "
    SELECT visit_time, COUNT(*) AS visit_count
    FROM (
        SELECT entry_time AS visit_time FROM gate_reg
        UNION ALL
        SELECT exit_time AS visit_time FROM gate_reg
    ) AS combined_visits
    GROUP BY visit_time
    ORDER BY visit_count DESC
    LIMIT 3";

// Execute the query
$resultvisit = $conn->query($queryvisit);

// Check if there are any results
if ($resultvisit) {
    // Output the results
    echo "<table border='1'>
            <tr>
                <th>Visit Time</th>
                <th>Visit Count</th>
            </tr>";
    while ($row = $resultvisit->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['visit_time'] . "</td>";
        echo "<td>" . $row['visit_count'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Handle the case where no results are found
    echo "No results found.";
}
?>
<br><br>
<button type="submit" class="btn" formaction="index.php">Home</button>
</form>
</body>
</html>