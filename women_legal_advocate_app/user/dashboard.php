<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Welcome, <?= $_SESSION['user_name'] ?>!</h2>
    <div class="d-grid gap-3 col-6 mx-auto">
        <a href="my_profile.php" class="btn btn-outline-primary">My Profile</a>
        <a href="post_problem.php" class="btn btn-outline-secondary">Post a Legal Problem</a>
         <a href="view_solutions.php" class="btn btn-outline-primary">view My Solution</a>
        <a href="my_problems.php" class="btn btn-outline-success">View My Problems</a>
        <a href="rate_advocate.php" class="btn btn-outline-dark">Rate Advocate</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
