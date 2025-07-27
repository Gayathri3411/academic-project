<?php
session_start();
include('../db/db.php');

if (!isset($_SESSION['advocate_id'])) {
    header("Location: login.php");
    exit();
}

include('../includes/header.php');
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">User Legal Issues</h2>

    <?php
    $query = "SELECT * FROM user_problems ORDER BY problem_id DESC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>Case Type</th>
                    <th>Problem</th>
                    <th>Case No</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['case_type']) ?></td>
                        <td><?= htmlspecialchars($row['problem']) ?></td>
                        <td><?= htmlspecialchars($row['case_no']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td><?= htmlspecialchars($row['mobile']) ?></td>
                        <td>
                            <a href="post_solution.php?problem_id=<?= $row['problem_id'] ?>" class="btn btn-sm btn-primary">Post Solution</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info text-center">No problems posted yet.</div>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
