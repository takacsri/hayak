<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
<div class="container" style="margin-top:30px">

      


<?php

$query = query(" SELECT * FROM product WHERE product_id = " . escape_string($_GET['id']) . " ");
confirm($query);

while($row = fetch_array($query)):

?>




<div class=" col-md-9 " style="margin:auto; float:none;">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="../resources/<?php echo display_image($row['product_image']);?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h4><?php echo $row['product_title']; ?> </h4>
        <hr>
        <h4 class=""><?php echo $row['product_price'] . " RON"; ?></h4>

          
        <p><?php echo $row['product_short_description']; ?></p>

        <a class="btn btn-primary" href=" ../resources/cart.php?add=<?php echo $row['product_id']; ?>">Adaugă</a>


    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Descriere</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
           
    <p><?php echo $row['product_description']; ?></p>

    </div>
    <div role="tabpanel" class="tab-pane" id="profile">



    

 </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div> <!--col-md-9 ends here-->

<?php endwhile; ?>

</div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>