<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des stock</title>
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <a href="ajouter.php" class="btnAdd"><i class="fa-solid fa-circle-plus"></i>Ajouter</a>
        <table>
            <tr id="items">
                <th>Référence</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix d'achat</th>
                <th>Prix de vente</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php 
                include_once "connexion.php";
                $req = mysqli_query($con , "SELECT * FROM stock");
                if(mysqli_num_rows($req) == 0){
                    echo "Il n'y a pas encore de stock ajouter !" ;
                }else {
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?= "#" . $row['id']?></td>
                            <td><?=$row['name']?></td>
                            <td><?= strlen($row['desc']) > 50 ? substr($row['desc'], 0, 50) . "..." : $row['desc']?></td>
                            <td><?=$row['buy']?></td>
                            <td><?=$row['sell']?></td>
                            <td><a href="modifier.php?id=<?=$row['id']?>"><i class="fa-solid fa-pen"></i></a></td>
                            <td><a href="supprimer.php?id=<?=$row['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
         
        </table>

    </div>
</body>
</html>