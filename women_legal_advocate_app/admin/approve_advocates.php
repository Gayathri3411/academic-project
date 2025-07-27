<?php
session_start();
include('../db/db.php');

// Check admin login
if (!isset($_SESSION['admin_email'])) {
    header("Location: login.php");
    exit();
}

// Approve logic
if (isset($_GET['approve_id'])) {
    $advocate_id = $_GET['approve_id'];
    $update = "UPDATE advocate SET status='active' WHERE advocate_id='$advocate_id'";
    mysqli_query($conn, $update);
    // Redirect with success message
    header("Location: approve_advocates.php?approved=success");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approve Advocates</title>
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include('../includes/header.php'); ?>

<div class="container mt-4">
    <?php if (isset($_GET['approved']) && $_GET['approved'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ✅ Advocate approved successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <h2 class="text-center mb-4">Pending Advocate Approvals</h2>
    
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM advocate WHERE status='pending'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['advocate_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['mobile']}</td>
                        <td>{$row['city']}</td>
                        <td>{$row['location']}</td>
                        <td><span class='badge bg-warning text-dark'>{$row['status']}</span></td>
                        <td><a href='approve_advocates.php?approve_id={$row['advocate_id']}' class='btn btn-success btn-sm'>Approve</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8' class='text-center'>No pending advocates found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
