<?php

class Image
{
    public $id;
    public $filename;
}

function image_fix_orientation($filename) {
    $extension = pathinfo($filename['name'], PATHINFO_EXTENSION);
    if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($filename['tmp_name']);
        if (!empty($exif['Orientation'])) {
            if ($extension == 'jpeg' || $extension == 'jpg') {
                $image = imagecreatefromjpeg($filename['tmp_name']);
            } elseif ($extension == 'png') {
                $image = imagecreatefrompng($filename['tmp_name']);
            } elseif ($extension == 'webp') {
                $image = imagecreatefromwebp($filename['tmp_name']);
            } else {
                "Format non supporté";
            }
            switch ($exif['Orientation']) {
                case 3:
                    $image = imagerotate($image, 180, 0);
                    break;
                case 6:
                    $image = imagerotate($image, -90, 0);
                    break;
                case 8:
                    $image = imagerotate($image, 90, 0);
                    break;
            }
            if ($extension == 'jpeg' || $extension == 'jpg') {
                imagejpeg($image, $filename['tmp_name'], 80);
            } elseif ($extension == 'png') {
                imagepng($image, $filename['tmp_name'], 80);
            } elseif ($extension == 'webp') {
                imagewebp($image, $filename['tmp_name'], 80);
            } else {
                "Format non supporté";
            }
        }
    }
}

function photo_fix_orientation($filename) {
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    if (function_exists('exif_read_data')) {
        $exif = @exif_read_data($filename);
        if (!empty($exif['Orientation'])) {
            if ($extension == 'jpeg' || $extension == 'jpg') {
                $image = imagecreatefromjpeg($filename);
            } elseif ($extension == 'png') {
                $image = imagecreatefrompng($filename);
            } elseif ($extension == 'webp') {
                $image = imagecreatefromwebp($filename);
            } else {
                "Format non supporté";
            }
            switch ($exif['Orientation']) {
                case 3:
                    $image = imagerotate($image, 180, 0);
                    break;
                case 6:
                    $image = imagerotate($image, -90, 0);
                    break;
                case 8:
                    $image = imagerotate($image, 90, 0);
                    break;
            }
            if ($extension == 'jpeg' || $extension == 'jpg') {
                imagejpeg($image, $filename, 80);
            } elseif ($extension == 'png') {
                imagepng($image, $filename, 80);
            } elseif ($extension == 'webp') {
                imagewebp($image, $filename, 80);
            } else {
                "Format non supporté";
            }
        }
    }
}

function convertImageToWebP($source, $destination, $quality = 80)
{
    $extension = pathinfo($source['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg')
        $image = imagecreatefromjpeg($source['tmp_name']);
    elseif ($extension == 'gif')
        $image = imagecreatefromgif($source['tmp_name']);
    elseif ($extension == 'png')
        $image = imagecreatefrompng($source['tmp_name']);
    return imagewebp($image, $destination, $quality);
}

function convertImageToJpg($source, $destination, $quality = 80)
{
    $extension = pathinfo($source['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg')
        $image = imagecreatefromjpeg($source['tmp_name']);
    elseif ($extension == 'gif')
        $image = imagecreatefromgif($source['tmp_name']);
    elseif ($extension == 'png')
        $image = imagecreatefrompng($source['tmp_name']);
    return imagejpeg($image, $destination, $quality);
}

function framing_jpg($source, $destination, $new_width, $new_height, $quality = 80)
{
    $old_image = imagecreatefromjpeg($source);
    list( $old_width , $old_height ) = getimagesize($source);
    if( ( $old_width / $old_height ) < ( $new_width / $new_height ) )
    {
        $height = $new_height / $new_width * $old_width;
        $width = $old_width;
        $y = ( $old_height - $height)  / 2;
        $x = 0;
    }
    else
    {
        $width = $new_width / $new_height * $old_height;
        $height = $old_height;
        $x = ( $old_width - $width)  / 2;
        $y = 0;
    }
    $new_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $old_image, 0, 0, $x, $y, $new_width, $new_height, $width, $height);
    imagedestroy($old_image);
    imagewebp($new_image, $destination, $quality); // adjust format as needed
    imagedestroy($new_image);
}

function framing_to_jpg($source, $destination, $new_width, $new_height, $quality = 80)
{
    $old_image = imagecreatefromjpeg($source);
    list( $old_width , $old_height ) = getimagesize($source);
    if( ( $old_width / $old_height ) < ( $new_width / $new_height ) )
    {
        $height = $new_height / $new_width * $old_width;
        $width = $old_width;
        $y = ( $old_height - $height)  / 2;
        $x = 0;
    }
    else
    {
        $width = $new_width / $new_height * $old_height;
        $height = $old_height;
        $x = ( $old_width - $width)  / 2;
        $y = 0;
    }
    $new_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $old_image, 0, 0, $x, $y, $new_width, $new_height, $width, $height);
    imagedestroy($old_image);
    imagejpeg($new_image, $destination, $quality); // adjust format as needed
    imagedestroy($new_image);
}

function framing_png($source, $destination, $new_width, $new_height, $quality = 80){
    $old_image = imagecreatefrompng($source);
    list( $old_width , $old_height ) = getimagesize($source);
    if( ( $old_width / $old_height ) < ( $new_width / $new_height ) ){
        $height = $new_height / $new_width * $old_width;
        $width = $old_width;
        $y = ( $old_height - $height)  / 2;
        $x = 0;
    }
    else{
        $width = $new_width / $new_height * $old_height;
        $height = $old_height;
        $x = ( $old_width - $width)  / 2;
        $y = 0;
    }
    $new_image = imagecreatetruecolor($new_width, $new_height);
    $color = imagecolorallocatealpha($new_image, 0, 0, 0, 127); //fill transparent back
    imagefill($new_image, 0, 0, $color);
    imagesavealpha($new_image, true);
    imagecopyresampled($new_image, $old_image, 0, 0, $x, $y, $new_width, $new_height, $width, $height);
    imagedestroy($old_image);
    imagewebp($new_image, $destination, $quality); // adjust format as needed
    imagedestroy($new_image);
}

function framing_webp($source, $destination, $new_width, $new_height, $quality = 80)
{
    list( $old_width , $old_height ) = getimagesize($source);
    if( ( $old_width / $old_height ) < ( $new_width / $new_height ) )
    {
        $height = $new_height / $new_width * $old_width;
        $width = $old_width;
        $y = ( $old_height - $height)  / 2;
        $x = 0;
    }
    else
    {
        $width = $new_width / $new_height * $old_height;
        $height = $old_height;
        $x = ( $old_width - $width)  / 2;
        $y = 0;
    }
    $src = imagecreatefromstring(file_get_contents($source));
    $new_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $src, 0, 0, $x, $y, $new_width, $new_height, $width, $height);
    imagedestroy($src);
    imagewebp($new_image, $destination, $quality); // adjust format as needed
    imagedestroy($new_image);
}

function resizePng($source, $output, $maxWidth = 1200, $maxHeight = 1200){
    $size = getimagesize($source);
    $ratio = $size[0] / $size[1]; // width / height
    if($ratio > 1) {
        $width = $maxWidth;
        $height = $maxHeight / $ratio;
    }
    else {
        $width = $maxWidth * $ratio;
        $height = $maxHeight;
    }
    $src = imagecreatefromstring(file_get_contents($source));
    $dst = imagecreatetruecolor($width,$height);
    $color = imagecolorallocatealpha($dst, 0, 0, 0, 127); //fill transparent back
    imagefill($dst, 0, 0, $color);
    imagesavealpha($dst, true);
    imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
    imagedestroy($src);
    imagewebp($dst, $output); // adjust format as needed
    imagedestroy($dst);
}

function resizeJpg($source, $output, $maxWidth = 1200, $maxHeight = 1200){
    $size = getimagesize($source);
    $ratio = $size[0] / $size[1]; // width / height
    if($ratio > 1) {
        $width = $maxWidth;
        $height = $maxHeight / $ratio;
    }
    else {
        $width = $maxWidth * $ratio;
        $height = $maxHeight;
    }
    $src = imagecreatefromstring(file_get_contents($source));
    $dst = imagecreatetruecolor($width,$height);
    imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
    imagedestroy($src);
    imagewebp($dst, $output); // adjust format as needed
    imagedestroy($dst);
}

function resizeWebp($source, $output, $maxWidth = 1200, $maxHeight = 1200){
    $size = getimagesize($source);
    $ratio = $size[0] / $size[1]; // width / height
    if($ratio > 1) {
        $width = $maxWidth;
        $height = $maxHeight / $ratio;
    }
    else {
        $width = $maxWidth * $ratio;
        $height = $maxHeight;
    }
    $src = imagecreatefromstring(file_get_contents($source));
    $dst = imagecreatetruecolor($width,$height);
    imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
    imagedestroy($src);
    imagewebp($dst, $output); // adjust format as needed
    imagedestroy($dst);
}

function upload_image($image_info, $destination_folder, $image_folder, $maxWidth = 1200, $maxHeight = 1200)
{
    $hash = md5_file($image_info['tmp_name']);
    $filename = "{$hash}.webp";
    $output = BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/{$filename}";
    // If image folder doesn't exist, create it
    if (!is_dir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/")) {
        mkdir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/", 0777);
    }
    // Convert the image according to extension
    ini_set('memory_limit', '-1');
    $extension = pathinfo($image_info['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg') {
        resizeJpg($image_info['tmp_name'], $output, $maxWidth, $maxHeight);
    } elseif ($extension == 'png') {
        resizePng($image_info['tmp_name'], $output, $maxWidth, $maxHeight);
    } elseif ($extension == 'webp') {
        resizeWebp($image_info['tmp_name'], $output, $maxWidth, $maxHeight);
    }
    return $hash;
}


function upload_image_jpg($image_info, $destination_folder, $image_folder, $hash, $maxWidth = 1200, $maxHeight = 1200)
{
    $filename = "{$hash}.jpg";
    $output = BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/{$filename}";
    // If image folder doesn't exist, create it
    if (!is_dir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/")) {
        mkdir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/", 0777);
    }
    // Convert the image according to extension
    ini_set('memory_limit', '-1');
    $extension = pathinfo($image_info['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg') {
        framing_to_jpg($image_info['tmp_name'], $output, $maxWidth, $maxHeight);
    }
}

function upload_and_frame_image($image_info, $destination_folder, $image_folder, $width = 1200, $height = 1200)
{
    $hash = md5_file($image_info['tmp_name']);
    $filename = "{$hash}.webp";
    $output = BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/{$filename}";
    // If image folder doesn't exist, create it
    if (!is_dir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/")) {
        mkdir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/", 0777);
    }
    // Convert the image according to extension
    ini_set('memory_limit', '-1');
    $extension = pathinfo($image_info['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg') {
        image_fix_orientation($image_info);
        framing_jpg($image_info['tmp_name'], $output, $width, $height);
        return $hash;
    } elseif ($extension == 'png') {
        // image_fix_orientation($image_info);
        framing_png($image_info['tmp_name'], $output, $width, $height);
        return $hash;
    } elseif ($extension == 'webp') {
        // image_fix_orientation($image_info);
        framing_webp($image_info['tmp_name'], $output, $width, $height);
        return $hash;
    } else {
        return "Format non supporté";
    }
}

function upload_and_frame_image_jpg($image_info, $destination_folder, $image_folder, $hash, $width = 1200, $height = 1200)
{
    $filename = "{$hash}.jpg";
    $output = BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/{$filename}";
    // If image folder doesn't exist, create it
    if (!is_dir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/")) {
        mkdir(BASE_PATH . "/public/upload/images/{$destination_folder}/{$image_folder}/", 0777);
    }
    // Convert the image according to extension
    ini_set('memory_limit', '-1');
    $extension = pathinfo($image_info['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg') {
        image_fix_orientation($image_info);
        framing_to_jpg($image_info['tmp_name'], $output, $width, $height);
    } elseif ($extension == 'png') {
        framing_to_jpg($image_info['tmp_name'], $output, $width, $height);
    } else {
        return "Format non supporté";
    }
}

function resize_image($file, $w, $h, $crop = FALSE) {
    list($width, $height) = getimagesize($file['tmp_name']);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file['tmp_name']);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

function upload_and_frame_default_image($image_info, $destination_folder, $image_name, $width = 1200, $height = 1200)
{
    $hash = md5_file($image_info['tmp_name']);
    $filename = "{$image_name}.webp";
    $output = BASE_PATH . "/public/images/default/{$destination_folder}/{$filename}";
    // Convert the image according to extension
    ini_set('memory_limit', '-1');
    $extension = pathinfo($image_info['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg') {
        framing_jpg($image_info['tmp_name'], $output, $width, $height);
    } elseif ($extension == 'png') {
        framing_png($image_info['tmp_name'], $output, $width, $height);
    }elseif ($extension == 'webp') {
        framing_webp($image_info['tmp_name'], $output, $width, $height);
    } else {
        return "Format non supporté";
    }
}

function get_album_folder_hash_by_id(int $album_id)
{
    $query = pdo()->prepare("SELECT slug FROM albums WHERE id = ?");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute([$album_id]);
    $result = $query->fetch();
    return $result->slug;
}

function upload_photo_in_album($photo, $user_id, $album_folder, $width = 1200, $height = 1200)
{
    $hash = md5_file($photo['tmp_name']);
    $filename = "{$hash}.webp";
    $output = BASE_PATH . "/public/upload/images/albums/{$user_id}/{$album_folder}/";
    // Convert the image according to extension
    ini_set('memory_limit', '-1');
    $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
    if ($extension == 'jpeg' || $extension == 'jpg') {
        resizeJpg($photo['tmp_name'], $output, $width, $height);
    } elseif ($extension == 'png') {
        resizePng($photo['tmp_name'], $output, $width, $height);
    }elseif ($extension == 'webp') {
        resizeWebp($photo['tmp_name'], $output, $width, $height);
    } else {
        return "Format non supporté";
    }
    return $filename;
}

function wipe_image(string $folder_name, $folder_image)
{
    $folder_image = strval($folder_image);
    $files = glob(BASE_PATH . "/public/upload/images/{$folder_name}/{$folder_image}/*");
    // If the image folder is not empty, wipe it
    if (!empty($files)) {
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}

function wipe_default_image(string $folder_name, $image_name)
{
    $files = glob(BASE_PATH . "/public/images/default/{$folder_name}/{$image_name}.webp");
    // If the image folder is not empty, wipe it
    if (!empty($files)) {
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }
}

function get_image_by_id(string $folder_name, $folder_image)
{
    $folder_image = strval($folder_image);
    $files = glob(BASE_PATH . "/public/upload/images/{$folder_name}/{$folder_image}/*");
    // If the image folder is not empty
    if (!empty($files)) {
        foreach ($files as $file) {
            if (is_file($file)) {
                return "/upload/images/{$folder_name}/{$folder_image}/" . basename($file);
            }
        }
    } else {
        return null;
    }
}

function get_image_jpg_by_id(string $folder_name, $folder_image)
{
    $folder_image = strval($folder_image);
    $files = glob(BASE_PATH . "/public/upload/images/{$folder_name}/{$folder_image}/*.jpg");
    // If the image folder is not empty
    if (!empty($files)) {
        foreach ($files as $file) {
            if (is_file($file)) {
                return "/upload/images/{$folder_name}/{$folder_image}/" . basename($file);
            }
        }
    } else {
        return null;
    }
}