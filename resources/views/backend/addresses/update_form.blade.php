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
                    <label for="city" class="form-label">Şehir</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Şehir Giriniz"
                           value="{{old("city",$addr->city)}}">
                    @error("city")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="district" class="form-label">İlçe</label>
                    <input type="text" class="form-control" id="district" name="district" placeholder="İlçe Giriniz"
                           value="{{old("district",$addr->district)}}">
                    @error("district")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <label for="zipcode" class="form-label">Posta Kodu</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Posta Kodu Giriniz"
                           value="{{old("zipcode",$addr->zipcode)}}">
                    @error("zipcode")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-6">
                        <div class="form-check mt-5">
                            <input class="form-check-input" type="checkbox" id="is_default" name="is_default"
                                   value="1" {{$addr->is_default == 1 ? "checked" : ""}}>
                            <label class="form-check-label" for="is_default">
                                Varsayılan
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="address"></label>
                    <textarea name="address" id="address" class="form-control" cols="20" rows="5">{{$addr->address}}</textarea>
                    @error("address")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
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
