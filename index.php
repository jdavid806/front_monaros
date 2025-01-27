<?php
session_start();
include "../globalesMN.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $NAME_PRODUCTO ?></title>
  <link rel="icon" href="<?= $URL_FAVICON ?>" type="image/x-icon">

  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- SweetAlert2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
  <!-- Particles.js -->
  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

  <!-- OPEN SANS -->
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Orbitron:wght@400..900&display=swap"
    rel="stylesheet">
  <!-- OPEN SANS -->

  <!-- ANIMATE.CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- ANIMATE.CSS -->

  <style>
    /* Full screen particles container */

    #particles-js {
      position: absolute;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh !important;
      z-index: -1;
      /* Make sure particles are behind other content */
      overflow: hidden;
    }

    /* Ensure the container takes full height */
    .container {
      position: relative;
      z-index: 1;
    }

    * {
      font-family: "Open Sans" !important;
    }

    /* h1, h2, h3, h4, li, button{
          font-weight: normal !important;
        } */
  </style>
</head>

<body style="max-height: 100vh !important;height: 100vh !important;">
  <!-- Particles.js container -->
  <div id="particles-js"></div>

  <section style="background-color: transparent; max-height: 100vh !important;height: 100vh !important;">
    <div class="container py-3" style="height: 85% !important;">
      <div class="row d-flex justify-content-center align-items-center" style="height: 100% !important;">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="../medical_index.jpg" alt="login form" class="img-fluid"
                  style="border-radius: 1rem 0 0 1rem; width: 100%; height: 100%;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
                  <form action="index.php">
                    <div class="d-flex align-items-center justify-content-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <!-- <img src="../logoMedical2024.png" style="width: 100%;" alt="Logo Medicalsoft"> -->
                      <img src="../logo_monaros_sinbg.png" style="width: 65%;" alt="Logo Medicalsoft">
                    </div>

                    <h5 class="fw-normal mb-2 pb-3" style="letter-spacing: 1px;">Iniciar sesion</h5>

                    <div class="form-outline mb-2">
                      <input type="email" id="user" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Usuario</label>
                    </div>

                    <div class="form-outline mb-2">
                      <input type="password" id="pass" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example27">Contraseña</label>
                    </div>

                    <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" id="btn-enter" type="button">Acceder</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script type="module" src="./login/js/ajaxLogin.js"></script>

  <script src="./login/js/particles.min.js"></script>
  <script>
    particlesJS({
      "particles": {
        "number": {
          "value": 85,
          "density": {
            "enable": true,
            "value_area": 800
          }
        },
        "color": {
          "value": "#505A67"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#3A4552"
          },
          "polygon": {
            "nb_sides": 5
          },
          "image": {
            "src": "img/github.svg",
            "width": 100,
            "height": 100
          }
        },
        "opacity": {
          "value": 0.5,
          "random": false,
          "anim": {
            "enable": false,
            "speed": 1,
            "opacity_min": 0.1,
            "sync": false
          }
        },
        "size": {
          "value": 3,
          "random": true,
          "anim": {
            "enable": false,
            "speed": 40,
            "size_min": 0.1,
            "sync": false
          }
        },
        "line_linked": {
          "enable": true,
          "distance": 150,
          "color": "#000000",
          "opacity": 0.4,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 2.22388442605866,
          "direction": "none",
          "random": false,
          "straight": false,
          "out_mode": "out",
          "bounce": false,
          "attract": {
            "enable": false,
            "rotateX": 600,
            "rotateY": 1200
          }
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": false,
            "mode": "repulse"
          },
          "onclick": {
            "enable": true,
            "mode": "push"
          },
          "resize": true
        },
        "modes": {
          "grab": {
            "distance": 400,
            "line_linked": {
              "opacity": 1
            }
          },
          "bubble": {
            "distance": 400,
            "size": 40,
            "duration": 2,
            "opacity": 8,
            "speed": 3
          },
          "repulse": {
            "distance": 200,
            "duration": 0.4
          },
          "push": {
            "particles_nb": 4
          },
          "remove": {
            "particles_nb": 2
          }
        }
      },
      "retina_detect": true
    });
  </script>


</body>

</html>
<script>
  $(document).ready(function () {
    document.addEventListener('keydown', function (event) {
      if (event.code === 'Enter') {
        validarUsuario()
      }
    });
  });
</script>