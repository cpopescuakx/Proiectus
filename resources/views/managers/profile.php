<?php
/*
session_start();

if (isset($_SESSION['login_user'])) {
} else {
    header("Location: ../index.php");
}
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php include_once("includes/imports.php"); ?>

    <!-- Codi CSS i JS per al editor de text -->
    <link href="../summernote-master/dist/summernote-bs4.css" rel="stylesheet">
    <script src="../summernote-master/dist/summernote-bs4.min.js"></script>
    <title>Usuari | <?php echo $_GET['usr'] ?></title>
</head>

<body>
    <?php include_once("includes/header.php"); ?>
    <div id="content" class="content closed bg-light">
        <div class="container">
            <?php
            include_once("../classes/Connection.php");
            $connection = crearConexio();
            try {
                $sql = "SELECT firstname, lastname, username, profilepic, email, bio, birthdate FROM USER WHERE username = '" . $_GET['usr'] . "'";
                $resultat = $connection->query($sql);
                $row = $resultat->fetch_assoc();
            } catch (Exception $e) {
                echo $e;
                $connexio->close();
            }
            ?>
            <img src="<?php echo $row['profilepic']; ?>" style="max-width: 10em;" alt="Aquest usuari no te imatge de perfil" class="img-thumbnail">
            <br><br>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nom: <?php echo $row['firstname']; ?></li>
                <li class="list-group-item">Cognoms: <?php echo $row['lastname']; ?></li>
                <li class="list-group-item">Nom d'usuari: <?php echo $row['username']; ?></li>
                <li class="list-group-item">Correu: <?php echo $row['email']; ?></li>
                <li class="list-group-item">Biografia: <?php echo $row['bio']; ?></li>
            </ul>
        </div>
    </div>
    </div>

    <?php include_once("includes/footer.php"); ?>

    <script src="js/header.js"></script>
</body>

</html>