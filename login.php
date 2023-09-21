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

// Initialize error message
$error = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $enteredUsername = trim($_POST["username"]);
    $enteredPassword = trim($_POST["password"]);

    // Create and execute the SQL query to check if the username and password match
    $sql = "SELECT username , password FROM login where username='$enteredUsername' and password='$enteredPassword' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Check if a row was returned
    $validUsername = "username";
    $validPassword = "password";

    if ($sql){
        header("Location:index.php");
    }


        // Verify the entered password against the stored hashed password
    //     if ($enteredUsername == $validUsername ) {
           
    //         header("Location: index.php");
    //         exit;
    // }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body align="center" style="padding: 270px;
    background: darkseagreen;">

    <h2>Login Form</h2>
<table>

    <form method="post" action="" style>
    <tr>
        <td>    
    <label for="username">Username:</label>
    </td>
    <td>
    <input type="text" name="username" required><br><br>
    </td>
    </tr>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    <p><?php echo $error; ?></p>
    <button id="sign" onclick="location.href='sign.php'">For Sign Up</button>
</table>
</body>
</html>
