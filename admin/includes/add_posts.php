<?php
    if(isset($_POST['create_post']))
    {
        
        $post_title = $_POST['title'];
        $post_author=$_POST['author'];
    $post_category=$_POST['post_category'];
        $post_status=$_POST['post_status'];
        $outedge=$_POST['outedges'];
        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];
        
        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        $post_date=date('d-m-y');
        //$post_comment_count=0;
        
        move_uploaded_file($post_image_temp,"../images/$post_image");
        
        $query="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status,outedge)";
        $query .="VALUES ({$post_category},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}','{$outedge}')";
        
        //echo $query;
        
        $create_post_query=mysqli_query($connection,$query);
        
        confirmQuery($create_post_query);
    }

?>
  
   <form action="" method="post" enctype="multipart/form-data">
    <div class="from-group">
       <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
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
        <input type="text" class="form-control" name="author">
    </div>
    
    <div class="from-group">
       <label for="outedges">Outedges</label>
        <input type="text" class="form-control" name="outedges">
    </div>
    
    <div class="from-group">
       <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>
    
    <div class="from-group">
       <label for="post_image">Post Image</label>
        <input type="file" class="image" name="image">
    </div>
    
    <div class="from-group">
       <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    
    <div class="from-group">
       <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>
    
    <div class="from-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
    
</form>