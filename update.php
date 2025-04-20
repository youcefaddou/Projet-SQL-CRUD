<?php
if (isset($_POST['update'])) {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $mail = htmlspecialchars($_POST['mail']);
    $zipCode = htmlspecialchars($_POST['zipCode']);
    $id = intval(htmlspecialchars($_POST['update']));
    if (preg_match("/^[A-ÿ'\- ]+$/i", $firstName) && preg_match("/^[A-ÿ'\- ]+$/i", $lastName) && preg_match("/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/im", $mail) && preg_match("/^[0-9]{5,6}$/", $zipCode)) {
        $db->query("UPDATE user SET firstName = '$firstName', lastName = '$lastName', mail = '$mail', zipCode = '$zipCode' WHERE id=$id")->fetchAll();
    } else {
        throw new Exception("Veuillez insérer les bonnes valeurs.");
    }
}
