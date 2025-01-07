<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Animal</title>
</head>
<body>
    <form method="post" action="add_animal.php">
        <h1>Add New Animal</h1>
        Name: <input type="text" name="name" required><br>
        Species: <input type="text" name="species" required><br>
        Breed: <input type="text" name="breed" required><br>
        Age: <input type="number" name="age" required><br>
        Vaccination Record: <textarea name="vaccination_record"></textarea><br>
        Employee ID: <input type="number" name="emp_id"><br>
        Volunteer ID: <input type="number" name="volunteer_id"><br>
        <button type="submit">Add Animal</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $species = $_POST['species'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $vaccination_record = $_POST['vaccination_record'];
        $emp_id = $_POST['emp_id'];
        $volunteer_id = !empty($volunteer_id) ? $volunteer_id : 'NULL';

        $sql = "INSERT INTO animal (name, species, breed, age, vaccination_record, emp_id, volunteer_id)
        VALUES ('$name', '$species', '$breed', $age, '$vaccination_record', $emp_id, $volunteer_id)";
        if ($conn->query($sql) === TRUE) {
            echo "Animal added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
