@extends('layout.main')

@section('content')
    <?php
    $catLink = str_replace(' ', '-', $data['reception']->catname);
    $products = explode(',', $data['reception']->products);
    $prepareSteps = explode('*', $data['reception']->preparation);
    ?>
    <header id="page-header" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col m-auto text-white">
                    <h1>Готварска рецепта за {{mb_strtolower($data['reception']->name)}}</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Рецепта -->
    <section id="reception" class="py-3 bg-light">
        <div class="container">
            <!-- breadcrumbs -->
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Начало</a></li>
                            <li class="breadcrumb-item"><a
                                        href="/{{mb_strtolower($catLink)}}">{{$data['reception']->catname}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$data['reception']->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>


            <div class="row">
                <!-- Необходими продукти -->
                <div class="col-md-4 panel panel-default">
                    <div class="panel-heading text-info font-weight-bold mb-1">
                        <img src="{{asset('/thumbnails/необходими-продукти.png')}}" title="Виж необходимите продукти"
                             alt="необходими-продукти" class="img-fluid img-icon" />
                        НЕОБХОДИМИ ПРОДУКТИ
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($products as $product)
                                @if($product)
                                    <li class="list-group-item">
                                        {{$product}}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Начин на приготвяне -->
                <div class="col-md-4 well">
                    <div class="panel-heading text-info font-weight-bold mb-1">
                        <img src="{{asset('/thumbnails/начин-на-приготвяне.png')}}" title="Виж начин на приготвяне"
                             alt="начин-на-приготвяне" class="img-fluid img-icon" />
                        НАЧИН НА ПРИГОТВЯНЕ
                    </div>
                    <div class="panel-body">
                        <ul class="list-group text-justify">
                            @foreach($prepareSteps as $key=>$step)
                                <li class="list-group-item p-2">
                                    <i class="fa fa-check"></i>{{++$key}} - {{$step}}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <!-- Приготвяне, калории, коментари, споделяне -->
                <div class="col-md-4 text-center">
                    <img src="uploads/{{$data['reception']->image}}"
                         alt="готварска-рецепта-за-{{$data['reception']->name}}"
                         title="как да сготвим {{$data['reception']->name}}"
                         class="img-fluid rounded-circle recipe-img" />

                    <div class="container">
                        <div class="row mt-2">
                            <div class="col" data-toggle="tooltip" title="до {{$data['reception']->prepareTime}}">
                                Приготвяне: <img src="{{asset('thumbnails/приготвяне.png')}}"
                                                 data-toggle="tooltip" class="img-fluid img-icon"
                                                 alt="време-за-приготвяне-на-рецептата" />
                                {{$data['reception']->prepareTime}}
                            </div>

                            <div class="col">
                                Порции: СКОРО
                            </div>

                            <div class="col">
                                Калории: СКОРО
                            </div>

                        </div>
                    </div>
                    <p class="lead mt-2">Сподели рецепта: FB / Twitter / Google+ / YouTube</p>

                    <p class="lead mt-2">Коментари за рецепта</p>
                </div>
            </div>

        </div>
    </section>


    <!-- Подобни рецепти -->
    @if (count($data['likeReceptions']))
    <section id="likeRecipes" class="my-3 py-2">
        <div class="container">
            <div class="text-info font-weight-bold">
                ПОДОБНИ РЕЦЕПТИ
            </div>
            <div class="row">
                @foreach($data['likeReceptions'] as $likeReception)
                        <?php
                        $recName = str_replace(' ', '-', $likeReception->name);
                        $recName = mb_strtolower($recName);
                        ?>
                        <div class="col-sm-3 media">
                            <div class="media-left">
                                <img src="uploads/{{$likeReception->image}}"
                                     alt="готварска-рецепта-за-{{$likeReception->name}}"
                                     title="как да сготвим {{$likeReception->name}}"
                                     class="img-fluid like-recipe-img" />
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <a href="/{{$recName}}">{{$likeReception->name}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

            </div>
        </div>
    </section>
    @endif



@endsection

