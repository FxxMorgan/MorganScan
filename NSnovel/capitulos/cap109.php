<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "caktevsq_morganscan";
$password = "88547505aA.-";
$dbname = "caktevsq_morganscan";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establecer la codificación de caracteres en UTF-8
if (!$conn->set_charset("utf8")) {
    die("Error al establecer la codificación de caracteres: " . $conn->error);
}

// El ID del capítulo se recoge de la URL (p.ej., capitulo.php?id=0)
$capitulo_id = basename($_SERVER['PHP_SELF'], '.php');
$capitulo_id = str_replace('cap', '', $capitulo_id);

// Recuperar el capítulo de la base de datos
$sql = "SELECT titulo, capitulo FROM capitulos WHERE id=?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('prepare() failed: ' . htmlspecialchars($conn->error));
}
$stmt->bind_param("i", $capitulo_id);

$stmt->execute();
$result = $stmt->get_result();
$capitulo = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Nihonkoku Shoukan">
    <meta name="keywords" content="Anime, Guerra, Elfo, Economia, Nihonkoku Shoukan, Humanos, Japon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MorganScan</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    

    
    <!--Adsense Code -->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7454043171871440"
    crossorigin="anonymous"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="/index.php">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="/index.php">Inicio</a></li>
                                <li><a href="/categories.html">Categorias <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="/categories.html">Categorias</a></li>
                                    </ul>
                                </li>
                                <li><a href="/blog.html">Noticias Anime</a></li>
                                <li><a href="#">Contactame</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#" class="search-switch"><span class="icon_search"></span></a>
                        <a href="/login.php"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>


    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__details__title">
                    <h6>Action, Magic <span>- 23 Junio , 2023</span></h6>
                        <h2><?php echo $capitulo['titulo']; ?></h2>
                        <div class="blog__details__social">
                            <a href="#" class="facebook"><i class="fa fa-instagram"></i> Instagram</a>
                            <a href="#" class="pinterest"><i class="fa fa-youtube"></i> Youtube</a>
                            <a href="#" class="linkedin"><i class="fa fa-twitch"></i> Twitch</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter-square"></i> Twitter</a>
                                                 
                            <br>
                            <br>
                            <h6>Cambiar Tamaño Letra</h6> 
                            <p>
                                <button class ="btn btn-primary" onclick="return cambiarTexto('+')">+</button>
                                <button class ="btn btn-primary" onclick="return cambiarTexto('-')">-</button>
                            </p>
                  
                    </div>
                    </div>
                </div>

    <!-- Header End -->
        <!-- Text Section Begin-->       
        
        <div class="text-left">
    <p><?php echo nl2br($capitulo['capitulo']); ?></p>
    </div>
            </div>




  <!-- Search model Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch"><i class="icon_close"></i></div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search model end -->

</html>

<script>
var currentChapter = 109; // Cambiar este valor al número actual del capítulo

function navigateChapter(direction) {
        if (direction === 'previous') {
            currentChapter--;
        } else if (direction === 'next') {
            currentChapter++;
        }
        window.location.href = "cap" + currentChapter + ".php";
    }
</script>


<div class="row">
    <div class="col-md-12">
        <div class="bottom">
            <button type="button" class="btn btn-primary" onclick="navigateChapter('previous')">Anterior</button>
            <a href="capitulos.html" class="btn btn-primary">Capitulos</a>
            <button type="button" class="btn btn-primary" onclick="navigateChapter('next')">Siguiente</button>

        </div>
    </div>
</div>



  

    
<!-- Js Plugins -->
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/player.js"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/mixitup.min.js"></script>
<script src="/js/jquery.slicknav.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/boton.js"></script>
<script src="/js/clave.js"></script>


<div id="disqus_thread"></div>

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://morganscan-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">Comentarios gracias a disqus.</a></noscript>


</body>


</html>