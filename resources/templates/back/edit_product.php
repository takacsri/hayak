<?php 

if(isset($_GET['id'])){
  $query = query("SELECT * FROM product WHERE product_id = " . escape_string($_GET['id']) . "");
  confirm($query);

  while($row = fetch_array($query)){
        
        $product_title = escape_string($row['product_title']);
        $cat_id = escape_string($row['cat_id']);
        $product_price = escape_string($row['product_price']);
        $product_description = escape_string($row['product_description']);
        $short_desc = escape_string($row['product_short_description']);
        $product_weight = escape_string($row['product_weight']);
        $product_image = escape_string($row['product_image']);

        $product_image = display_image($row['product_image']);
  }

  update_product();


}



?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Editează produsul
</h1>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Nume produs</label>
        <input type="text" name="product_title" class="form-control" value="<?php echo $product_title; ?>">
       
    </div>

    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Preț</label>
        <input type="number" name="product_price" class="form-control" size="60" value="<?php echo $product_price; ?>">
      </div>
    </div>

    <div class="form-group">
           <label for="short_desc">Descriere scurtă</label>
      <textarea name="short_desc" id="" cols="30" rows="5" class="form-control"><?php echo $short_desc; ?></textarea>
    </div>


    <div class="form-group">
           <label for="product-title">Descriere lungă/Valoare nutrițională </label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"> <?php echo $product_description; ?></textarea>
    </div>

 
    

</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

     
     <div class="form-group">
        <input type="submit" name="update" class="btn btn-primary btn-lg" value="Modifică">
    </div>


     <!-- Product Categories-->

    <div class="form-group">
         <label for="product-title">Categorie</label>
        <select name="cat_id" id="" class="form-control">
           <option value="<?php echo $cat_id; ?>"><?php echo show_product_category_title($cat_id); ?></option>
           <?php show_categories_add_product_page(); ?>
           
        </select>


</div>





    <!-- Product quantity-->


    <div class="form-group">
      <label for="product-title">Greutate (în g)</label>
         <input type="number" name="product_weight" class="form-control" value="<?php echo $product_weight; ?>">
    </div>


<!-- Product Tags 


    <div class="form-group">
          <label for="product-title">Product Keywords</label>
          <hr>
        <input type="text" name="product_tags" class="form-control">
    </div> -->

    <!-- Product Image -->
    <div class="form-group">
        <label for="product-title">Imagine</label>
        <input type="file" name="file"> <br>

        <img width="200" src="../../resources/<?php echo $product_image; ?>">

      
    </div>



</aside><!--SIDEBAR-->


    
</form>



                

