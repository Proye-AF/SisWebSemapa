<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Semapa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('sema/styles.css') }}">

    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif; /* Establece la fuente personalizada */
            background-color: #f7f7f7; /* Color de fondo */
            color: #333; /* Color del texto */
            margin: 0; /* Elimina el margen predeterminado */
            padding: 0; /* Elimina el relleno predeterminado */
        }

        .container {
            max-width: 1200px; /* Define el ancho máximo del contenedor principal */
            margin: 0 auto; /* Centra el contenido horizontalmente */
            padding: 20px; /* Agrega espacio alrededor del contenido */
        }

        .header {
            background-color: #2d3748; /* Color de fondo para la cabecera */
            color: #fff; /* Color del texto en la cabecera */
            padding: 10px; /* Espaciado en la cabecera */
            text-align: center; /* Centra el texto en la cabecera */
        }

        .navbar {
            background-color: #333; /* Color de fondo para la barra de navegación */
            color: #fff; /* Color del texto en la barra de navegación */
            padding: 10px; /* Espaciado en la barra de navegación */
        }

        .navbar a {
            color: #fff; /* Color del texto de los enlaces de navegación */
            text-decoration: none; /* Elimina el subrayado de los enlaces */
            margin: 0 10px; /* Agrega espacio entre los enlaces de navegación */
        }

        .carousel {
            text-align: center; /* Centra el contenido del carrusel */
            margin-top: 20px; /* Agrega espacio en la parte superior del carrusel */
        }

        .carousel img {
            max-width: 100%; /* Ajusta las imágenes al ancho del contenedor */
            height: auto; /* Mantiene la relación de aspecto de las imágenes */
        }

        .footer {
            background-color: #2d3748; /* Color de fondo para el pie de página */
            color: #fff; /* Color del texto en el pie de página */
            padding: 10px; /* Espaciado en el pie de página */
            text-align: center; /* Centra el texto en el pie de página */
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Semapa</h1>
    </div>
    <div class="navbar">
    @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ir al Menu Principal</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Iniciar Sesion</a>
                    @endauth
                 </div>
                
            @endif
    </div>
    <div class="carousel">
        
        <img src="{{ asset('sema/image2.png') }}" alt="Imagen 2">
    </div>
    <div class="footer">
        <p>© {{ date('Y') }} Semapa. Todos los derechos reservados.</p>
    </div>
</body>
</html>
