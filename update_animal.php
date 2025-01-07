<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Update Animal</title>
</head>
<body>
    <form method="post" action="update_animal.php">
        <h1>Update Animal Details</h1>
        Animal ID: <input type="number" name="animal_id" required><br>
        Name: <input type="text" name="name"><br>
        Species: <input type="text" name="species"><br>
        Breed: <input type="text" name="breed"><br>
        Age: <input type="number" name="age"><br>
        Vaccination Record: <textarea name="vaccination_record"></textarea><br>
        Employee ID: <input type="text" name="emp_id"><br>
        Volunteer ID: <input type="text" name="volunteer_id"><br>
        <button type="submit">Update Animal</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $animal_id = $_POST['animal_id'];
        $name = $_POST['name'];
        $species = $_POST['species'];
        $breed = $_POST['breed'];
        $age = $_POST['age'];
        $vaccination_record = $_POST['vaccination_record'];
        $emp_id = $_POST['emp_id'];
        $volunteer_id = $_POST['volunteer_id'];

        $sql = "UPDATE animal SET
                name='$name', species='$species', breed='$breed', age=$age, 
                vaccination_record='$vaccination_record', emp_id='$emp_id', volunteer_id='$volunteer_id'
                WHERE animal_id=$animal_id";

        if ($conn->query($sql) === TRUE) {
            echo "Animal updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
