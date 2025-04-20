<?php
$errors = [];

try {
    require("ne_pas_ouvrir/confidentiel.php");
    $db = new PDO("mysql:host=127.0.0.1;dbname=projet_sql", "root");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->beginTransaction();
    require "create.php";
    require "update.php";
    require "delete.php";
    $db->commit();

    // $db->query = $db->exec
    $users = $db->query("SELECT * FROM user")->fetchAll();
} catch (Exception $e) {
    $db->rollBack();
    $errors[] = $e->getMessage();
    $users = $db->query("SELECT * FROM user")->fetchAll();
}
