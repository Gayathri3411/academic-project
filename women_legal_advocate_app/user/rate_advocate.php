<?php
session_start();
include('../db/db.php');
include('../includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle form submission
if (isset($_POST['submit'])) {
    $advocate_id = $_POST['advocate_id'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];
    $date = date("Y-m-d");

    $query = "INSERT INTO feedback (user_id, advocate_id, rating, comments, feedback_date)
              VALUES ('$user_id', '$advocate_id', '$rating', '$comments', '$date')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success text-center mt-3'>Thank you for your feedback!</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Rate an Advocate</h2>

    <form method="post" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label>Select Advocate</label>
            <select name="advocate_id" class="form-control" required>
                <option value="">-- Select Advocate --</option>
                <?php
                $advocates = mysqli_query($conn, "SELECT advocate_id, name FROM advocate WHERE status='active'");
                while ($row = mysqli_fetch_assoc($advocates)) {
                    echo "<option value='{$row['advocate_id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Rating (1 to 5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label>Comments</label>
            <textarea name="comments" class="form-control" rows="4" required></textarea>
        </div>

        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary">Submit Feedback</button>
        </div>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
