<?php
require_once 'includes/header.php';
 ?>
    <!--Esto queda en el index-->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/master.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/index.js" ></script>


    <title>LCdLV</title>
</head>

<body class="container">
    <header>
        <nav>
            <a href="#main">Inicio</a>
            <a href="<?=base_url('Notas')?>">Notas</a>
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
      <aside id="aside-left">
      </aside>

      <aside id="aside-right">
      </aside>

      <article id="article-main">
          <h1>Aca iria el Titulo de La Bienvenida</h1>
          <p>aca iria un saludo de bienvenida
          descripcion post esto puede ser muy largo
          por los que habria que manejar que se despliege cuando se hace
          click en algun lado, poner cantidad de lineas o algo
          Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          Pellentesque orci metus, descripcion post esto puede ser muy
          </p>
      </article>


      <div class="post-container">
        <!-- all this is the template for dynamic loading from backend
        and/or db EVERY ITEM GOES WITH A UNIQUE ID=""-->
        <p id='descripcion'></p>

        <!-- <article class="article-post">
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
                <p class="p-desc-no-show" id='descripcion'>

                </p>

            </div>
            <div class="div-p-click">
                <p class="p-show-click">Mostrar</p>
            </div>

            <table class="table-comments">

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

            <div class="show-more-comments">
                <span class="span-more-comments">Mostrar mas comentarios</span>
            </div>

            <form class="form-comments"action="">
                <input class="input-comments"
                    type="text"
                    placeholder="Escribe un comentario...">
            </form>

        </article> -->

      </div> <!--end post container -->

    </main>
<?php
require_once 'includes/footer.php';
?>
