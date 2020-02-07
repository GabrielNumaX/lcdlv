<?php
require_once 'includes/header.php';
 ?>


    <!--Esto queda en notas-->
    <link type="text/css"rel="stylesheet" href="<?= base_url()?>assets/css/notas.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/notas.js" ></script>

    <title>LCdLV</title>
</head>
<body class="container">
    <header>
        <nav>
            <a href="<?=base_url('Home')?>">Inicio</a>
            <a href="#main">Notas</a>
            <a href="<?=base_url('Archivo')?>">Archivo</a>
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
            <h1>Notas</h1>

            <div class="div-notas-desc">
                <p>aca iria una descripcion de las notas general o bienvenida de las notas
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Pellentesque orci metus, pharetra eu elit a, malesuada condimentum felis.
                Fusce a tellus eleifend, ultrices ligula id, luctus tellus.
                Donec eleifend lorem id turpis suscipit, nec vehicula nunc egestas.
                </p>
            </div>
        </article>



        <article class="article-notas">

        </article>

        <!--fin nota dos -->

    </main>

    <!-- esto esta solucionado con js en notas.js -->
    <!-- aside con position fixed para que no scrollee
        con sticky overlapea al header sino dejar normal
        asi da para cargar 15 notas/fechas. pero overlapea el
        footer asi que ver mas adelante.  -->
    <aside id="aside" class="aside-show">
       <h2>Ultimas Notas</h2>

       <div class="div-notas">

       <!-- this LOADS dynamic -->
        <ul class="ul-notas">


       </div>

       <!-- this LOADS dynamic -->
       <div class="div-fechas">
            <ul class="ul-fechas">



            </ul>
       </div>


    </aside>
<?php
require_once 'includes/footer.php';
 ?>
