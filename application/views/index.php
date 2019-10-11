<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- this is for favicon from realfavicongenerator.net -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url()?>assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url()?>assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url()?>assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= base_url()?>assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?= base_url()?>assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/master.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/posts.css">

    <!-- JQuery and JS scripts -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/js/index.js" ></script>
              

    <title>LCdLV</title>
</head>
<body class="container">
    <header>
        <nav>
            <a href="#main">Inicio</a>
            <a href="<?=base_url('Nota/index')?>">Notas</a>
            <a href="">Archivo</a>
        </nav>
        <form class="form-search" action="">
            <input class="input-search" type="search"
                autofocus
                placeholder="Buscar...">
        </form>

        <div class="icons">
            <div id="icon-div1">
                <a class="social-icons"
                    href="https://www.facebook.com/CaraDeLaVergha/"
                    target="_blank">
                    <i class="fab fa-facebook"></i>
                </a>
            </div>

            <div id="icon-div2">
                <a class="social-icons"
                    href="https://www.instagram.com/lacaradelavergha/"
                    target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

        </div>
    </header>
    <main id="main">
        <article id="article-main">
            <h1>ACA IRIA EL TITULO DE LA BIEVENIDA</h1>
            <p>aca iria un saludo de bienvenida</p>
        </article>
        <!-- all this is the template for dynamic loadin from backend and/or db -->
        <article id="article-post">
            <h2 class="h2-title">TITULO POST</h2>

            <div class="div-time">
                <time class="time-post">fecha y hora de post</time>
            </div>

            <div class="div-img">
                <img class="img-post"
                    src="<?=base_url()?>assets/img/mosquitos.jpg"
                    alt="">
            </div>

            <div class="div-comments">
                <span class="qty-comments">cantidad comentarios</span>
            </div>

            <div class="div-desc">
                <p class="p-desc-no-show">descripcion post esto puede ser muy largo
                    por los que habria que manejar que se despliege cuando se hace
                    click en algun lado, poner cantidad de lineas o algo
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Pellentesque orci metus, descripcion post esto puede ser muy largo
                    por los que habria que manejar que se despliege cuando se hace
                    click en algun lado, poner cantidad de lineas o algo
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Pellentesque orci metus, descripcion post esto puede ser muy largo
                    por los que habria que manejar que se despliege cuando se hace
                    click en algun lado, poner cantidad de lineas o algo
                    por los que habria que manejar que se despliege cuando se hace
                    click en algun lado, poner cantidad de lineas o algo
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Pellentesque orci metus, descripcion post esto puede ser muy largo
                    por los que habria que manejar que se despliege cuando se hace
                    click en algun lado, poner cantidad de lineas o algo
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Pellentesque orci metus, descripcion post esto puede ser muy largo
                    por los que habria que manejar que se despliege cuando se hace
                    click en algun lado, poner cantidad de lineas o algo
                </p>
    
            </div>
            <div class="div-p-click">
                <p class="p-show-click">Mostrar</p>
            </div>

            <table class="table-comments">
                <!-- <tr class="table-row-comments">
                    <th class="header-comments">Header tabla</th>
                </tr> -->
                <tr>
                    <td class="comments">comentario 1</td>
                </tr>
                <tr>
                    <td class="comments">
                    <p class="p-comments-no-show">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque orci metus, descripcion post esto puede ser muy largo
                        por los que habria que manejar que se despliege cuando se hace
                        click en algun lado, poner cantidad de lineas o algo
                        </p>
                        <span class="show-comments">Mostrar comentario</span>
                    </td>
                </tr>
                <tr>
                    <td class="comments">
                        <p class="p-comments-no-show">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Pellentesque orci metus, descripcion post esto puede ser muy largo
                        por los que habria que manejar que se despliege cuando se hace
                        click en algun lado, poner cantidad de lineas o algo
                        </p>
                        <span class="show-comments">Mostrar comentario</span>
                    </td>
                </tr>
            </table>

            <form class="form-comments"action="">
                <input class="input-comments"
                    type="text"
                    placeholder="Escribe un comentario...">
            </form>

        </article>
    </main>
    <aside id="aside">
        aside
    </aside>
    <footer>
        footer
    </footer>
</body>
</html>
