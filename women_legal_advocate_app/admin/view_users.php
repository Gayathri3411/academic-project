<?php
include '../includes/header.php';
include '../db/db.php';
?>

<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Registered Users</h2>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Address</th>
                <th>Type of Issue</th>
                <th>Preferred Language</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $user_result = mysqli_query($conn, "SELECT * FROM user");
            while ($row = mysqli_fetch_assoc($user_result)) {
                echo "<tr>";
                echo "<td>{$row['user_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['mobile']}</td>";
                echo "<td>{$row['city']}</td>";
                echo "<td>{$row['address']}</td>";
                echo "<td>" . (!empty($row['question1']) ? $row['question1'] : '-') . "</td>";
                echo "<td>" . (!empty($row['question2']) ? $row['question2'] : '-') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2 class="text-center mb-4 mt-5">Registered Advocates</h2>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Location</th>
                <th>Address</th>
                <th>Status</th>
                <th>Experience</th>
                <th>Languages</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $advocate_result = mysqli_query($conn, "SELECT * FROM advocate");
            while ($row = mysqli_fetch_assoc($advocate_result)) {
                echo "<tr>";
                echo "<td>{$row['advocate_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['mobile']}</td>";
                echo "<td>{$row['city']}</td>";
                echo "<td>{$row['location']}</td>";
                echo "<td>{$row['address']}</td>";

                $status_badge = $row['status'] == 'active' ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Pending</span>";
                echo "<td>$status_badge</td>";

                echo "<td>" . (!empty($row['question1']) ? $row['question1'] : '-') . "</td>";
                echo "<td>" . (!empty($row['question2']) ? $row['question2'] : '-') . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
