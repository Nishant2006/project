<?php
// Database configuration
$servername = "localhost";  // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "userdata"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error messages array
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize data from the form
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $email    = trim($_POST['email']);
    // Check if username is not empty
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Check if password is not empty
    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    // Check if the username already exists
    $check_sql = "SELECT username FROM login WHERE username = '$username'";
    $check_stmt = $conn->prepare($check_sql);
    // $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $check_stmt->store_result();
    
    if ($check_stmt->num_rows > 0) {
        $errors[] = "Username already exists. Please choose a different one.";
    }

    // If there are no validation errors, proceed with database insertion
    if (empty($errors)) {
        // Create and execute the SQL query
        $insert_sql = "INSERT INTO sign (username, password, email) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sss", $username, $password, $email);

        if ($insert_stmt->execute()) {
            // Redirect to index.php after successful insertion
            header("Location: login.php");
            exit; // Terminate script execution after the redirect
        } else {
            echo "Error: " . $insert_stmt->error;
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Form</title>
</head>
<body>
    <h2>Sign Up Form</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <button id="sign" onclick="location.href='anime_merchandise'"> sign in</button>
    </form>
</body>
</html>
