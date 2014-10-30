<?php 
session_start();
if(empty($_SESSION["zalogowany"]))$_SESSION["zalogowany"]=0;
?>
<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <LINK href="style.css" rel="stylesheet" type="text/css">
        <title>Wybory</title>
    </head>
    <body>
        <div id="box">

            <div class="title"><h1>Jupikon</h1><hr /></div>
            <div class="menu">
                <ul>
                    <li><a href="index.php">Strona główna</a></li>
                    <li><a href="produkty.php">Kalendarz</a></li>
                    <li><a href="kup_produkt">Sny</a></li>
                    <li><a href="transakcje">Wiadomosci</a></li>         
                    <li><a href="dostawcy">Dane osobowe</a></li>
                    <li><a href="dostawy">Rozmowy</a></li>
                    <?php if($_SESSION["zalogowany"]==0)
                       echo '<li><a href="zaloguj">Zaloguj</a></li>';
                     else 
                       echo '<li><a href="zaloguj?wyloguj=tak">Wyloguj</a></li>';
                     ?>
                </ul>
            </div>
            <div class="content">
                <?php
                if (isset($_GET['url'])) {
                    $file = 'views/'.$_GET['url'] . '.php';
                    if (file_exists($file)) {
                        require_once $file;;
                    }
                    else {
                        require_once 'views/error.php';
                    }
                } 
                else  {
                    require_once 'views/index.php';
                }
                ?>
            </div>
            
        </div>
    </body>
</html>
