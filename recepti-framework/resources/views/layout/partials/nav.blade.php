
<nav class="navbar navbar-expand-md">
    <div class="container">
        <a href="/" class="navbar-brand mr-0">
            <img src="{{asset('images/мамините-готварски-рецепти-лого.png')}}"
                 width="65" height="auto"
                 alt="мамините-готварски-рецепти-лого">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto categories">
                <li class="nav-item active">
                    <a class="nav-link" href="/" title="Начало">
                        <img src="{{asset('images/начало-мамини-готварски-рецепти.png')}}"
                             alt="начало-мамини-готварски-рецепти" title="Начало"> Начало
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                @foreach($data['categories'] as $key => $category)
                    <?php
                    $catName = str_replace('-', ' ', $category['name']);
                    $catLink = str_replace(' ', '-', $category['name']);
                    $catImage = $category['image'];
                    ?>
                    <li class="nav-item category mr-1">
                        <a class="nav-link p-0" href="{{$catLink}}" title="{{$catName}}">
                            <img src="{{asset('images/'.$catImage)}}" alt="{{$catName}}" title="Категория-{{$catName}}">
                            {{$catName}}
                        </a>
                    </li>
                @endforeach
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item category">
                    <a class="nav-link" href="{{route('articles')}}" title="статии">
                        <img src="{{asset('images/статии.png')}}" alt="статии" title="статии">
                        статии
                    </a>
                </li>
                <li class="nav-item prof">
                    <a class="nav-link" href="#">
                        <img src="{{asset('images/вход.png')}}"
                             alt="вход-мамини-готварски-рецепти" title="Вход">
                        вход
                    </a>
                </li>
                <li class="nav-item prof">
                    <img src="{{asset('images/нов-профил.png')}}"
                         alt="нов-профил-мамини-готварски-рецепти" title="Нов профил">
                    <a class="nav-link" href="#">нов профил</a>
                </li>

            </ul>
        </div>
    </div>
</nav>




