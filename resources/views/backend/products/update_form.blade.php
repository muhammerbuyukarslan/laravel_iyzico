@extends("backend.shared.backend_theme")
@section("title","Kategori Modülü")
    @section("subtitle","Kategori Güncelle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/products/$product->product_id")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            @method("PUT")
            <input type="hidden" name="$product_id" value="{{$product->product_id}}">
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Ürün Adı" placeholder="Ürün Adı Giriniz" field="name" value="{{$product->name}}" />
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="category_id" class="form-label">Kategori Seçiniz</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="-1">Seçiniz</option>
                        @foreach($categories as $category)
                            <option value="{{$category->category_id}}" {{$product->category_id == $category->category_id ? "selected" : ""}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Ürün Fiyatı" placeholder="Ürün Fiyatı Giriniz" field="price" value="{{$product->price}}" />
                </div>
                <div class="col-lg-6 mt-3">
                    <x-input label="Eski Ürün Fiyatı" placeholder="Eski Ürün Fiyatı Giriniz" field="old_price" value="{{$product->old_price}}" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <x-input label="Kısa Açıklama" placeholder="Kısa Açıklama Giriniz" field="lead" value="{{$product->lead}}" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col mt-4">
                        <x-textarea label="Detaylı Açıklama" placeholder="Detaylı Açıklama Giriniz" field="description" value="{{$product->description}}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <x-checkbox label="Aktif Ürün" field="is_active" checked="{{$product->is_active == 1 }}" />
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success mt-2">GÜNCELLE</button>
                </div>
            </div>
        </form>
    </div>
@endsection
