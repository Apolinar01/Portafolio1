<?php
include_once "No_Recargar.php";
use phpMailer\PHPMailer\{PHPMailer,SMTP,Exception};
require 'PhpMailer/src/PHPMailer.php';
require 'PhpMailer/src/Exception.php';
require 'PhpMailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = array();
    if (empty($nombre)) {
        $errors[] = 'El campo nombre es obligatorio';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'La dirección de correo electrónico no es válida';
    }
    if (empty($subject)) {
        $errors[] = 'El campo mensaje es obligatorio';
    }
    if (empty($message)) {
        $errors[] = 'El campo Subject es obligatorio' ;
    }
   

    if (count($errors) == 0) {
        $msj =  "
        <head>".

        "<meta charset='UTF-8/'>".
        "<meta http-equiv='X-UA-Compatible' content='IE=edge'/>".
        "<meta name='viewport' content='width=device-width, initial-scale=1.0'/>".
        "<link rel='stylesheet'
          href='https://use.fontawesome.com/releases/v5.15.4/css/all.css'
          integrity='sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm'
          crossorigin='anonymous'
        />".
        "</head>".


        "<body>".
      "<h1>Hola soy: $nombre </h1>".
      "<h2>Mi Email es: $email </h2>".
      "<h3>El tema de contacto es: $subject </h3>".
        "<p>
          $message
        </p>".
      "</div>".
      
    "</div>".
  "</body>"
     
       ;

       $mail = new PHPMailer(true);
       try {
           $mail->SMTPDebug = SMTP::DEBUG_OFF;
           $mail->isSMTP();
           $mail->Host = 'smtp.gmail.com' and 'outlook.office365.com' and '2525, 587';
           $mail->SMTPAuth = true;
           $mail->Username = 'luis@apolinar.com.mx';
           $mail->Password = 'Toloverudarkness01#';
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
           $mail->Port = 465;

           $mail->setFrom('legan.01apolinar@gmail.com', 'Propuesta');
           $mail->addAddress($email);
           //$mail->addReplyTo('otro@dominio.com');

           $mail->isHTML(true);
           $mail->Subject = 'Formulario de contacto';
           $mail->Body = utf8_decode($msj);

           $mail->send();

           $respuesta = 'Correo enviado';
       } catch (Exception $e) {
           $respuesta = 'Mensaje ' . $mail->ErrorInfo;
       }
   }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/font-aweson.css">

</head>

<body>

    <div class="page-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>



    <div class="bg-circles">
        <div class="circle-1"></div>
        <div class="circle-2"></div>
        <div class="circle-3"></div>
    </div>
    <div class="overlay">

    </div>



    <div class="main hidden">

        <!-- Header Start-->

        <header class="header">
            <div class="container">
                <div class="row flex-end">
                    <button type="button" class="nav-toggler">
                        <span></span>
                    </button>
                    <nav class="nav">
                        <div class="nav-inner">
                            <ul>
                                <li><a href="#home" class="nav-item link-item">Home</a></li>
                                <li><a href="#about" class="nav-item link-item">About</a></li>
                                <li><a href="#portfolio" class="nav-item link-item">Portfolio</a></li>
                                <li><a href="#contact" class="nav-item link-item">Contact</a></li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
        </header>



        <!-- Header End-->



        <section class="home-section align-items-center" id="home">
            <div class="container">
                <div class="row align-items-center">
                    <div class="home-text">
                        <p>Hello, I'm</p>
                        <h1>Luis</h1>
                        <h2>Frontend Web developer</h2>
                        <a href="#about" class="btn link-item">More about me</a>
                        <a href="#portfolio" class="btn link-item">Portfolio</a>
                    </div>
                    <div class="home-img">
                        <div class="img-box">
                            <img src="img/perfil.png" alt="profile-img">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="about-section sec-padding " id="about">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>About me</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="about-img">
                        <div class="img-box">
                            <img src="img/about.png" alt="">
                        </div>

                    </div>
                    <div class="about-text">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi perferendis ullam iste
                            necessitatibus modi alias sunt ea blanditiis cupiditate, in aspernatur maxime a nemo
                            similique accusantium pariatur commodi deleniti odio?</p>
                        <h3>Skill</h3>
                        <div class="skills">
                            <div class="skill-item"><i class='bx bx-code-alt bx-sm'></i>Web Desing</div>
                            <div class="skill-item"><i class='bx bxl-wordpress bx-sm'></i>Web Desing with Wordpress
                            </div>
                            <div class="skill-item"> <i class='bx bx-mobile-alt bx-sm'></i>Responsive Desing</div>
                            <div class="skill-item"> <i class='bx bx-store bx-sm'></i> Ecommerce with Wordpress</div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="portfolio-section sec-padding" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2>Recent Work</h2>
                    </div>
                </div>
                <div class="row">
                    <!--Inicio-->
                    <div class="grid-row">
                        <div class="portfolio-item">
                            <div class="portfolio-item-thumbnail">
                                <img src="img/portfolio/1.jpg" alt="">
                                <h3 class="portfolio-item-title">personal porfolio website</h3>
                                <button type="button" class="btn view-project-btn">view project</button>
                                <div class="portfolio-item-details">
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ducimus corrupti
                                            quaerat sit magnam maiores. Laudantium numquam expedita doloribus hic
                                            dolorum
                                            necessitatibus? Porro quae provident atque eos magnam ut nulla.</p>
                                    </div>
                                    <div class="general-info">
                                        <ul>
                                            <li>Created - <span>4</span></li>
                                            <li>View Online -<span><a href="#" target="_blank">www.google.com</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->

                        <!--Inicio-->
                        <div class="portfolio-item">
                            <div class="portfolio-item-thumbnail">
                                <img src="img/portfolio/2.jpg" alt="">
                                <h3 class="portfolio-item-title">personal porfolio website</h3>
                                <button type="button" class="btn view-project-btn">view project</button>
                                <div class="portfolio-item-details">
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ducimus corrupti
                                            quaerat sit magnam maiores. Laudantium numquam expedita doloribus hic
                                            dolorum
                                            necessitatibus? Porro quae provident atque eos magnam ut nulla.</p>
                                    </div>
                                    <div class="general-info">
                                        <ul>
                                            <li>Created - <span>4</span></li>
                                            <li>View Online -<span><a href="#" target="_blank">www.google.com</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->

                        <!--Inicio-->
                        <div class="portfolio-item">
                            <div class="portfolio-item-thumbnail">
                                <img src="img/portfolio/3.jpg" alt="">
                                <h3 class="portfolio-item-title">personal porfolio website</h3>
                                <button type="button" class="btn view-project-btn">view project</button>
                                <div class="portfolio-item-details">
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ducimus corrupti
                                            quaerat sit magnam maiores. Laudantium numquam expedita doloribus hic
                                            dolorum
                                            necessitatibus? Porro quae provident atque eos magnam ut nulla.</p>
                                    </div>
                                    <div class="general-info">
                                        <ul>
                                            <li>Created - <span>4</span></li>
                                            <li>View Online -<span><a href="#" target="_blank">www.google.com</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->

                        <!--Inicio-->
                        <div class="portfolio-item">
                            <div class="portfolio-item-thumbnail">
                                <img src="img/portfolio/4.jpg" alt="">
                                <h3 class="portfolio-item-title">personal porfolio website</h3>
                                <button type="button" class="btn view-project-btn">view project</button>
                                <div class="portfolio-item-details">
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ducimus corrupti
                                            quaerat sit magnam maiores. Laudantium numquam expedita doloribus hic
                                            dolorum
                                            necessitatibus? Porro quae provident atque eos magnam ut nulla.</p>
                                    </div>
                                    <div class="general-info">
                                        <ul>
                                            <li>Created - <span>4</span></li>
                                            <li>View Online -<span><a href="#" target="_blank">www.google.com</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->

                        <!--Inicio-->
                        <div class="portfolio-item">
                            <div class="portfolio-item-thumbnail">
                                <img src="img/portfolio/5.jpg" alt="">
                                <h3 class="portfolio-item-title">personal porfolio website</h3>
                                <button type="button" class="btn view-project-btn">view project</button>
                                <div class="portfolio-item-details">
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ducimus corrupti
                                            quaerat sit magnam maiores. Laudantium numquam expedita doloribus hic
                                            dolorum
                                            necessitatibus? Porro quae provident atque eos magnam ut nulla.</p>
                                    </div>
                                    <div class="general-info">
                                        <ul>
                                            <li>Created - <span>4</span></li>
                                            <li>View Online -<span><a href="#" target="_blank">www.google.com</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->

                        <!--Inicio-->
                        <div class="portfolio-item">
                            <div class="portfolio-item-thumbnail">
                                <img src="img/portfolio/6.jpg" alt="">
                                <h3 class="portfolio-item-title">personal porfolio website</h3>
                                <button type="button" class="btn view-project-btn">view project</button>
                                <div class="portfolio-item-details">
                                    <div class="description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ducimus corrupti
                                            quaerat sit magnam maiores. Laudantium numquam expedita doloribus hic
                                            dolorum
                                            necessitatibus? Porro quae provident atque eos magnam ut nulla.</p>
                                    </div>
                                    <div class="general-info">
                                        <ul>
                                            <li>Created - <span>5</span></li>
                                            <li>View Online - <span><a href="#" target="_blank">ww.google.com</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End-->
                    </div>


                </div>
            </div>
        </section>

    </div>

    <!--Contact Section start-->
    <section class="contact-section sec-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Contact me</h2>
                </div>
            </div>
            <div class="row">
                <div class="contact-form">
                        <form action="index.php" method="POST" action="<?php  echo htmlentities($_SERVER['PHP_SELF'])?> " autocomplete="off">

                        <div class="row">
                            <div class="input-group">
                                <input type="text" class="input-control" id="nombre" name="nombre" placeholder="Nombre" required autofocus>
                            </div>
                            <div class="input-group">
                                <input type="text" class="input-control" id="email" name="email" placeholder="Correo electronico" required autofocus >
                            </div>

                            <div class="input-group">
                                <input type="text" class="input-control" id="subject" name="subject" placeholder="subject" required >
                             </div>

                            <div class="input-group">
                                <textarea placeholder="Message" class="input-control" id='message'  name="message" ></textarea>
                            </div>
                            <div class="submit-btn">
                                <button type="submit" name="submit" class="btn">Enviar</button>

                            </div>

                        </div>
                    </form>
                </div>
                <div class="contact-info">
                    <div class="contact-info-item">
                        <h3>Phone</h3>
                        <p>123456789</p>
                    </div>

                    <div class="contact-info-item">
                        <h3>follow me</h3>
                        <div class="social-links">
                            <a href="#" target="_blank"><i class="fab fa-facebook"></i> </a>
                            <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                            <a href="#" target="_blank"><i class="fab fa-instagram"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!--Contact Section start-->
    </div>






    <!--Portfolio item details popup Start-->
    <div class="portfolio-popup">
        <div class="pp-inner">
            <div class="pp-content">
                <div class="pp-header">
                    <button type="button" class="btn pp-close"><i class="fas fa-times"></i> </button>
                    <div class="pp-thumbnail">
                        <img src="img/portfolio/1.jpg" class="img" alt="">
                    </div>
                    <h3>ddddd</h3>
                </div>
                <div class="pp-body">
                    <h1>Hola</h1>



                </div>
            </div>
        </div>
    </div>




    <!--Portfolio item details popup End-->
    <script src="js/app.js"></script>
</body>

</html>