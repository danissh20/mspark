<?php
if(!isset($_POST['submit'])) {
  echo "Unauthorized Access";
}
elseif($_POST['blog-content']==NULL){
	echo "Empty Blog Ali...";
}
else{
	session_start();
 	include '../connections/db_connect.php' ;
	include 'src/class.upload.php' ;
	
	$content = $_POST['blog-content'];
	$title = $_POST['blog-title'];
	
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
			
		$sql = "INSERT INTO `onlinestore`.`posts` (`title`, `body`, `image`) 
		VALUES ('$title', '$content', '$handle->file_dst_name')";
			
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
?>