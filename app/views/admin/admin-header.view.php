<?php

use \Model\Auth;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile - <?= APP_NAME ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">



  <link href="<?= ROOT ?>/zenblog/assets/css/styles6.css" rel="stylesheet">
  <link href="<?= ROOT ?>/niceadmin/assets/img/favicon.png" rel="icon">
  <link href="<?= ROOT ?>/niceadmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />


  <!-- Vendor CSS Files -->
  <link href="<?= ROOT ?>/niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= ROOT ?>/niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


  <!-- Template Main CSS File -->





</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">



    <nav class="sidebar">
      <div class="sidebar-inner">
        <div class="sidebar-burger">
          <nav class="sidebar-menu">



            <?php if (!Auth::logged_in()) : ?>
              <button type="button">
                <i class="fa-solid fa-circle-check"></i>
                <span><a href="<?= ROOT ?>/login" style="text-decoration: none; color: aliceblue">log In</a></span>
              </button>

              <button type="button">
                <i class="fa-solid fa-user-group"></i>
                <span><a href="<?= ROOT ?>/signup" style="text-decoration: none; color: aliceblue">Sign Up</a></span>
              </button>

            <?php else : ?>
              <button type="button">

                <img src="<?= get_image($row->image) ?> " alt="Profile" style="width:60px;max-width:60px;height:60px;object-fit: cover ; margin-left: -18px"" class=" rounded-circle ">
                <span>
                  <a href=" <?= ROOT ?>/admin/profile" style="text-decoration: none; color: aliceblue"><?= Auth::getFirstname() ?></a>


                </span>
              </button>
              <button type="button">
                <i class="fa-solid fa-user-group"></i>
                <span><a href="<?= ROOT ?>/logout" style="text-decoration: none; color: aliceblue">log out</a></span>
              </button>
            <?php endif; ?>
            <button type="button">
              <i class="fa-solid fa-eye"></i>
              <span><a href="<?= ROOT ?>" style="text-decoration: none; color: aliceblue">home</a></span>
            </button>
            <button type="button">
              <i class="fa-solid fa-book"></i>
              <span><a href="..\Search\search.html" style="text-decoration: none; color: aliceblue">search</a></span>
            </button>

            <button type="button">
              <i class="fa-solid fa-file"></i>
              <span><a href="..\submit\submit.php" style="text-decoration: none; color: aliceblue">Submission</a></span>
            </button>
            <button type="button" class="has-border">
              <i class="fa-solid fa-gear"></i>
              <span>Settings</span>
            </button>
            <button type="button">
              <i class="fa-solid fa-lock"></i>
              <span>Security</span>
            </button>
          </nav>
        </div>
      </div>
    </nav>
    <script src="https://kit.fontawesome.com/f90539f5e9.js" crossorigin="anonymous"></script>

  </header><!-- End Header -->



  <main id="main" class="main">