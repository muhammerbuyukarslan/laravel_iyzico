@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
    @section("subtitle","Kullanıcı Güncelle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/users/$user->user_id/addresses/$addr->address_id")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            @method("PUT")
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <input type="hidden" name="address_id" value="{{$addr->address_id}}">
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Şehir" placeholder="Şehir Giriniz" field="city" value="{{$addr->city}}" />
                </div>
                <div class="col-lg-6">
                    <x-input label="İlçe" placeholder="İlçe Giriniz Giriniz" field="district" value="{{$addr->district}}" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Posta Kodu" placeholder="Posta Kodu Giriniz" field="zipcode" value="{{$addr->zipcode}}"/>
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-6">
                        <x-checkbox label="Varsayılan" field="is_default" checked="{{$addr->is_default == 1 }}" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col mt-4">
                        <x-textarea label="Açık Adres" placeholder="Açık Adres Giriniz" field="address" value="{{$addr->address}}" />
                    </div>
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
