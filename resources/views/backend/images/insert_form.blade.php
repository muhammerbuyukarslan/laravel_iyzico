@extends("backend.shared.backend_theme")
@section("title","Adres Modülü")
@section("subtitle","Yeni Adres Ekle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/products/$product->product_id/images")}}" METHOD="POST" autocomplete="off" novalidate enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->product_id}}">
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Dosya Yükle" placeholder="" field="image_url" value="" type="file" />
                </div>
                <div class="col-lg-6 mt-3">
                    <x-input label="Açıklama" placeholder="Kısa Açıklama" field="alt" value="" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Sıra No" placeholder="Sıra No Giriniz" field="seq" value=""/>
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-6">
                        <x-checkbox label="Aktif" field="is_active" />
                    </div>
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
