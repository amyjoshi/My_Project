<?php
    $images_arr = array();
    foreach($_FILES['images']['name'] as $key=>$val){
        //upload and store images
        $target_dir = "photo/";
        $target_file = $target_dir.$_FILES['images']['name'][$key];
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}else {
		$temp = explode(".", $_FILES['images']['name'][$key]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		for ($i = 0; $i < count($_FILES['images']['name'][$key]); $i++) {
			move_uploaded_file($_FILES['images']['tmp_name'][$key],$target_dir.$newfilename);
			$images_arr[] = $target_dir.$newfilename;
		}
        }
    }
	if(!empty($images_arr)){ 
		foreach($images_arr as $image_src){ ?>
	 		<div class="img">
			<ul>
				<li >
					<img src="<?php echo $image_src; ?>" alt="">
				</li>
			</ul>
			</div>
<?php 		}
	}
?>
<html>
<head>
<style type="text/css">
.img img{
	position: relative;
	width: 250px;
	height: 200px;
	border: 2px;
}
.btn btn{
	align:center;
	width: 250px;
	height: 200px;
}
</style>
</head>
<body>
<form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">
<input type="hidden" name="image_form_submit" value="1"/>
<label>Choose another Image</label>
<input type="file" name="images[]" id="images" multiple >
<div class="uploading none">
	<label>&nbsp;</label>
	<input type="submit" value="Upload Image" name="submit">
</div>
<div id="images_preview"></div>
</form>
</body>
</html>
