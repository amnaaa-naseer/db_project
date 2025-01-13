<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="db_style.css">
    <title>Details</title>
</head>
<body>
    <form method="post" action="detail.php">
        <h1>View Details</h1>
        <label for="table">Table:</label>
        <select name="table" id="table" required>
            <option value="animal">Animal</option>
            <option value="adopter">Adopter</option>
            <option value="employee">Employee</option>
            <option value="volunteer">Volunteer</option>
        </select><br>
        <label for="id">ID:</label>
        <input type="number" name="id" id="id" required><br>
        <button type="submit">View Details</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $table = $_POST['table'];
        $id = $_POST['id'];

        // SQL query based on the selected table
        if ($table === 'animal') {
            $sql = "SELECT * FROM animal WHERE animal_id = $id";
        } elseif ($table === 'adopter') {
            $sql = "SELECT * FROM adopter WHERE adopter_ID = $id";
        } elseif ($table === 'employee') {
            $sql = "SELECT * FROM employee WHERE emp_id = $id";
        } elseif ($table === 'volunteer') {
            $sql = "SELECT * FROM volunteer WHERE volunteer_id = $id";
        } else {
            echo "<p>Invalid table selected.</p>";
            exit;
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<caption>Details from $table Table</caption>";

            // Display data in a key-value pair format
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    echo "<tr>";
                    echo "<th>" . ucfirst($key) . "</th>";
                    echo "<td>$value</td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            echo "<p>No details found for the given ID.</p>";
        }
    }
    ?>
</body>
</html>
