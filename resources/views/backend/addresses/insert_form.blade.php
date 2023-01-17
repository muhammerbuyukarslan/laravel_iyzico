@extends("backend.shared.backend_theme")
@section("title","Adres Modülü")
@section("subtitle","Yeni Adres Ekle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/users/$user->user_id/addresses")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Şehir" placeholder="Şehir Giriniz" field="city" value="" />
                </div>
                <div class="col-lg-6 mt-3">
                    <x-input label="İlçe" placeholder="İlçe Giriniz" field="district" value=""/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Posta Kodu" placeholder="Posta Kodu Giriniz" field="zipcode" value=""/>
                </div>
            <div class="col-lg-6">
                <div class="col-lg-6">
                    <x-checkbox label="Varsayılan" field="is_default" />
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col mt-4">
                    <x-textarea label="Açık Adres" placeholder="Açık Adres Giriniz" field="address" value="" />
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
