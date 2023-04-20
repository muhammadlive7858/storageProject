<?php
require '../../autoload.php';
$object = new AuthController($pdo);


// echo "<pre>";
// var_dump($_SESSION);
// echo"</pre>";
if($_SERVER['REQUEST_METHOD'] == 'POST' and $_POST['register']){
    $data = [];
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['role'] = $_POST['role'];
    $data['password'] = $_POST['password'];

    $result = $object->register($data);
    if($result == true){
        header("Location:/profile.php");
    }
}

?>


<?php
require "../../includes/head.php";
?>
<main id="main" class="main" style="min-height:100vh;">
    
<div class="container">

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="index.html" class="logo d-flex align-items-center w-auto">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
            </div>

            <form class="row g-3 needs-validation" novalidate action="" method="POST">
              <input type="hidden" name="register" value="true">
              <div class="col-12">
                <label for="yourName" class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" id="yourName" required>
                <div class="invalid-feedback">Please, enter your name!</div>
              </div>

              <div class="col-12">
                <label for="yourEmail" class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control" id="yourEmail" required>
                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
              </div>

              <div class="col-12">
                <label for="yourRole" class="form-label">Role</label>
                <select name="role" id="" class="form-control" id="yourRole">
                    <option value="director">Director</option>
                    <option value="admin">Admin</option>
                </select>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword" required>
                <div class="invalid-feedback">Please enter your password!</div>
              </div>

              
              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Create Account</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="pages-login.html">Log in</a></p>
              </div>
            </form>

          </div>
        </div>

        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>

      </div>
    </div>
  </div>

</section>

</div>

</main>

<?php
require "../../includes/footer.php";
?>

