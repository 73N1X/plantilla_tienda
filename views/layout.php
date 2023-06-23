<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../build/css/app.css">
    <link rel="shortcut icon" type="image/x-icon" href="../build/img/favicon.ico">
</head>


<body>
    <header>
        <div class="company-logo">Plantilla - E-Shop</div>
        <nav class="navbar">
            <ul class="nav-items">
                <li class="nav-item"><a href="/" class="nav-link">INICIO</a></li>
                <li class="nav-item"><a href="#" class="nav-link">OFERTAS</a></li>
                <li class="nav-item"><a href="/shop" class="nav-link">TIENDA</a></li>
                <li class="nav-item"><a href="/contacto" class="nav-link">CONTACTO</a></li>
                <li class="nav-item"><a href="/#" class="nav-link"><i class="bi bi-cart"></i></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- HOME SECTION -->
        <section class="container section-1">
            <div class="slogan">
                <h1 class="company-title">Todo lo que necesitas en un solo lugar.</h1>
                <h2 class="company-slogan">Ropa, accesorios para GYM, equipo de entrenamiento y mucho más...</h2>
            </div>
            <div class="home-computer-container">
                <img class="home-computer" src="https://cdn6.f-cdn.com/contestentries/1488191/22008392/5cb092b6b7d2d_thumb900.jpg" alt="a computer in dark with shadow" class="home-img">
            </div>
        </section>


        <?php echo $content; ?>

        <footer>
            <div class="container top-footer">
                <!-- footer item 1 -->
                <div class="footer-item">
                    <h2 class="footer-title">DIRECCIÓN <i class="bi bi-geo-alt-fill"></i></h2>
                    <div class="footer-items">
                        <h3>Dirección (Linea 1)</h3>
                        <h3>Sector</h3>
                        <h3>Ciudad</h3>
                    </div>
                </div>
                <!-- footer item 2 -->
                <div class="footer-item">
                    <h2 class="footer-title">ITEMS <i class="bi bi-cart"></i></h2>
                    <div class="footer-items">
                        <h3>Ropa</h3>
                        <h3>Equipamiento</h3>
                        <h3>GYM</h3>
                        <h3>Útiles</h3>
                        <h3>Encargos</h3>
                    </div>
                </div>
                <!-- footer item 3 -->
                <div class="footer-item">
                    <h2 class="footer-title">SOCIAL <i class="bi bi-chat-square-quote-fill"></i></h2>
                    <div class="footer-items">
                        <div class="social-btns">
                            <button class="social insta"><i class="bi bi-instagram"></i> Instagram</button>
                            <!-- <button class="social discord"><i class="bi bi-discord"></i> Discord</button> -->
                            <button class="social whatsapp"><i class="bi bi-whatsapp"></i> WhatsApp</button>
                        </div>
                    </div>
                </div>
                <!-- footer item 4 -->
                <!-- <div class="footer-item">
                    <h2 class="footer-title">INVESTMENT</h2>
                    <div class="footer-items">
                        <h3>Adipisicing elit.</h3>
                        <h3>Adipisicing elit.</h3>
                        <h3>Adipisicing elit.</h3>
                        <h3>Adipisicing elit.</h3>
                        <h3>Adipisicing elit.</h3>
                    </div>
                </div> -->
            </div>
            <div class="container end-footer">
                <div class="copyright">copyright © <?php echo date('Y') ?> • <b>Plantilla</b></div>
            </div>
        </footer>
        <script src="../build/js/bundle.min.js"></script>
</body>

</html>