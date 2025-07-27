<?php
session_start();
include('../includes/header.php');
include('../db/db.php');

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $location = $_POST['location'];
    $experience = $_POST['experience'];
    $languages = $_POST['languages'];

    $query = "INSERT INTO advocate (name, email, password, mobile, address, city, location, experience, languages, status)
              VALUES ('$name', '$email', '$password', '$mobile', '$address', '$city', '$location', '$experience', '$languages', 'pending')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success text-center mt-4'>Registration successful! Awaiting admin approval.</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-4'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Advocate Registration</h2>
    <form method="post" class="mx-auto mt-4" style="max-width: 600px;">
        <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
        <div class="mb-3"><label>Mobile</label><input type="text" name="mobile" class="form-control" required></div>
        <div class="mb-3"><label>Address</label><input type="text" name="address" class="form-control" required></div>
        <div class="mb-3"><label>City</label><input type="text" name="city" class="form-control" required></div>
        <div class="mb-3"><label>Location</label><input type="text" name="location" class="form-control" required></div>
        <div class="mb-3"><label>Years of Experience</label><input type="text" name="experience" class="form-control" required></div>
        <div class="mb-3"><label>Languages Known</label><input type="text" name="languages" class="form-control" required></div>

        <div class="text-center">
            <button type="submit" name="register" class="btn btn-success">Register</button>
            <a href="login.php" class="btn btn-outline-dark ms-2">Already Registered? Login</a>
        </div>
    </form>
</div>

<?php include('../includes/footer.php'); ?>
