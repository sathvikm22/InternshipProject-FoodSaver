<?php
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['login-username'];
    $password = $_POST['login-password'];

    // Prepare and execute the query to fetch user data
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Bind the result (hashed password)
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the entered password with the hashed password
        if (password_verify($password, $hashed_password)) {
            echo "Login successful!";
            // Start session and redirect (optional)
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.html");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found.";
    }

    $stmt->close();
    $conn->close();
}
?>
