@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
@endsection

@section('content')

    <!-- Contenido principal -->
    <div class="contenedor-principal" id="contenedor-principal">
        <div class="seccion-izquierda">
            <h1>Sara's<br><span>Secret</span></h1>
            <p>______________________</p>
            <p>Descubre la belleza que hay en ti con <span class="resaltado">Sara’s Secret</span>,<br> productos diseñados para resaltar tu esencia.</p>
        </div>
        <div class="imagen-centro"></div>
        <div class="seccion-derecha"></div>
    </div>

    <!-- Productos -->
    <div class="productos" id="productos">
        <h1 class="productos-titulo">Transforma tu rutina con Sara’s Secret</h1>
        <p class="productos-subtitulo">Encuentra los mejores productos de belleza para un cuidado completo y resultados excepcionales.</p>
        <div class="productos-grid">
            @foreach([
                ['id' => 'producto1', 'titulo' => 'Perfumes', 'desc' => 'Fragancias que dejan huella.'],
                ['id' => 'producto2', 'titulo' => 'Cremas', 'desc' => 'Hidratación y suavidad al instante.'],
                ['id' => 'producto3', 'titulo' => 'Maquillaje', 'desc' => 'Resalta tu belleza natural.']
            ] as $producto)
                <div class="producto" id="{{ $producto['id'] }}">
                    <h3>{{ $producto['titulo'] }}</h3>
                    <p>{{ $producto['desc'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="productos-grid">
            <div class="producto" id="producto4">
                <h3>Cuidado de la piel</h3>
                <p>Mima tu piel todos los días.</p>
            </div>
            <div class="producto" id="producto5">
                <h3>Cuidado del cabello</h3>
                <p>Brillo y fuerza en cada hebra.</p>
            </div>
        </div>
    </div>

    <!-- Carrusel -->
    <div class="seccion-carrusel" id="carrusel">
        <div class="titulo-carrusel">
            <h1>Reseñas</h1>
        </div>
        <p class="texto-normal">En Sara’s Secret, nos enorgullece ofrecer productos de belleza de alta calidad...</p>

        <div class="carrusel">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                    @foreach([
                        '“Los productos son increíbles, mi piel nunca se había sentido tan suave.” – Ana G.',
                        '“Mi cabello está más fuerte y brillante desde que uso sus productos.” – Cris M.',
                        '“¡Amo sus perfumes! Duran todo el día y huelen espectacular.” – Sofía R.'
                    ] as $index => $texto)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="card" style="width: 25rem;">
                                <div class="card-body"><p class="card-text">{{ $texto }}</p></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer" id="footer">
        <div class="container">
            <div class="row justify-content-center align-items-start">
                <div class="col-lg-4 col-sm-12">
                    <h5>Información de contacto</h5>
                    <div class="contacto"><i class="bi bi-telephone"></i><p>+52 777 123 xxxx</p></div>
                    <div class="contacto"><i class="bi bi-envelope"></i><p>contacto@saras-secret.com</p></div>
                </div>
                <div class="col-lg-4 col-sm-12 redes-sociales-seccion">
                    <h5>Consulta nuestras redes sociales</h5>
                    <div class="redes-sociales">
                        <a href="https://es-la.facebook.com/login/device-based/regular/login/"><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/es/"><i class="bi bi-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 d-flex justify-content-center">
                    <div class="fondo-imagen">
                        <!-- Imagen del logo eliminada -->
                    </div>
                </div>
            </div>
        </div>
        <p>&copy; 2025 Sara's Secret. Todos los derechos reservados.</p>
    </footer>
@endsection

@section('scripts')
    <script src="{{ asset('/js/script.js') }}"></script>
@endsection
