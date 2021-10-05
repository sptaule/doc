<?php

class Photo
{
    public $id;
    public $album_id;
    public $name;
    public $hash;
    public $public_display;
    public $uploaded_at;
}

class Album
{
    public $id;
    public $owner_id;
    public $name;
    public $slug;
    public $visibility;
    public $created_at;
}

/**
 * Return true if album ID exists, else false
 * @param $album_id
 * @return bool
 */
function does_album_exists($album_id): bool
{
    $query = pdo()->prepare("SELECT * FROM albums WHERE id = ?");
    $query->execute([$album_id]);
    return $query->rowCount();
}

/**
 * Get every album that a user owns with his ID
 * @param $user_id
 * @return Album[]|null
 */
function get_user_albums(int $user_id)
{
    $query = pdo()->prepare("SELECT * FROM albums WHERE owner_id = ?");
    $query->setFetchMode(PDO::FETCH_CLASS, Album::class);
    $query->execute([$user_id]);
    return $query->fetchAll() ?? null;
}

/**
 * Create an album and return album's ID
 * @param int $owner_id
 * @param string $album_name
 * @param bool|int $visibility
 * @return int
 */
function create_album(int $owner_id, string $album_name, bool|int $visibility): int
{
    $album_slug = random_str(7);
    $query = pdo()->prepare("INSERT INTO albums (owner_id, name, slug, visibility) VALUES (?, ?, ?, ?)");
    $query->execute([$owner_id, $album_name, $album_slug, $visibility]);
    // Create user folder if doesn't exist
    if (!is_dir(BASE_PATH . "/public/upload/images/albums/{$owner_id}/")) {
        mkdir(BASE_PATH . "/public/upload/images/albums/{$owner_id}/", 0777);
    }
    // Create album folder in user folder
    mkdir(BASE_PATH . "/public/upload/images/albums/{$owner_id}/{$album_slug}/", 0777);
    return pdo()->lastInsertId();
}

/**
 * @param string $album_name
 * @param bool|int $visibility
 * @param int $album_id
 */
function update_album(string $album_name, bool|int $visibility, int $album_id)
{
    $query = pdo()->prepare("UPDATE albums SET name = ?, visibility = ? WHERE id = ?");
    $query->execute([$album_name, $visibility, $album_id]);
}

function delete_album(int $album_id, int $user_id)
{
    // make sure album is owned by user
    $query = pdo()->prepare("SELECT * FROM albums WHERE id = ? AND owner_id = ?");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute([$album_id, $user_id]);
    $result = $query->fetch();
    if ($query->rowCount() == 1) {
        // delete every photo in album
        // --photos entry
        $query = pdo()->prepare("DELETE FROM photos WHERE album_id = ?");
        $query->execute([$album_id]);
        // --album entry
        $query = pdo()->prepare("DELETE FROM albums WHERE id = ?");
        $query->execute([$album_id]);
        // --album folder
        $path = BASE_PATH . "/public/upload/images/albums/{$user_id}/{$result->slug}";
        deleteDirectory($path);
    }
}

/**
 * Get all the photos on an album with its ID
 * @param int $album_id
 * @param int|null $limit
 * @return Photo[]|null
 */
function get_photos_by_album_id(int $album_id, int $limit = null)
{
    if (is_null($limit)) {
        $query = pdo()->prepare("SELECT * FROM photos WHERE album_id = ?");
        $query->setFetchMode(PDO::FETCH_CLASS, Photo::class);
        $query->execute([$album_id]);
        return $query->fetchAll();
    } else {
        $query = pdo()->prepare("SELECT * FROM photos WHERE album_id = ? LIMIT $limit");
        $query->setFetchMode(PDO::FETCH_CLASS, Photo::class);
        $query->execute([$album_id]);
        return $query->fetchAll();
    }
}

function get_photo_from_album(int $owner_id, string $album_hash, string $file_hash)
{
    return "/upload/images/albums/{$owner_id}/{$album_hash}/{$file_hash}.jpg";
}


/**
 * @param int $user_id
 * @return Album
 */
function get_user_public_albums(int $user_id): ?array
{
    $query = pdo()->prepare("SELECT * FROM albums WHERE owner_id = ? AND visibility = 1");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute([$user_id]);
    return $query->fetchAll() ?: null;
}

function get_public_photos()
{
    $query = pdo()->prepare("SELECT *, p.name as legend FROM photos p LEFT JOIN albums a on p.album_id = a.id LEFT JOIN users u on a.owner_id = u.id WHERE p.public_display = 1 ORDER BY RAND()");
    $query->setFetchMode(PDO::FETCH_CLASS, Photo::class);
    $query->execute();
    return $query->fetchAll();
}

function delete_photo(string $photo_hash, int $owner_id)
{
    $query = pdo()->prepare("SELECT * FROM photos p LEFT JOIN albums a on p.album_id = a.id WHERE p.hash = ? AND a.owner_id = ?");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute([$photo_hash, $owner_id]);
    $result = $query->fetch();
    $folder_name = $result->slug;
    $album_id = $result->album_id;
    // delete from db
    if ($query->rowCount() >= 1) {
        $query = pdo()->prepare("DELETE FROM photos WHERE hash = ? AND album_id = ?");
        $query->execute([$photo_hash, $album_id]);
    }
    // delete file
    $path = BASE_PATH . "/public/upload/images/albums/{$owner_id}/{$folder_name}/{$photo_hash}";
    unlink($path);
}

function create_photo($photo, int $user_id, int $album_id, string $name, bool|int $public_display)
{
    // Get album hash
    $query = pdo()->prepare("SELECT slug FROM albums WHERE id = ?");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute([$album_id]);
    $result = $query->fetch();
    $album_slug = $result->slug;
    // Upload photo in album folder
    $hash = md5_file($photo['tmp_name']);
    $filename = "{$hash}.webp";
    $output = BASE_PATH . "/public/upload/images/albums/{$user_id}/{$album_slug}/";
    image_fix_orientation($photo);
    convertImageToWebP($photo, $output.$filename);
    resizeWebp($output.$filename, $output.$filename, 1500, 1500);
    // Insert photo in database
    $query = pdo()->prepare("INSERT INTO photos (album_id, name, hash, public_display) VALUES (?, ?, ?, ?)");
    $query->execute([$album_id, $name, $filename, $public_display]);
    return $hash;
}

function create_photo_jpg($photo, int $user_id, int $album_id, string $name, bool|int $public_display)
{
    // Get album hash
    $query = pdo()->prepare("SELECT slug FROM albums WHERE id = ?");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute([$album_id]);
    $result = $query->fetch();
    $album_slug = $result->slug;
    // Upload photo in album folder
    $hash = md5_file($photo['tmp_name']);
    $filename = "{$hash}.jpg";
    $output = BASE_PATH . "/public/upload/images/albums/{$user_id}/{$album_slug}/";
    image_fix_orientation($photo);
    convertImageToJpg($photo, $output.$filename);
    resizeJpg($output.$filename, $output.$filename, 1500, 1500);
    return $hash;
}

function is_album_owner(int $album_id, int $user_id)
{
    $query = pdo()->prepare("SELECT * FROM albums WHERE id = ? AND owner_id = ?");
    $query->execute([$album_id, $user_id]);
    if ($query->rowCount() == 1) {
        return true;
    } else {
        return false;
    }
}

function get_album_by_id(int $album_id): ?Album
{
    $query = pdo()->prepare("SELECT * FROM albums WHERE id = ?");
    $query->setFetchMode(PDO::FETCH_CLASS, Album::class);
    $query->execute([$album_id]);
    return $query->fetch() ?: null;

}
