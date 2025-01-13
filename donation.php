<?php
include 'connect.php';  // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $amount = $_POST['amount'];
    $date = $_POST['date'];
    $purpose = $_POST['purpose'];
    $adopter_id = !empty($_POST['adopter_id']) ? $_POST['adopter_id'] : "NULL";  // NULL if no adopter ID
    $dFname = $_POST['dFname'];
    $dLname = $_POST['dLname'];

    // Validate form data
    if (empty($amount) || empty($date) || empty($purpose) || empty($dFname) || empty($dLname)) {
        echo "Error: All fields are required!";
        exit();
    }

    // Insert donation record into the donation table
    $sql_donation = "INSERT INTO donation (amount, date, purpose, adopter_id) 
                     VALUES ('$amount', '$date', '$purpose', $adopter_id)";

    if ($conn->query($sql_donation) === TRUE) {
        // Get the last inserted donation_id
        $donation_id = $conn->insert_id;

        // Insert donor's name into the donorName table
        $sql_donor_name = "INSERT INTO donorName (donation_id, dFname, dLname) 
                           VALUES ($donation_id, '$dFname', '$dLname')";

        if ($conn->query($sql_donor_name) === TRUE) {
            echo "Donation record and donor name added successfully!";
        } else {
            echo "Error inserting donor name: " . $conn->error;
        }
    } else {
        echo "Error inserting donation: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="db_style.css">
    <title>Add Donation</title>
</head>
<body>
    <form method="post" action="donation.php">
        <h1>Add Donation</h1>
        Amount: <input type="number" name="amount" required><br>
        Date: <input type="date" name="date" required><br>
        Purpose: <textarea name="purpose" required></textarea><br>
        Adopter ID (Optional): <input type="number" name="adopter_id"><br>
        Donor First Name: <input type="text" name="dFname" required><br>
        Donor Last Name: <input type="text" name="dLname" required><br>
        <button type="submit">Submit Donation</button>
    </form>
</body>
</html>
