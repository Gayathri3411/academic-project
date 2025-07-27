<?php
session_start();
if (!isset($_SESSION['advocate_id'])) {
    header("Location: login.php");
    exit();
}
include('../includes/header.php');
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Welcome Advocate <?= $_SESSION['advocate_name'] ?></h2>
    <div class="d-grid gap-3 col-6 mx-auto">
        <a href="view_issues.php" class="btn btn-outline-primary">View User Issues</a>
        <a href="post_solution.php" class="btn btn-outline-success">Post Solution</a>
        <a href="view_feedback.php" class="btn btn-outline-dark">View Feedback</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
