<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php


use W1020\Table;

include "../vendor/autoload.php";

$config = [
    "servername" => "localhost",
    "username" => "root",
    "password" => "root",
    "dbname" => "guestbook",
    "table" => "ved"
];

$table = new Table($config);
$table->setIdName('nomer');
$comments = $table->columnComments();
$id = (int)($_GET['ins'] ?? 1);
$valueArr = $table->getRow($id);

?>
<form action="update.php?page=<?=$_GET["page"]?>" method="post">
    <input type="hidden" name="<?= $table->getIdName() ?>" value="<?= $id ?>">
    <?php
    foreach ($table->columns() as $column) {
        ?><span><?= $comments[$column] ?></span><input type="text" class="form-control" name="<?= $column ?>"
                                                       value="<?= $valueArr[$column] ?>"><br><br>
        <?php
    }
    ?>
    <input type="submit" value="insert">
</form>
</body>
</html>


