<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="db_style.css">
    <title>Add Employee</title>
</head>
<body>
    <form method="post" action="add_employee.php">
        <h1>Add New Employee</h1>
        First Name: <input type="text" name="eFname" required><br>
        Last Name: <input type="text" name="eLname" required><br>
        Designation: <input type="text" name="designation" required><br>
        Contact No: <input type="number" name="contact_no" required><br>
        Animal ID (if managing an animal): <input type="number" name="animal_id"><br>
        <button type="submit">Add Employee</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $eFname = $_POST['eFname'];
        $eLname = $_POST['eLname'];
        $designation = $conn->real_escape_string($_POST['designation']);
        $contact_no = $_POST['contact_no'];
        $animal_id = !empty($_POST['animal_id']) ? $_POST['animal_id'] : 'NULL'; // Handle optional Animal ID
    
        // Insert into employee table
        $sql_employee = "INSERT INTO employee (animal_id, designation) VALUES ($animal_id, '$designation')";
        if ($conn->query($sql_employee) === TRUE) {
            $emp_id = $conn->insert_id;
    
            // Insert into employeeName table
            $sql_name = "INSERT INTO employeeName (emp_id, eFname, eLname) VALUES ($emp_id, '$eFname', '$eLname')";
            $conn->query($sql_name);
    
            // Insert into employeeContact table
            $sql_contact = "INSERT INTO employeeContact (emp_id, contact_no) VALUES ($emp_id, '$contact_no')";
            $conn->query($sql_contact);
    
            echo "Employee added successfully!";
        } else {
            echo "Error: " . $sql_employee . "<br>" . $conn->error;
        }
    }    
    ?>
</body>
</html>
