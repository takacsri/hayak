<?php 

if(isset($_GET['id'])){
    $query = query("SELECT * FROM orders WHERE order_id = " . escape_string($_GET['id']) . "");
    confirm($query);
  
    while($row = fetch_array($query)){
          
          $order_date = escape_string($row['order_date']);
          $customer_id = escape_string($row['customer_id']);
          $order_amount = escape_string($row['order_amount']);
          $order_status = escape_string($row['order_status']);
          $order_observations = escape_string($row['order_observations']);
    }

    $get_customer = query("SELECT * FROM customers WHERE customer_id = $customer_id");
    confirm($get_customer);
    
    while($row = fetch_array($get_customer)){
          
        $customer_name = escape_string($row['customer_name']);
        $customer_email = escape_string($row['customer_email']);
        $customer_phone = escape_string($row['customer_phone']);
        $customer_location = escape_string($row['customer_location']);
        $customer_adress = escape_string($row['customer_adress']);
  }
  
  
  }



?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Detalii comandă
</h1>
</div>

<div class="col-md-4">
    <h3>Comanda #<?php echo $_GET['id']; ?></h3>
    <hr>
    <?php echo "<p>Data: $order_date</p>
                <p>Total produse: 3 </p>
                <p>Pret total: $order_amount</p>"; ?>
        
</div>
<div class="col-md-4">
    <h3>Detalii client</h3>
    <hr>
    <?php echo "<p><strong> $customer_name </strong></p>
                <p>$customer_location</p>
                <p>$customer_adress</p>
                <p><a href='mailto:$customer_email'> $customer_email </a> </p>
                <p> $customer_phone</p>"; ?>
</div>
<div class="col-md-4">
    <h3>Status</h3>
    <hr>
    <select name="order_status" id="" class="form-control">
           <option value="<?php $order_status ?>"><?php echo $order_status; ?></option>
           <option value="În procesare">În procesare</option>
           <option value="Finalizată">Finalizată</option>
    </select>
</div>

<div class="col-md-12">
    <h3>Produse</h3>
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
            <?php  display_order_products($_GET['id']); ?>
        </tbody>
     </table>
</div>


               





                

