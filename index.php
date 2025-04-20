<?php require "db.php"; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="main-container">
        <form action="" method="POST">
            <div class="form-row">
                <input name="firstName" placeholder="Prénom">
                <input name="lastName" placeholder="Nom">
                <input name="mail" placeholder="Email">
                <input name="zipCode" placeholder="Code Postal">
                <button name="create">Ajouter</button>
            </div>
        </form>
        <form action="" method="POST" class="table-form">
            <div class="table-responsive">
                <table>
                    <tr>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Mail</th>
                        <th>Code Postal</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($users as $entry) { ?>
                        <tr>
                            <?php if (!(isset($_POST["editView"]) && $_POST["editView"] == $entry['id'])) : ?>
                                <td><?= $entry['firstName'] ?> </td>
                                <td><?= $entry['lastName'] ?></td>
                                <td><?= $entry['mail'] ?></td>
                                <td><?= $entry['zipCode'] ?></td>
                            <?php else : ?>
                                <td><input name="firstName" value="<?= $entry['firstName']; ?>"></td>
                                <td><input name="lastName" value="<?= $entry['lastName']; ?>"></td>
                                <td><input name="mail" value="<?= $entry['mail']; ?>"></td>
                                <td><input name="zipCode" value="<?= $entry['zipCode']; ?>"></td>
                            <?php endif; ?>
                            <td class="actions">
                                <button name="delete" value="<?= $entry['id'] ?>">Supprimer</button>
                                <?php if (!(isset($_POST["editView"]) && $_POST["editView"] == $entry['id'])) : ?>
                                    <button name="editView" value="<?= $entry['id'] ?>">Modifier</button>
                                <?php else : ?>
                                    <button name="update" value="<?= $entry['id'] ?>">Confirmer</button>
                                <?php endif; ?> 
                            </td>
                        </tr>
                    <?php }
                    foreach ($errors as $error) {
                        echo "<p>$error</p>";
                    } ?>
                </table>
            </div>
        </form>
    </div>
</body>

</html>