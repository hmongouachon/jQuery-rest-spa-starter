<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- for Google -->
        <meta name="description" content="" />
        <meta name="keywords" content="" />

        <meta name="author" content="" />
        <meta name="copyright" content="" />
        <meta name="application-name" content="" />

        <!-- for Facebook -->          
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />

        <!-- for Twitter -->          
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="" />
        <meta name="twitter:description" content="" />
        <meta name="twitter:image" content="" />

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">

        <!-- libs font awesome -->
        <link href="resources/css/libs/font-awesome.min.css" rel="stylesheet"> 
        
        <!-- libs kube imperavi -->
        <link href="resources/css/libs/kube.min.css" rel="stylesheet">

        <!-- libs google fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
        
        <!-- libs normalize -->
        <link rel="stylesheet" href="resources/css/normalize.css">

        <!-- COMPASS -->
        <link href="resources/css/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
        <link href="resources/css/print.css" media="print" rel="stylesheet" type="text/css" />

        <!--[if IE]>
            <link href="resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css"/>
        <![endif]-->


    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- LOADER -->
        <div id="loader">
            <!-- percent num -->
            <div id="percent" class="percent active"></div>
            <!-- line -->
            <div class="progress-line">
                <span class="line"></span>
            </div>
        </div>

        <!-- MAIN -->
        <main id="main" class="layout" role="main">

             <!-- header -->
        <header class="header" id="header">
            <nav>
                <a href="#" class="logo view-home"  data-name="" data-text="Soulful">Home</a>
                <a href="#" class="view-projects"  data-name="projects" data-text="Projects">Projects</a>
                <a href="#" class="view-about"  data-name="about" data-text="About">About</a>
            </nav>
        </header>
            
            <!-- sections -->
            <section class="section home" id="home">
                <div class="wrapper">
                    <h2>Home</h2>
                    <p><a href="#" class=""  data-name="projects" data-text="Projects">View projects</a></p>
                </div>
            </section>

            <section class="section about" id="about">
                <div class="wrapper">
                    <h2>About</h2>
                    <p><a href="#" class="logo "  data-name="" data-text="Soulful">Go Home</a></p>
                </div>
            </section>

            <section class="section projects" id="projects">
                <div class="wrapper">
                    <h2>Projects</h2>
                    <div id="items-container" class="row gutters"></div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="footer container"></footer>

        <!--template for multiple posts // 3 brackets > render html -->
        <script id="items-template" type="text/x-handlebars-template">
            <article class="col col-3" data-id="{{id}}">
                <figure class="cover thumbnail" data-id="{{id}}"></figure>
                <h3 class="post-title ">
                    <a href="{{url}}" class="view-item" data-name="{{slug}}">{{{title}}}</a>
                </h3>
                
                

                
            </article>
        </script>




        <script src="js/vendors/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendors/jquery-3.2.1.min.js"><\/script>')</script>

        <!-- DEPENDENCIES -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>
        <!-- <script src="js/plugins.js"></script> -->

        <!-- DEV -->
        <!-- <script src="js/main.js"></script> -->

        <!-- PROD - modify the grunt.js file in order to deploy to production -->
        <script src="dist/min/app.js" type="text/javascript" charset="utf-8"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>

