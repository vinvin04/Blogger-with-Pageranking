<?php
    $the_post_id="";
    if(isset($_GET['p_id']))
    {
        $the_post_id=$_GET['p_id']; 
    }


    $query="SELECT * FROM posts WHERE post_id='{$the_post_id}'";
    $select_post_by_id=mysqli_query($connection,$query); 
    while($row=mysqli_fetch_assoc($select_post_by_id)){
    $post_id=$row['post_id'];
    $post_author=$row['post_author'];
    $post_title=$row['post_title'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_content=$row['post_content'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_date=$row['post_date'];
    
    if(isset($_POST['update_post']))
    {
        
        $post_author=$_POST['post_author'];
        $post_title=$_POST['post_title'];
        $post_category_id=$_POST['post_category'];
        $post_status=$_POST['post_status'];
        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];
        $post_content=$row['post_content'];
        $post_tags=$row['post_tags'];
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        if(empty($post_image))
        {
            $query="SELECT * FROM posts WHERE post_id =$the_post_id";
            $select_image=mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($select_image))
            {
                $post_image=$row['post_image'];
            }
        }
        
        $query="UPDATE posts SET "; 
        $query .="post_title ='{$post_title}', ";
        $query .="post_category_id ='{$post_category_id}', ";
        $query .="post_date =now(), ";
        $query .="post_author ='{$post_author}', ";
        $query .="post_status ='{$post_status}', ";
        $query .="post_tags ='{$post_tags}', ";
        $query .="post_content ='{$post_content}', ";
        $query .="post_image ='{$post_image}' ";
        $query .="WHERE post_id={$the_post_id} ";
        
        $update_post=mysqli_query($connection,$query);
        
        confirmQuery($update_post);
        
    }
}
?>
   <form action="" method="post" enctype="multipart/form-data">
    <div class="from-group">
       <label for="title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" class="form-control" name="post_title">
    </div>
    
    <div class="from-group">
       <label for="post_category">Post Category</label>
        <select class="form-control" name="post_category">
           
            <?php
            $query="SELECT * FROM categories";
            $select_categories=mysqli_query($connection,$query); 
            confirmQuery($select_categories);   
            while($row=mysqli_fetch_assoc($select_categories)){
            $cat_id=$row['cat_id'];
            $cat_title=$row['cat_title'];
            
            echo "<option value='$cat_id'>{$cat_title}</option>";

            }
            ?>
        </select>
    </div>
    
    <div class="from-group">
       <label for="author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="post_author">
    </div>
    
    <div class="from-group">
       <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
    </div>
    
     <div class="from-group">
       <img name="image" width="100"   src="../images/<?php echo $post_image;  ?>">
        <input type="file" class="image" name="image">
    </div>
    
<!--
    <div class="from-group">
       <label for="post_image">Post Image</label>
        <img name="image" width="100"   src="../images/<?php echo $post_image;  ?>">
    </div>
-->
    
    <div class="from-group">
       <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="from-group">
       <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        <?php echo $post_content ?>
        </textarea>
    </div>
    
    <div class="from-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="update Post">
    </div>
    
</form>