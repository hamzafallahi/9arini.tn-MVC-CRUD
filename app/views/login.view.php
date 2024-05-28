<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?= ROOT ?>/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/niceadmin/assets/css/style1.css" rel="stylesheet">


  <title>Log In <?= APP_NAME ?></title>
  <style>
    .container {
      height: 50%;



      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      height: 100vh;
      width: 50%;

    }



    .form {
      display: flex;
      justify-content: center;
      align-items: center;


    }

    .password {
      width: 85%;
    }

    .pass {
      width: 100%;
    }

    button {
      margin: 0 30%;
    }

    p {
      text-align: center;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      background-color: #fff;
      /* White background for better contrast */
      border: 1px solid #ccc;
      /* Light gray border */
      border-radius: 4px;
      /* Rounded corners */
      padding: 8px 12px;
      /* Add some padding for readability */
      font-size: 16px;
      /* Adjust font size as needed */
      color: #333;
      /* Dark text color for better readability */
      display: block;
      /* Make it a block-level element for better layout */
      width: 100%;
      /* Make it fill the available width */
      margin-bottom: 10px;
      /* Add some margin for spacing */
      box-sizing: border-box;
      /* Ensure padding and border don't affect width */
    }

    /* Hover effect for the input element */
    input[type="text"]:hover,
    input[type="email"]:hover,
    input[type="password"]:hover {
      border-color: #5856D6;
      /* Change border color to brand color on hover */
      outline: none;
      /* Remove default outline on hover */
    }

    button {
      background-color: #fff;
      /* White background for contrast */
      border: 1px solid #ccc;
      /* Light gray border */
      border-radius: 4px;
      /* Rounded corners */
      padding: 8px 16px;
      /* Add some padding for readability */
      font-size: 16px;
      /* Adjust font size as needed */
      color: #333;
      /* Dark text color for readability */
      cursor: pointer;
      /* Indicate clickable behavior */
      display: inline-block;
      /* Allow text wrapping */
      margin-bottom: 10px;
      /* Add some margin for spacing */
      box-sizing: border-box;
      /* Ensure padding and border don't affect width */
    }

    /* Hover effect for the button */
    button:hover {
      background-color: #5856D6;
      /* Change background color to brand color on hover */
      color: #fff;
      /* Change text color to white for better contrast on hover */
      border-color: #5856D6;
      /* Change border color to brand color on hover (optional) */
    }
  </style>

</head>

<body>
  <div class="container">

    <?php
    require_once "half.php"
    ?>

    <div class="form-container">
      <div class="title"><strong>9arini academy</strong></div>
      <div class="forms">
        <strong>Log in</strong>
        <?php if (message()) : ?>
          <div class="alert alert-danger text-center"><?= message('', true) ?></div>
        <?php endif; ?>

        <?php if (!empty($errors['email'])) : ?>
          <div class="alert alert-danger text-center"><?= $errors['email'] ?></div>
        <?php endif; ?>
        <form method="post" class="row g-3 needs-validation" novalidate>
          <div>
            <div class="email">
              <label for="e-mail">E-mail</label>
              <input value="<?= set_value('email') ?>" type="email" id="yourUsername" name="email" placeholder="Enter your email address" required1>
            </div>
          </div>
          <div>
            <div class="password">
              <label for="password">password</label>
              <input value="<?= set_value('password') ?>" type="password" name="password" id="yourPassword" placeholder="Enter your Password" class="pass" required1>
            </div>

          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
          </div>

      </div>
      <button type="submit">Login</button>
      <p>Don't have an account? <strong class="log"><a href="<?= ROOT ?>/signup">Sign up</a></strong></p>

      </form>

    </div>
  </div> <!-- This is the corrected closing div tag -->
  <!-- Vendor JS Files -->
 
  <script src="<?= ROOT ?>/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?= ROOT ?>/niceadmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= ROOT ?>/niceadmin/assets/js/main.js"></script>
</body>

</html>