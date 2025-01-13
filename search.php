<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="db_style.css">
    <title>Search Database</title>
</head>
<body>
    <form method="post" action="search.php">
        <h1>Search Database</h1>
        Table: 
        <select name="table" required>
            <option value="animal">Animals</option>
            <option value="adopter">Adopters</option>
            <option value="donation">Donations</option>
            <option value="employee">Employees</option>
        </select><br>
        Field: <input type="text" name="field" required><br>
        Value: <input type="text" name="value" required><br>
        <button type="submit">Search</button>
    </form>

    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    $sql = "SELECT * FROM $table WHERE $field LIKE '%$value%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<caption>Results from $table Table</caption>";

        // Fetch and display table headers
        echo "<tr>";
        $columns = array_keys($result->fetch_assoc());
        foreach ($columns as $column) {
            echo "<th>" . ucfirst($column) . "</th>";
        }
        echo "</tr>";

        // Re-run the query to fetch data after extracting headers
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $val) {
                echo "<td>$val</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }
}
?>
</body>
</html>
