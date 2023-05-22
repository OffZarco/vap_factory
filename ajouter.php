<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    if (isset($_POST['button'])) {
        extract($_POST);
        if (isset($name) && isset($desc) && isset($buy) && isset($sell)) {
            include_once "connexion.php";

            // mysqli_real_escape_string échappe les caractères spéciaux dans les variables en les précédant d'un antislash
            $name = mysqli_real_escape_string($con, $name);
            $desc = mysqli_real_escape_string($con, $desc);
            $buy = mysqli_real_escape_string($con, $buy);
            $sell = mysqli_real_escape_string($con, $sell);
            
            $req = mysqli_query($con, "INSERT INTO stock VALUES(NULL, '$name', '$desc', '$buy', '$sell')");
            if ($req) {
                header("location: index.php");
            } else {
                $message = "Employé non ajouté";
            }
        } else {
            $message = "Veuillez remplir tous les champs !";
        }
    }

    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><i class="fa-solid fa-chevron-left"></i>Retour</a>
        <h2>Ajouter un employé</h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>

        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="name">
            <label>Description</label>
            <input type="text" name="desc">
            <label>Prix d'achat</label>
            <input type="number" name="buy">
            <label>Prix de vente</label>
            <input type="number" name="sell">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>

</html>