<?php $this->view('admin/admin-header', $data) ?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet" />
<div class="container">


  <div class="card" style="width: 200px; border:0px">
    <div class="card-body profile-card pt-0  align-items-center">

      <img src="<?= get_image($row->image) ?> " alt="Profile" style="width:150px;max-width:150px;height:150px;object-fit: cover;" class="rounded-circle">
      <div class="social-links mt-2" style="margin-left: 30px;">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>

  </div>



  <div class="zouz">
    <div class="info">
      <h2><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></h2>
      <p><i class="fa-solid fa-graduation-cap"></i> <?= esc($row->role_name) ?></p>
    </div>
    <div class="card1">
      <div class="card1-image">
        <div class="d">
          <p>5</p>
          <p>mathematics</p>
        </div>
        <div class="d">
          <p>2</p>
          <p>science</p>
        </div>
        <div class="d">
          <p>20</p>
          <p>course</p>
        </div>
      </div>
    </div>
  </div>

</div>
<?php if (!empty($row)) : ?>



  <section class="section profile">
    <div class="row">


      <div class="tab-pane fade show active profile-overview card2" style="width:35%; height:55%;   " id="profile-overview">
        <span onload="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active card2-image" data-bs-toggle="tab" data-bs-target="#profile-overview" id="profile-overview-tab">
          <p>9arini academy</p>
        </span>



        <div class="row" style="padding:5%;">
          <div class="col-lg-3 col-md-4 label  " style="font-size: 25px;">Full Name</div>
          <div class=" col-lg-9 col-md-8 card2-body"><?= esc($row->firstname) ?> <?= esc($row->lastname) ?></div>
        </div>





        <div class="row" style="padding:5%;">
          <div class="col-lg-3 col-md-4 label " style="font-size: 25px;">Country</div>
          <div class=" col-lg-9 col-md-8 card2-body"><?= esc($row->country) ?></div>
        </div>



        <div class="row" style="padding:5%;">
          <div class="col-lg-3 col-md-4 label " style="font-size: 25px;">Phone</div>
          <div class=" col-lg-9 col-md-8 card2-body"><?= esc($row->phone) ?></div>
        </div>

        <div class="row" style="padding:5%;">
          <div class="col-lg-3 col-md-4 label " style="font-size: 25px;">Email</div>
          <div class="col-lg-9 col-md-8 card2-body"><?= esc($row->email) ?></div>
        </div>
        <button type="button" class=" keywordsbtn" style="width: 130px;" data-bs-toggle="modal" data-bs-target="#profileModal">
          Update
        </button>
      </div>

      <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" style="width:fit-content; height:fit-content;">
            <!-- style="width: 600px; justify-content:center; "-->
            <ul class="nav nav-tabs nav-tabs-bordered">



              <li class="nav-item">
                <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" id="profile-edit-tab">Edit Profile</button>
              </li>



              <li class="nav-item">
                <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" id="profile-change-password-tab">Change Password</button>
              </li>
              <li style="margin-left: 50%;">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left:0%"></button>
              </li>


            </ul>


            <div class="modal-body">
              <div class="col-xl-8 " style="width: 600px; ">

                <div class="card9">
                  <div class="card9-body pt-3">
                    <!-- Bordered Tabs -->

                    <div class="tab-content pt-2">

                      <div class="tab-pane fade show active profile-overview" class="tab-pane fade show profile-edit pt-3" id="profile-edit" id="profile-overview">
                        <!-- Profile Edit Form -->
                        <form method="post" enctype="multipart/form-data">

                          <div class="row mb-3">
                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                            <div class="col-md-8 col-lg-9">

                              <div class="d-flex">
                                <img class="js-image-preview" src="<?= ROOT ?>/<?= $row->image ?>" alt="Profile" style="width:200px;max-width:200px;height:200px;object-fit: cover;">
                                <div class="js-filename m-2">Selected File: None</div>
                              </div>
                              <div class="pt-2">
                                <label class="btn btn-primary btn-sm" title="Upload new profile image">
                                  <i class="text-white bi bi-upload"></i>
                                  <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display: none;">
                                </label>

                                <?php if (!empty($errors['image'])) : ?>
                                  <small class="js-error-image text-danger"><?= $errors['image'] ?></small>
                                <?php endif; ?>
                                <small class="js-error-image text-danger"></small>
                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                              </div>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="firstname" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="firstname" type="text" class="form-control" id="firstname" value="<?= set_value('firstname', $row->firstname) ?>" required>
                            </div>

                            <?php if (!empty($errors['firstname'])) : ?>
                              <small class="js-error-firstname text-danger"><?= $errors['firstname'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-firstname text-danger"></small>
                          </div>

                          <div class="row mb-3">
                            <label for="lastname" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="lastname" type="text" class="form-control" id="lastname" value="<?= set_value('lastname', $row->lastname) ?>" required>
                            </div>

                            <?php if (!empty($errors['lastname'])) : ?>
                              <small class="js-error-lastname text-danger"><?= $errors['lastname'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-lastname text-danger"></small>
                          </div>

                          <div class="row mb-3">
                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                            <div class="col-md-8 col-lg-9">
                              <textarea name="about" class="form-control" id="about" style="height: 100px"><?= set_value('about', $row->about) ?></textarea>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="company" class="col-md-4 col-lg-3 col-form-label">university</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="university" type="text" class="form-control" id="university" value="<?= set_value('university', $row->university) ?>">
                            </div>
                          </div>

                          <!--*****-->


                          <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="country" type="text" class="form-control" id="Country" value="<?= set_value('country', $row->country) ?>">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="address" type="text" class="form-control" id="Address" value="<?= set_value('address', $row->address) ?>">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="phone" type="text" class="form-control" id="Phone" value="<?= set_value('phone', $row->phone) ?>">
                            </div>

                            <?php if (!empty($errors['phone'])) : ?>
                              <small class="js-error-phone text-danger"><?= $errors['phone'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-phone text-danger"></small>
                          </div>

                          <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="email" type="email" class="form-control" id="Email" value="<?= set_value('email', $row->email) ?>" required>
                            </div>

                            <?php if (!empty($errors['email'])) : ?>
                              <small class="js-error-email text-danger"><?= $errors['email'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-email text-danger"></small>
                          </div>

                          <div class="row mb-3">
                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="twitter_link" type="text" class="form-control" id="Twitter" value="<?= set_value('twitter_link', $row->twitter_link) ?>">
                            </div>

                            <?php if (!empty($errors['twitter_link'])) : ?>
                              <small class="js-error-twitter_link text-danger"><?= $errors['twitter_link'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-twitter_link text-danger"></small>
                          </div>

                          <div class="row mb-3">
                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="facebook_link" type="text" class="form-control" id="Facebook" value="<?= set_value('facebook_link', $row->facebook_link) ?>">
                            </div>

                            <?php if (!empty($errors['facebook_link'])) : ?>
                              <small class="js-error-facebook_link text-danger"><?= $errors['facebook_link'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-facebook_link text-danger"></small>
                          </div>

                          <div class="row mb-3">
                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="instagram_link" type="text" class="form-control" id="Instagram" value="<?= set_value('instagram_link', $row->instagram_link) ?>">
                            </div>

                            <?php if (!empty($errors['instagram_link'])) : ?>
                              <small class="js-error-instagram_link text-danger"><?= $errors['instagram_link'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-instagram_link text-danger"></small>
                          </div>

                          <div class="row mb-3">
                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="linkedin_link" type="text" class="form-control" id="Linkedin" value="<?= set_value('linkedin_link', $row->linkedin_link) ?>">
                            </div>

                            <?php if (!empty($errors['linkedin_link'])) : ?>
                              <small class="js-error-linkedin_link text-danger"><?= $errors['linkedin_link'] ?></small>
                            <?php endif; ?>
                            <small class="js-error-linkedin_link text-danger"></small>
                          </div>

                          <div class="js-prog progress my-4 hide">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Saving.. 50%</div>
                          </div>

                          <div class="text-center">
                            <a href="<?= ROOT ?>/admin">
                              <button type="button" class="btn btn-primary  float-start">Back</button>
                            </a>
                            <button type="button" onclick="save_profile(event)" type="submit" class="btn btn-danger float-end">Save Changes</button>
                          </div>
                        </form><!-- End Profile Edit Form -->

                      </div>

                      <div>



                      </div>



                      <div class="tab-pane fade pt-3" id="profile-change-password">
                        <!-- Change Password Form -->
                        <form>

                          <div class="row mb-3">
                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="password" type="password" class="form-control" id="currentPassword">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="newpassword" type="password" class="form-control" id="newPassword">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                            <div class="col-md-8 col-lg-9">
                              <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                            </div>
                          </div>

                          <div class="text-center">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                          </div>
                        </form><!-- End Change Password Form -->

                      </div>

                    </div><!-- End Bordered Tabs -->

                  </div>
                </div>

              </div>
            </div>
  </section>

<?php else : ?>

  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    That profile was not found!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php endif; ?>
<!-- ... -->
</section>
</div>
</div>
</div>
</div>




<script>
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab") : "#profile-overview";

  function show_tab(tab_name) {
    const someTabTriggerEl = document.querySelector(tab_name + "-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);

    tab.show();

  }

  function set_tab(tab_name) {
    tab = tab_name;
    sessionStorage.setItem("tab", tab_name);
  }

  function load_image(file) {

    document.querySelector(".js-filename").innerHTML = "Selected File: " + file.name;

    var mylink = window.URL.createObjectURL(file);
    document.querySelector(".js-image-preview").src = mylink;
  }

  window.onload = function() {

    show_tab(tab);
  }

  //upload functions
  function save_profile(e) {

    var form = e.currentTarget.form;
    var inputs = form.querySelectorAll("input,textarea");
    var obj = {};
    var image_added = false;

    for (var i = 0; i < inputs.length; i++) {
      var key = inputs[i].name;

      if (key == 'image') {
        if (typeof inputs[i].files[0] == 'object') {
          obj[key] = inputs[i].files[0];
          image_added = true;
        }
      } else {
        obj[key] = inputs[i].value;
      }
    }

    //validate image
    if (image_added) {

      var allowed = ['jpg', 'jpeg', 'png'];
      if (typeof obj.image == 'object') {
        var ext = obj.image.name.split(".").pop();
      }

      if (!allowed.includes(ext.toLowerCase())) {
        alert("Only these file types are allowed in profile image: " + allowed.toString(","));
        return;
      }
    }

    send_data(obj);

  }

  function send_data(obj, progbar = 'js-prog') {

    var prog = document.querySelector("." + progbar);
    prog.children[0].style.width = "0%";
    prog.classList.remove("hide");

    var myform = new FormData();
    for (key in obj) {
      myform.append(key, obj[key]);
    }

    var ajax = new XMLHttpRequest();

    ajax.addEventListener('readystatechange', function() {

      if (ajax.readyState == 4) {

        if (ajax.status == 200) {
          //everything went well
          //alert("upload complete");
          handle_result(ajax.responseText);
        } else {
          //error
          alert("an error occurred");
        }
      }
    });

    ajax.upload.addEventListener('progress', function(e) {

      var percent = Math.round((e.loaded / e.total) * 100);
      prog.children[0].style.width = percent + "%";
      prog.children[0].innerHTML = "Saving.. " + percent + "%";

    });

    ajax.open('post', '', true);
    ajax.send(myform);

  }

  function handle_result(result) {
    var obj = JSON.parse(result);
    if (typeof obj == 'object') {
      //object was created

      if (typeof obj.errors == 'object') {
        //we have errors
        display_errors(obj.errors);
        //alert("Please correct the errors on the page");
      } else {
        //save complete
        //alert("Profile saved successfully!");
        window.location.reload();

      }
    }
  }

  function display_errors(errors) {

    for (key in errors) {

      document.querySelector(".js-error-" + key).innerHTML = errors[key];
    }
  }
</script>

<?php $this->view('admin/admin-footer', $data) ?>

<div class="main1">
  <h2>Course Insights</h2>
  <div class="all">
    <div class="card3">
      <div class="card3-image">
        <i class="fa-solid fa-clock" style="
                transform: scale(2);
                align-items: center;
                padding-left: 50%;
                padding-right: 50%;
                padding-top: 10%;
              "></i>
      </div>

      <p class="card3-body">enrolled courses</p>
      <p class="f1">3</p>
    </div>
    <div class="card3">
      <div class="card3-image">
        <i class="fa-solid fa-medal" style="
                transform: scale(2);
                align-items: center;
                padding-left: 50%;
                padding-right: 50%;
                padding-top: 10%;
              "></i>
      </div>

      <p class="card3-body">Time Spent Learning</p>
      <p class="f1">78</p>
    </div>
    <div class="card3">
      <div class="card3-image">
        <i class="fa-solid fa-chart-bar" style="
                transform: scale(2);
                align-items: center;
                padding-left: 50%;
                padding-right: 50%;
                padding-top: 10%;
              "></i>
      </div>

      <p class="card3-body">Certificates Earned</p>
      <p class="f1">7</p>
    </div>
  </div>
</div>
<div class="mta3widhni">
  <h2>Milestones</h2>
  <div class="card4">
    <div class="img"></div>
    <div>
      <h2>Dedicated Learner</h2>

      <p>Achieve a 7-day streak</p>
    </div>
  </div>
  <br />
  <div class="card4">
    <div class="img"></div>
    <div>
      <h2>Dedicated Learner</h2>

      <p>Achieve a 7-day streak</p>
    </div>
  </div>
</div>