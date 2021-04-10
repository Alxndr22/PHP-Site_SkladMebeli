<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SkladMebeli — офісні вживані меблі</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pages/General.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
            crossorigin="anonymous"></script>

    <script src="pages/script.js"></script>
</head>
<body>
<?php
    $pages = [
        'Table' => 'Столи', 'SideUnit' => 'Тумби',
        'Wardrobe' => 'Шафи', 'Chair' => 'Крісла',
        'Reception' =>'Ресепшн', 'Other' => 'Інше',
        'Buyout' => 'Викуп', 'Contacts' => 'Контакти'
    ];
?>
<header>
    <div class="logo_menu">
        <div class="top">
            <div class="left_top">
                <a href="?page=Landing">
                    <img src="output/Final_Logo.svg" alt="SkladMebeli_logo">
                </a>
            </div>
            <div class="container_right_top">
                <div class="right_top">
                    <?php foreach ($pages as $k => $v) : ?>
                        <a href="?page=<?=$k?>"><?=$v?></a>
                    <?php endforeach; ?>
                </div>
                <div id="line"></div>
            </div>
        </div>

        <div class="menu_mobile">
            <input id="menu_toggle" type="checkbox">
            <label class="menu_btn" for="menu_toggle">
                <img src="output/Menu.svg" alt="menu">
            </label>
            <div id="offcanvas"></div>
            <div class="dropdown_menu_container">
                <ul class="dropdown_menu_list">
                    <?php foreach ($pages as $k => $v) : ?>
                        <li><a href="?page=<?=$k?>"><?=$v?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
</header>
<div class="consultation">
    <?php if (!isset($_REQUEST['doGO'])) { ?>
        <div style="padding-bottom: 20px;">
            Надаємо зручну консультацію щодо асортименту
        </div>
        <form method="post">
            Ім'я:<br><input type="text" name="name" value=""><br>
            Номер телефону: <input type="text" name="phone" value=""><br>
            <input type="submit" name="doGO" value="Відправити">
        </form>
    <?php } else {
            $name = strip_tags($_POST['name']);
            $phone = strip_tags($_POST['phone']);
            echo "Очікуйте дзвінок найближчим часом<br><br>Ваші дані:<br>";
            echo "$name / $phone";
    }
    ?>

    <?php
    $counter = 0;
    if (isset($_COOKIE['counter']))
        $counter = $_COOKIE['counter'];
    $counter++;
    setcookie("counter", $counter, time() + 3600, "/");
    echo "<br><br>Entrance №$counter";
    ?>
</div>

<?php
    if (empty($_GET['page']) || $_GET['page'] === 'Landing')
        require 'pages/Landing.html';

    foreach ($pages as $k => $v) {
        if ($_GET['page'] === $k)
            require "pages/$k.html";
    }
?>

<footer>
    <div class="footer_frame">
        <div class="left_top">
            <a href="?page=Landing">
                <img src="output/Final_Logo(brown).svg" alt="logo">
            </a>
        </div>
        <div class="footer_pages">
            <div class="footer_pages_inner">
                <a href="?page=Table">Столи</a>
                <a href="?page=SideUnit">Тумби</a>
                <a href="?page=Wardrobe">Шафи</a>
            </div>
            <div class="footer_pages_inner">
                <a href="?page=Chair">Крісла</a>
                <a href="?page=Reception">Ресепшн</a>
                <a href="?page=Other">Інше</a>
            </div>
        </div>
        <div class="footer_right">
            Київ, 02132, вул. Центральна, 21б, оф. 64
            <div class="footer_icons">
                <a href="tel:+380971163312">
                    <img src="output/Phone(brown).svg" alt="phone">
                    <span style="margin-right: 30px">+38 097 116-33-12</span>
                </a>
                <a href="tg://resolve?domain=Alexnd_V">
                    <img src="output/Telegram(brown).svg" alt="telegram">
                    Telegram
                </a>
            </div>
            <a href="mailto:office@skladmebeli.com.ua">
                office@skladmebeli.com.ua
            </a>
        </div>
    </div>
</footer>
</body>
</html>
