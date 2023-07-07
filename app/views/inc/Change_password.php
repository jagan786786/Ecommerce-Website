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
<div class="row">
    <div class="col-lg-12 get_in_touch_col">
        <div class="get_in_touch_contents">
        <?php if ($this->session->flashdata('success_msg')) { ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success_msg'); ?>
                </div>
            <?php } ?>
            <h1>Change Password</h1>
            <form method="post" action="<?= base_url() ?>User/updatePassword">

                <div class="form-group">
                    <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                    <?php echo form_error('current_password'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="new_password" placeholder="New Password">
                    <?php echo form_error('new_password'); ?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                    <?php echo form_error('confirm_password'); ?>
                </div>
                
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>
</div>
