<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagens do sistema</title>
</head>

<body>
    <?php
    session_start();
    if (!empty($_SESSION["amount"])) {
        echo "<p>" . number_format($_SESSION["amount"], 2) . "</p>";
        unset($_SESSION["amount"]);
    }
    ?>
</body>

</html>