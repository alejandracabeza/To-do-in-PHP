<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To do</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="list">
        <h1 class="header">To do</h1>

        <ul class="items">
        <li>
            <span class="item">Pick up shopping</span>
            <a href="#" class="done-button">Mark as done</a>
        </li>
        
        <li><span class="item done">Learn PHP</span></li>
        </ul>

        <form class="item-add" action="add.php" method="post">
            <input type="text" name="name" placeholder="Type a new item here." class="input" auocomplete="off" required>
            <input type="submit" value="Add" class="submit">
        </form>
    </div>
</body>
</html>