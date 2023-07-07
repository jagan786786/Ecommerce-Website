<style>
    .center {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .form-input {
        width: 350px;
        padding: 20px;
        background: #fff;
        box-shadow: -3px -3px 7px rgba(94, 104, 121, 0.377),
            3px 3px 7px rgba(94, 104, 121, 0.377);
    }

    .form-input img {
        width: 100%;
        display: none;
        margin-bottom: 30px;
    }

    .form-input input {
        display: none;
    }

    .form-input label {
        display: block;
        width: 45%;
        height: 45px;
        margin-left: 25%;
        line-height: 50px;
        text-align: center;
        background: #1172c2;
        color: #fff;
        font-size: 15px;
        font-family: "Open Sans", sans-serif;
        text-transform: Uppercase;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
                            </div>
                            <form method="post" action="<?= base_url() ?>Admin/update_productsadmin"
                                enctype='multipart/form-data'>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div>Product Name</div>
                                        <input type="hidden" value="<?php echo $product->product_id; ?>"
                                            name="product_id" id="product_id">
                                        <input type="text" value="<?php echo $product->product_name; ?>"
                                            class="form-control form-control-user" id="product_name" name="product_name"
                                            placeholder="Product Name">
                                        <?php echo form_error('product_name'); ?>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div>Product Brand</div>
                                        <input type="text" name="product_brand"
                                            value="<?php echo $product->product_brand; ?>"
                                            class="form-control form-control-user" id="product_brand"
                                            placeholder="Product Brand">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>Product Summary</div>
                                    <textarea class="form-control form-control-user" id="product_summary"
                                        name="product_summary"
                                        placeholder="Product Summary"> <?php echo $product->product_summary; ?></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <div>Product Cost Price</div>
                                        <input type="text" class="form-control form-control-user"
                                            id="product_cost_price" value="<?php echo $product->product_cost_price; ?>"
                                            name="product_cost_price" placeholder="Product Cost Price">
                                    </div>
                                    <div class="col-sm-2">
                                        <div>Product Selling Price</div>
                                        <input type="text" class="form-control form-control-user"
                                            id="product_selling_pricse" name="product_selling_price"
                                            value="<?php echo $product->product_selling_price; ?>"
                                            id="exampleRepeatPassword" placeholder="Product Selling Price">
                                    </div>
                                    <div class="col-sm-3">
                                        <div>Product Offer</div>
                                        <input type="text" class="form-control form-control-user" id="product_osffer"
                                            name="product_offer" value="<?php echo $product->product_offer; ?>"
                                          placeholder="Product Offer">
                                    </div>
                                    <div class="col-sm-4">
                                        <div>Product Marginal Price</div>
                                        <input id="offer" type="text" disabled class="form-control form-control-user"
                                            value="<?php echo $product->product_marginal_price; ?>"
                                            placeholder="Product Marginal Price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <div>Product Image</div>
                                        <img src="<?php echo base_url(); ?>/assets/images/<?php echo $product->product_image; ?>"
                                            id="main_product_image" width="350">
                                    </div>


                                    <!-- Image Preview  -->
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <div class="center">
                                            <div class="form-input">
                                                <label for="file-ip-1">Upload Image</label>
                                                <input type="file" name="file-ip-1" id="file-ip-1" accept="image/*"
                                                    onchange="showPreview(event);">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-4 mb-sm-0">
                                        <div id="add_to_me"></div>
                                        <div class="preview">
                                            <img id="file-ip-1-preview">
                                        </div>
                                    </div>
                                    <!-- Image Preview  -->
                                </div>
                                <button type="submit" value="submit" name="submit"
                                    class="btn btn-primary btn-user btn-block">Update Product</button>
                            </form>
                            <hr>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            document.getElementById("add_to_me").innerHTML = "";
            document.getElementById("add_to_me").innerHTML +=
                "Preview Image";
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
    $('input[name=product_selling_price], input[name=product_offer]').keyup(function () {
        var divParent = $(this).closest('div');
        var product_selling_price = $('input[name=product_selling_price]').val();
        var product_offer = $('input[name=product_offer]').val();
        if (product_selling_price >= 0 && product_offer >= 0)
            document.getElementById("offer").value = Math.ceil(product_selling_price - product_selling_price * (product_offer / 100));
    });
</script>