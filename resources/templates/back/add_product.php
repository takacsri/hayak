<?php add_product(); ?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Adaugă produs nou
</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Nume produs</label>
        <input type="text" name="product_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="product-title">Descriere produs/ valoare nutrițională</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Preț</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
    </div>

    <div class="form-group">
           <label for="short_desc">Descriere scurtă</label>
      <textarea name="short_desc" id="" cols="30" rows="5" class="form-control"></textarea>
    </div>




    
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publică">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Categorie</label>
        <select name="cat_id" id="" class="form-control">
           <option value="">Alege categoria</option>
           <?php show_categories_add_product_page(); ?>
           
        </select>


</div>





    <!-- Product quantity-->


    <div class="form-group">
      <label for="product-title">Greutate (în g)</label>
         <input type="number" name="product_weight" class="form-control">
    </div>


<!-- Product Tags 


    <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div> -->

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Imagine produs</label>
        <input type="file" name="file">
      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                

