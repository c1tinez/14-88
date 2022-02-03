<?php

 

    require_once 'config/connect.php';

    

    $product_id = $_GET['id'];

    /*
     

    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $product = mysqli_fetch_assoc($product);

    

    $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id` = '$product_id'");

    

    $comments = mysqli_fetch_all($comments);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Product</title>
</head>
<body>
    <h2>Title: <?= $product['title'] ?></h2>
    <h4>Price: <?= $product['price'] ?></h4>
    <p>Description: <?= $product['description'] ?></p>

    <hr>

    <h3>Add comment</h3>
    <form action="vendor/create_comment.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <textarea name="body"></textarea> <br><br>
        <button type="submit">Add comment</button>
    </form>

    <hr>

    <h3>Comments</h3>
    <ul>
        <?php

            /*
             * Перебираем массив с комментариями и выводим
             */

            foreach ($comments as $comment) {
            ?>
                <li><?= $comment[2] ?></li>
            <?php
            }
        ?>
    </ul>
</body>
</html>
