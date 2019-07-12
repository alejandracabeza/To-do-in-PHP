<?php 

    require_once'app/init.php';

    $itemsQuery = $db->prepare("
    SELECT id, name, done
    FROM items
    WHERE user = :user
    ");

    $itemsQuery->execute([
        'user' => $_SESSION['user_id']
    ]);

    $items = $itemsQuery-> rowCount() ? $itemsQuery : [];

    //    echo '<pre>',  print_r($items, true), '</pre>' ;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To do</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container gradDynamic">
        <div class="list">
            <h1 class="header">To do</h1>

            <?php if(!empty($items)): ?>
            <ul class="items">
                <?php foreach($items as $item): ?>
                <li>
                    <span class="item<?php echo $item['done'] ? ' done' : '' ?>">
                    <?php echo $item['name'] ?></span>
                    <?php if(!$item['done']): ?>
                            <a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
                    <?php endif; ?>
                </li>
            <!-- <li><span class="item done">Learn PHP</span></li> -->
            <?php endforeach; ?>
            </ul>
            <?php else: ?>
                <p>You havent added any items yet.</p>
            <?php endif; ?>

            <form class="item-add" action="add.php" method="post">
                <input type="text" name="name" placeholder="Type a new item here." class="input" auocomplete="off" required>
                <input type="submit" value="Add" class="submit">
            </form>
        </div>
    </div>
</body>
</html>