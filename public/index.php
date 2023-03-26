<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->

    <div class="carousel-holder">

                    <div >
                        <!--carousel -->
                        <?php include(TEMPLATE_FRONT . DS . "slider.php"); ?>

                    </div>

    </div>

    <div class="container">

        <div class="row text-center">
                <div class="col-sm-12"><h1 class="pb-2">Încearcă preparatele noastre!</h1></div>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="../resources/uploads\spaghette-cu-creveti-crop.jpg">
                        <div class="caption">
                        <h4 class="title">Paste</h4>
                        <a class="btn btn-primary" href="category.php?id=11">Vezi produsele</a>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="../resources/uploads/file-de-pastrav.jpg">
                        <div class="caption">
                        <h4 class="title">Bistro food</h4>
                        <a class="btn btn-primary" href="category.php?id=14">Vezi produsele</a>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="../resources/uploads/pizza-cu-ardei.jpg">
                        <div class="caption">
                        <h4 class="title">Pizza</h4>
                        <a class="btn btn-primary" href="category.php?id=15">Vezi produsele</a>
                        </div>
                    </div> 
                </div>
        </div>

    </div> 

    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
