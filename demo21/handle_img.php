<?php
    $max_photo_size = 60000;
    $upload_required = true;
    
    $upload_page = 'index.php';
    $upload_dir = 'fileup/';
    
    $err_msg = false;
    do {
        if(!isset($_FILES['book_image'])) {
            $err_msg = '表单数据没有发送完整';
            break;
        } else {
            $book_image = $_FILES['book_image'];
        }
        switch($book_image['error']){
            case UPLOAD_ERR_INI_SIZE:
                $err_msg = '图片文件过大';
                break 2;
            case UPLOAD_ERR_PARTIAL:
                $err_msg = '上传文件时发生错误';
            case UPLOAD_ERR_NO_FILE:
                if($upload_required) {
                    $err_msg = '你没有选择上传文件,请点击<a href="'. $upload_page .'">上传</a>';
                    break 2;
                }
                break 2;
            case UPLOAD_ERR_FORM_SIZE:
                $err_msg = '文件大小超过MAX_FILE_SIZE设置,请点击<a href="'. $upload_page .'">上传</a>';
                break 2;
            case UPLOAD_ERR_OK:
                if($book_image['size']>$max_photo_size) {
                    $err_msg = '文件大小超过max_photo_size,请点击<a href="'. $upload_page .'">上传</a>';
                }
                break 2;
            default:
                $err_msg = '未知错误,请点击<a href="'. $upload_page .'">上传</a>';
        }
        if(!in_array($book_image['type'],array('image/jpeg','image/pjpeg','image/png'))) {
            $err_msg = '你需要上传一个JPG或PNG图片，请点击<a href="'. $upload_page .'">上传</a>';
            break;
        }
    } while(0);
    
    if(!$err_msg) {
        if(!@move_uploaded_file($book_image['tmp_name'], $upload_dir . $book_image['name'])){
            $err_msg = '移动文件出错';
        }
    }
?>
<html>
<head><title>Upload handler</title></head>
<body>
<?php 
    if($err_msg) {
        echo $err_msg;
    } else {
?>
<img src='<?php echo $upload_dir . $book_image['name']; ?> ' />
<?php 
    }
?>
</body>
</html>