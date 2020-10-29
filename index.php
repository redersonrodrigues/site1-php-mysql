<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>RAMAR</title>
    </head>
    <body>
        <?php
        require './core/Config.php';
        require './vendor/autoload.php';
        
        use Core\ConfigController as Home;
        $Url = new Home();
        $Url->carregarPagina();
        
        
        ?>
    </body>
</html>
