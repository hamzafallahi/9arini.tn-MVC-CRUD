<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> sign up - <?= APP_NAME ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">




  <!-- Vendor CSS Files -->
  <link href="<?= ROOT ?>/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/niceadmin/assets/css/style1.css" rel="stylesheet">

  <style>
    input[type="text"],
    input,
    #country {

      background-color: #fff;
      /* White background for better contrast */
      border: 1px solid #ccc;
      /* Light gray border */
      border-radius: 4px;
      /* Rounded corners */

      font-size: 16px;
      /* Adjust font size as needed */
      color: #333;
      /* Dark text color for better readability */

      /* Make it a block-level element for better layout */
      width: 100%;
      /* Make it fill the available width */

      box-sizing: border-box;
      /* Ensure padding and border don't affect width */
    }

    /* Hover effect for the input element */
    #country:hover,
    input:hover {
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

      color: #333;
      /* Dark text color for readability */
      cursor: pointer;
      /* Indicate clickable behavior */
      display: inline-block;
      /* Allow text wrapping */

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

<body class="col-12">


  <div class="container">






    <?php
    require_once "half.php"
    ?>
    <div class="form-container">
      <div class="title"><strong>9arini academy</strong></div>
      <div class="forms " style="height: 200% important!;">
        <strong>Sign up</strong>





        <form method="post" class=" needs-validation" novalidate>

          <div>
            <label for="yourName">First Name</label>
            <input value="<?= set_value('firstname') ?>" type="text" name="firstname" class="form-control <?= !empty($errors['firstname']) ? 'border-danger' : ''; ?>" style="display: block" id="yourName" placeholder="Enter your name..." required>
            <div class="invalid-feedback">Please, enter your first name!</div>

            <?php if (!empty($errors['firstname'])) : ?>
              <small class="text-danger"><?= $errors['firstname'] ?></small>
            <?php endif; ?>

          </div>
          <div>
            <label for="yourName2">Last Name</label>
            <input value="<?= set_value('lastname') ?>" type="text" name="lastname" class="form-control <?= !empty($errors['lastname']) ? 'border-danger' : ''; ?>" id="yourName2" placeholder="Enter your pname..." required>

            <div class="invalid-feedback">Please, enter your last name!</div>

            <?php if (!empty($errors['lastname'])) : ?>
              <small class="text-danger"><?= $errors['lastname'] ?></small>
            <?php endif; ?>

          </div>
          <!--<div>
            <div>
              <label for="phone">Phone</label>
              <input type="tel" value="<?= set_value('phone') ?>" name="phone" class="form-control <?= !empty($errors['phone']) ? 'border-danger' : ''; ?>" id="yourName" required placeholder="Enter your number...">
              <div class="invalid-feedback">Please, enter your phone!</div>
            </div>
            <div>
              <label for="country">country</label>
              <select name="Country" id="Country">
                <option value="Tunis">Tunis</option>
                <option value="Sfax">Sfax</option>
                <option value="Sousse">Sousse</option>
                <option value="Kairouan">Kairouan</option>
                <option value="Bizerte">Bizerte</option>
                <option value="Gabès">Gabès</option>
                <option value="Ariana">Ariana</option>
                <option value="Kasserine">Kasserine</option>
                <option value="Gafsa">Gafsa</option>
                <option value="Monastir">Monastir</option>
                <option value="Ben Arous">Ben Arous</option>
                <option value="Nabeul">Nabeul</option>
                <option value="Tataouine">Tataouine</option>
                <option value="Médenine">Médenine</option>
                <option value="Mahdia">Mahdia</option>
                <option value="Kef">Kef</option>
                <option value="Tozeur">Tozeur</option>
                <option value="Siliana">Siliana</option>
                <option value="Kebili">Kebili</option>
                <option value="Jendouba">Jendouba</option>
                <option value="Zaghouan">Zaghouan</option>
                <option value="Beja">Beja</option>
                <option value="Kébili">Kébili</option>
                <option value="Medenin">Medenin</option>
                <option value="Manouba">Manouba</option>
              </select>
            </div>
          </div>-->

          <div class="col-12">
            <label for="yourEmail">Your Email</label>
            <input value="<?= set_value('email') ?>" type="email" name="email" class="form-control <?= !empty($errors['email']) ? 'border-danger' : ''; ?>" id="yourEmail" required>
            <div class="invalid-feedback">Please enter a valid Email adddress!</div>

            <?php if (!empty($errors['email'])) : ?>
              <small class="text-danger"><?= $errors['email'] ?></small>
            <?php endif; ?>

          </div>

          <div class="col-12">
            <label for="yourPassword">Password</label>
            <input value="<?= set_value('password') ?>" type="password" name="password" class="form-control <?= !empty($errors['password']) ? 'border-danger' : ''; ?>" id="yourPassword" required>
            <div class="invalid-feedback">Please enter your password!</div>
          </div>
          <div class="col-12">
            <label for="yourPassword">Retype Password</label>
            <input value="<?= set_value('retype_password') ?>" type="password" name="retype_password" class="form-control" id="yourPassword" required>
            <div class="invalid-feedback">Please retype your password!</div>

            <?php if (!empty($errors['password'])) : ?>
              <small class="text-danger"><?= $errors['password'] ?></small>
            <?php endif; ?>

          </div>
          <div class="col-12">
            <label for="role">Role</label><br>
            <input type="radio" name="role" value="2" <?php echo set_radio('role', '2', true); ?>> Instructor<br>
            <input type="radio" name="role" value="1" <?php echo set_radio('role', '1'); ?>> User<br>
          </div>


          <div class="col-12">
            <div class="form-check">
              <input <?= set_value('terms') ? 'checked' : ''; ?> class="form-check-input" name="terms" type="checkbox" value="1" id="acceptTerms" required>
              <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
              <div class="invalid-feedback">You must agree before submitting.</div>

              <?php if (!empty($errors['terms'])) : ?>
                <small class="text-danger"><?= $errors['terms'] ?></small>
              <?php endif; ?>

            </div>
          </div>
          <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Create Account</button>
          </div>
          <div class="col-12">
            <p class="small mb-0">Already have an account? <a href="<?= ROOT ?>/login">Log in</a></p>
          </div>
        </form>







      </div>
    </div>
  </div>

  </div><!-- End #main -->



  <!-- Vendor JS Files -->

  <script src="<?= ROOT ?>/niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?= ROOT ?>/niceadmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= ROOT ?>/niceadmin/assets/js/main.js"></script>

</body>

</html>