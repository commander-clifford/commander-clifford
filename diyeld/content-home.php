    <div class="top4">




        <nav>
                <?php 
                //Get top 4 rated trails
                $query = "SELECT AVG(rating) as rating, trail_id
                        FROM ratings
                        GROUP BY trail_id
                        ORDER BY rating DESC
                        LIMIT 4 ";
                $result = $db->query($query);
                if($result->num_rows >= 1):?>
            <ul class="clearfix">
                 <?php while ($row = $result->fetch_assoc() ):?>
         
                    <?php 
                    //Get info about 1 trail 
                    $trail_id = $row['trail_id'];
                    $query_trail = "SELECT trails.*, pictures.picture_link
                            FROM trails, pictures
                            WHERE trails.trail_id = $trail_id
                            AND pictures.trail_id = $trail_id ";  
                    $result_trail = $db->query($query_trail);
                    while( $row_trail = $result_trail->fetch_assoc() ):
                    ?>
                <li><a href="#"><?php echo $row_trail['trail_sname']; ?>
                    <img width="125" height="125" src="<?php echo $row_trail['picture_link']; ?>" /></a>
                </li>
                    <?php endwhile; ?>  
                <?php endwhile; ?>
            </ul>
                
                <?php endif; ?>

        </nav>






        <section class="rate quarter">
            RATING AREA
        </section>
        <main class="half">
            <h2><?php echo $row_trail['trail_name']; ?>TRAIL NAME</h2>
            <p><?php echo $row_trail['trail_title']; ?>TRAIL TITLE</p>
            <p>TRAIL DESCRIPTION Ennui YOLO kale chips, vinyl occupy chillwave craft beer art party Vice Pinterest Echo Park iPhone food truck fingerstache. Yr dreamcatcher butcher small batch trust fund sriracha shabby chic banjo, viral Portland Marfa deep v Echo Park synth asymmetrical. Forage ethnic pickled vegan ethical flexitarian. Viral mumblecore jean shorts stumptown tousled raw denim. Cray keffiyeh brunch seitan lo-fi banjo, beard retro tumblr Godard. Photo booth american apparel 90's, ethnic forage seitan Neutra cray pug fap. Selfies bicycle rights tousled, polaroid iPhone Schlitz viral.</p> 
        </main>
        <section class="quarter">
            RECENT POSTS
        </section>




    </div>
