<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Carousel Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Game library</a>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" id="home">
                    <a class="nav-link" href="/">Hem</a>
                </li>
                <li class="nav-item" id="lol">
                    <a class="nav-link" href="/lol">League Of Legends</a>
                </li>
                <li class="nav-item" id="dota2">
                    <a class="nav-link" href="/dota2">Dota 2</a>
                </li>
                <li class="nav-item" id="ow">
                    <a class="nav-link" href="/ow">Overwatch</a>
                </li>
            </ul>
        </div>
    </nav>
    </header>

    <main role="main">
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">

            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide hero-image" src="{{ asset( 'img/headers/lol.jpg' ) }}" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Are you sure you can handle me summoner?</h1>
                            <p>Den bästa sidan för att hämta information om de populäraste spelen</p>
                            <p><a class="btn btn-lg btn-primary" href="/lol" >Se mer</a></p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="second-slide hero-image" src="{{ asset( 'img/headers/dota.jpg' ) }}" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption  text-left">
                            <h1>Se de senaste matcherna</h1>
                            <p>Se hur vissa turneringar går</p>
                            <p><a class="btn btn-lg btn-primary" href="/tournaments" role="button">Se turneringar</a></p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="third-slide hero-image" src="{{ asset( 'img/headers/overwatch.jpg' ) }}" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>Heroes never die</h1>
                            <p>Se data om alla hjältar som finns att spela</p>
                            <p><a class="btn btn-lg btn-primary" href="/ow">Se hjältar</a></p>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        @yield( 'content' )


        <footer class="container">
            <p class="float-right"><a href="#">Tillbaks till toppen</a></p>
            <p>&copy; 2018 HarCom AB &middot; </p>
        </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset( '/js/app.js' ) }}"></script>
    <script>
      var active = {{ $category }};

      $(active).addClass('active');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
