<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/public/css/formulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    
    <title>JS Gráfica</title>
</head>
<body>
    <nav class="navbar barra fixed-top navbar-expand-lg justify-content-between">   
        <a class="navbar-brand ml-5 navLink" href="#jsgrafica">JS Gráfica</a>
    </nav>
    <header class="alt-max image" id="particles-js">
        <div class="header">
            <div class="row text-center text-white">
                <div class="col-12">
                    <h1 class="titulo">Oops! Página não encontrada...</h1>
                </div>
            </div>
        </div>
    </header>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
    
    <script src="/public/js/particles.js"></script>
    <script>
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('particles-js', '/public/js/particles.json', function() {
            console.log('callback - particles.js config loaded');
    });
    </script>
</body>