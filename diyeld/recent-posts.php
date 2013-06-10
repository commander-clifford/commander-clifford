 <div class="wrapper clearfix">

    
    <?php 
        //Get 5 recent posts
        $query_5posts = "SELECT posts.*, trails.trail_id, trails.trail_sname, pictures.picture_link
                FROM posts, trails, pictures
                WHERE posts.trail_id = trails.trail_id
                AND trails.trail_id = pictures.trail_id
                ORDER BY date DESC
                LIMIT 5 ";
        $result_5posts = $db->query($query_5posts);
        if($result_5posts->num_rows >= 1):?>

              
              <?php while ($row_5posts = $result_5posts->fetch_assoc() ): ?>

                   
            <figure>
                <img src="<?php echo $row_5posts['picture_link'] ?>" alt="pic" />
                <h5><?php echo $row_5posts['trail_sname'] ?></h5>
                <p><?php echo $row_5posts['title'] ?></p>
            </figure>

                <?php endwhile; //??? ?>
           
        <?php endif;//5 recent posts ?>

            

        </div>






