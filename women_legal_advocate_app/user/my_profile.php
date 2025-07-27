<?php
session_start();
include('../db/db.php');
include('../includes/header.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user details
$query = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<div class='container mt-5'><div class='alert alert-danger text-center'>No user profile found.</div></div>";
    include('../includes/footer.php');
    exit();
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">My Profile</h2>
    <table class="table table-bordered table-striped" style="max-width: 700px; margin: 0 auto;">
        <tr><th>Name</th><td><?= htmlspecialchars($row['name']) ?></td></tr>
        <tr><th>Email</th><td><?= htmlspecialchars($row['email']) ?></td></tr>
        <tr><th>Mobile</th><td><?= htmlspecialchars($row['mobile']) ?></td></tr>
        <tr><th>Address</th><td><?= htmlspecialchars($row['address']) ?></td></tr>
        <tr><th>City</th><td><?= htmlspecialchars($row['city']) ?></td></tr>
        <tr><th>Legal Issue Type</th><td><?= htmlspecialchars($row['legal_issue_type']) ?></td></tr>
        <tr><th>Preferred Language</th><td><?= htmlspecialchars($row['preferred_language']) ?></td></tr>
    </table>
</div>

<?php include('../includes/footer.php'); ?>
