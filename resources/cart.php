<?php require_once("config.php"); ?>

<?php

 if(isset($_GET['add'])){

    $query = query("SELECT * from product WHERE product_id = " . escape_string($_GET['add']). " ");
    confirm($query);

    while($row = fetch_array($query)){

            $_SESSION['product_' . $_GET['add']] +=1;
            redirect("../public/checkout.php");

    }
 }

   // $_SESSION['product_' . $_GET['add']] +=1;

   // redirect("index.php");

   if(isset($_GET['remove'])){

     $_SESSION['product_' . $_GET['remove']]--;

     if($_SESSION['product_' . $_GET['remove']] < 1){
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        
        redirect("../public/checkout.php");
     } else{
        redirect("../public/checkout.php");
     }
   }
 

 if(isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);

    redirect("../public/checkout.php");
 }


 function cart(){

        $total=0;
        $item_quantity = 0;
        $item_name = 1;
        $item_number = 1;
        $amount = 1;
        $quantity = 1;

    foreach ($_SESSION as $name => $value) {


        if($value > 0){
            
            if(substr($name, 0, 8 ) == "product_" ){
               
                // $length = strlen($name - 8);
                $length = strlen($name) - 8;

                $id = substr($name, 8, $length);

                $query = query("SELECT * FROM product WHERE product_id = ". escape_string($id) ." ");
                confirm($query);
            
                while($row = fetch_array($query)){

                    $sub = $row['product_price']*$value;
                    $item_quantity += $value;

                    $product_image = display_image($row['product_image']);
                   
                    $product = <<<DELIMETER
            
                      <tr>
                         <td>{$row['product_title']}
                         <br>
                         <img width="100" src="../resources/{$product_image}">
                         </td>
                         <td>{$row['product_price']} RON</td>
                         <td>{$value}</td>
                         <td>{$sub} RON</td>
                         <td>
                            <a class="btn btn-warning" href="../resources/cart.php?remove={$row['product_id']}"><span class="glyphicon glyphicon-minus"></span></a> 
                            <a class="btn btn-success" href="../resources/cart.php?add={$row['product_id']}"><span class="glyphicon glyphicon-plus"></span></a> 
                            <a class="btn btn-danger" href="../resources/cart.php?delete={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
                      </tr>

                      
                      <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}"> 
                      <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}"> 
                      <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                      <input type="hidden" name="quantity_{$quantity}" value="{$value}">
            DELIMETER;
                
                echo $product;

                $item_name++;
                $item_number++;
                $amount++;
                $quantity++;
            
                }

                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity;
            }

        }

    }

}

/*
function show_paypal(){

    if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >= 1){ 
    $paypal_button = <<<DELIMETER
    
    <input type="image" name="upload" 
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" 
    alt="PayPal - The safer, easier way to pay online">

DELIMETER;

return $paypal_button;
}} */

function process_transaction(){

    
 if(isset($_POST['submit'])){

    global $connection;

    $customer_name = escape_string($_POST['customer_name']);
    $customer_email = escape_string($_POST['customer_email']);
    $customer_phone = escape_string($_POST['customer_phone']);
    $customer_location = escape_string($_POST['customer_location']);
    $customer_adress = escape_string($_POST['customer_adress']);
   
   
    $order_observations = escape_string($_POST['order_observations']);


    $amount = $_SESSION['item_total'];

    $status = "în procesare";
    $total = 0;
    $item_quantity = 0;

    $add_customer = query("INSERT INTO customers (customer_name, customer_email, customer_phone, customer_location, customer_adress) VALUES 
                   ('{$customer_name}', '{$customer_email}', '{$customer_phone}', '{$customer_location}', '{$customer_adress}')");
    $last_id = last_id();
    confirm($add_customer); 

    $send_order = query("INSERT INTO orders (order_amount, customer_id, order_status, order_observations) VALUES 
                   ('{$amount}', '{$last_id}', '{$status}', '{$order_observations}')");
    $last_id2 = last_id();
    confirm($send_order); 
    

    foreach ($_SESSION as $name => $value) {

        if($value > 0){
            
            if(substr($name, 0, 8 ) == "product_" ){
               
                $length = strlen($name) - 8;
                $id = substr($name, 8, $length);

                

                $query = query("SELECT * FROM product WHERE product_id = ". escape_string($id) ." ");
                confirm($query);
            
                while($row = fetch_array($query)){

                    $sub = $row['product_price']*$value;
                   
                    $insert_order_item = query("INSERT INTO order_items (product_id, order_id, product_quantity) VALUES 
                    ('{$id}', '{$last_id2}', '{$value}')");
                
                    confirm($insert_order_item);
            
                }

                 $total += $sub;
            }

        }

    }
   session_destroy();
   redirect("thank_you.php");
}

}

?>