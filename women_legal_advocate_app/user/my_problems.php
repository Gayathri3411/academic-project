<?php
session_start();
include('../db/db.php');
include('../includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user_problems WHERE user_id = '$user_id' ORDER BY problem_id DESC";
$result = mysqli_query($conn, $query);
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">My Posted Problems</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Case Type</th>
                    <th>Problem</th>
                    <th>Case No</th>
                    <th>Address</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['case_type']) ?></td>
                        <td><?= htmlspecialchars($row['problem']) ?></td>
                        <td><?= htmlspecialchars($row['case_no']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= htmlspecialchars($row['mobile']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">You have not posted any problems yet.</div>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
