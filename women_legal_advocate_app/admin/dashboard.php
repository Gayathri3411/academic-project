<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Admin Dashboard</h2>
    <div class="d-grid gap-3 col-6 mx-auto">
        <a href="approve_advocates.php" class="btn btn-outline-primary">Approve Advocate Profiles</a>
        <a href="view_users.php" class="btn btn-outline-secondary">View Registered Users</a>
        <a href="approved_advocates.php" class="btn btn-outline-success">Approved Advocates</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
