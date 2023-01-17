@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
    @section("subtitle","Kullanıcı Güncelle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/users/$user->user_id")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            @method("PUT")
            <input type="hidden" name="user_id" value="{{$user->user_id}}">
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Ad Soyad" placeholder="Ad Soyad Giriniz" field="name" value="{{$user->name}}" />
                </div>
                <div class="col-lg-6">
                    <x-input label="Eposta" placeholder="Eposta Giriniz" type="email" field="email" value="{{$user->email}}" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <x-checkbox label="Yetkili Kullanıcı" field="is_admin" checked="{{$user->is_admin == 1 ? "checked" : ""}}" />
                </div>
                <div class="col-lg-6">
                    <x-checkbox label="Aktif Kullanıcı" field="is_active" checked="{{$user->is_active == 1 ? "checked" : ""}}" />
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
