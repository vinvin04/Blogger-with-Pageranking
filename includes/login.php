

<?php

    $db['db_host']="localhost";
    $db['db_user']="root";
    $db['db_pass']="";
    $db['db_name']="cms";


    foreach($db as $key => $value){
        define(strtoupper($key),$value);
    }

    $connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    
    session_start();

    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        
    
        //avoid sql injection
        $username=mysqli_real_escape_string($connection,$username);
        $password=mysqli_real_escape_string($connection,$password);
        
        $query="SELECT * FROM users WHERE user_username = '{$username}' ";
        $query_userlogin=mysqli_query($connection,$query);
        if(!$query_userlogin)
        {
            die("QUERY ".mysqli_error($connection));
        }
        
        while($row=mysqli_fetch_array($query_userlogin))
        {
            $db_username=$row['user_username'];
            $db_password=$row['user_password'];
        }
        if($username !== $db_username && $password !== $db_password )
        {
            //echo $password." ".$db_password;
            header("Location: ../index.php?login_status='Invalid credentials' ");
        }
        else if($username == $db_username && $password == $db_password)
        {
            $_SESSION[username]=$db_username;
            header("Location: ../admin/index.php");
        }
        else
        {
            header("Location: ../index.php");
        }
    }
?>