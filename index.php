<?php
include "includes/header.php";
//include "includes/db.php";
?>




    <!-- Navigation -->
    <?php
include "includes/navigation.php";
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <h1 class="page-header">
                    Bloggerspot
                    <small>post yr way</small>
                </h1>
                
                <?php
                    
                    $query="SELECT * FROM posts WHERE post_status='published' ";
                    $select_all_posts=mysqli_query($connection,$query);
                    
                    $num_posts=mysqli_num_rows($select_all_posts);
                    while($row=mysqli_fetch_assoc($select_all_posts)){
                        
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=substr($row['post_content'],0,100);
                        
                        ?>
                        
                        

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php    echo $post_id; ?>"><?php    echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php    echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php    echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php    echo $post_image; ?>" alt="">
                <hr>
                <p><?php    echo $post_content; ?>.</p>
                <a class="btn btn-primary" href="<?php echo 'post.php?p_id={$post_id}'?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                
                            
                            
                
                <?php    }
                
//                if($num_posts==0)
//                {
//                    echo  "<h1 class='text-center'>No posts available</h1>";
//
//                }
                ?>

            <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php
include "includes/sidebar.php";
?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
<?php
include "includes/footer.php";
?>