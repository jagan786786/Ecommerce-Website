<div class="container contact_container">
  <div class="row">
    <div class="col">

      <!-- Breadcrumbs -->

      <div class="breadcrumbs d-flex flex-row align-items-center">
        <ul>
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>login</a></li>
        </ul>
      </div>

    </div>
  </div>

  <!-- Contact Us -->

  <div class="row">
    <div class="col-lg-12 get_in_touch_col">
      <div class="get_in_touch_contents">
        <h1>Login !</h1>
        <!-- <p>Fill out the form below to register with us !</p> -->
        <form method="post" action="<?= base_url() ?>User/loginUser">

          <div class="form-group">
            <input type="email" class="form_input input_name input_ph form-control" id="email" required="required"
              placeholder="Email ID*" name="email">
            <div>
              <?php echo form_error('email'); ?>
            </div>
            <div class="form-group">
              <input type="password" required="required" class="form_input input_name input_ph form-control" id="pwd"
                placeholder="Password*" name="password">
              <div>
                <?php echo form_error('password'); ?>
              </div>
              <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
              <a href="<?php echo base_url(); ?>User/register" class="btn btn-info"> Don't have an account ? Register</a>
            </div>
            <div class="forgot float-right">
              <a href="<?php echo base_url(); ?>User/changePassword" id="forgot-link">Forgot Password?</a>
            </div>
        </form>
      </div>
    </div>

  </div>
</div>