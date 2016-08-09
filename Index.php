<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#images').on('change',function(){
        $('#multiple_upload_form').ajaxForm({
            //display the uploaded images
            target:'#images_preview',
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
            },
            error:function(e){
            }
        }).submit();
    });
});
</script>
</head>
<body>
  <form method="post" name="multiple_upload_form" id="multiple_upload_form" enctype="multipart/form-data" action="upload.php">
    <input type="hidden" name="image_form_submit" value="1"/>
    <label>Choose Image</label>
    <input type="file" name="images[]" id="images" multiple >
    <div class="uploading none">
        <label>&nbsp;</label>
        <input type="submit" value="Upload Image" name="submit">
    </div>
    <div id="images_preview"></div>
</form>
</body>
</html>