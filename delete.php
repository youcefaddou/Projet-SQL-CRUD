<?php 

if (isset($_POST['delete'])) {
   $id = intval(htmlspecialchars($_POST['delete']));
    $db->query("DELETE FROM user WHERE id=$id");
}

?>