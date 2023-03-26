<?php

$upload_directory = "uploads";

//helper fuctions

function last_id(){
    global $connection;

    return mysqli_insert_id($connection);

}

function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;

    if(!$result){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

//************************************** FRONT END functions */

//get products

function get_products(){

    $query = query("SELECT * FROM product");
    confirm($query);

    while($row = fetch_array($query)) {

        $product_image = display_image($row['product_image']);
        
        $product = <<<DELIMETER

        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail product">
            <a class="product-image" href="item.php?id={$row['product_id']}"><img src="../resources/{$product_image}" alt="{$row['product_title']}"></a>
            <div class="caption">
                <p class="price"><span>{$row['product_price']} RON</span></p>
                <h4 class="title"><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p class="description">{$row['product_short_description']}</p>
                <a class="btn btn-primary" href="../resources/cart.php?add={$row['product_id']}">Adaugă</a>
            </div> 
        </div>
        </div>

DELIMETER;

        echo $product;
    }
}


function get_number_of_rows($type){

    $number=0;

    $query = query("SELECT * FROM $type");
    confirm($query);

    while($row = fetch_array($query)) {
     
      $number+=1;
    }

    echo $number;
}


function get_product_quantity_of_an_order($id){

    $number=0;

    $query = query("SELECT product_quantity FROM order_items where order_id=$id");
    confirm($query);

    while($row = fetch_array($query)) {
     
      $number+=$row['product_quantity'];
    }

    echo $number;
}



function get_products_in_cat_page(){

    $query = query("SELECT * FROM product WHERE cat_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while($row = fetch_array($query)) {

        $product_image = display_image($row['product_image']);
        
        $product = <<<DELIMETER

        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail product">
            <a class="product-image" href="item.php?id={$row['product_id']}"><img src="../resources/{$product_image}" alt="{$row['product_title']}"></a>
            <div class="caption">
                <p class="price"><span>{$row['product_price']} RON</span></p>
                <h4 class="title"><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h4>
                <p class="description">{$row['product_short_description']}</p>
                <a class="btn btn-primary" href="../resources/cart.php?add={$row['product_id']}">Adaugă</a>
            </div> 
        </div>
        </div>

DELIMETER;

        echo $product;
    }
}


function get_categories(){
    $query = query("SELECT * FROM categories");
    confirm($query);
                   
        while($row = fetch_array($query)){
            $category_links = <<<DELIMETER
                        <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMETER;

echo $category_links;
                        
                    }
                    
                    
}

function login_user(){
    if(isset($_POST['submit'])){

        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
        confirm($query);

        if(mysqli_num_rows($query) == 0){
            set_message("Your Password or Username are wrong");
            redirect("login.php");
        }
        else {
            $_SESSION['username'] = $username;
            redirect("admin");
        }

    }
}

function send_message(){
    if(isset($_POST['submit'])){

        $to           =  "rita.takacs@yahoo.ro";
        $form_name    =  $_POST['name'];
        $form_email   =  $_POST['email'];
        $form_subject =  $_POST['subject'];
        $form_message =  $_POST['message'];

        $headers = "From: {$form_name} {$form_email }";

        $result = mail($to, $form_subject, $form_message, $headers);
        
        if(!$result){
            set_message("Scuze, momentan nu se trimit mesajele");
            redirect("contact.php");
        }
        else {
            set_message("Your message has been sent");
            redirect("contact.php");
        }
    }
}


//***************** BACK END functions ***********/

function display_orders(){
    $query = query("SELECT * FROM orders");
    confirm($query);

    while($row = fetch_array($query)){

        $customer_name = show_customer_name($row['customer_id']); 
        $date =   date('d.m.Y - h:m', strtotime($row['order_date'])) ;

        $orders = <<<DELIMETER

        <tr>
          <td>#{$row['order_id']} $customer_name</td>
          <td>$date</td>
          <td>{$row['order_status']}</td>
          <td>{$row['order_amount']} RON</td>
          <td><a class="btn" href="index.php?order_details&id={$row['order_id']}">Vezi detalii</a></td>
        </tr>

DELIMETER;
       echo $orders;
    }
}

function display_order_products($order_id){

            $query = query("SELECT product.product_title, product.product_price, order_items.product_quantity 
            FROM order_items 
            INNER JOIN product ON order_items.product_id=product.product_id
            WHERE order_id = $order_id");
            confirm($query);
        
            while($row = fetch_array($query)){

                $sub = $row['product_price']*$row['product_quantity'];

               
                $product = <<<DELIMETER
        
                  <tr>
                     <td>{$row['product_title']}
                     <br>
                     </td>
                     <td>{$row['product_price']} RON</td>
                     <td>{$row['product_quantity']}</td>
                     <td>{$sub} RON</td>                     
                  </tr>

                
        DELIMETER;
            
            echo $product;
        
            }      
}



function show_customer_name($customer_id){
    $customer_query=query("SELECT * FROM customers WHERE customer_id = '{$customer_id}'");
    confirm($customer_query);

    while($customer_row = fetch_array($customer_query)){
        return $customer_row['customer_name'];
    }
}

function show_customer_email($customer_id){
    $customer_query=query("SELECT * FROM customers WHERE customer_id = '{$customer_id}'");
    confirm($customer_query);

    while($customer_row = fetch_array($customer_query)){
        return $customer_row['customer_email'];
    }
}

/*** ADMIN PRODUCTS ***/

function display_image($picture){

  global $upload_directory;

  return $upload_directory . DS . $picture;
}


function get_products_in_admin(){

    $query = query("SELECT * FROM product");
    confirm($query);

    while($row = fetch_array($query)) {
        
        $category = show_product_category_title($row['cat_id']);        
        
        $product_image = display_image($row['product_image']);
        
        $product = <<<DELIMETER

        <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}<br>
              <a href="index.php?edit_product&id={$row['product_id']}" ><img width="100" src="../../resources/{$product_image}" alt=""></a>
            </td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_weight']}</td>
            <td><a class="btn btn-success" href="index.php?edit_product&id={$row['product_id']}"><span class="glyphicon glyphicon-edit"></span></a></td>
            <td><a class="btn btn-danger delete-product" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

DELIMETER;

        echo $product;
    }

}

function show_product_category_title($cat_id){
    $category_query=query("SELECT * FROM categories WHERE cat_id = '{$cat_id}'");
    confirm($category_query);

    while($category_row = fetch_array($category_query)){
        return $category_row['cat_title'];
    }
}


/******* ADD products in admin */

function add_product(){
    if(isset($_POST['publish'])){
        $product_title = escape_string($_POST['product_title']);
        $cat_id = escape_string($_POST['cat_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_weight = escape_string($_POST['product_weight']);
        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);

        $file_destination = UPLOAD_DIRECTORY . DS . $product_image;
        move_uploaded_file($image_temp_location, $file_destination);
    

        $query = query("INSERT INTO product(product_title, cat_id, product_price, product_description, product_short_description, product_weight, product_image) 
          VALUES ('{$product_title}', '{$cat_id}', '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_weight}', '{$product_image}')");
        $last_id = last_id();
        confirm($query);
        set_message("Ai adaugat cu succes produsul cu id {$last_id}");
        redirect("index.php?products");
    }
}


function show_categories_add_product_page(){
    $query = query("SELECT * FROM categories");
    confirm($query);
                   
        while($row = fetch_array($query)){
            $category_options = <<<DELIMETER
            <option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMETER;

echo $category_options;
                        
                    }
                    
                    
}

/* EDIT PRODUCT*/

function update_product(){
    if(isset($_POST['update'])){
        $product_title = escape_string($_POST['product_title']);
        $cat_id = escape_string($_POST['cat_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_weight = escape_string($_POST['product_weight']);
        $product_image = escape_string($_FILES['file']['name']);
        $image_temp_location = escape_string($_FILES['file']['tmp_name']);
        
        if(empty($pruduct_image)){
            $get_pic = query("SELECT product_image FROM product WHERE product_id = ". escape_string($_GET['id']) . "");
            confirm($get_pic);

           while($pic = fetch_array($get_pic)){
            $product_image = $pic['product_image'];
           }
        
        }


        move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS . $product_image);

        $query = "UPDATE product SET ";
        $query .= "product_title = '{$product_title}'             , ";
        $query .= "cat_id = '{$cat_id}'                           , ";
        $query .= "product_price = '{$product_price}'             , ";
        $query .= "product_description = '{$product_description}' , ";
        $query .= "product_short_description = '{$short_desc}'    , ";
        $query .= "product_weight = '{$product_weight}'       , ";
        $query .= "product_image = '{$product_image}'               ";
        $query .= "WHERE product_id=" . escape_string($_GET['id']);
       
        $send_update_query = query($query);
        
        confirm($send_update_query);
        set_message("Product has been updated");
        redirect("index.php?products");
    }
}


// categories in admin

function show_categories_in_admin(){

    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        $category = <<<DELIMETER

        <tr>
           <td>{$cat_id}</td> 
           <td>{$cat_title}</td> 
           <td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$cat_id}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

DELIMETER;

       echo $category;
    }
}


function add_category(){
    if(isset($_POST['add_category'])){
        $cat_title = escape_string($_POST['cat_title']);

        if(empty($cat_title) || $cat_title == " "){
            echo "<p class='bg-danger'>This cannnot be empty </p>";
        }

        else{ 

        $query = query("INSERT INTO categories (cat_title) VALUES ('{$cat_title}')");
        confirm($query);
       
        set_message("The category was added");
        }
    }
}



