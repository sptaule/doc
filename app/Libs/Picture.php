<?php

namespace App\Libs;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Image\ImageInterface;

class Picture {

    /**
     * @param $photo <p>The picture file (ex: $_POST['image']['tmp_name'])</p>
     * @param $outputFolder <p>Output folder where file(s) will be saved (after "srv/scuba/")</p>
     * @param array|string[] $sizes <p>An array of desired exported sizes (ex: ['small', 'medium']). Default export all sizes.</p>
     */
    static function upload_photo($photo, $outputFolder, array $sizes = ['big', 'medium', 'small'], $name = 'rand')
    {
        $mime_type = getimagesize($photo)['mime'];
        if ($mime_type == 'image/jpeg' || $mime_type == 'image/jpg') {
            $extension = 'jpg';
        } elseif ($mime_type == 'image/png') {
            $extension = 'png';
        } else {
            die();
        }

        $name == 'rand' ? $hash = random_str(15) : $hash = $name;

        foreach ($sizes as $size) {

            // Name and destination
            $filename = "{$hash}_{$size}.{$extension}";
            $outputPath = BASE_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $outputFolder;

            // Create folder if not exist
            if (!file_exists($outputPath)) {
                mkdir($outputPath);
            }

            $fullPath = $outputPath . DIRECTORY_SEPARATOR . $filename;

            $imagine = new Imagine();
            $imagine->setMetadataReader(new \Imagine\Image\Metadata\ExifMetadataReader());

            $picture = $imagine->open($photo);

            $filter = new \Imagine\Filter\Basic\Autorotate();
            $filter->apply($picture);

            $width = match ($size) {
                'small' => 100,
                'medium' => 333,
                'big' => 999,
            };
            $height = match ($size) {
                'small' => 100,
                'medium' => 333,
                'big' => 999,
            };

            $picture = $picture->thumbnail(
                new \Imagine\Image\Box($width, $height),
                \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET
            );

            // Strip off any metadata embedded in the image to save space and privacy
            $picture->strip()->save($fullPath);
        }
    }

    static function upload_cover_photo($photo, int $user_id)
    {
        // Name and destination
        $hash = md5_file($photo);
        $filename = "{$hash}.jpg";
        if (!file_exists(BASE_PATH . "/public/upload/images/users/covers/{$user_id}")) {
            mkdir(BASE_PATH . "/public/upload/images/users/covers/{$user_id}");
        }
        $output = BASE_PATH . "/public/upload/images/users/covers/{$user_id}/$filename";

        // Upload photo in album folder
        $imagine = new Imagine\Gd\Imagine();
        $imagine->setMetadataReader(new \Imagine\Image\Metadata\ExifMetadataReader());

        $photo = $imagine->open($photo);

        $filter = new \Imagine\Filter\Basic\Autorotate();
        $filter->apply($photo);

        $photo = $photo->thumbnail(
            new \Imagine\Image\Box(1200, 1200),
            \Imagine\Image\ManipulatorInterface::THUMBNAIL_INSET
        );

        // Strip off any metadata embedded in the image to save space and privacy
        $photo->strip()->save($output);
    }

    static function get_image ($folder, $id)
    {
        if (!file_exists(BASE_PATH . "/public/upload/" . $folder . DIRECTORY_SEPARATOR . $id) OR is_dir_empty(BASE_PATH . "/public/upload/" . $folder . DIRECTORY_SEPARATOR . $id)) {
            return "/upload/covers/default.jpg";
        }
        $image = array_diff(scandir(BASE_PATH . "/public/upload/" . $folder . DIRECTORY_SEPARATOR . $id), array('.', '..'));
        return "/upload/" . $folder . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . $image[array_key_first($image)];
    }

    static function get_images (string $folder, string|int $id, $imageUrl = 'base', string $returnType = 'json')
    {
        if (!file_exists(BASE_PATH . "/public/upload/" . $folder . DIRECTORY_SEPARATOR . $id)) {
            return;
        }
        $images = array_diff(scandir(BASE_PATH . "/public/upload/" . $folder . DIRECTORY_SEPARATOR . $id), array('.', '..'));
        $elements = [];
        if ($returnType == 'json') {
            foreach ($images as $k => $image) {
                if ($imageUrl == 'base') {
                    $elements[] = "{id:" . $k . ", src: '" . "/upload/" . $folder . "/" . $id . "/" . $image . "'},";
                } elseif ($imageUrl == 'full') {
                    $elements[] = "{id:" . $k . ", src: '" . BASE_PATH . "/public/upload/" . $folder . "/" . $id . "/" . $image . "'},";
                } elseif ($imageUrl == 'file') {
                    $elements[] = "{id:" . $k . ", src: '" . $image . "'},";
                }
            }
            return implode('', $elements) ?? [];
        } else {
            foreach ($images as $image) {
                if ($imageUrl == 'base') {
                    $elements[] = "/upload/" . $folder . "/" . $id . "/" . $image;
                } elseif ($imageUrl == 'full') {
                    $elements[] = BASE_PATH . "/public/upload/" . $folder . "/" . $id . "/" . $image;
                } elseif ($imageUrl == 'file') {
                    $elements[] = $image;
                }
            }
            return array_values($elements);
        }
    }

}

