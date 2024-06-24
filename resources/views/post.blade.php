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

