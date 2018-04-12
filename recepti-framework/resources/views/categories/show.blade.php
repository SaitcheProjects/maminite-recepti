@extends('layout.main')

@section('content')
    <section id="category-section" class="text-white py-5">
        <div class="dark-overlay">
            <div class="container">
                <h2>Потърси рецепта</h2>
                <p>Намерете желаната от вас готварска рецепта лесно</p>
                <input class="form-control" id="myInput" type="text" placeholder="Търси..">
                <br>
                <div class="row">
                    @foreach($data['receptions'] as $reception)
                        <?php $recName = str_replace(' ', '-', $reception->name);?>
                        <div class="col-lg-3 col-md-6 mb-2">
                            <div class="reception-block">
                                <a href="/{{$recName}}">
                                    <img src="uploads/{{$reception->image}}" alt="готварска рецепта за {{$reception->name}}"
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
        </div>
    </section>
@endsection