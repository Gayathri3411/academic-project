<?php
session_start();
include('../db/db.php');
include('../includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

if (isset($_POST['submit'])) {
    $case_type = $_POST['case_type'];
    $problem = $_POST['problem'];
    $case_no = $_POST['case_no'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    $query = "INSERT INTO user_problems (user_id, name, case_type, problem, case_no, address, mobile)
              VALUES ('$user_id', '$user_name', '$case_type', '$problem', '$case_no', '$address', '$mobile')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success text-center mt-3'>Problem submitted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="container mt-5">
    <h2 class="mb-4 text-center">Post Your Legal Problem</h2>
    <form method="post" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3"><label>Case Type</label><input type="text" name="case_type" class="form-control" required></div>
        <div class="mb-3"><label>Problem Description</label><textarea name="problem" class="form-control" rows="5" required></textarea></div>
        <div class="mb-3"><label>Case Number (Optional)</label><input type="text" name="case_no" class="form-control"></div>
        <div class="mb-3"><label>Your Address</label><input type="text" name="address" class="form-control" required></div>
        <div class="mb-3"><label>Contact Number</label><input type="text" name="mobile" class="form-control" required></div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Submit Problem</button>
        </div>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
