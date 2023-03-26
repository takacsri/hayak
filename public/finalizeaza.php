<?php require_once("../resources/config.php"); ?>

<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>


<!-- Page Content -->
<div class="container">


<!-- /.row --> 

<div class="row">
      <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
      <h1>Finalizează comanda</h1>
      <hr>

<div class="col-md-8">

<form name="finalizare" id="finalizare" method="post">
                        <?php process_transaction(); ?>
                        
                        <div class="form-group">
                            <label for="customer_name">Nume si prenume: </label>
                            <input type="text" name="customer_name" class="form-control" id="customer_name" required >
                        </div>
                        <div class="form-group">
                            <label for="customer_email">Adresa de email:</label>
                            <input type="email" name="customer_email" class="form-control" id="customer_email" required>
                        </div>
                        <div class="form-group">
                            <label for="customer_phone">Telefon: </label>
                            <input type="text" name="customer_phone" class="form-control" id="customer_phone" required >
                        </div>
                        <div class="form-group">
                            <label for="customer_location">Localitate: </label>
                            <input type="text" name="customer_location" class="form-control" id="customer_location" required >
                        </div>
                        <div class="form-group">
                            <label for="customer_adress">Strada si numarul: </label>
                            <input type="text" name="customer_adress" class="form-control" id="customer_adress" required >
                        </div>
                        <div class="form-group">
                            <label for="order_observations">Note comanda (Optional)</label>
                            <textarea name="order_observations" class="form-control" id="order_observations" rows="3"></textarea>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Confirm că am citit și sunt de acord cu politica de confidențialitate.</label>
                        </div>

                        <button name="submit" type="submit" class="btn btn-xl">Plasează comanda</button>
 </form>

</div>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Comanda ta</h2>

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

 </div>

</div><!-- CART TOTALS-->


 </div><!--Main Content-->

 <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>