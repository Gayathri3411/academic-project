<?php
session_start();
include('../includes/header.php');
include('../db/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT p.problem_id, p.problem, a.name AS advocate_name, s.solution, s.solution_date
          FROM user_problems p
          LEFT JOIN advocate_solutions s ON p.problem_id = s.problem_id
          LEFT JOIN advocate a ON s.advocate_id = a.advocate_id
          WHERE p.user_id = '$user_id'
          ORDER BY s.solution_date DESC";

$result = mysqli_query($conn, $query);
?>

<div class="container mt-5 mb-4">
    <h2 class="text-center mb-4">Solutions from Advocates</h2>

    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control w-50 mx-auto" placeholder="Search solutions...">
    </div>

    <table class="table table-bordered table-striped" id="solutionsTable">
        <thead class="table-dark">
            <tr>
                <th>Problem</th>
                <th>Advocate</th>
                <th>Solution</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['problem']}</td>
                        <td>{$row['advocate_name']}</td>
                        <td>{$row['solution']}</td>
                        <td>{$row['solution_date']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='4' class='text-center'>No solutions found.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<?php include('../includes/footer.php'); ?>
<script>
// Live search
document.getElementById('searchInput').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#solutionsTable tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>
