<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<style>
    body {
        background: #eee
    }

    .ratings i {
        font-size: 16px;
        color: red
    }

    .strike-text {
        color: red;
        text-decoration: line-through
    }

    .product-image {
        width: 100%
    }

    .dot {
        height: 7px;
        width: 7px;
        margin-left: 6px;
        margin-right: 6px;
        margin-top: 3px;
        background-color: blue;
        border-radius: 50%;
        display: inline-block
    }

    .spec-1 {
        color: #938787;
        font-size: 15px
    }

    h5 {
        font-weight: 400
    }

    .para {
        font-size: 16px
    }
</style>

<body>

</body>

</html>
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <?php
            if (count($result)) {
                $cnt = 1;
                foreach ($result as $row) {
                    ?>
                    <div class="row p-2 bg-white border rounded">
                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                src="<?php echo base_url(); ?>/assets/images/<?php echo htmlentities($row->product_image) ?>" ></div>
                        <div class="col-md-6 mt-1">
                            <h5>
                                <?php echo htmlentities($row->product_name) ?>
                            </h5>
                            <div class="d-flex flex-row">
                                <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                        class="fa fa-star"></i><i class="fa fa-star"></i></div><span>310</span>
                            </div>
                            <div class="mt-1 mb-1 spec-1"><span>100% cotton</span><span class="dot"></span><span>Light
                                    weight</span><span class="dot"></span><span>Best finish<br></span></div>
                            <div class="mt-1 mb-1 spec-1"><span>Unique design</span><span class="dot"></span><span>For
                                    men</span><span class="dot"></span><span>Casual<br></span></div>
                            <p class="text-justify text-truncate para mb-0">
                                <?php echo htmlentities($row->product_summary) ?><br><br>
                            </p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">
                                    <?php echo htmlentities($row->product_marginal_price) ?>

                                </h4>
                                <span class="strike-text">
                                    <?php echo htmlentities($row->product_selling_price) ?>
                                </span>
                            </div>
                            <h6 class="text-success">
                                <?php echo htmlentities($row->product_offer) ?> %
                            </h6>
                            <h6 class="text-success">Free shipping</h6>
                            <a href='<?= base_url() ?>Product/Productdetails/<?php echo htmlentities($row->product_id) ?>'>     
                                <div class="d-flex flex-column mt-4"><button class="btn btn-primary btn-sm"
                                        type="button">Details</button>
                            </a>
                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to wishlist</button>
                        </div>
                    </div>
                </div>

                <?php $cnt++;
                } // end foreach
            } else { ?>
        <tr>
            <td colspan="7">No Record found</td>
        </tr>
        <?php
            }
            ?>
    </div>
</div>
</div>