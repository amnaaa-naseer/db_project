<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="db_style.css">
    <title>Add Animal</title>
</head>
<body>
    <form method="post" action="add_animal.php">
        <h1>Add New Animal</h1>
        <label>Name</label> <input type="text" name="name" required><br>
        <label>Species</label> <input type="text" name="species" required><br>
        <label>Breed</label> <input type="text" name="breed" required><br>
        <label>Age</label> <input type="number" name="age" required><br>
        <label>Vaccination Record</label> <textarea name="vaccination_record"></textarea><br>
        <label>Employee ID</label> <input type="number" name="emp_id"><br>
        <label>Volunteer ID</label> <input type="number" name="volunteer_id"><br>
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
