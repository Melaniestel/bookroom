<!DOCTYPE html>
<html lang="es">

    <head>
        <title>error</title>
        <meta name="author" content="Melanie Stella">
        <meta charset="UTF-8">
        <style></style>
</head>
<body>
<?php
session_start();
echo "<div class='middle'>";
                echo'<br/><br/>';
                echo "Aún no tienes una cuenta de usuario o has cometido algún error al iniciar";
                echo "<br/>";
            
                if (isset($_REQUEST['volver'])) {
                    session_destroy();
                    header("location:index.php");
                }
                ?>
                <br/>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                   
                    <input class="addition-submit" name ="volver" type="submit" value="Probar de nuevo">
                </form>
                <br/>
            </div>
            
</body>
</html>