@extends("backend.shared.backend_theme")
@section("title","Kategori Modülü")
    @section("subtitle","Kategori Güncelle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/category/$category->category_id")}}" METHOD="POST" autocomplete="off" novalidate>
            @csrf
            @method("PUT")
            <input type="hidden" name="$category_id" value="{{$category->category_id}}">
            <div class="row">
                <div class="col-lg-6">
                    <x-input label="Kategori Adı" placeholder="Kategori Adı Giriniz" field="name" value="{{$category->name}}" />
                </div>
                <div class="col-lg-6">
                    <x-input label="Slug" placeholder="Slug Giriniz" field="district" value="{{$category->slug}}" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="col-lg-6">
                        <x-checkbox label="Aktif Kategori" field="is_active" checked="{{$category->is_active == 1 }}" />
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
