<?php
session_start();
include('../includes/header.php');
include('../db/db.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center mt-4'>Invalid email or password.</div>";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">User Login</h2>
    <form method="post" class="mx-auto mt-4" style="max-width: 500px;">
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-outline-secondary">Register</a>
        </div>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
