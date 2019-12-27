<?php
include "includes/header.php";
?>


<body>

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
                
                    if(isset($_POST['submit']))
                    {
                        $search=$_POST['search'];

                        $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                        $search_query=mysqli_query($connection,$query);
                        if(!$search_query)
                        {
                            die("query failed".mysqli_error());
                        }
                        $count=mysqli_num_rows($search_query);
                        if($search=="")
                        {
                            echo "<h1>Please Enter search key</h1>";
                        }
                        else if($count==0)
                        {
                            echo "<h1>NO result</h1>";
                        }
                        else
                        {
                            $pages=array();
                            $res=array();
                                while($row=mysqli_fetch_assoc($search_query))
                                {
                                    $post_id=$row['post_id'];
                                    array_push($res,$post_id);
                                    $post_title=$row['post_title'];
                                    $post_author=$row['post_author'];
                                    $post_date=$row['post_date'];
                                    $post_image=$row['post_image'];
                                    $post_content=$row['post_content'];
                         $pages[$post_id]=array($post_title,$post_author,$post_date,$post_image,$post_content);
                                    
                                } 
            
                            //readfromjson
                            
                            // Read JSON file
                            $json = file_get_contents('ranks.json');

                            //Decode JSON
                            $ranks = json_decode($json,true);

                            $n=sizeof($ranks);

                            //echo $n;

                            for ($i=0; $i <$n ; $i++) 
                            { 
                                # code...
                                
                                $ranks[$i]=(int)$ranks[$i];
                                //echo $ranks[$i]."\n";
                                
                                if (!in_array($ranks[$i], $res))
                                  {
                                    continue;
                                  }
                                
                                if($i==0)
                                {
                                    ?>
                                    <h1 class="page-header">
                                Pageranked Search Results
                                <small>key=<?php    echo $search ?></small>
                                </h1>
                                <?php
                                }
                                
                                //html display
                                ?>
                                
                                

                                <!-- First Blog Post -->
                                <h2>
                                    <a href="post.php?p_id=<?php    echo $post_id; ?>" ><?php    echo $pages[$ranks[$i]][0] ?> </a>
                                </h2>
                                <p class="lead">
                                    by <a href="index.php"><?php    echo $pages[$ranks[$i]][1] ?></a>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span> <?php    echo $pages[$ranks[$i]][2] ?></p>
                                <hr>
                                <img class="img-responsive" src="images/<?php    echo $pages[$ranks[$i]][3] ?>" alt="">
                                <hr>
                                <p><?php    echo $pages[$ranks[$i]][4] ?>.</p>
                                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                                <hr>



                                <?php 
             
                                
                                
                                
                                
                            }
                            
                            
                
                            ?>
                            <!--                     Pager -->
                            <ul class="pager">
                                <li class="previous">
                                    <a href="#">&larr; Older</a>
                                </li>
                                <li class="next">
                                    <a href="#">Newer &rarr;</a>
                                </li>
                            </ul>
                            <?php
                        
                        }
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