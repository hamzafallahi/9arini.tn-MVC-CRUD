<?php

use \Model\Auth;
use \Model\User;

//$categories = get_categories();



?>

<!-- ======= Header ======= -->

<header>
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
              <?php if (isset($row) && !empty($row->image)) : ?>
                <img src="<?= get_image($row->image) ?>" alt="Profile" style="width:60px;max-width:60px;height:60px;object-fit: cover;margin-left: -18px;" class="rounded-circle">
              <?php else : ?>
                <!-- Show default profile image if $row or $row->image is not set -->
                <img src="<?= get_image('assets/images/no_image.jpg') ?>" alt="Profile" style="width:60px;max-width:60px;height:60px;object-fit: cover;margin-left: -18px;" class="rounded-circle">
              <?php endif; ?>
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