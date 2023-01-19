@extends("backend.shared.backend_theme")
@section("title","Kullanıcı Modülü")
    @section("subtitle","Kullanıcı Güncelle")
@section("btn_url",url()->previous())
@section("btn_colour","danger")
@section("btn_label","Geri Dön")
@section("btn_icon","arrow-left")
@section("content")
    <div class="container">
        <form action="{{url("/products/$product->product_id/images/$image->image_id")}}" METHOD="POST" autocomplete="off" novalidate enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="product_id" value="{{$product->product_id}}">
            <input type="hidden" name="address_id" value="{{$image->image_id}}">
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Dosya Yükle" placeholder="" field="image_url" value="" type="file" />
                    <img src="{{asset("/storage/products/$image->image_url")}}" alt="{{$image->alt}}" width="100">
                </div>
                <div class="col-lg-6 mt-3">
                    <x-input label="Açıklama" placeholder="Kısa Açıklama" field="alt" value="{{$image->alt}}" />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <x-input label="Sıra No" placeholder="Sıra No Giriniz" field="seq" value="{{$image->seq}}"/>
                </div>
                <div class="col-lg-6">
                    <div class="col-lg-6">
                        <x-checkbox label="Aktif" field="is_active" checked="{{$product->is_active == 1 }}" />
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
