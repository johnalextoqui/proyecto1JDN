@extends('plantillas.layout')

@section('title', 'JDN')

@section('content')

 <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Bienvenido a JDN!</h1>
                    <p class="lead mb-0">Un espacio en torno a su palabra</p>
                </div>
            </div>
    </header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <section class="py-4 border-bottom" id="features">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-4">
            <div class="p-3 d-flex flex-column align-items-center">
                    <div class="feature bg-info text-white rounded-3 mb-3 d-flex justify-content-center align-items-center" style="width: 100px; height: 100px; font-size: 3rem;">
                    <i class="bi bi-book"></i>
                    </div>
                    <h2 class="h3 fw-bolder text-center">Estudios Biblicos</h2>
                    <p class="cuadrito1 text-center">Comparte tus opiniones y todo lo que has logrado entender en el maravilloso estudio de cronologia, apologetica y diferentes ramas del estudio biblico</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 d-flex flex-column align-items-center">
                    <div class="feature bg-info text-white rounded-3 mb-3 d-flex justify-content-center align-items-center"
                    style="width: 100px; height: 100px; font-size: 3rem;">
                    <i class="bi bi-chat-heart"></i>
                    </div>
                    <h2 class="h3 fw-bolder text-center">La palabra de Dios</h2>
                    <p class="cuadrito1 text-center">La palabra de Dios como el centro de nuestras vidas; esta plataforma nos estimula a mantener en nuestros corazones cada enseñanza dada por Dios, entendiendo que si el amor de Dios permanece en nuestros corazones, essto mismo hablaremos y reflejaremos</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-3 d-flex flex-column align-items-center">
                    <div class="feature bg-info text-white rounded-3 mb-3 d-flex justify-content-center align-items-center-" style="width: 100px; height: 100px; font-size: 3rem;">
                    <i class="bi bi-house-door-fill"></i>
                    </div>
                    <h2 class="h3 fw-bolder text-center">Comunidad y familia</h2>
                    <p class="cuadrito1 text-center">Este espacio tambien te permitira publicar necesidades en la comunidad, para estar atentos y de ese modo brindar un apoyo en amor y solidaridad a aquellas personas que lo requieran</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            @if ($postOne != NULL)
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="{{ asset('storage').'/'.$postOne->image }}" alt="..." /></a>
                    <div class="card-body">
                        
                        
                        <div class="small text-muted">{{ $postOne->created_at }}</div>
                        <h2 class="card-title">{{ $postOne->title }}</h2>
                        <p class="card-text">{{ $postOne->post }}</p>
                       <a class="btn btn-primary" href="{{ url('post/'.$postOne->id.'/edit') }}">Editar →</a>
                        <form action="{{ url('post/'.$postOne->id) }}" class="d-inline" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Quieres borrar ?')" value="Eliminar">

                        </form>

                    </div>
                </div>
            @endif
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($postlist as $item)
                    <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="#!"><img class="card-img-top" src="{{ asset('storage').'/'.$item->image }}" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">{{ $item->created_at }}</div>
                                <h2 class="card-title h4">{{ $item->title }}</h2>
                                <p class="card-text">{{ $item->post }}</p>
                                <a class="btn btn-primary" href="{{ url('post/'.$item->id.'/edit') }}">Editar →</a>
                                <form action="{{ url('post/'.$item->id) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿ Esta seguro que desea eliminar ?')" value="Eliminar">
                                    
                                </form>

                                <form action="procesar.php" method="POST"> 
                                    <div class="form-group">
                                           <label for="comentario">Escribe tu comentario:</label>
                                           <textarea id="comentario" name="comentario" class="form-control" rows="5"></textarea>
                                    </div>
                                           <button type="submit" class="btn btn-primary">Enviar comentario</button>
                                </form>
                                
                            </div>
                        </div>
                       
                        
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="https://www.youtube.com/shorts/RTEdXcEgB5o">Reflexion del dia</a></li>
                                <li><a href="https://rfccolombia.org/">contacto</a></li>
                                <li><a href="https://www.facebook.com/jhon.a.quiroga/?locale=es_LA">facebook</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">tarjeta de meditacion</div>
                <div class="card-body">En juan 17.3 nos indica que la vida Eterna radica en conocer a Dios y a su hijo Jesucristo; puedes participar dejando tu post y dinos que piensas de esta afirmacion</div>
            </div>
        </div>
    </div>
</div>

@endsection


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido</h1>

    @isset($postlist)

        @foreach ($postlist as $item)
            <h1>{{ $item->title }}</h1>
            <p>{{ $item->post }}</p>
        @endforeach

    @endisset

    

</body>
</html>-->

