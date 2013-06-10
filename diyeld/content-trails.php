<main class="full trails">

<?php 
//Get all trails info
$query_alltrails = "SELECT trails.*, pictures.trail_id, pictures.picture_link
                    FROM trails, pictures
                    WHERE trails.trail_id = pictures.trail_id
                    ORDER BY date DESC ";
$result_alltrails = $db->query($query_alltrails);
if($result_alltrails->num_rows >= 1): ?>

    <?php while ($row_alltrails = $result_alltrails->fetch_assoc() ): ?>

        <figure>
            <img src="<?php echo $row_alltrails['picture_link'] ?>" alt="pic">
            
            <h3><?php echo $row_alltrails['trail_name'] ?></h3>
            <p><?php echo $row_alltrails['trail_title'] ?></p>
            <p><?php echo $row_alltrails['trail_description'] ?></p>

        </figure>

    <?php endwhile; ?>
<?php endif ?>
</main>
        
