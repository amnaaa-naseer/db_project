<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Volunteer</title>
</head>
<body>
    <form method="post" action="add_volunteer.php">
        <h1>Add New Volunteer</h1>
        First Name: <input type="text" name="vFname" required><br>
        Last Name: <input type="text" name="vLname" required><br>
        Availability: <input type="text" name="availability" required><br>
        Contact No: <input type="text" name="contact_no" required><br>
        Skill: <input type="text" name="skill" required><br>
        Animal ID (if associated with an animal): <input type="number" name="animal_id"><br>
        <button type="submit">Add Volunteer</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $vFname = $_POST['vFname'];
        $vLname = $_POST['vLname'];
        $availability = $conn->real_escape_string($_POST['availability']);
        $contact_no = $_POST['contact_no'];
        $skill = $_POST['skill'];
        $animal_id = !empty($animal_id) ? $animal_id : 'NULL';
        
        // Insert into volunteer table
        $sql_volunteer = "INSERT INTO volunteer (availability, animal_id) VALUES ('$availability', $animal_id)";
        if ($conn->query($sql_volunteer) === TRUE) {
            $volunteer_id = $conn->insert_id;

            // Insert into volunteerName table
            $sql_name = "INSERT INTO volunteerName (volunteer_id, vFname, vLname) VALUES ($volunteer_id, '$vFname', '$vLname')";
            $conn->query($sql_name);

            // Insert into volunteerContact table
            $sql_contact = "INSERT INTO volunteerContact (volunteer_id, contact_no) VALUES ($volunteer_id, '$contact_no')";
            $conn->query($sql_contact);

            // Insert into volunteerSkills table
            $sql_skill = "INSERT INTO volunteerSkills (volunteer_id, skill) VALUES ($volunteer_id, '$skill')";
            $conn->query($sql_skill);

            echo "Volunteer added successfully!";
        } else {
            echo "Error: " . $sql_volunteer . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
