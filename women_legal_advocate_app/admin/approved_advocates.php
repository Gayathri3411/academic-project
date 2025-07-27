<?php
session_start();
include('../db/db.php');

if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}

include('../includes/header.php');
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Approved Advocates List</h2>

    <?php
    $result = mysqli_query($conn, "SELECT * FROM advocate WHERE status='active'");

    if (mysqli_num_rows($result) > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Location</th>
                    <th>Experience</th>
                    <th>Languages</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['advocate_id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['mobile'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['location'] ?></td>
                    <td><?= $row['experience'] ?></td>
                    <td><?= $row['languages'] ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning text-center">No approved advocates yet.</div>
    <?php endif; ?>
</div>

<?php include('../includes/footer.php'); ?>
