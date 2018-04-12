
@extends('layout.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Нова рецепта</h3>
                    </div>
                    <div class="card-block">
                        <form action="/reception/store" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf;
                            <div class="form-group row pt-2">
                                <div class="col-sm-12">
                                    <label for="username" class="col-sm-4">Заглавие:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="Заглавие">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="products" class="col-sm-12">Продукти:</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" rows="5" name="products" id="products">
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="preparation" class="col-sm-12">Приготвяне:</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" rows="5" name="preparation" id="preparation">
                                        </textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="prepareTime" class="col-sm-12">Време за приготвяне:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="prepareTime" id="prepareTime"
                                               placeholder="Време за приготвяне"> <br>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label for="cat_id" class="col-sm-12">Категория:</label>
                                    <div class="col-sm-12">

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="col-sm-12">
                                        <label for="image" class="col-sm-12">Основна снимка:</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="submit" class="form-control btn btn-primary" name="submit-reception">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                </div>


            </div>
        </div>

    </div>


@endsection