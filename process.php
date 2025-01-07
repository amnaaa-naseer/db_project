<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connect.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get POST values
    $request_id = $_POST['request_id'];
    $status = $_POST['status'];
    $application_info = $_POST['application_info'];
    $adopter_id = $_POST['adopter_id'];
    $animal_id = !empty($_POST['animal_id']) ? $_POST['animal_id'] : NULL;

    // Check if request_id is provided
    if (empty($request_id)) {
        echo "Error: request_id is required!";
        exit();
    }

    // Check if adopter_id exists in the database
    $check_adopter_sql = "SELECT * FROM adopter WHERE adopter_id = $adopter_id";
    $adopter_result = $conn->query($check_adopter_sql);

    if ($adopter_result->num_rows == 0) {
        echo "Error: Adopter with ID $adopter_id not found!";
        exit();
    }

    // Now proceed to update adoptionRequest table
    $sql = "UPDATE adoptionRequest SET 
            status = '$status', 
            application_info = '$application_info', 
            adopter_id = $adopter_id, 
            animal_id = $animal_id 
            WHERE request_id = $request_id";

    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Adoption request updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Update Adoption Request</title>
</head>
<body>
    <form method="post" action="process.php">
        <h1>Update Adoption Request</h1>
        Request ID: <input type="number" name="request_id" required><br>
        Status: <input type="text" name="status" required><br>
        Application Info: <textarea name="application_info" required></textarea><br>
        Adopter ID: <input type="number" name="adopter_id" required><br>
        Animal ID: <input type="number" name="animal_id"><br>
        <button type="submit">Update Request</button>
    </form>
</body>
</html>
