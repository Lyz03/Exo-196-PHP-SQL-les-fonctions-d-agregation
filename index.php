<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    /**
     * 1. Importez le contenu du fichier user.sql dans une nouvelle base de données.
     * 2. Utilisez un des objets de connexion que nous avons fait ensemble pour vous connecter à votre base de données.
     *
     * Pour chaque résultat de requête, affichez les informations, ex:  Age minimum: 36 ans <br>   ( pour obtenir une information par ligne ).
     *
     * 3. Récupérez l'age minimum des utilisateurs.
     * 4. Récupérez l'âge maximum des utilisateurs.
     * 5. Récupérez le nombre total d'utilisateurs dans la table à l'aide de la fonction d'agrégation COUNT().
     * 6. Récupérer le nombre d'utilisateurs ayant un numéro de rue plus grand ou égal à 5.
     * 7. Récupérez la moyenne d'âge des utilisateurs.
     * 8. Récupérer la somme des numéros de maison des utilisateurs ( bien que ca n'ait pas de sens ).
     */

    // TODO Votre code ici, commencez par require un des objet de connexion que nous avons fait ensemble.
    require __DIR__ . '/Classes/DB.php';

    $db = new DB();
    $db= $db->getInstance();

    $stmt = $db->prepare("SELECT MIN(age) FROM user");
    if ($stmt->execute()) {
        foreach ($stmt->fetch() as $value) {
            echo 'Age minimum : ' . $value . ' ans<br>';
        }

        echo '<br><br>';
    }


    $stmt = $db->prepare("SELECT MAX(age) FROM user");
    if ($stmt->execute()) {
        foreach ($stmt->fetch() as $value) {
            echo 'Age maximum : ' . $value . ' ans<br>';
        }

        echo '<br><br>';
    }

    $stmt = $db->prepare("SELECT COUNT(*) FROM user");
    if ($stmt->execute()) {
        foreach ($stmt->fetch() as $value) {
            echo 'Il y a ' . $value . ' utilisateurs<br>';
        }

        echo '<br><br>';
    }

    $stmt = $db->prepare("SELECT COUNT(*) FROM user WHERE numero >= 5");
    if ($stmt->execute()) {
        foreach ($stmt->fetch() as $value) {
            echo 'Il y a ' . $value . ' utilisateurs ayant un numero de rue égale ou supérieur à 5<br>';
        }

        echo '<br><br>';
    }

    $stmt = $db->prepare("SELECT AVG(age) FROM user");
    if ($stmt->execute()) {
        foreach ($stmt->fetch() as $value) {
            echo 'La moyenne d\'age est de : ' . $value . ' ans<br>';
        }

        echo '<br><br>';
    }

    $stmt = $db->prepare("SELECT SUM(numero) FROM user");
    if ($stmt->execute()) {
        foreach ($stmt->fetch() as $value) {
            echo 'La somme de numéro de maison est : ' . $value . '<br>';
        }

        echo '<br><br>';
    }

    ?>
</body>
</html>

