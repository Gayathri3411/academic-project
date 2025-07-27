<?php
session_start();
include('../db/db.php');
include('../includes/header.php');

if (!isset($_SESSION['advocate_id'])) {
    header("Location: login.php");
    exit();
}

$advocate_id = $_SESSION['advocate_id'];

// Fetch feedback for this advocate
$query = "
    SELECT f.*, u.name AS user_name 
    FROM feedback f
    JOIN user u ON f.user_id = u.user_id
    WHERE f.advocate_id = '$advocate_id'
    ORDER BY f.feedback_date DESC
";
$result = mysqli_query($conn, $query);
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Feedback from Users</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>Rating</th>
                    <th>Comments</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['user_name']) ?></td>
                        <td><?= htmlspecialchars($row['rating']) ?> / 5</td>
                        <td><?= htmlspecialchars($row['comments']) ?></td>
                        <td><?= htmlspecialchars($row['feedback_date']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">No feedback received yet.</div>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
