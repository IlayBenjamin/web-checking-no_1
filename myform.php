<?php 
    $name = $_REQUEST['client_name'];
    $result = "Hello, $name! Welcome to our site!";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>First page</title>
    </head>
    <body>
        <p>
            <?php print $result;?>
        </p>
    </body>
</html>
