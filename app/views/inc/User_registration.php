<div class="container contact_container">
  <div class="row">
    <div class="col">

      <!-- Breadcrumbs -->

      <div class="breadcrumbs d-flex flex-row align-items-center">
        <ul>
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Register</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Contact Us -->
  <div class="row">
    <div class="col-lg-12 get_in_touch_col">
      <div class="get_in_touch_contents">
        <?php
        if ($this->session->flashdata('message')) {
          ?>
          <div class="alert alert-info text-center">
            <?php echo $this->session->flashdata('message'); ?>
          </div>
          <?php
          unset($_SESSION['message']);
        }
        ?>
        <h1>Register With Us!</h1>
        <p>Fill out the form below to register with us !</p>
        <form method="post" action="<?= base_url() ?>User/registerUser">

          <div class="form-group">
            <input type="text" class=" form_input input_name input_ph form-control" id="name" placeholder="Full Name*"
              name="name">
            <div>
              <?php echo form_error('name'); ?>
            </div>
          </div>
          <div class="form-group">
            <input type="email" class="form_input input_name input_ph form-control" id="email" placeholder="Email ID*"
              name="email">
            <div>
              <?php echo form_error('email'); ?>
            </div>
          </div>
          <div class="form-group">
            <input type="password" class="form_input input_name input_ph form-control" id="pwd" placeholder="Password*"
              name="password">
            <div>
              <?php echo form_error('password'); ?>
            </div>
          </div>
          <div class="form-group">
            <input type="password" class=" form_input input_name input_ph form-control" id="cpwd"
              placeholder="Confirm password*" name="confirm_password">
            <div>
              <?php echo form_error('confirm_password'); ?>
            </div>
          </div>
          <button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button>
          <a href="<?php echo base_url(); ?>User/login" class="btn btn-info">Have an account ? Login</a>
        </form>
      </div>
    </div>

  </div>
</div>