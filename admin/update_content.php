<?php
if( isset($_POST['updateblog']) ){
	
 	include '../connections/db_connect.php' ;
	include 'src/class.upload.php' ;
	
	$content = $_POST['blog-content'];
	$title = $_POST['blog-title'];
	$idd = $_POST['idimage'][0];
	$oldimage = $_POST['idimage'][1];
	
	/*error = 4 means image is not changed*/
	/*size = 0 means image is not uploaded*/
	
	if(! ($_FILES['my_field']['error']==4 || $_FILES['my_field']['size']==0) )
	{
	/* Image Handling */
	$handle = new Upload($_FILES['my_field']);

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
        $handle->image_resize            = true;
        $handle->image_ratio_y           = true;
        $handle->image_x                 = 720;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
		$dir_dest="../uploads/blogs/";
		
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_dest.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_dest.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' -  ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
			
		$sql = "UPDATE `onlinestore`.`posts` 
		SET `title` = '$title', `image` = '$handle->file_dst_name', 
		`body` = '$content', `updated_at` = CURRENT_TIME() 
		WHERE `posts`.`id` = '$idd';";
			
			if( $db->query($sql)){
			echo "ok";
			}
						
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }

        // we delete the temporary files
        $handle-> Clean();

    } else {
        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
        echo '<p class="result">';
        echo '  <b>File not uploaded on the server</b><br />';
        echo '  Error: ' . $handle->error . '';
        echo '</p>';
    }
	
	}
	else{
		echo "No image handling";
					
		$sql = "UPDATE `onlinestore`.`posts` 
		SET `title` = '$title', `image` = '$oldimage', 
		`body` = '$content', `updated_at` = CURRENT_TIME() 
		WHERE `posts`.`id` = '$idd';";
			
		if( $db->query($sql)){
			echo "ok";
		}
		else{
			$db->error;
		}
	}
}

elseif(isset($_POST['updateproduct']) ){
	echo "Inside Product Update dude Well Played lol!";
	
	include '../connections/db_connect.php' ;
	include 'src/class.upload.php' ;
	
	$gameName = $_POST['product-title'];
	$rent = $_POST['product-rent'];
	$deposit = $_POST['product-deposit'];
	$platform = $_POST['product-platform'];
	$category = $_POST['product-cat'];
	$quantity = $_POST['product-quantity'];
	if( $details = $_POST['product-details']){
		$details="";
	}
	$idd = $_POST['idimage'][0];
	$oldimage = $_POST['idimage'][1];
	
	/*error = 4 means image is not changed*/
	/*size = 0 means image is not uploaded*/
	
	if(! ($_FILES['my_field']['error']==4 || $_FILES['my_field']['size']==0) )
	{
	/* Image Handling */
	$handle = new Upload($_FILES['my_field']);

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
        $handle->image_resize            = true;
        $handle->image_ratio_y           = true;
        $handle->image_x                 = 720;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
		$dir_dest="../uploads/products/";
		
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_dest.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_dest.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' -  ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
			
			
$sql = "UPDATE `onlinestore`.`products` 
SET `product_name` = '$gameName', `rent` = '$rent', `details` = '$details', `platform` = '$platform', `category` = '$category', `product_quantity` = '$quantity', `deposit` = '$deposit', `img_one` = '$handle->file_dst_name' WHERE `products`.`id` = '$idd'; ";			
			
			
			if( $db->query($sql)){
			echo "<p>ok updated products with new image";
			header("Location:form-allproduct.php");
			}
						
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }

        // we delete the temporary files
        $handle-> Clean();

    } else {
        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
        echo '<p class="result">';
        echo '  <b>File not uploaded on the server</b><br />';
        echo '  Error: ' . $handle->error . '';
        echo '</p>';
    }
	
	}
	else{
		echo "No image handling";
					
		$sql = "UPDATE `onlinestore`.`products` 
		SET `product_name` = '$gameName', `rent` = '$rent', `details` = '$details', `platform` = '$platform', `category` = '$category', `product_quantity` = '$quantity', `deposit` = '$deposit', `img_one` = '$oldimage' WHERE `products`.`id` = '$idd'; ";		
			
		if( $db->query($sql)){
			echo "ok";
			header("Location:form-allproduct.php");
		}
		else{
			$db->error;
		}
	}
}
else{
	echo "UnAuthorized Access!";
}
?>