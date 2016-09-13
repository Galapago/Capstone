<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Galapago</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap_index/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap_index/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="bootstrap_index/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="bootstrap_index/css/creative.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand">
                    <img alt="Galapago" src="/css/img/turtle-logo.png">
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">GalapaGo</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#whygalapago">Why GalapaGo?</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">How GalapaGo Works</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#ourteam">Our Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a type="button" class="dropdown-toggle page-scroll" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Login <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/patient/login">Patient</a></li>
                            <li><a href="/physicians/login">Physician</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ action('Auth\AuthController@getRegister')}}">New User?</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1 id="homeHeading">GalapaGo  <img alt="Galapago" src="/css/img/turtle-logo.png"></h1>
                <p>For life on the go.</p>
                <hr>
                <p>Fostering better communication between patients, doctors and clinics.</p>
                <a href="#whygalapago" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
            </div>
        </div>
    </header>

    <section id="whygalapago">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Why GalapaGo?</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-user-md text-primary sr-icons"></i>
                        <h3>Helping Doctors</h3>
                        <p class="text-muted">Freeing doctors to do what they do best - help their patients achieve life-changing goals.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-users text-primary sr-icons"></i>
                        <h3>Putting Patients First</h3>
                        <p class="text-muted">More direct contact between doctors and patients means better outcomes.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-hospital-o text-primary sr-icons"></i>
                        <h3>Increased Efficiency</h3>
                        <p class="text-muted">Our tech increases clinical efficiency, patient satisfaction and outcomes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">How GalapaGo Works</h2>
                    <hr class="primary">
                    <h2><small>Simple, Easy & Effective</small></h2>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <img class="text-primary sr-icons" src="/css/img/one.png">
                    <div class="service-box">
                        <img class="text-primary sr-icons" src="/css/img/newuser.png">
                        <h3>Easy Signup</h3>
                        <p class="text-muted">Singup on GalapaGo is simple and painless.</p>
                    </div>    
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <img class="text-primary sr-icons" src="/css/img/two.png">
                    <div class="service-box">
                        <img class="text-primary sr-icons" src="/css/img/form.png">
                        <h3>Submit Doctor's Form</h3>
                        <p class="text-muted">Complete and submit your doctor's personal form in matter of minutes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <img class="text-primary sr-icons" src="/css/img/three.png">
                    <div class="service-box">
                        <img class="text-primary sr-icons" src="/css/img/magnifyglass.png">
                        <h3>Physician Review</h3>
                        <p class="text-muted">Once received, your physician is able to create a personalized care roadmap.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <img class="text-primary sr-icons" src="/css/img/four.png">
                    <div class="service-box">
                        <img class="text-primary sr-icons" src="/css/img/diagnostic.png">
                        <h3>Diagnostic Toolbox</h3>
                        <p class="text-muted">Our portal allows doctors an overview of their patients based on quantifiable data.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <section id="ourteam">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Meet Team GalapaGo</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <img class="text-primary sr-icons .img-responsive" src="/css/img/brandondinesman.jpg">
                        <h3>Brandon Dinesman</h3>
                        <p class="text-muted">GalapaGo is Brandon's brainchild. He takes on back-end customization, data manipulation, styling, planning, and general direction.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <img class="text-primary sr-icons .img-responsive" src="/css/img/johnhernandez1.jpg">
                        <h3>John Hernandez</h3>
                        <p class="text-muted">John specializes in back-end frameworks, data management, and website layout and design.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="service-box">
                        <img class="text-primary sr-icons .img-responsive" src="/css/img/TylerWarren1.jpg">
                        <h3>Tyler Warren</h3>
                        <p class="text-muted">Tyler is responsible for dynamic responsiveness, page customization, database design and creation, and javascript animation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="http://startbootstrap.com/template-overviews/creative/" class="btn btn-default btn-xl sr-button">Download Now!</a>
            </div>
        </div>
    </aside> -->

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>800-866-8256</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">contact@galapago.dev</a></p>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <i class="fa fa-twitter fa-3x sr-contact"></i>
                    <p>@galapagomedical</p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="bootstrap_index/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap_index/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="bootstrap_index/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="bootstrap_index/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="bootstrap_index/js/creative.min.js"></script>

</body>

</html>
