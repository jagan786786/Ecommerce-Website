<?php if ($this->session->flashdata('error')): ?>
    <div id="remove" class="alert alert-danger">
        <button  class="close" onclick="removeErrorMessage(this)">&times;</button>
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">PBB user Details </h1>
    <p class="mb-4">Product detailsl <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th colspan='3'>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th colspan='3'>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        if (count($result)) {
                            $cnt = 1;
                            foreach ($result as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo htmlentities($row->user_id) ?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row->name) ?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row->email) ?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($row->password) ?>
                                    </td>
                                    <td>
                                        <?php
                                        $check_role = htmlentities($row->role);
                                        if ($check_role == 1) { ?>
                                            <a
                                                href="<?php echo base_url(); ?>/Admin/change_user/<?php echo htmlentities($row->user_id) ?>">Admin</a>
                                        <?php } else { ?>
                                            <a
                                                href="<?php echo base_url(); ?>/Admin/change_admin/<?php echo htmlentities($row->user_id) ?>">User</a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a
                                            href="<?php echo base_url(); ?>/Admin/edit_usersadmin/<?php echo htmlentities($row->user_id) ?>"><i
                                                class="btn btn-primary fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <?php
                                        $check_availablity = htmlentities($row->user_delete);
                                        if ($check_availablity == 1) { ?>
                                            <a
                                                href="<?php echo base_url(); ?>/Admin/activate_user/<?php echo htmlentities($row->user_id) ?>"><i
                                                    class=" btn btn-warning fas fa-check"></i></a>
                                        <?php } else { ?>
                                            <a
                                                href="<?php echo base_url(); ?>/Admin/ban_user/<?php echo htmlentities($row->user_id) ?>"><i
                                                    class="btn btn-danger fa fa-ban"></i></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a
                                            href="<?php echo base_url(); ?>/Admin/delete_user/<?php echo htmlentities($row->user_id) ?>"><i
                                                class=" btn btn-danger warning fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                                $cnt++;
                            } // end foreach
                        } else { ?>
                        <tr>
                            <td colspan="7">No Product found</td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<script>
    function removeErrorMessage(button) {
        console.log(button, "I am clicked here");
        var errorDiv = button.parentNode;
        errorDiv.style.display = 'none';
    }
</script>