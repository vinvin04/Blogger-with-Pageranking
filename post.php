<?php
include "includes/header.php";
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
                
                <?php
                if(isset($_GET['p_id']))
                {
                    $post_id=$_GET['p_id'];
                }

                    echo $post_id;
                    $query="SELECT * FROM posts WHERE post_id='{$post_id}'";
                    $select_all_posts=mysqli_query($connection,$query);
                    
                    while($row=mysqli_fetch_assoc($select_all_posts)){
                        
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                        
                        ?>
                        
                        
                        
                        
                        <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php    echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php    echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php    echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php    echo $post_image ?>" alt="">
                <hr>
                <p><?php    echo $post_content ?>.</p>
                <a class="btn btn-primary" href="">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
                
                            
                            
                
                <?php    } ?>
                
<?php
    if(isset($_POST['create_comment']))
    {
        $post_id=$_GET['p_id'];
        $comment_author=$_POST['comment_author'];
        $comment_email=$_POST['comment_email'];
        $comment_content=$_POST['comment_content'];

$query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
        $query .= "VALUES ($post_id,'{$comment_author}','{$comment_email}','{$comment_content}', 'unapproved' , now() ) ";

        $create_comment_query=mysqli_query($connection,$query);
        if(!$create_comment_query)
        {
            die("query error".mysqli_error($connection)); 
        }
        
//        $query="SELECT * FROM posts WHERE post_id= $post_id ";
//        $get_comment_count=mysqli_query($connection,$query);
//        if(!$get_comment_count)
//        {
//            die("query error".mysqli_error($connection)); 
//        }
//        while($row=mysqli_fetch_assoc($get_comment_count))
//        {
//            $post_comment_count=$row['post_comment_count'];
//        }
//        $post_comment_count=$post_comment_count+1;
        
        $query="UPDATE posts SET post_comment_count= post_comment_count + 1 WHERE post_id= $post_id ";
        $update_comment_count=mysqli_query($connection,$query);
        if(!$update_comment_count)
        {
            die("query error".mysqli_error($connection)); 
        }
        
    }
?>
                
                
            <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                       <div class="form-group">
                           <label for="author">Author</label>
                            <input class="form-control" type="text" name="comment_author">
                        </div>
        
                        <div class="form-group">
                           <label for="email">Email</label>
                            <input class="form-control" type="email" name="comment_email">
                        </div>

                       
                        <div class="form-group">
                           <label for="your comment ">your comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

               <?php
            $query="SELECT * FROM comments WHERE comment_post_id= $post_id ";
                $query .="AND comment_status = 'approved' ";
                $query .="ORDER BY comment_id DESC ";
            $select_comments=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_comments))
            {
            $comment_author=$row['comment_author'];
            $comment_content=$row['comment_content'];
            $comment_status=$row['comment_status'];
            $comment_date=$row['comment_date'];
            ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                
                
                <?php
            }
                ?>
             
        
            
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