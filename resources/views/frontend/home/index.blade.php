<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Ticaret Projesi</title>

    <link rel="stylesheet" href="{{asset("css/app.css")}}">

    <!-- Custom styles for this template -->
    <link href="{{asset("css/dashboard.css")}}" rel="stylesheet">
</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="/users">Proje</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="/">Ana Sayfa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Giriş</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3" >
                    <ul class="list-group">
                        <li class="list-group-item"><h5><strong>Kategoriler</strong></h5></li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="link-dark" style="text-decoration: none" href="/">Tümü</a>
                        </li>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <li  class="list-group-item">
                                    <a class="link-dark" style="text-decoration: none" href="/kategori/{{$category->slug}}">{{$category->name}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-9 ">
                    <ul class="list-group">
                        <div class="list-group-item"><h5><strong>Ürünler</strong></h5></div>
                    </ul>
                        @if(count($products) > 0)
                            <div class="card-group">
                                @foreach($products as $product)
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{asset("/storage/products/".$product->images[0]->image_url)}}" alt="{{$product->images[0]->alt}}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$product->name}}</h5>
                                                <p class="card-text">{{$product->lead}}</p>
                                                <a href="/sepete-ekle/{{$product->product_id}}" class="btn btn-primary">Sepete Ekle</a>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        @endif
                </div>
            </div>
        </div>

        <script type="text/javascript" src="{{asset("js/app.js")}}"></script>
        <script type="text/javascript" src="{{asset("js/custom.js")}}"></script>
</body>
</html>
