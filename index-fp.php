<?php
session_start();

// Database configuration
$servername = "localhost";
$username = 'root'; 
$password = '';
$dbname = "final-project-db";

$link = mysqli_connect($servername, $username, $password, $dbname);    

if(mysqli_connect_error()){
    die("Database connection unsuccessful and exiting program");
}

else {
    echo "Database connection successful";
}

// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM signin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        header('Location: main.php');
        exit();
    } else {
        $error = "Invalid email or password";
    }



    /*$email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        header('Location: main.php');
        exit();
    } else {
        $error = "Invalid email or password";
    }*/
}

// Handle signup
if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO signin (email, password) VALUES ('$email', '$password')";
    mysqli_query($link, $query);

    $_SESSION['email'] = $email;
    header('Location: main.php');
    exit();
    
    
    /*$email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    mysqli_query($conn, $query);

    $_SESSION['email'] = $email;
    header('Location: main.php');
    exit();*/
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index-fp.php');
    exit();
    /*session_destroy();
    header('Location: index.php');
    exit();*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/style-fp.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">BookBuddy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="main.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>
                <div class="card mt-5">
                    <div class="card-header">
                        Login or Sign Up
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                            <button type="submit" name="signup" class="btn btn-secondary">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>
