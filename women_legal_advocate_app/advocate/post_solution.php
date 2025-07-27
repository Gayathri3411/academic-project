<?php
session_start();
include('../db/db.php');
include('../includes/header.php');

if (!isset($_SESSION['advocate_id'])) {
    header("Location: login.php");
    exit();
}

$advocate_id = $_SESSION['advocate_id'];

// Check for problem ID in query
if (!isset($_GET['problem_id'])) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Problem ID not provided.</div></div>";
    include('../includes/footer.php');
    exit();
}

$problem_id = $_GET['problem_id'];

// Get user problem details
$problem_query = mysqli_query($conn, "SELECT * FROM user_problems WHERE problem_id = '$problem_id'");
$problem = mysqli_fetch_assoc($problem_query);

// Handle form submission
if (isset($_POST['submit'])) {
    $solution = $_POST['solution'];
    $date = date("Y-m-d");

    $insert = "INSERT INTO advocate_solutions (problem_id, advocate_id, solution, solution_date)
               VALUES ('$problem_id', '$advocate_id', '$solution', '$date')";

    if (mysqli_query($conn, $insert)) {
        echo "<div class='alert alert-success text-center mt-4'>Solution posted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-4'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Post Solution to User Issue</h2>

    <div class="card mb-4 p-3">
        <h5><strong>User Name:</strong> <?= htmlspecialchars($problem['name']) ?></h5>
        <p><strong>Problem:</strong> <?= htmlspecialchars($problem['problem']) ?></p>
    </div>

    <form method="post" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label>Your Legal Solution</label>
            <textarea name="solution" class="form-control" rows="6" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-success">Submit Solution</button>
        </div>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
