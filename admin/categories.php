<?php
include "includes/admin_header.php";
?>

<body>

    <div id="wrapper">

        
        
        <!-- Navigation -->
       
        <?php
        include "includes/admin_navigation.php";
        ?>
        
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to admin
                            <small>author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                           
                           <?php insert_categories(); ?>
                           
                           
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="add_category">
                                </div>
                        
                            </form>
                            
                            <?php
                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                include "includes/update_category.php";
                            }
                            
                            ?>
                            
                        </div>                        

                            
                            

                        
                        <div class="col-xs-6">
                        

                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                   
                                <?php findAllCategories(); ?>
                                    
                                   
                                <?php deleteCategories(); ?>
                                   
                                   
                                </tr>
                            </tbody>
                        </table>
                        </div>
                        

                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
        
<?php 
        include "includes/admin_footer.php";
        ?>