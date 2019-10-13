<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- this is for SEO -->
    <meta name="keywords" content="cara vergha, vergha" />
    <meta name="description" content="la cara de la vergha" />
    <meta name="robots" content="index, follow" />

    <!-- this are the fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

    <!-- this is for the icons -->
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

    <!-- this is css -->
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/archivo.css">

    <!-- JQuery and JS scripts -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

    <!-- this is js -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/index.js" ></script>
              

    <title>LCdLV</title>
</head>

<body class="container">
    <header>
        <nav>
            <a href="<?=base_url('Home/index')?>">Inicio</a>
            <a href="<?=base_url('Nota/notas')?>">Notas</a>
            <a href="#main">Archivo</a>
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
        aca el main
    </main>

    <aside id="aside">
        aside
    </aside>

    <footer id="footer">
        <div class="footer-div">
            <h4>NumaX &copy; 2019</h4>
        </div>
        <div class="footer-icons">
        <a href="https://github.com/GabrielNumaX/"><i class="fab fa-github-square"></i></a>
            <a href="mailto:g.numa10@gmail.com"><i class="fas fa-envelope"></i></a>
            <a href="https://www.linkedin.com/in/numax/"><i class="fab fa-linkedin"></i></a>
            
        </div>
    </footer>
    
</body>
</html>
