@extends("backend.shared.backend_theme")
@section("title","Kategori Modülü")
@section("subtitle","Kategori Ekle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/categories")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Kategori Adı" placeholder="Kategori Adı Giriniz" field="name" value="" />
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-6">
                        <x-checkbox label="Aktif Kategori" field="is_active" />
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
