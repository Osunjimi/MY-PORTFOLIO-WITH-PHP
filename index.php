<?php
include 'connect.php';

$error = [];

if (isset($_POST['submit'])) {
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $email = htmlspecialchars($_POST['email']);
  $phonenumber = htmlspecialchars($_POST['phonenumber']);
  $usermessage = htmlspecialchars($_POST['usermessage']);

  $error = [];
  if (empty($firstname) && empty($lastname) && empty($email) && empty($phonenumber) && empty($usermessage)) {
    echo "<div class='alert alert-danger all-fields mx-lg-5 mx-md-0 mx-0' role='alert'>Please fill in all fields</div>";
  }

  if (empty($firstname)) {
    $error['firstname'] = "First name is required";
  }
  if (empty($lastname)) {
    $error['lastname'] = "Last name is required";
  }
  if (empty($email)) {
    $error['email'] = "Email is required";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = "Invalid email format";
  }
  if (empty($phonenumber)) {
    $error['phonenumber'] = "Phone number is required";
  } elseif (!preg_match('/^[0-9]{11,}$/', $phonenumber)) {
    $error['phonenumber'] = "Invalid phone number format";
  }
  if (empty($usermessage)) {
    $error['usermessage'] = "Message is required";
  }
  if (empty($error)) {
   
    $sql = "INSERT INTO `messages`(`firstname`, `lastname`, `email`, `phonenumber`, `usermessage`) VALUES ('$firstname','$lastname','$email','$phonenumber','$usermessage')";
  
    $result = mysqli_query($connect, $sql);
  
    if ($result) {
      $myNumber = '2349160359996';
    
      $whatsAppMessage = "Hi, I'm $firstname $lastname\nwith email: $email\nPhone: $phonenumber\n$usermessage";
      $encodedMessage = urlencode($whatsAppMessage);
    
      header("Location: https://wa.me/$myNumber?text=$encodedMessage");
      exit;
    } else{
      echo "<div class='alert alert-danger' role='alert'>Error: " . mysqli_error($connect) . "</div>";
    }
    
  }
}


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Osunjimi Ibrahim</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Red+Hat+Text:ital,wght@0,300..700;1,300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e3cc93d180.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./IMAGES/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
 
   <div class="container">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="./IMAGES/logo.png" alt="HB"></a>
          <button class="btn-nav d-flex align-items-center justify-content-center border-0 d-lg-none d-md-block d-block" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <div class="fas fa-bars text-white border-0 fs-2"></div>
          </button>
            
            
             <div class="collapse navbar-collapse ms-lg-5" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0 text-center me-lg-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#resume">Resume</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                  </ul>
                  <div class="d-flex ms-auto">
                    <a href="#contact" class="btn btn-primary contact-me">Contact Me</a>
                  </div>
                </div>
                
        </div>
    </nav>
    

    <section class="hero d-flex align-items-center my-5" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h5>Hello, I'm</h5>
                    <h1 class="text-light"><strong>Osunjimi Ibrahim</strong></h1>
                    <h1 class="text-primary intro"><strong id="typed-text">A Full-Stack Web Developer </strong></h1>
                    <p class="intro-text">
                        I design and develop seamless, high-performance web applications that enhance user experience and drive business growth. With expertise in both front-end and back-end development, I create scalable, secure, and efficient digital solutions.
                    </p>
                    <div class="socials d-flex align-items-center justify-content-center justify-content-lg-start">
                        <a href="./OSUNJIMI-IBRAHIM-OLAYEMI-FlowCV-Resume-20250407.pdf" class="btn btn-primary me-3 download rounded-5" download="Osunjimi_Ibrahim_Resume">Download Resume <i class="fas fa-download"></i></a>
                        <div class="social-handle">
                            <a href="https://github.com/Osunjimi" class="btn btn-outline-light me-2 rounded-5" target="_blank"><i class="fab fa-github"></i></a>
                            <a href="https://ng.linkedin.com/in/ibrahim-osunjimi-5b4148341" target="_blank" class="btn btn-outline-light me-2 rounded-5"><i class="fab fa-linkedin"></i></a>
                            <a href="https://x.com/High_Bee345?t=BjFtTKo47DnJXyC9lOCxWw&s=09" target="_blank" class="btn btn-outline-light rounded-5"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.instagram.com/high_bee345?igsh=MTI5YmsyNWUzNzZ5Yw==" target="_blank" class="btn btn-outline-light rounded-5 m-lg-2"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg my-pics d-flex justify-content-end" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                    <img src="./IMAGES/High Bee.jpg" alt="Osunjimi Ibrahim" class="">
                </div>
            </div>
        </div>
    </section>

    <div class="down d-flex justify-content-between align-items-center px-2 rounded-3">
        <p><span class="big-num">8Month+</span> of Full-Stack development</p>
        <p><span class="big-num">5+</span> Projects built while learning & growing</p>
        <p>Eager to Collaborate and solve real-world problems</p>
    </div>
    
   </div>
    
   <section class="service py-5" id="services" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
    <h1>My Services</h1>
    <!-- <p class="text-decoration-underline service-topic" style="text-underline-offset: 4px;">Bringing ideas to life with creativity, functionality, and a user-focused approach.</p> -->
    <p class="service-topic">Bringing ideas to life with creativity, functionality, and a user-focused approach.</p>
    <div class="services-container">
        <div class="service-card">
            <div class="service-title">Web Design</div>
            <div class="service-description">I create simple visually appealing website designs that prioritize usability and a clean user experience.</div>
        </div>
        <div class="service-card">
            <div class="service-title">Web Development</div>
            <div class="service-description">I build structured and interactive websites using modern web technologies for smooth user interactions.</div>
        </div>
        <div class="service-card">
            <div class="service-title">Responsive Design</div>
            <div class="service-description">I ensure websites adapt seamlessly to different screen sizes, from desktops to mobile devices.</div>
        </div>
        <div class="service-card">
            <div class="service-title">Graphic Design</div>
            <div class="service-description">I craft impactful designs that elevate brand identity and communication.</div>
        </div>
    </div>
   </section>
   <section class="container text-center mb-5">
    <h1 data-aos="zoom-in">My Recent Works</h1>
    <p data-aos="zoom-in">Explore some of my latest projects, combining creativity and technical expertise.</p>

    <div class="projects"data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
        <div class="project-card">
            <a href="https://foreign-food-website.vercel.app/" target="_blank">
                <img src="./IMAGES/ecommerce.png" alt="Project 1">
                <div class="project-title">Foreign food website website</div>
            </a>
        </div>

        <div class="project-card">
            <a href="https://weather-app-wine-ten-74.vercel.app/" target="_blank">
                <img src="./IMAGES/weather-app.png" alt="Project 2">
                <div class="project-title">Weather forecast app</div>
            </a>
        </div>

        <div class="project-card">
            <a href="https://uber-website-henna.vercel.app/index.html" target="_blank">
                <img src="./IMAGES/uber.png" alt="Project 3">
                <div class="project-title">Uber website</div>
            </a>
        </div>
    </div>
   </section>

   <div class="container experience" id="resume">
    <div class="section"id="services" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
        <h2><i class="fa-solid fa-award fs-2"></i><strong> My Experience</strong></h2>
        <div class="item" data-aos="zoom-in-left">
            <div class="year"><strong>July,2024 - Dec,2024</strong></div>
            <div class="role">Student</div>
            <div class="company">BuggyBillions, Nigeria</div>
        </div>
        <div class="item" data-aos="zoom-in-right">
            <div class="year"><strong>Jan,2025 - Present</strong></div>
            <div class="role">Intern</div>
            <div class="company">Sunmmence Solutions, Nigeria</div>
        </div>
    </div>

    <div class="section" data-aos="zoom-in-down">
        <h2><i class="fa-solid fa-graduation-cap fs-2"></i><strong> My Education</strong></h2>
        <div class="item">
            <div class="year"><strong>2020 - Present</strong></div>
            <div class="role">Computer Science</div>
            <div class="company">LAUTECH, Nigeria</div>
        </div>
    </div>
</div>

<section class="skills-section" id="skills">
    <h1 data-aos="zoom-in">My Skills</h1>
    <p data-aos="zoom-in">A glimpse into the tools I use to build sleek, functional, and innovative digital solutions.</p>

    <div class="skills-grid" data-aos="zoom-out-up">
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/html-5-svgrepo-com.svg" alt="HTML5" />
        <div class="skill-name">HTML5</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/css-svgrepo-com.svg" alt="CSS3" />
        <div class="skill-name">CSS3</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/bootstrap-4-logo-svgrepo-com.svg" alt="Bootstrap" />
        <div class="skill-name">Bootstrap5</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/javascript-svgrepo-com.svg" alt="JavaScript" />
        <div class="skill-name">JavaScript</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/php-svgrepo-com.svg" alt="php" />
        <div class="skill-name">php</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/mysql-logo-svgrepo-com.svg" alt="MySQL" />
        <div class="skill-name">MySQL</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/git-svgrepo-com.svg" alt="git" />
        <div class="skill-name">git</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/github-142-svgrepo-com.svg" alt="github" />
        <div class="skill-name">github</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/photoshop-cc-logo-svgrepo-com.svg" alt="Photoshop" />
        <div class="skill-name">Photoshop</div>
      </div>
      <div class="skill-card">
        <img src="./IMAGES/SKILLS/corel-draw-svgrepo-com.svg" alt="CorelDraw" />
        <div class="skill-name">CorelDraw</div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6">
            <div class="contact-heading" data-aos="flip-up">
                <h2 class="display-6 fw-bold text-primary">Let's Work Together!</h2>
                <p class="text-light mb-4">If you have an application you are interested in developing, a feature that you need built or a project that needs coding. I'd love to help with it!</p>
            </div>
          <form method="POST" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
            <div class="row g-3">
              <div class="col-md-6">
                <input type="text" class="form-control form-control-lg" name="firstname" placeholder="First Name">
                <div class="error"><?php echo isset($error['firstname']) ? $error['firstname'] : ''; ?></div>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control form-control-lg" name="lastname" placeholder="Last Name">
                <div class="error"><?php echo isset($error['lastname']) ? $error['lastname'] : ''; ?></div>
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control form-control-lg" name="email" placeholder="Email Address">
                <div class="error"><?php echo isset($error['email']) ? $error['email'] : ''; ?></div>
              </div>
              <div class="col-md-6">
                <input type="tel" class="form-control form-control-lg" name="phonenumber" placeholder="Phone Number">
                <div class="error"><?php echo isset($error['phonenumber']) ? $error['phonenumber'] : ''; ?></div>
              </div>
              <div class="col-12">
                <textarea class="form-control" rows="4" name="usermessage" placeholder="Your Message"></textarea>
                <div class="error"><?php echo isset($error['usermessage']) ? $error['usermessage'] : ''; ?></div>
              </div>
              <div class="col-12">
                <button type="submit" name="submit" class="btn btn-lg px-5 text-white h-auto btn-contact ">Get in touch</button>
              </div>
            </div>
          </form>
        </div>
  
        <div class="col-lg">
          <div class="h-auto d-flex flex-column justify-content-center mt-lg-5">
            <div class="d-flex align-items-start mb-4" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <div class="icon-box me-3"><i class="fas fa-phone-alt"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Phone</h5>
                <p class="mb-0">+234 916 076 1652</p>
              </div>
            </div>
            <div class="d-flex align-items-start mb-4" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <div class="icon-box me-3"><i class="fas fa-envelope"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Email</h5>
                <p class="mb-0">osunjimibrahim123@gmail.com</p>
              </div>
            </div>
            <div class="d-flex align-items-start mb-4" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500">
              <div class="icon-box me-3"><i class="fas fa-map-marker-alt"></i></div>
              <div>
                <h5 class="fw-bold mb-1">Address</h5>
                <p class="mb-0">41, Association Avenue, Oko-Agbon Ayanre, Ibiye, Lagos State.</p>
              </div>
            </div>
            <div class="mt-5 contactme-links" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h6 class="fw-bold text-primary mb-2">Connect with Me</h6>
                <div class="social-handle">
                  <a href="https://github.com/Osunjimi" class="btn btn-outline-light me-2 rounded-5" target="_blank"><i class="fab fa-github"></i></a>
                  <a href="https://ng.linkedin.com/in/ibrahim-osunjimi-5b4148341" target="_blank" class="btn btn-outline-light me-2 rounded-5"><i class="fab fa-linkedin"></i></a>
                  <a href="https://x.com/High_Bee345?t=BjFtTKo47DnJXyC9lOCxWw&s=09" target="_blank" class="btn btn-outline-light rounded-5"><i class="fa-brands fa-x-twitter"></i></a>
                  <a href="https://www.instagram.com/high_bee345?igsh=MTI5YmsyNWUzNzZ5Yw==" target="_blank" class="btn btn-outline-light rounded-5 m-lg-2"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </section>
<footer class="text-center text-white py-4 mt-5">
    <div class="container">
      <a class="d-flex justify-content-center mb-2"data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
        <div class="rounded-circle footer-logo text-white d-flex align-items-center justify-content-center">
          <div class="navbar-brand" href="#"><img src="./IMAGES/logo.png" alt="HB"></div>
      </div>
      </a>
  
      <ul class="nav justify-content-center mb-3 d-flex gap-5">
        <li class="nav-item"><a href="#home" class="nav-link px-2 text-white">Home</a></li>
        <li class="nav-item"><a href="#services" class="nav-link px-2 text-white">Services</a></li>
        <li class="nav-item"><a href="#resume" class="nav-link px-2 text-white">Resume</a></li>
        <li class="nav-item"><a href="#skills" class="nav-link px-2 text-white">Skills</a></li>
        <!-- <li class="nav-item"><a href="#testimonials" class="nav-link px-2 text-white">Testimonials</a></li> -->
        <li class="nav-item"><a href="#contact" class="nav-link px-2 text-white">Contact</a></li>
      </ul>
  
      <p class="text-light mb-0" style="letter-spacing: 1px;">
        © 2025 <span class="text-primary fw-bold">High Bee</span>
      </p>
    </div>
  </footer>
  
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
     <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>