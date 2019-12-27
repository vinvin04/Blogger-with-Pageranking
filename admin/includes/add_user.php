<?php
    if(isset($_POST['add_user']))
    {
        
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        $user_firstname = $_POST['firstname'];
        $user_lastname = $_POST['lastname'];
        $user_email = $_POST['email'];
        $user_role = $_POST['role'];
        
        
        //move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query="INSERT INTO users(user_username,user_password,user_firstname,user_lastname,user_email,user_role)";
        $query .="VALUES ('{$user_username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";
        
        $create_user_query=mysqli_query($connection,$query);
        
        confirmQuery($create_user_query);
    }

?>
  
   <form action="" method="post" enctype="multipart/form-data">
    <div class="from-group">
       <label for="username">username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="from-group">
       <label for="password">password</label>
        <input type="password" class="form-control" name="password">
    </div>
    
    <div class="from-group">
       <label for="firstname">firstname</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    
    <div class="from-group">
       <label for="lastname">lastname</label>
        <input type="text" class="form-control" name="lastname">
    </div>
    
    <div class="from-group">
       <label for="email">email</label>
        <input type="email" class="form-control" name="email">
    </div>
    
     <div class="from-group">
        <select class="from-group" name="role">
           
           <option value="subscriber">Select option</option>
           <option value="admin">Admin</option>
           <option value="subscriber">Subsriber</option>
        </select>
    </div>
    
<!--
    <div class="from-group">
       <label for="image">user Image</label>
        <input type="file" class="image" name="image">
    </div>
-->

    <div class="from-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="add user">
    </div>
    
</form>