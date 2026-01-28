<?php

session_start();
// Sicherheitscheck
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: ../html/login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Speedhunters - Exclusive Cars</title>
    <meta name="Description" content="Oldtimer Händler, Schwerpunkt : Exclusive Cars">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
    // Animations-Logik
    if (isset($_SESSION['show_login_animation']) && $_SESSION['show_login_animation'] === true) {
        echo '
                <div class="animation-container">
                    <h1 class="access-permitted-text">ACCESS PERMITTED</h1>
                </div>
            ';
        unset($_SESSION['show_login_animation']);
    }
    ?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark custom-navbar">
      <div class="container-fluid">
        <img
          class="navbar-brand"
          src="../images/logo.png"
          alt="brand"
          style="width: 50px"
        />
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavDarkDropdown"
          aria-controls="navbarNavDarkDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link active pirata-one-regular" href="../index.php"
                >HOME</a
              >
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle active pirata-one-regular"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                CARS
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li>
                  <a class="dropdown-item" href="../html/americancars.html">american</a>
                </li>
                <li>
                  <a class="dropdown-item" href="login.html">exclusive</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle active pirata-one-regular"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                COMMUNITY
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
                <li>
                  <a class="dropdown-item" href="../html/kontaktformular.html"
                    >get in touch</a
                  >
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
    <!-- Header Start -->
    <div class="titelfoto">
        <img style="width: 100%;" src="../images/exclusive-header.jpg">
    </div>
    <div id="carlogo">
        <img class="img-fluid" id="mb" src="../images/mb.png">
        <img class="img-fluid" id="corvette" src="../images/corvette.png">
        <img class="img-fluid" id="mustang" src="../images/mustang.png">
        <img class="img-fluid" id="jdm" src="../images/jdm.png">
        <img class="img-fluid" id="shelby" src="../images/shelby.png">
    </div>
    <!-- Header End -->
    <!-- Main Content Start -->
     <!-- Cars Start -->
      <h2 class="h2-homepage" style="margin-bottom: 55px">OUR MOST WANTED EXCLUSIVE CLASSICS</h2>
    <main class="container-produktseite">
        <article class="vehicle-page">
            <section class="vehicle-gallery">
                <div class="gallery-main-image">
                    <img src="../images/mustang1.jpg" alt="Corvette Vorderansicht" class="modal-trigger">
                </div>
                <div class="gallery-thumbnails">
                    <img src="../images/mustang4.jpg" alt="Mustang Heckansicht" class="modal-trigger">
                    <img src="../images/mustang2.jpg" alt="Mustang Innenraum" class="modal-trigger">
                    <img src="../images/mustang3.jpg" alt="Mustang Seitenansicht" class="modal-trigger">
                </div>
            </section>
            <section class="vehicle-info">
                <h2 class="vehicle-title">Ford Mustang</h2>
                <span class="price-request">Price on request</span>
                <div class="key-specs">
                    <span>07/1969</span><span>7.000 km</span><span>640 kW (871 HP)</span><span>Benzin</span>
                </div>
                <div class="vehicle-actions">
                    <a href="#kontakt" class="btn test-drive">test drive</a>
                    <a href="tel:+49123456789" class="btn make-call">make a call</a>
                </div>
            </section>
            <section class="vehicle-details">
                <div class="tabs">
                    <button class="tab-link active" data-tab="beschreibung">Description</button>
                    <button class="tab-link" data-tab="tech-daten">Technic Data</button>
                </div>
                <div class="tab-content active" data-tab-content="beschreibung">
                    <p class="playfair-display-uniquifier">I am selling a 1971 Chevrolet Corvette C3 Stingray from my personal collection, finished in its
                        original and very rare color, Brands Hatch Green. This is a sought-after model, the so-called
                        chrome model—the latter years featured chrome bumpers, which are now significantly more valuable
                        than later versions with plastic. The car features a powerful 5.7-liter small-block V8 (330 hp)
                        and a 4-speed manual transmission. After a complete but professional restoration—including
                        engine, chassis, interior, and paint—it remains in top condition. It has a removable targa top,
                        a great sound, and is in excellent mechanical and cosmetic condition. The car drives perfectly,
                        is designed for veteran brands, and is ready to go without any further investment. A true
                        collector's item with increasing value.
                    </p>
                </div>
                <div class="tab-content" data-tab-content="tech-daten">
                    <table>
                        <tr>
                            <td>body type:</td>
                            <td>coupe</td>
                        </tr>
                        <tr>
                            <td>power (kw/HP):</td>
                            <td>243/330</td>
                        </tr>
                        <tr>
                            <td>displacement (cm3³):</td>
                            <td>5733</td>
                        </tr>
                        <tr>
                            <td>cylinder:</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>number of doors:</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>steering:</td>
                            <td>left</td>
                        </tr>
                        <tr>
                            <td>gearbox:</td>
                            <td>manual</td>
                        </tr>
                        <tr>
                            <td>gears:</td>
                            <td>6</td>
                        </tr> 
                        <tr>
                            <td>drive</td>
                            <td>rear-wheel</td>
                        </tr>
                        <tr>
                            <td>fuel:</td>
                            <td>gasoline</td>
                        </tr>
                    </table>
                </div>
            </section>
        </article>
    </main>
                <!-- Modal img Start -->
        <div id="myModal" class="custom-modal">
            <span class="modal-close">&times;</span>
            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
            <img class="custom-modal-content" id="modalImg">
            <div id="caption"></div>
        </div>
        <!-- Modal img End -->
        <!-- Cars End -->
    <!-- Contact-Form car purchase Start -->
    <div class="contact-form-car-purchase-wrapper">
      <section id="kontakt" class="contact-form-section">
        <h3>GOT INTERESTED?</h3>
        <p>Fill out the form and we will get in touch with you!</p>
        <form class="contact-form" action="../php/probefahrt.php" method="POST">
          <input type="text" name="name" placeholder="name" required />
          <input
            type="email"
            name="email"
            placeholder="e-mail adress"
            required
          />
          <textarea
            name="message"
            rows="5"
            placeholder="your message"
          ></textarea>
          <button type="submit" class="btn subscribe">send inquiry</button>
        </form>
      </section>
    </div>
    <!-- Contact-Form car purchase End -->
         <!-- Main Content End -->
    <!-- Footer Start -->
    <footer class="footer-background">
      <div class="footer">
        <div class="social-icons text-center mb-3">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-google"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
        <div class="newsletter text-center mb-4">
          <form
            class="d-flex flex-column flex-md-row justify-content-center align-items-center gap-2"
          >
            <label for="newsletter-email" class="form-label mb-0"
              >Sign up for our newsletter</label
            >
            <input
              type="email"
              id="newsletter-email"
              class="form-control newsletter-sign-up-box"
              placeholder="Enter your email"
            />
            <button type="submit" class="btn subscribe">Subscribe</button>
          </form>
        </div>
        <div class="copyright">© 2025 Copyright: Bayram Karahan</div>
      </div>
    </footer>
    <!-- Footer End -->
        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
          crossorigin="anonymous"
        ></script>
        <script>
            const animationContainer = document.querySelector('.animation-container'); // Sucht im gesamten HTML-Dokument nach dem ersten Element, das die CSS-Klasse "animation-container" besitzt. Dieses Element wird dann in der Konstante `animationContainer` gespeichert. Zum Beispiel könnte das ein Div-Element für eine Ladeanimation sein: <div class="animation-container">...</div>
            if (animationContainer) { // Überprüft, ob das Element mit der Klasse "animation-container" überhaupt gefunden wurde. Dies verhindert Fehler, falls das Element im HTML nicht existiert.
                setTimeout(() => { // Startet einen Timer, der eine bestimmte Funktion nach einer festgelegten Zeit ausführt.
                    animationContainer.style.display = 'none'; // Diese Funktion wird nach Ablauf des Timers ausgeführt. Sie setzt die CSS-Eigenschaft `display` des gefundenen `animationContainer`-Elements auf `none`.  Das hat zur Folge, dass das Element und all sein Inhalt ausgeblendet werden (es nimmt keinen Platz mehr im Layout ein).
                }, 4000); // Die Zeit, nach der die Funktion ausgeführt werden soll, in Millisekunden. 4000 Millisekunden entsprechen 4 Sekunden.
            }
        </script> <!-- Beendet den JavaScript-Block -->
        <script src="../js/my-website.js"></script>
</body>
</html>