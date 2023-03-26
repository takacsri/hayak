<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<!-- Page Content -->
<div class="container">


<!-- /.row --> 

<div class="row">
      <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
      <h1>Coș</h1>
      <hr>
      <table class="table table-striped">
        <thead>
          <tr>
           <th>Produs</th>
           <th>Preț</th>
           <th>Cantitate</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
            <?php  cart(); ?>
        </tbody>
     </table>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Total coș</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Produse:</th>
<td><span class="amount">
<?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0"; ?>
</span></td>
</tr>
<tr class="shipping">
<th>Livrare:</th>
<td>Livrare gratuită</td>
</tr>

<tr class="order-total">
<th>Total comandă</th>
<td><strong><span class="amount">
    <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?> RON</span></strong> </td>
</tr>


</tbody>

</table>
<a class="btn btn-primary" href="finalizeaza.php">Finalizează comanda</a>

 </div>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

 <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>