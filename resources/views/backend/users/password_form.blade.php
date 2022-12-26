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
                    <label for="password" class="form-label">Şifre Giriniz</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Şifre Giriniz">
                    @error("password")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="password_confirmation" class="form-label">Şifre Tekrarı</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Şifrenizi Tekrar Giriniz">
                    @error("password")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
