<?php  
//run on datetime data to make look pretty
function convert_date($dateR){
$engMon=array('January','February','March','April','May','June','July','August','September','October','November','December',' ');
$l_months='January:February:March:April:May:June:July:August:September:October:November:December';
$dateFormat='F j, Y';
$months=explode (':', $l_months);
$months[]='&nbsp;';
$dfval=strtotime($dateR);
$dateR=date($dateFormat,$dfval);
$dateR=str_replace($engMon,$months,$dateR);
return $dateR;
}

//show the number of comments on any posts with good grammar
function comments_number($number){
	if($number == 1){
		echo '1 Comment';
	}elseif($number == 0){
		echo 'No Comments';
	}else{
		echo "$number Comments";
	}
}

/**
 * Sanitizer for DB inputs
 *@param $input mixed - pass and 'dirty' form field
 *@param $link mysqli database connection 
 */
function clean_input($input, $link){
		return mysqli_real_escape_string($link, strip_tags(trim($input)));
}


/**
*Return the number of posts for any user.
*
*@param $link resource - mysqli connect link
*@param $user_id int - provide any user id
*@param $status int - OPTIONAL. What kind of posts are we counting?
*							1 => only count public posts.DEFAULT
*							2 => only count private posts
*							3 => count all posts
*@return int - total number of posts
*@todo hey, don't forget to hydrate
*/
function count_posts( $link, $user_id, $status = 1 ){
	$query = "SELECT COUNT(*) AS total
				FROM posts
				WHERE user_id = $user_id";
	//depending on the status argument, refine the query to get the right kind of posts
	if( 1 == $status):
		$query .= ' AND is_public = 1';
	elseif( 2 == $status ):
		$query .= ' AND is_public = 0';
	endif;

	//runit
	$result = $link->query($query);
	$row = $result->fetch_assoc();
	return $row['total'];
}

/**
*Count the number of total comments for any user's posts
*
*@param $link resource - mysqli connect link
*@param $user_id int - provide any user id
*@param $status int - OPTIONAL. What kind of posts are we counting?
*							1 => only count approved comments.DEFAULT
*							2 => only count unapproved comments
*							3 => count all comments by this user
*@return int - number of posts
*@todo hey, don't forget to hydrate
*/
function count_user_comments( $link, $user_id, $status = 1 ){
	$query = "SELECT COUNT(*) AS total
				FROM comments
				LEFT JOIN posts
				ON posts.post_id = comments.post_id
				WHERE posts.user_id = $user_id";
	if (1 == $status ):
	 	$query .= ' AND comments.is_approved = 1 ';
	elseif( 2 == $status ):
		$query .= ' AND comments.is_approved = 0';
	endif;

	$result = $link->query($query);
	$row = $result->fetch_assoc();

	return $row['total'];
}

/**
*Convert boolean to "is_public" or "is_private"
*@param $status bool - Pass the value of is_public from the database
*/
function isit_public($status){
	if( $status == 1 ):
		return '<span class="published">Public</span>';
	else:
		return '<span class="draft">Private</span>';
	endif;
}


/**
*Show an Avatar for any user, in any pre-defined size
*@param $user_id int - pass any users id
*@param $image_size string - pass one of the predefined image sizes. default = thumb image
*@param $db resource - pass the mysqli connection link 
*/
function show_avatar($user_id,$db,$image_size = 'thumb_img'){ 
	//look up the users avatar from the DB
	$query ="SELECT $image_size AS size FROM users
				WHERE user_id = $user_id
				LIMIT 1 ";
	$result = $db->query($query);
	//make sure a result was found
	if( $result->num_rows == 1 ):
		$row = $result->fetch_assoc();
		//if this user does not have an avatar, show the default
		if($row['size'] == ''):
			return '<img src="images/default-user.png" alt="User Pic" />';
		else:
			return '<img src="'.$row['size'].'" alt"User Pic" />';
		endif;
	endif;

}



?>