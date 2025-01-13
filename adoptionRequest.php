<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="db_style.css">
    <title>Create Adoption Request</title>
</head>
<body>
    <form method="post" action="adoptionRequest.php">
        <h1>Create Adoption Request</h1>
        Status: <input type="text" name="status" required><br>
        Application Info: <textarea name="application_info" required></textarea><br>
        Adopter ID: <input type="number" name="adopter_id" required><br>
        Animal ID: <input type="number" name="animal_id"><br>
        <button type="submit">Submit Request</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $status = $_POST['status'];
        $application_info = $_POST['application_info'];
        $adopter_id = $_POST['adopter_id'];
        $animal_id = !empty($_POST['animal_id']) ? $_POST['animal_id'] : NULL;  // Handle animal_id being optional

        // Check if the adopter exists
        $check_adopter_sql = "SELECT * FROM adopter WHERE adopter_id = $adopter_id";
        $adopter_result = $conn->query($check_adopter_sql);

        if ($adopter_result->num_rows == 0) {
            // If the adopter doesn't exist, insert them into the adopter table
            $adoption_history = 'First adoption';  // Default history
            $insert_adopter_sql = "INSERT INTO adopter (adopter_id, adoption_history) VALUES ($adopter_id, '$adoption_history')";
            if ($conn->query($insert_adopter_sql) !== TRUE) {
                echo "Error: Could not insert adopter. " . $conn->error;
                exit();
            }
        }

        // Now proceed to insert into adoptionRequest (do not include request_id, it auto-increments)
        $sql = "INSERT INTO adoptionRequest (status, application_info, adopter_id, animal_id) 
                VALUES ('$status', '$application_info', $adopter_id, $animal_id)";

        if ($conn->query($sql) === TRUE) {
            echo "Adoption request submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>
</html>
