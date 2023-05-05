<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include_once "connexion.php";
    $id = $_GET['id'];
    $req = mysqli_query($con, "SELECT * FROM stock WHERE id = $id");
    $row = mysqli_fetch_assoc($req);


    if (isset($_POST['button'])) {
        extract($_POST);
        if (isset($name) && isset($buy) && isset($sell)) {
            $req = mysqli_query($con, "UPDATE stock SET name = '$name', buy = '$buy' , sell = '$sell' WHERE id = $id");
            if ($req) {
                header("location: index.php");
            } else {
                $message = "Employé non modifié";
            }
        } else {
            $message = "Veuillez remplir tous les champs !";
        }
    }

    ?>

    <div class="form">
        <a href="index.php" class="back_btn"><i class="fa-solid fa-chevron-left"></i>Retour</a>
        <h2>Modifier l'employé : <?= $row['name'] ?> </h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="POST">
            <label>Nom</label>
            <input type="text" name="name" value="<?= $row['name'] ?>">
            <label>Description</label>
            <input type="text" name="desc" value="<?= $row['desc'] ?>">
            <label>Prix d'achat</label>
            <input type="number" name="buy" value="<?= $row['buy'] ?>">
            <label>Prix de vente</label>
            <input type="number" name="sell" value="<?= $row['sell'] ?>">
            <input type="submit" value="Modifier" name="button">
        </form>
    </div>
</body>

</html>