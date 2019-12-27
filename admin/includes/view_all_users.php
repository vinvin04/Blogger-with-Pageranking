 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                              
<?php
$query="SELECT * FROM users";
    $select_users=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_users)){
    $user_id=$row['user_id'];
    $user_username=$row['user_username'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
     $user_email=$row['user_email'];
    $user_role=$row['user_role'];
        //$comment_date=$row['comment_date'];
    
        
    echo "<tr>";
    echo "<td>{$user_id}</td>";
    echo "<td>{$user_username}</td>";
    echo "<td> $user_firstname</td>";
    echo "<td>{$user_lastname}</td>";
              
    echo "<td>{$user_email}</td>";
        //echo "<td>{$comment_post_id}</td>";
//        $query="SELECT * FROM posts WHERE post_id = $comment_post_id ";
//        $select_post_id_query=mysqli_query($connection,$query);
//        if(!$select_post_id_query)
//        {
//            die("q f ".mysqli_error($connection));
//        }
//        while($row = mysqli_fetch_assoc($select_post_id_query))
//        {
//            $post_id=$row['post_id'];
//             $post_title=$row['post_title'];
//            echo "<td><a href='../post.php?p_id=$post_id'> $post_title ff</a></td>";
//        }
        
        
        
    echo "<td>$user_role</td>";
//     echo "<td><a href='comments.php?approve={$comment_id}'>approve</a></td>"; 
//    echo "<td><a href='comments.php?disapprove={$comment_id}'>disapprove</a></td>";
//    //echo "<td><a href='posts.php?source=edit_post&p_id={$comment_id}'>edit</a></td>";  
//    echo "<td><a href='comments.php?delete={$comment_id}'>delete</a></td>"; 
    echo "</tr>";       
    }
?>
                            </tbody>
                        </table>
                        
<?php
    if(isset($_GET['delete']))
    {
        $the_comment_id=$_GET['delete'];
        $query="DELETE FROM comments WHERE comment_id={$the_comment_id}";
        $delete_query=mysqli_query($connection,$query);
        header("Location:comments.php");
    }

    if(isset($_GET['approve']))
    {
        $the_comment_id=$_GET['approve'];
        $query="UPDATE comments SET comment_status='approved' WHERE comment_id={$the_comment_id}";
        $approve_query=mysqli_query($connection,$query);
        header("Location:comments.php");
    }

    if(isset($_GET['disapprove']))
    {
        $the_comment_id=$_GET['disapprove'];
        $query="UPDATE comments SET comment_status='disapproved' WHERE comment_id={$the_comment_id}";
        $disapprove_query=mysqli_query($connection,$query);
        header("Location:comments.php");
    }
?>