 <div class="col-md-4">
     
     
     
     <!-- Blog Search Well -->
    <div class="well">
        <form method="post" action="pagerank.php">
        <h4>Pagerank Search</h4>
        <div class="input-group">
            <input type="text" class="form-control" name='search'>
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        <!-- /.input-group -->
            </form>
    </div>
     
     
     
     
     
    <!-- Blog Search Well -->
    <div class="well">
        <form method="post" action="search.php">
        <h4>Blog Search</h4>
        <div class="input-group">
            <input type="text" class="form-control" name='search'>
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        <!-- /.input-group -->
            </form>
    </div>


    <!-- login -->
    <div class="well">
        <form method="post" action="includes/login.php">
        <h4>Login</h4>
        <div class="input-group">
           <h6><?php 
               if(isset($_GET['login_status']))
               echo $_GET['login_status'] ?>
                <span class="badge badge-secondary"></span></h6>
            <input type="text" class="form-control" name='username' placeholder="username">
            
        </div>
        <div class="input-group">
            <input type="password" class="form-control" name='password' placeholder="password">
            <span class="input-group-btn">
        <button name="login" class="btn btn-primary" type="submit" value="login">login</button>
        </span>
        </div>
        
        <!-- /.input-group -->
            </form>
    </div>


    <!-- Blog Categories Well -->
    <div class="well">

        <?php

        $query="SELECT * FROM categories ";
        $select_all_categories=mysqli_query($connection,$query);


        ?>

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php
                        while($row=mysqli_fetch_assoc($select_all_categories)){
                        $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                        echo "<li><a href='category.php?cat_id=$cat_id'>{$cat_title}</a></li>";

                        }

                    ?>

                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php
    include "widgit.php";
    ?>

</div>