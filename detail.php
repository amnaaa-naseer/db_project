<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Details</title>
</head>
<body>
    <form method="post" action="detail.php">
        <h1>View Details</h1>
        Table: 
        <select name="table" required>
            <option value="animal">Animal</option>
            <option value="adopter">Adopter</option>
            <option value="employee">Employee</option>
            <option value="volunteer">Volunteer</option>
        </select><br>
        ID: <input type="number" name="id" required><br>
        <button type="submit">View Details</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $table = $_POST['table'];
        $id = $_POST['id'];

        if ($table === 'animal') {
            $sql = "SELECT * FROM animal WHERE animal_id = $id";
        } elseif ($table === 'adopter') {
            $sql = "SELECT * FROM adopter WHERE adopter_ID = $id";
        } elseif ($table === 'employee') {
            $sql = "SELECT * FROM employee WHERE emp_id = $id";
        } elseif ($table === 'volunteer') {
            $sql = "SELECT * FROM volunteer WHERE volunteer_id = $id";
        } else {
            echo "Invalid table selected.";
            exit;
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    echo "<th>$key</th><td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No details found for the given ID.";
        }
    }
    ?>
</body>
</html>
