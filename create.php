<?php
if (isset($_POST['create'])) {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $mail = htmlspecialchars($_POST['mail']);
    $zipCode = htmlspecialchars($_POST['zipCode']);

    if (preg_match("/^[A-ÿ'\- ]+$/i", $firstName) && preg_match("/^[A-ÿ'\- ]+$/i", $lastName) && preg_match("/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/im", $mail) && preg_match("/^[0-9]{5,6}$/", $zipCode)) {
        $db->query("INSERT INTO user (firstName, lastName, mail, zipCode) VALUES ('$firstName', '$lastName', '$mail', '$zipCode')")->fetchAll();
    } else {
        throw new Exception("Veuillez insérer les bonnes valeurs.");
    }
}
