<?php

use \Model\Auth;
use \Model\User;





?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
</head>

<body>
    <style>
        html {
            font-family: "Euclid Circular A", "Poppins";
        }

        body {
            margin-left: 100px;
            margin-top: 60px;
        }

        .card1-image {
            display: flex;
            padding: 1px;

            background-color: #FFFFFF;
            border-radius: 20px;
        }

        .d {
            padding: 20px;
            text-align: center;
        }

        button {
            background: transparent;
            border: 0;
            padding: 0;
            cursor: pointer;
        }

        button :hover {
            background-color: #5856D6;
            opacity: 80%;
            transform: scale(0.98);

        }

        .sidebar:hover {
            width: 260px;
        }

        .sidebar {
            position: fixed;
            z-index: 9999;
            overflow: hidden;
            top: 0;
            left: 0;
            width: 72px;
            height: 100%;
            background: #5856D6;
            transition: width 0.4s;
            border-top-left-radius: 9px;
            border-bottom-left-radius: 9px;
        }

        .open .sidebar {
            width: 260px;

        }










        /*.sidebar-logo {
  height: 20px;
}*/

        .sidebar-menu {
            display: grid;
        }

        .sidebar-menu>button {
            display: flex;
            gap: 25px;
            align-items: center;
            height: 60px;
            font-family: "Poppins";
            font-size: 16px;
            font-weight: 200;
            letter-spacing: 2px;
            line-height: 1;
            padding: 0 25px;
        }

        .sidebar-menu>button.has-border {

            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            margin-top: 30rem;

        }


        .sidebar-menu>button>i {
            width: 24px;
            height: 24px;
            color: aliceblue;
        }

        .sidebar-menu>button>span {
            color: #f9f9f9;
        }

        nav {
            padding-top: 10px;
        }

        .navbar {
            margin-left: 80px;
        }

        .searchBox {
            display: flex;
            height: 50px;
            width: 600px;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            background: #FFFFFF;
            border: solid 1px;
            border-radius: 50px;

            position: relative;
        }

        .searchButton {
            color: white;
            position: absolute;
            right: 8px;
            width: 70px;
            height: 40px;
            border-radius: 20px;
            background: #5856D6;
            border: 0;
            display: inline-block;
            transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);

        }

        .searchButton i {
            transform: scale(1.5);
        }

        /*hover effect*/
        .searchButton button:hover {

            opacity: 50%;
            box-shadow: rgba(0, 0, 0, 0.5) 0 10px 20px;
            transform: translateY(-3px);
        }

        /*button pressing effect*/
        .searchButton button:active {
            box-shadow: none;
            transform: translateY(0);
        }

        .searchInput {

            height: 30px;
            border: none;
            background: none;
            outline: none;
            color: #000;
            font-size: 15px;
            padding: 24px 46px 24px 26px;
        }

        .keywords {

            margin-left: 100px;
            width: 1090px;
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-bottom: 20px;
            border-bottom: solid 1px;
            border-color: #f2f2f2;

        }

        .keywordsbtn {

            color: white;
            width: 130px;
            height: 40px;
            border-radius: 20px;
            background: #5856D6;




        }

        .keywordsbtn:hover {

            transform: translateY(-10px);
            box-shadow: 0px 20px 20px rgba(0, 0, 0, 0.1),
                -4px -4px 12px rgba(0, 0, 0, 0.08);

        }

        .card {
            margin-left: 90px;
            width: 900px;
            background: white;
            padding: .4em;
            padding-top: 20px;
            border-radius: 6px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .card-image {
            background-color: rgb(236, 236, 236);
            width: 100%;
            height: 130px;
            border-radius: 20px;
            /* a7ki m3a rayen*/
            box-shadow: 15px 15px 30px #bebebe,
                -15px -15px 30px #ffffff;
        }

        .card-image:hover {
            transform: scale(0.98);
            cursor: pointer;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        }




        .heading {
            font-weight: 600;
            color: rgb(88, 87, 87);
            padding: 7px;
        }

        .heading:hover {
            cursor: pointer;
        }

        .author {
            color: gray;
            font-weight: 400;
            font-size: 11px;
            padding-top: 20px;
        }

        .name {
            font-weight: 600;
        }

        .name:hover {
            cursor: pointer;
        }
    </style>
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
                            <?php if (isset($data['image']) && !empty($data['image']->image)) : ?>
                                <img src="<?= get_image($data['image']->image) ?>" alt="Profile" style="width:60px;max-width:60px;height:60px;object-fit: cover; border-radius:50%; margin-left:-18px;" class="rounded-circle">
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
    <?php //$this->view('includes/nav')
    ?>
    <div class="container-fluid p-4 shadow mx-auto" style="max-width: 1000px;">
        <div class="midcontent">
            <nav class="navbar">
                <h2>Browse Courses</h2>
                <div class="searchBox">
                    <form method="GET" action="">
                        <input class="searchInput" type="text" name="find" placeholder="Search ..." value="<?= isset($_GET['find']) ? $_GET['find'] : ''; ?>" aria-label="Search" aria-describedby="basic-addon1" />
                        <button class="searchButton" style="margin-top: 3%" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </nav>
            <h5 style="
          margin-left: 90px;
          margin-top: 30px;
          padding-top: 20px;
          border-top: solid 1px;
          border-color: #f2f2f2;
        ">
                Personalized Recommendations
            </h5>
            <div class="keywords">
                <button class="keywordsbtn" href="#">Explore Marketing</button>
                <button class="keywordsbtn" href="#">Explore Marketing</button>
                <button class="keywordsbtn" href="#">Explore Marketing</button>
                <button class="keywordsbtn" href="#">Explore Marketing</button>
                <button class="keywordsbtn" href="#">Explore Marketing</button>
                <button class="keywordsbtn" href="#">Explore Marketing</button>
                <button class="keywordsbtn" href="#">Explore Marketing</button>
                <button class="keywordsbtn" href="#">Explore Marketing</button>
            </div>
        </div>
        <h5 style="
        margin-left: 90px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: solid 1px;
        border-color: #f2f2f2;
      ">
            searches result
        </h5>



        <div class="card-group justify-content-center">
            <div class="card">
                <?php if ($data['courses']) : ?>
                    <?php foreach ($data['courses'] as $course) : ?>
                        <div>
                            <div class="card-image"></div>
                            <div class="heading">
                                <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i> <?= $course->class ?></button>
                                <div class="author">
                                    By <span class="name"><span> test test</span> date :</span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h4>No courses were found at this time</h4>
                <?php endif; ?>

            </div>
        </div>

    </div>
    </div>
    <script src="<?= ROOT ?>/assets/bootstrap.min.js"></script>
</body>

</html>