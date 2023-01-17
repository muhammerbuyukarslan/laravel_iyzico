@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
@section("subtitle","Şifre Değiştirme")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/users/$user->user_id/change-password")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Şifre" placeholder="Şifre Giriniz" type="password" field="password" value="" />
                </div>
                <div class="col-lg-6 mt-3">
                    <x-input label="Şifre Tekrarı" placeholder="Şifrenizi Tekrar Giriniz" type="password" field="password_confirmation" value="" />
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
