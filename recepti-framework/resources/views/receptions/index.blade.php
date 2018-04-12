@extends('layout.main')
@section('content')

    <!-- РЕЦЕПТА -->
    <section id="reception-section" class="text-white py-5">
        <div class="dark-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row no-gutters">
                            @foreach($data['receptions'] as $reception)
                                <?php
                                $recName = str_replace(' ', '-', $reception->name);
                                $recName = mb_strtolower($recName);
                                ?>
                                <div class="col-xs-4 mr-2 mb-2 recipe">
                                    <div class="reception-block">
                                        <a href="/{{$recName}}">
                                            <img src="uploads/{{$reception->image}}"
                                                 alt="готварска рецепта за {{$reception->name}}"
                                                 class="img-fluid">
                                        </a>
                                        <div class="reception-content p-2 d-inline-block text-center">
                                            <h6>{{$reception->name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                       <div class="row">
                           <div class="dayRecipe col pb-2 mb-2">
                               <h5 class="text-white py-2 m-0">Рецепта на деня</h5>
                               <div class="reception-block">
                                   <a href="/{{$data['receptions'][1]->name}}">
                                       <img src="uploads/{{$data['receptions'][1]->image}}"
                                            alt="готварска рецепта за {{$reception->name}}"
                                            class="img-fluid">
                                   </a>
                                   <div class="reception-content p-2 d-inline-block text-center">
                                       <h6>{{$data['receptions'][1]->name}}</h6>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div id="popular-articles" class="pb-2 col">
                               <h5 class="text-white py-2 m-0">Популярно днес</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item px-1">
                                        <img alt="Independence Day" class="img-fluid img-thumbnail float-left px-1 w-25"
                                             src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                        <p class="info float-left px-2 w-75"><a href="#">Готварски рецепти за гости</a></p>
                                    </li>
                                    <li class="list-group-item px-1">
                                        <img alt="Independence Day" class="img-thumbnail float-left img-fluid px-1 w-25"
                                             src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                        <p class="info float-left px-2 w-75"><a href="#">Доминикана - загадките проговарят</a></p>
                                    </li>
                                    <li class="list-group-item px-1">
                                        <img alt="Independence Day" class="img-thumbnail float-left img-fluid px-1 w-25"
                                             src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                        <p class="info float-left px-2 w-75"><a href="#">Тайната на обемните мигли</a></p>
                                    </li>
                                    <li class="list-group-item px-1">
                                        <img alt="Independence Day" class="img-thumbnail float-left img-fluid px-1 w-25"
                                             src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                        <p class="info float-left px-2 w-75"><a href="#">Тайната на обемните мигли</a></p>
                                    </li>
                                    <li class="list-group-item px-1">
                                        <img alt="Independence Day" class="img-thumbnail float-left img-fluid px-1 w-25"
                                             src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg" />
                                        <p class="info float-left px-2 w-75"><a href="#">Тайната на обемните мигли</a></p>
                                    </li>
                                </ul>
                           </div>
                       </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- РЕЦЕПТА END -->

    <!-- СТАТИИ -->
    <div class="container">
        <div class="row no-gutters">
            <div class="col-sm-8">
                <section id="blog" class="">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h4 class="popular py-1 mb-0"><i class="fa fa-star"></i> Популярни статии</h4>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-2 mr-1">
                                <div class="card border-primary">
                                    <div class="text-center">
                                        <img src="{{asset('images/полезно-и-вредно.png')}}"
                                             alt="полезно-и-вредно" class="card-img-top img-fluid" />
                                        <p class="card-text py-2">Полезно и вредно</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mr-1">
                                <div class="card border-primary">
                                    <div class="text-center">
                                        <img src="{{asset('images/мамини-съвети.jpeg')}}"
                                             alt="мамини-съвети" class="card-img-top img-fluid" />
                                        <p class="card-text py-2">Мамини съвети</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mr-1">
                                <div class="card border-primary">
                                    <div class="text-center">
                                        <img src="{{asset('images/любопитно.jpeg')}}"
                                             alt="любопитни-новини" class="card-img-top img-fluid" />
                                        <p class="card-text py-2">Любопитно</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mr-1">
                                <div class="card border-primary">
                                    <div class="text-center">
                                        <img src="{{asset('images/какво-да-сготвя.jpeg')}}"
                                             alt="какво-да-сготвя" class="card-img-top img-fluid" />
                                        <p class="card-text py-2">Какво да сготвя</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- ВИДЕО РЕЦЕПТИ -->
                <section id="video-recipes" class="mt-2 pb-2 bg-light">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="row">
                                <div class="col">
                                    <h4 class="video py-1 mb-0"><i class=" fa fa-video-camera"></i> Видео рецепти</h4>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col mr-1">
                                    <div class="card border-primary">
                                        <div class="text-center">
                                            <a href="https://www.youtube.com/watch?v=bcH_cM1PFy8"  data-toggle="lightbox">
                                                <img src="{{asset('images/рецепта-за-чийзкейк-с-Nutella.jpeg')}}"
                                                     alt="видео-готварска-рецепта-за-чийзкейк-с-Nutella" class="card-img-top img-fluid" />
                                            </a>
                                            <p class="card-text py-2">
                                                <a href="https://www.youtube.com/watch?v=bcH_cM1PFy8" data-toggle="lightbox">
                                                    Чийзкейк с Nutella
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mr-1">
                                    <div class="card border-primary">
                                        <div class="text-center">
                                            <a href="https://www.youtube.com/watch?v=xaCOYdzox0g" data-toggle="lightbox">
                                                <img src="{{asset('images/рецепта-за-спагети-с-кайма-и-гъби.jpg')}}"
                                                     alt="видео-готварска-рецепта-за-спагети-с-кайма-и-гъби.jpg" class="card-img-top img-fluid" />
                                            </a>
                                            <p class="card-text py-2">
                                                <a href="https://www.youtube.com/watch?v=xaCOYdzox0g" data-toggle="lightbox">
                                                    Спагети с кайма и гъби
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mr-1">
                                    <div class="card border-primary">
                                        <div class="text-center">
                                            <a href="https://www.youtube.com/watch?v=jHo6X59dAhQ" data-toggle="lightbox">
                                                <img src="{{asset('images/рецепта-за-пиле-с-картофи.jpeg')}}"
                                                     alt="видео-готварска-рецепта-за-пиле-с-картофи" class="card-img-top img-fluid" />
                                            </a>
                                            <p class="card-text py-2">
                                                <a href="https://www.youtube.com/watch?v=jHo6X59dAhQ">Пиле с картофи</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mr-1">
                                    <div class="card border-primary">
                                        <div class="text-center">
                                            <a href="https://www.youtube.com/watch?v=jMGVkMqHJEE" data-toggle="lightbox">
                                                <img src="{{asset('images/рецепта-за-червени-бисквитки-с-крем.png')}}"
                                                     alt="видео-готварска-рецепта-за-червени-бисквитки-с-крем" class="card-img-top img-fluid" />
                                            </a>
                                            <p class="card-text py-2">
                                                <a href="https://www.youtube.com/watch?v=jMGVkMqHJEE" data-toggle="lightbox">
                                                    Бисквитки с крем</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mr-1">
                                    <div class="card border-primary">
                                        <div class="text-center">
                                            <a href="https://www.youtube.com/watch?v=ncI7yjjiiu8" data-toggle="lightbox">
                                                <img src="{{asset('images/рецепта-за-ягодова-торта.png')}}"
                                                     alt="видео-готварска-рецепта-за-ягодова-торта" class="card-img-top img-fluid" />
                                            </a>
                                            <p class="card-text py-2">
                                                <a href="https://www.youtube.com/watch?v=ncI7yjjiiu8"
                                                   data-toggle="lightbox">Ягодова торта</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col mr-1">
                                    <div class="card border-primary">
                                        <div class="text-center">
                                            <a href="https://www.youtube.com/watch?v=TQLK_p-hlI8" data-toggle="lightbox">
                                            <img src="{{asset('images/рецепта-за-китайски-ориз-с-пиле.png')}}"
                                                 alt="видео-готварска-рецепта-за-китайски-ориз-с-пиле" class="card-img-top img-fluid" />
                                            </a>
                                            <p class="card-text py-2">
                                                <a href="https://www.youtube.com/watch?v=TQLK_p-hlI8"
                                                   data-toggle="lightbox">Китайски ориз с пиле</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ВИДЕО РЕЦЕПТИ end -->

            </div>

            <!-- Facebook страница -->
            <div class="col-sm-3 ml-2">
                <div class="fb-page"
                     data-href="https://www.facebook.com/&#x41c;&#x430;&#x43c;&#x438;&#x43d;&#x438;&#x442;&#x435;-&#x440;&#x435;&#x446;&#x435;&#x43f;&#x442;&#x438;-168444997147598/"
                     data-tabs="timeline, messages" data-small-header="true" data-adapt-container-width="true"
                     data-hide-cover="false" data-show-facepile="true">
                    <blockquote
                            cite="https://www.facebook.com/&#x41c;&#x430;&#x43c;&#x438;&#x43d;&#x438;&#x442;&#x435;-&#x440;&#x435;&#x446;&#x435;&#x43f;&#x442;&#x438;-168444997147598/"
                            class="fb-xfbml-parse-ignore"><a
                                href="https://www.facebook.com/&#x41c;&#x430;&#x43c;&#x438;&#x43d;&#x438;&#x442;&#x435;-&#x440;&#x435;&#x446;&#x435;&#x43f;&#x442;&#x438;-168444997147598/">Мамините
                            рецепти</a></blockquote>
                </div>
            </div>
            <!-- Facebook страница END -->

        </div>
    </div>
    <!-- СТАТИИ END -->





    <!-- VIDEO MODAL -->
    <div class="modal fade" id="videoModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                    <iframe src="" height="350" width="100%" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>





    <!-- Статус на рецептата - редактирана/изтрита -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection