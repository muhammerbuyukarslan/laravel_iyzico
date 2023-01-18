@extends("backend.shared.backend_theme")
@section("title","Ürün Modülü")
@section("subtitle","Ürün Ekle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/products")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Ürün Adı" placeholder="Ürün Adı Giriniz" field="name" value="" />
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="category_id" class="form-label">Kategori Seçiniz</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="-1">Seçiniz</option>
                        @foreach($categories as $category)
                            <option value="{{$category->category_id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error("category_id")
                    <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <x-input label="Kısa Açıklama" placeholder="Kısa Açıklama Giriniz" field="lead" value="" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col mt-4">
                        <x-textarea label="Detaylı Açıklama" placeholder="Detaylı Açıklama Giriniz" field="description" value="" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Ürün Fiyatı" placeholder="Ürün Fiyatı Giriniz" field="price" value="" />
                </div>
                <div class="col-lg-6 mt-3">
                    <x-input label="Eski Ürün Fiyatı" placeholder="Eski Ürün Fiyatı Giriniz" field="old_price" value="" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                        <x-checkbox label="Aktif Ürün" field="is_active" />
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success mt-2">KAYDET</button>
                </div>
            </div>
        </form>
    </div>
@endsection
