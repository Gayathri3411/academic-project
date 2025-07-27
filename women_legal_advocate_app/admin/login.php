<?php
session_start();
include('../includes/header.php');
include('../db/db.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // ✅ secure with md5

    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['admin_email'] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<div class="container mt-5">
    <div class="card shadow-lg p-4 mx-auto" style="max-width: 500px;">
        <h2 class="text-center mb-4 text-primary">Admin Login</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label><strong>Email</strong></label>
                <input type="email" name="email" class="form-control" required placeholder="Enter email">
            </div>
            <div class="mb-3">
                <label><strong>Password</strong></label>
                <input type="password" name="password" class="form-control" required placeholder="Enter password">
            </div>
            <button type="submit" name="login" class="btn btn-dark w-100">Login</button>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
