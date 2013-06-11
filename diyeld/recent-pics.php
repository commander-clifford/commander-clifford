 <div class="wrapper clearfix">

    
    <?php 
        //Get 5 recent posts
        $query_5pics = "SELECT pictures.*, trails.trail_id, trails.trail_sname
                FROM pictures, trails
                WHERE pictures.trail_id = trails.trail_id
                ORDER BY date DESC
                LIMIT 5 ";
        $result_5pics = $db->query($query_5pics);
        if($result_5pics->num_rows >= 1):?>

              
              <?php while ($row_5pics = $result_5pics->fetch_assoc() ): ?>

                   
            <figure>
                <a href="#"><img src="<?php echo $row_5pics['picture_link'] ?>" alt="pic"></a>
                <p><?php echo $row_5pics['name'] ?></p>
                <p><?php echo $row_5pics['description'] ?></p>
            </figure>

                <?php endwhile; //??? ?>
           
        <?php endif;//5 recent posts ?>

            

        </div>











