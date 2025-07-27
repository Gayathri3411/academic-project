<?php include('includes/header.php'); ?>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container-fluid">
  <div class="row min-vh-100">
    <!-- Sidebar Navigation -->
    <div class="col-md-3 bg-dark text-white d-flex flex-column justify-content-center align-items-center p-4">
      <h2 class="mb-4">Login As</h2>

      <button onclick="location.href='user/login.php'" class="btn btn-outline-light w-100 mb-3 d-flex align-items-center justify-content-start gap-2">
        <i class="bi bi-person-circle fs-4"></i> User
      </button>

      <button onclick="location.href='advocate/login.php'" class="btn btn-outline-light w-100 mb-3 d-flex align-items-center justify-content-start gap-2">
        <i class="bi bi-balance-scale fs-4"></i>👩‍⚖️ Advocate
      </button>

      <button onclick="location.href='admin/login.php'" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-start gap-2">
        <i class="bi bi-shield-lock fs-4"></i> Admin
      </button>
    </div>

    <!-- Right Content -->
    <div class="col-md-9 d-flex align-items-center justify-content-center bg-light">
      <div class="text-center p-4">
        <img src="assets/images/law-women.png" alt="Law Graphic" class="img-fluid mb-4" style="max-height: 250px;">
        <h1 class="display-5 fw-bold text-primary">Women Legal Advocate Finder App</h1>
        <p class="lead mt-3">Empowering women through secure legal assistance, advocate support, and issue reporting.</p>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>
