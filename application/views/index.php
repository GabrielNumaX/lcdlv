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
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/master.css">
    <!-- <link rel="stylesheet" href="<?= base_url()?>assets/css/posts.css"> -->

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
            <a href="#main">Inicio</a>
            <a href="<?=base_url('Nota')?>">Notas</a>
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


        <!-- all this is the template for dynamic loading from backend and/or db -->

            <article class="article-post">
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

            <!-- VIDEO template  -->
            <article class="article-post">
                <h2 class="h2-title">TITULO VIDEO</h2>

                <div class="div-time">
                    <time class="time-post">fecha y hora de post</time>
                </div>

                <div class="div-img">
                    <video class="video-post" controls>
                        <source
                        src="<?=base_url()?>assets/videos/2019-10-13 15-02-42.mp4"
                        type="video/mp4"
                        controls>
                    </video>
                </div>

                <div class="div-comments">
                    <span class="qty-comments">cantidad comentarios</span>
                </div>

                <div class="div-desc">
                    <p class="p-desc-no-show">descripcion post esto puede ser muy largo
                        por los que habria que manejar que se despliege cuando se hace
                        click en algun lado, poner cantidad de lineas o algo
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

                <form class="form-comments"action="">
                    <input class="input-comments"
                        type="text"
                        placeholder="Escribe un comentario...">
                </form>

            </article> <!--fin post video-->


            <!-- template notas -->
            <article class="article-notas">

                <div class="nota">
                    <h3 class="h3-nota">
                        ACA IRIA EL TITULO NOTA1
                    </h3>
                    <p class="p-nota">

                    <!-- dummy text -->

                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Pellentesque orci metus, pharetra eu elit a, malesuada condimentum felis.
                    Fusce a tellus eleifend, ultrices ligula id, luctus tellus.
                    Donec eleifend lorem id turpis suscipit, nec vehicula nunc egestas.
                    Ut sit amet ex vitae nunc lacinia lobortis sed sed urna.
                    Sed ut gravida dui. Pellentesque laoreet, ante ut sollicitudin varius,
                    sapien nunc ultricies magna, vel egestas libero ipsum et orci.
                    Nunc sit amet ipsum sed est consectetur luctus.
                    Nullam neque lectus, convallis non magna a, facilisis tincidunt velit.
                    Phasellus ultricies consequat nibh. Nulla rutrum ultricies convallis.
                    Sed pharetra tortor sit amet facilisis luctus. Duis quis pharetra purus,
                    non fringilla augue. Nunc non eleifend sem. Aenean fermentum suscipit erat,
                    eget interdum leo condimentum at. Integer condimentum justo nec congue
                    rhoncus. Suspendisse eu erat non quam aliquet porttitor at a orci.

                    Pellentesque condimentum elementum nisl, id fringilla turpis viverra vel.
                    Donec condimentum at leo in ullamcorper. Pellentesque in nunc sit amet arcu
                    rhoncus sollicitudin. In in leo consequat, pretium lacus eu, malesuada
                    nisl. Sed tellus tellus, porttitor ut facilisis sit amet, convallis ut
                    orci. Aliquam feugiat, dui ut placerat elementum, dui tortor facilisis m
                    assa, sit amet facilisis tellus nisl quis sem. Nullam consectetur lacus
                    aliquet, fringilla quam in, ultrices libero. Maecenas mollis purus ante,
                    ac tempus felis placerat at. Nunc vitae viverra ligula, sed gravida elit.
                    Aenean vehicula, turpis in placerat ultrices, nisi mi gravida ex, at
                    ultricies felis odio eu odio. Sed convallis aliquam ante sed pellentesque.
                    Quisque iaculis commodo nisl eget laoreet. Cras dignissim, felis quis
                    molestie ultrices, ipsum felis lobortis turpis, ut rutrum justo massa ut
                    tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    Phasellus volutpat placerat justo, id pretium nunc viverra sed.
                    Etiam auctor risus libero, et sagittis justo iaculis ut.

                    </p>

                </div>

                <div class="div-notes-comments">
                    <span class="qty-notes-comments">cantidad comentarios</span>
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

                <form class="form-comments"action="">
                    <input class="input-comments"
                        type="text"
                        placeholder="Escribe un comentario...">
                </form>

            </article> <!-- fin nota 1-->

        </div> <!--end post container -->

    </main>

    <footer id="footer">
        <div class="footer-div">
            <h4>NumaX &copy; 2019</h4>
        </div>
        <div class="footer-icons">
        <a href="https://github.com/GabrielNumaX/"><i class="fab fa-github-square"></i></a>
            <a href="mailto:g.numa10@hotmail.com"><i class="fas fa-envelope"></i></a>
            <a href="https://www.linkedin.com/in/numax/"><i class="fab fa-linkedin"></i></a>

        </div>
    </footer>

</body>
</html>
