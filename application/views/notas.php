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
    <!-- este es el formato de las notas -->
    <link type="text/css"rel="stylesheet" href="<?= base_url()?>assets/css/notas.css">
    <!-- este es el formato reutilizado de los comentarios -->
    <!-- <link rel="stylesheet" href="<?= base_url()?>assets/css/posts.css"> -->

    <!-- JQuery and JS scripts -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <!-- este script tiene las funciones show/hide de los comentarios -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/index.js" ></script>

    <title>LCdLV</title>
</head>
<body class="container">
    <header>
        <nav>
            <a href="<?=base_url('Home/index')?>">Inicio</a>
            <a href="#main">Notas</a>
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
            <h1>Notas</h1>
            <div class="div-notas-desc">
                <p>aca iria una descripcion de las notas general o bienvenida de las notas</p>
            </div>
        </article>
        <!-- cada article con un id para crear la plantilla de cada nota esta seria id="article-nota-1"-->
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

                Curabitur rutrum tortor pellentesque mauris lobortis rhoncus. 
                Donec tristique condimentum urna eu tincidunt. Interdum et malesuada 
                fames ac ante ipsum primis in faucibus. Cras ut orci et massa posuere 
                aliquet. Phasellus finibus finibus dui, a finibus ex elementum eget. 
                Quisque et tellus metus. Morbi et semper erat. Duis pulvinar ex ac ligula 
                semper, rhoncus porta mi volutpat. Nunc sit amet viverra arcu. 
                Phasellus lectus neque, facilisis id ornare eu, laoreet in metus. 
                Praesent sollicitudin nulla id augue auctor lobortis. Nulla cursus massa 
                vel lorem mollis, in pretium sem hendrerit. Praesent at faucibus sapien. 
                Maecenas eu turpis ultricies ante vehicula aliquet non ut quam. Nulla non 
                consectetur lectus, non mattis turpis. Cras commodo justo in viverra varius.

                Sed egestas tristique ipsum, ac consequat nulla sagittis gravida. 
                Vestibulum non purus mollis, dictum nibh vitae, viverra arcu. Praesent 
                placerat justo in erat lacinia volutpat. Duis arcu justo, pulvinar ac 
                sapien in, pellentesque pretium tortor. Sed fringilla orci in vehicula 
                congue. Suspendisse at nisi non augue tempus faucibus. Duis eleifend 
                neque tincidunt, egestas massa non, maximus mi.

                Quisque ante nisi, dictum a rhoncus eget, efficitur at justo. Ut a
                 fermentum tellus. Integer scelerisque blandit urna eu malesuada. 
                 Vivamus et lacus non velit volutpat imperdiet sed congue massa. 
                 Maecenas ut suscipit nulla, nec tincidunt urna. Nam auctor dui a 
                 pellentesque pharetra. Ut nisl orci, pharetra vel quam sed, tempor 
                 sodales orci. Sed pharetra ex eu magna gravida dapibus ut ut mauris.
                  Quisque turpis nisl, fringilla id dictum nec, laoreet sed nibh. 
                  Sed pellentesque dolor in efficitur accumsan. Vestibulum eget ipsum 
                  vitae metus semper fringilla. 
                </p>
                
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

        </article> <!-- fin nota 1-->

        <article class="article-notas"> 
        <!-- cada article con un id para crear la plantilla de cada nota esta seria id="article-nota-2" y asi-->
        <div class="nota">
                <h3 class="h3-nota">
                    ACA IRIA EL TITULO  NOTA2
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

        </article>  <!--fin nota dos --> 
               
    </main>

    <!-- aside con position fixed para que no scrollee
        con sticky overlapea al header sino dejar normal
        asi da para cargar 15 notas/fechas. pero overlapea el
        footer asi que ver mas adelante.  -->
    <aside id="aside">
       <h2>Ultimas Notas</h2>

       <div class="div-notas">
        <ul class="ul-notas">
            <li class="li-notas">
                <a href="">Ultima nota</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota</a>
                </li>
            <li class="li-notas">
                <a href="">overflow para titulo nota larga</a>
                </li>
                
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            <li class="li-notas">
                <a href="">nota anterior</a>
                </li>
            </ul>
       </div>

       <div class="div-fechas">
            <ul class="ul-fechas">

                <li class="li-fechas">
                    11/10/2019
                </li>
                <li class="li-fechas">
                    10/10/2019
                </li>
                <li class="li-fechas">
                09/10/2019
                </li>
                <li class="li-fechas">
                08/10/2019
                </li>               
                <li class="li-fechas">
                07/10/2019
                </li>
                <li class="li-fechas">
                06/10/2019
                </li>
                <li class="li-fechas">
                05/10/2019
                </li>
                <li class="li-fechas">
                04/10/2019
                </li>
                <li class="li-fechas">
                03/10/2019
                </li>
                <li class="li-fechas">
                02/10/2019
                </li>
                <li class="li-fechas">
                01/10/2019
                </li>
                <li class="li-fechas">
                30/10/2019
                </li>
                <li class="li-fechas">
                29/10/2019
                </li>
                <li class="li-fechas">
                28/10/2019
                </li>
                <li class="li-fechas">
                27/10/2019
                </li>
            </ul>
       </div>

       <!-- This was the first approach. Couldn't manage
            to get a text-overflow ONLY for the a tag and not the span
            so I created two divs with lists for NOTA and FECHA -->
       <!-- <ul class="ul-notas">
           <li class="li-notas">
               <a href="">Ultima nota</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">overflow para titulo nota larga</a>
               <span class="span-fecha">fecha</span>
            </li>
            
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
           <li class="li-notas">
               <a href="">nota anterior</a>
               <span class="span-fecha">fecha</span>
            </li>
        </ul> -->
    </aside>
    <footer>
        footer
    </footer>  
</body>
</html>