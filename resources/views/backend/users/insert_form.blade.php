@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
@section("subtitle","Yeni Kullanıcı Ekle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/users")}}" METHOD="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <label for="name" class="form-label">Ad Soyad</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad Giriniz" value="{{old("name")}}">
                    @error("name")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-6 mt-3">
                    <label for="email" class="form-label">Eposta</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Eposta Giriniz" value="{{old("email")}}">
                    @error("email")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
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
                <div class="col-lg-6">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1">
                        <label class="form-check-label" for="is_admin">
                            Yetkili Kullanıcı
                        </label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1">
                        <label class="form-check-label" for="is_active">
                            Aktif Kullanıcı
                        </label>
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
