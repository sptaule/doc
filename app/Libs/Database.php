<?php

/**
 * @return mixed|PDO
 * Connect to database
 */
function pdo()
{
    // prevent from connecting multiple times if already connected
    static $pdo;
    if ($pdo) {
        return $pdo;
    }
    // define database credentials
    $servername = DB_HOST;
    $database = DB_NAME;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    // connect to database
    $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    setlocale(LC_TIME, array('fr_FR.UTF-8', 'fr_FR.utf-8', 'fr_FR.utf8', 'fr_FR@euro', 'fr_FR', 'french'));
    return $pdo;
}

/**
 * @param $table
 * @param $class
 * @param $key_name
 * @param $key_value
 * @return mixed
 */
function find_or_null_by_key($table, $class, $key_name, $key_value): mixed
{
    if (is_null($key_value)) {
        return null;
    }
    $query = pdo()->prepare("SELECT * FROM $table WHERE $key_name = ?");
    $query->setFetchMode(PDO::FETCH_CLASS, $class);
    $query->execute([ $key_value ]);
    return $query->fetch() ?? abort_404();
}

/**
 * @param $table
 * @param $class
 * @param $key_name
 * @param $key_value
 * @return mixed
 */
function find_all_by_key($table, $class, $key_name, $key_value)
{
    if (is_null($key_value)) {
        return null;
    }

    $query = pdo()->prepare("SELECT * FROM $table WHERE $key_name = ?");
    $query->setFetchMode(PDO::FETCH_CLASS, $class);
    $query->execute([ $key_value ]);
    return $query->fetchAll() ?? abort_404();
}

function find_all_from_table(string $table)
{
    $query = pdo()->prepare("SELECT * FROM $table");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute();
    return $query->fetchAll() ?? null;
}

/**
 * @param $table
 * @param $class
 * @param $key_name
 * @param $key_value
 * @return mixed
 */
function find_by_key($table, $class, $key_name, $key_value)
{
    return find_or_null_by_key($table, $class, $key_name, $key_value) ?? abort_404();
}

function find_or_null_that_contains($table, $column, string $needle)
{
    $query = pdo()->prepare("SELECT * FROM $table WHERE $column LIKE '%{$needle}%'");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute();
    return $query->fetchAll() ?? abort_404();
}

function count_or_null_that_contains($table, $column, string $needle)
{
    $query = pdo()->prepare("SELECT * FROM $table WHERE $column LIKE '%{$needle}%'");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute();
    return $query->rowCount() ?? abort_404();
}

function count_or_null_that_contains_except($table, $columnOne, $needleOne, $columnTwo, $needleTwo)
{
    $query = pdo()->prepare("SELECT * FROM $table WHERE $columnOne LIKE '%{$needleOne}%' AND $columnTwo != '{$needleTwo}'");
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute();
    return $query->rowCount() ?? abort_404();
}

function array_prefix_filter($array, $prefix)
{
    $prefix .= "_";
    $new_array = [];
    foreach ($array as $key => $value) {
        if (strpos($key, $prefix) === 0) {
            $new_array[substr($key, strlen($prefix))] = $value;
        }
    }
    return $new_array;
}

function object_prefix_filter($object, $prefix)
{
    return array_prefix_filter(get_object_vars($object), $prefix);
}

function set_relation($object, $type, $name)
{
    $related = new $type;
    $properties = object_prefix_filter($object, $name);
    foreach ($properties as $property_name => $property_value) {
        $related->{$property_name} = $property_value;
        $old_property_name = "{$name}_{$property_name}";
        unset($object->{$old_property_name});
    }
    return $object->{$name} = $related;
}

/**
 * @param $table
 * @param $field
 * @return false|string[]
 * Returns all the possible enums as a list of a specific table field
 */
function get_enum_values($table, $field)
{
    $query = pdo()->prepare( "SELECT SUBSTRING(COLUMN_TYPE,5) as enums
        FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = ? 
        AND TABLE_NAME = ?
        AND COLUMN_NAME = ?"
    );
    $query->setFetchMode(PDO::FETCH_OBJ);
    $query->execute([DB_NAME, $table, $field]);
    $enum = $query->fetch()->enums;
    $enumArray = explode("','", preg_replace("/(enum|set)\((.+?)'\)/","\\2", $enum));
    $enumArray[array_key_first($enumArray)] = str_replace("'", "", $enumArray[array_key_first($enumArray)]);
    $enumArray[array_key_first($enumArray)] = str_replace("(", "", $enumArray[array_key_first($enumArray)]);
    $enumArray[array_key_last($enumArray)] = str_replace("'", "", $enumArray[array_key_last($enumArray)]);
    $enumArray[array_key_last($enumArray)] = str_replace(")", "", $enumArray[array_key_last($enumArray)]);
    foreach ($enumArray as $k => $value) {
        // Remove double apostrophes
        if (strpos($value, "''") !== false) {
            $enumArray[$k] = str_replace("''", "'", $enumArray[$k]);
        }
    }
    return $enumArray;
}