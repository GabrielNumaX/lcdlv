<?php
require_once 'includes/header.php';
 ?>


    <!--Esto queda en archivo-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js" ></script>
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/archivo.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/archivo.js" ></script>


    <title>LCdLV</title>
</head>

<body class="container">
    <header>
        <nav>
            <a href="<?=base_url('Home')?>">Inicio</a>
            <a href="<?=base_url('Notas')?>">Notas</a>
            <a href="#article-main">Archivo</a>
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

         <aside id="aside-left">

        </aside>
        <aside id="aside-right">

        </aside>

        <article id="article-main">
            <h1>Bienvenidos al Archivo</h1>

        </article>
        <!-- adentro de esto "post-container" tiene que cargar dynamic segun
        los resultados la idea es que cargue FOTOS, VIDEOS o
        NOTAS con las clases y elementos ya utilzados
        en index.php -->

        <!-- IMPORTANTE RECORDAR los archivos cargan con
        determinado numero de comentarios-->

        <div class="post-container" id="archivo-main"> <!--este ID no se si iria-->

        </div>

    </main>
<?php
require_once 'includes/footer.php';
 ?>
