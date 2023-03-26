<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1><?php echo show_product_category_title($_GET['id']); ?></h1>
        </header>

        <hr>


        <!-- Page Features -->
        <!-- Categories -->
        <?php include(TEMPLATE_FRONT . DS . "side_nav.php"); ?>

            <div class="col-md-9">

            <div class="row text-centered">

                  <?php get_products_in_cat_page(); ?>

            </div>



        </div>
        <!-- /.row -->

       
    </div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>