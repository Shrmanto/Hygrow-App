<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Hygrowth</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="{{asset('landing/css/bootstrap.min.css')}} " rel="stylesheet">
        <link href="{{asset('landing/css/bootstrap-icons.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}">

        <link href="{{asset('landing/css/aos.css')}}" rel="stylesheet">

        <link href="{{asset('landing/css/templatemo-nomad-force.css')}}" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('landing2/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('landing2/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('landing2/assets/css/style.css')}}" rel="stylesheet"> 

        <!-- bg tulisan-->
    <style>
        .backgroundGambar{
            background: url("{{asset('landing/images/img0.png')}}");
            width: 100%;
            height: 650px;
            background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
            -ms-background-size: cover;
            -moz-background-size: cover;
            position: relative;
	        height: 678px;
        }
        .tempatText{
            position: absolute;
            width: 100%;
            padding: 40px;
            background-color: rgba(52, 73, 94,0.5);
            color: #ffff;
            font-size: 35px;
            display: none;
        }
    </style>
    </head>
    <body>
    
        <main>
            <!-- ======= Header Video ======= -->
            <section class="hero" id="hero">
                <div class="heroText">
                    <h1 class="text-white mt-5 mb-lg-4" style="font-family: verdana;" data-aos="zoom-in" data-aos-delay="800">
                        Hygrow
                    </h1>

                    <p class="text-secondary-white-color" style="font-family: garamond;" data-aos="fade-up" data-aos-delay="1000">
                        Menyediakan semua yang anda butuhkan dalam hal hidroponik 
                    </p>
                </div>

                <div class="videoWrapper">
                    <video autoplay="" loop="" muted="" class="custom-video" poster="videos/792bd98f3e617786c850493560e11c45.jpg">
                        <source src="{{asset('landing/videos/landing1.mp4')}}" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="overlay"></div>
            </section>
            <!-- ======= End Header Video ======= -->

            <!-- ======= Navbar ======= -->
            <nav id="navbar" class="navbar navbar-expand-lg bg-light shadow-lg">
                <div class="container">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('landing/images/Logo.png')}}" alt="" height="50" width="150">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div id="navbarNav" class="collapse navbar-collapse" >
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#hero">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#portfolio">HyGMart</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#news">Invest</a>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle bg-success" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Get Started
                        </button>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('login')}}">Sign In</a></li>
                        <li><a class="dropdown-item" href="{{route('register')}}">Sign Up</a></li>
                        <div class="dropdown-divider"></div>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                     </ul>
                    </div>
                     </ul>
                    </div>
                </div>
            </nav><!-- ======= End Navbar ======= -->

            <!-- ======= About Us ======= -->
            <section id="about" class="section-padding pb-0">
                    <div class="container" data-aos="fade-up">
                        <header class="section-header">
                        <h2 style="text-align:center;">About<img src="{{asset('landing/images/Logo.png')}}" alt="" width="250px" style="float:center;" /></h2>
                            <!--<h2 class="text-center">About</h2>
                            <img src="{{asset('landing/images/Logo.png')}}" class="img-fluid" alt="" width="300px">-->
                        </header>
                    </div>
            </section>
            <section class="section-padding pb-0" id="about">
                <div class="row content">
                    <div class="col-md-5" data-aos="fade-up">
                        <img src="{{asset('landing/images/collab.png')}}" class="img-fluid" alt="" width="350px">
                    </div>

                    <div class="col" data-aos="fade-up">
                        <!-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>-->
                        <blockquote class="blockquote">
                            <p>
                            Hygrow merupakan sebuah sistem berbasis website yang akan membantu para pelaku usaha di bidang pertanian hidroponik. 
                            Sistem ini diciptakan guna menjawab kebutuhan dari pelaku usaha hidroponik, kebutuhan tersebut yaitu sebuah sistem yang
                            mana membantu para petani hidroponik untuk mencari investor untuk mengembangkan pertanian hidroponik, selain untuk
                            mencari investor sistem ini juga menyediakan kebutuhan petani hidroponik meliputi bibit, sistem pertanian hidroponik,
                            dan juga nutrisi untuk tanaman hidroponik. 
                            </p>
                            <p>
                            Alasan dari pembuatan sistem ini sendiri dikarenakan kurangnya informasi terkait bagaimana cara mengembangkan pertanian hidroponik,
                            berapa modal yang diperlukan, dan bagaimana cara merawat tanaman tanaman hidroponik sehingga memiliki nilai jual yang tinggi.
                            Penerapan sistem ini diharapkan dapat memenuhi kebutuhan pasar terkait hasil pertanian hidroponik yang akhir akhir ini sangat diminati
                            di pasaran dan untuk mempersiapkan dengan petani petani konvensional untuk bersiap bertanam menggunakan hidroponik.
                            </p>
                        </blockquote>
                    </div>
                </div>
            </section><!-- ======= End About Us ======= -->

            <!-- ======= Option ======= -->
            <section id="get-started" class="padd-section text-center">
                <div class="container" data-aos="fade-up">
                    <div class="section-title text-center">
                        <h2>simple systeme fordiscount </h2>
                        <p class="separator">Integer cursus bibendum augue ac cursus .</p>

                    </div>
                </div>

                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="feature-block">
                                <img src="{{asset('landing2/assets/img/online-shop.png')}}" alt="img">
                                <h4>HyGMart</h4>
                                <p>Menyediakan kebutuhan hidroponik anda</p>
                                <a href="#">selengkapnya</a>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                            <div class="feature-block">
                                <img src="{{asset('landing2/assets/img/investment.png')}}" alt="img">
                                <h4>HyGrovest</h4>
                                <p>Untuk anda yang ingin berinvestasi hidroponik</p>
                                <a href="#">selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- bg tulis-->
            <section class="section-padding" id="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="background">
                                <div class="backgroundGambar d-flex">
                                    <div class="tempatText text-center align-self-center">Gambar Pemandangan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <script>
            $(document).ready(function(){
                $(".backgroundGambar").hover(function(){
                    $(".tempatText").slideToggle("slow")
                })
            })
            </script>
            </section>
            <section class="section-padding" id="portfolio">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">Portfolio</h2>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="portfolio-thumb mb-5" data-aos="fade-up">
                                <a href="{{asset('landing/images/portfolio/visuals-Y4qzW3AsvqI-unsplash.jpeg')}}" class="image-popup">
                                    <img src="{{asset('landing/images/portfolio/visuals-Y4qzW3AsvqI-unsplash.jpeg')}}" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">Effortless</h4>

                                    <p class="text-danger">Branding</p>
                                </div>
                            </div> 

                            <div class="portfolio-thumb" data-aos="fade-up">
                                <a href="{{asset('landing/images/portfolio/severin-candrian-nn3uIZqmUtE-unsplash.jpeg')}}" class="image-popup">
                                    <img src="{{asset('landing/images/portfolio/severin-candrian-nn3uIZqmUtE-unsplash.jpeg')}}" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">Health technology</h4>

                                    <p class="text-success">Art Direction</p>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="portfolio-thumb mt-5 mt-lg-0 mb-5" data-aos="fade-up">
                                <a href="{{asset('landing/images/portfolio/tyler-nix-Y1drF0Y3Oe0-unsplash.jpeg')}}" class="image-popup">
                                    <img src="{{asset('landing/images/portfolio/tyler-nix-Y1drF0Y3Oe0-unsplash.jpeg')}}" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">Maki</h4>

                                    <p class="text-warning">Website</p>
                                </div>
                            </div> 

                            <div class="portfolio-thumb" data-aos="fade-up">
                                <a href="{{asset('landing/images/portfolio/thought-catalog-gv-T-OjLe4c-unsplash.jpeg')}}" class="image-popup">
                                    <img src="{{asset('landing/images/portfolio/thought-catalog-gv-T-OjLe4c-unsplash.jpeg')}}" class="img-fluid portfolio-image" alt="">
                                </a>

                                <div class="portfolio-info">                     
                                    <h4 class="portfolio-title mb-0">The gig economy</h4>

                                    <p class="text-info">Graphic</p>
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </section>

            <section class="news section-padding" id="news">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="mb-5 text-center" data-aos="fade-up">News & Events</h2>
                        </div>

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="news-thumb" data-aos="fade-up">
                                <a href="news-detail.html" class="news-image-hover news-image-hover-warning">
                                    <img src="{{asset('landing/images/news/caroline-lm-uqveD8dYPUM-unsplash.jpg')}}" class="img-fluid large-news-image news-image" alt="">
                                </a>

                                <div class="news-category bg-warning text-white">News</div>
                                
                                <div class="news-text-info">
                                    <h5 class="news-title">
                                        <a href="news-detail.html" class="news-title-link">The rise of the gig economy spells the end for these workers the old system</a>
                                    </h5>

                                    <span class="text-muted">22 hours ago</span>
                                </div>
                            </div> 
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                                <div class="news-top w-100">
                                    
                                    <a href="news-detail.html" class="news-image-hover news-image-hover-primary">
                                        <img src="{{asset('landing/images/news/jean-philippe-delberghe-MmanXAs1sKw-unsplash.jpeg')}}" class="img-fluid news-image" alt="">
                                    </a>

                                    <div class="news-category bg-primary text-white">Events</div>
                                </div>
                                
                                <div class="news-bottom w-100">
                                    <div class="news-text-info">
                                        <h5 class="news-title">
                                            <a href="news-detail.html" class="news-title-link">Job Opportunities: Digital, Marketing</a>
                                        </h5>

                                        <div class="d-flex flex-wrap">
                                            <span class="text-muted me-2">
                                                <i class="bi-geo-alt-fill me-1 mb-2 mb-lg-0"></i>
                                                Alaska,
                                            </span>

                                            <span class="text-muted">August 6, 2021</span>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="news-thumb news-two-column d-flex flex-column flex-lg-row" data-aos="fade-up">
                                <div class="news-top w-100" data-aos="fade-up">
                                    
                                    <a href="news-detail.html" class="news-image-hover news-image-hover-success">
                                        <img src="{{asset('landing/images/news/maria-stewart-p4tj0g-_aMM-unsplash.jpeg')}}" class="img-fluid news-image" alt="">
                                    </a>

                                    <div class="news-category bg-success text-white">News</div>
                                </div>
                                
                                <div class="news-bottom w-100">
                                    <div class="news-text-info">
                                        <h5 class="news-title">
                                            <a href="news-detail.html" class="news-title-link">What happened to new viral video?</a>
                                        </h5>

                                        <span class="text-muted">6 days ago</span>
                                    </div>
                                </div>
                            </div> 
                        </div>

                    </div>
                </div>
            </section>

            <section class=" contact section-padding" id="contact">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-7 col-12 mx-auto">

                            <h2 class="mb-4 text-center" data-aos="fade-up">Dont' be shy, write to us</h2>

                            <form action="#" method="post" class="contact-form" role="form" data-aos="fade-up">

                                <div class="row">
                                    
                                    <div class="col-lg-6 col-6">
                                        <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>

                                        <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required>
                                    </div>

                                    <div class="col-lg-6 col-6">
                                        <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>

                                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required>
                                    </div>

                                    <div class="col-12 my-4">
                                        <label for="message" class="form-label">How can we help?</label>

                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Tell us about the project" required></textarea>
                                        
                                    </div>

                                    <div class="col-12">
                                        <label for="services" class="form-label">Services<sup class="text-danger">*</sup></label>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox1" name="checkbox1" class="form-check-input">

                                            <label class="form-check-label" for="checkbox1">Branding</label>
                                          </div>
                                    </div>

                                    <div class="col-lg-4 col-12 my-2 my-lg-0">
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox2" name="checkbox2" class="form-check-input">

                                            <label class="form-check-label" for="checkbox2">Digital Experiences</label>
                                          </div>
                                    </div>

                                    <div class="col-lg-4 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" class="form-check-input">

                                            <label class="form-check-label" for="checkbox3">Web Development</label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-12 mx-auto mt-5">
                                    <button type="submit" class="form-control">Send Message</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>

            <section class="google-map">
                <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" class="map-iframe" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-12">
                        <h5 class="text-white">
                            <i class="bi-geo-alt-fill me-2"></i>
                            State of Rio de Janeiro, Brazil
                        </h5>

                        <a href="mailto:info@company.com" class="custom-link mt-3 mb-5">
                            info@company.com
                        </a>
                    </div>

                    <div class="col-6">
                        <p class="copyright-text mb-0">Copyright © Nomad Force 2021 
                        
                        <br><br>Design: <a href="https://templatemo.com/page/1" target="_parent">TemplateMo</a></p>
                    
                    </div>

                    <div class="col-lg-3 col-5 ms-auto">
                        <ul class="social-icon">
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                        </ul>
                    </div>

                </div>
            </section>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="{{asset('landing/js/jquery.min.js')}}"></script>
        <script src="{{asset('landing/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('landing/js/jquery.sticky.js')}}"></script>
        <script src="{{asset('landing/js/aos.js')}}"></script>
        <script src="{{asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('landing/js/magnific-popup-options.js')}}"></script>
        <script src="{{asset('landing/js/scrollspy.min.js')}}"></script>
        <script src="{{asset('landing/js/custom.js')}}"></script>
        <!-- Vendor JS Files -->
        <script src="{{asset('landing2/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
        <script src="{{asset('landing2/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('landing2/assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('landing2/assets/js/main.js')}}"></script> 
    </body>
</html>