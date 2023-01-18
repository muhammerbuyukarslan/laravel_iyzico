<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">
            <span data-feather="home"></span>
            Yönetim Paneli
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{\Illuminate\Support\Str::of(url()->current())->contains("/users") ? "active" : ""}}"
           href="/users">
            <span data-feather="user"></span>
            Kullanıcılar
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{\Illuminate\Support\Str::of(url()->current())->contains("/categories") ? "active" : ""}}"
           href="/categories">
            <span data-feather="bookmark"></span>
            Kategori
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{\Illuminate\Support\Str::of(url()->current())->contains("/products") ? "active" : ""}}"
           href="/products">
            <span data-feather="shopping-bag"></span>
            Ürünler
        </a>
    </li>
</ul>
