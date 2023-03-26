<?php add_user(); ?>

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add User
</h1>

 <div clas="col-md-6 user_image-box">
    <span id="user_admin" clas='fa fa-user fa-4x'></span>
 </div>
</div>
               


<form action="" method="post" enctype="multipart/form-data">


<div class="col-md-8">

    <div class="form-group">
          <label for="username">Username </label>
          <input type="text" name="username" class="form-control">   
    </div>

    <div class="form-group">
           <label for="email">Email</label>
           <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
           <label for="password">Password</label>
           <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" name="add_user" class="btn btn-primary btn-lg" value="Add">
    </div>

    
    

</div><!--Main Content-->


    
</form>



                

