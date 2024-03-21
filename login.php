<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h1>Login Form</h1>
    <form method="post">
        <table>
            <tr><td>Email</td><td><input type="text" name="email"></td></tr>
            <tr><td>Password</td><td><input type="password" name="pass"></td></tr>
            <tr><td><input type="submit" name="submit" value="Login"></td></tr>
        </table>
    </form>

    <?php
    // Database connection
    $host = "mysql-iraguha"; // MySQL host
    $username = "root"; // MySQL username
    $password = ""; // MySQL password
    $database = "23rp_shareride_db"; // MySQL database name

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        // Fetch user data from database
        $query = "SELECT usr_id, user_firstname, user_lastname, user_gender, user_email, user_password  FROM tbl_users WHERE user_email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['user_password'])) {
                echo "Login successful. Welcome, " . $row['user_firstname'] . " " . $row['user_lastname'];
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "User not found.";
        }
    }

    $conn->close();
    ?>
</body>
</html>
