<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThriftShopKampus — Temukan Gaya Unikmu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body{font-family:Inter,sans-serif;background:#f6f7f9}
        .green-underline{text-decoration:underline;text-decoration-color:#10b981;text-decoration-thickness:4px;text-underline-offset:6px}
        .product-img{transition:transform .35s ease}.product-card:hover .product-img{transform:scale(1.045)}
    </style>
</head>
<body class="text-slate-900 antialiased">
<div class="min-h-screen md:flex">
    <aside class="hidden md:flex w-[76px] bg-white border-r border-gray-200 flex-col items-center justify-between py-6 fixed inset-y-0 left-0 z-20">
        <div class="flex flex-col items-center gap-7">
            <a href="{{ route('home') }}" class="w-10 h-10 bg-black text-white rounded-xl flex items-center justify-center text-xl font-extrabold">T</a>
            <nav class="flex flex-col gap-4">
                <a href="{{ route('home') }}" title="Beranda" class="p-3 rounded-xl bg-gray-100 text-black"><i data-lucide="home"></i></a>
                <a href="#produk" title="Belanja" class="p-3 rounded-xl text-gray-400 hover:bg-gray-100 hover:text-black"><i data-lucide="shopping-bag"></i></a>
                <a href="#kategori" title="Kategori" class="p-3 rounded-xl text-gray-400 hover:bg-gray-100 hover:text-black"><i data-lucide="layout-grid"></i></a>
                <a href="#jual" title="Mode seller" class="p-3 rounded-xl text-gray-400 hover:bg-gray-100 hover:text-black"><i data-lucide="plus"></i></a>
                <a href="#pesanan" title="Pesanan" class="p-3 rounded-xl text-gray-400 hover:bg-gray-100 hover:text-black"><i data-lucide="package"></i></a>
            </nav>
        </div>
        <a href="#akun" title="Akun" class="p-3 rounded-xl text-gray-400 hover:bg-gray-100"><i data-lucide="user-round"></i></a>
    </aside>

    <div class="flex-1 md:ml-[76px] min-w-0">
        <header class="bg-white/95 backdrop-blur border-b border-gray-100 px-4 sm:px-7 py-4 flex items-center gap-4 sticky top-0 z-10">
            <a href="{{ route('home') }}" class="md:hidden font-extrabold text-lg">Thrift<span class="text-emerald-500">.</span></a>
            <div class="hidden md:block font-extrabold text-xl tracking-tight">ThriftShop<span class="text-emerald-500">Kampus</span></div>
            <form action="{{ route('home') }}" method="GET" class="flex-1 max-w-xl mx-auto relative">
                <i data-lucide="search" class="w-4 h-4 text-gray-400 absolute left-3.5 top-1/2 -translate-y-1/2"></i>
                <input name="q" value="{{ request('q') }}" placeholder="Cari hoodie, jaket, denim..." class="w-full bg-gray-50 border border-gray-200 rounded-full py-2.5 pl-10 pr-4 text-sm focus:outline-none focus:border-gray-400 focus:bg-white">
            </form>
            <a href="#akun" class="px-4 sm:px-5 py-2.5 border border-gray-200 rounded-full text-sm font-semibold hover:bg-gray-50">Akun</a>
        </header>

        <main class="max-w-7xl mx-auto p-4 sm:p-7 lg:p-9 space-y-10">
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-7 items-stretch">
                <div class="lg:col-span-7 flex flex-col justify-center space-y-6 py-2">
                    <span class="inline-flex w-fit bg-black text-white text-xs font-semibold px-3.5 py-2 rounded-full">SECONDHAND, FIRST CHOICE</span>
                    <h1 class="text-4xl sm:text-5xl xl:text-6xl font-extrabold leading-[1.08] tracking-tight">Cari barang thrift yang <span class="green-underline">unik,</span> bukan yang pasaran.</h1>
                    <p class="text-gray-500 leading-relaxed max-w-xl">Temukan hoodie vintage, jaket, denim, dan aksesori pilihan dari katalog ThriftShopKampus. Gaya keren tidak harus mahal.</p>
                    <div class="flex flex-wrap gap-3">
                        <a href="#produk" class="bg-black text-white font-semibold px-6 py-3.5 rounded-xl text-sm hover:bg-gray-800">Mulai Belanja <span aria-hidden="true">↗</span></a>
                        <a href="#jual" class="bg-white text-gray-800 font-semibold px-6 py-3.5 rounded-xl text-sm border border-gray-200 hover:bg-gray-50">Jual Barang Kamu</a>
                    </div>
                    <div class="grid grid-cols-3 gap-3 pt-3">
                        <div class="bg-white border border-gray-100 p-4 rounded-2xl"><div class="text-xl sm:text-2xl font-extrabold">{{ number_format($products->total()) }}+</div><div class="text-xs text-gray-400 mt-1">Produk ditemukan</div></div>
                        <div class="bg-white border border-gray-100 p-4 rounded-2xl"><div class="text-xl sm:text-2xl font-extrabold">Pre-loved</div><div class="text-xs text-gray-400 mt-1">Lebih berkelanjutan</div></div>
                        <div class="bg-white border border-gray-100 p-4 rounded-2xl"><div class="text-xl sm:text-2xl font-extrabold">Campus</div><div class="text-xs text-gray-400 mt-1">Thrift komunitas</div></div>
                    </div>
                </div>
                <div class="lg:col-span-5 bg-[#22252a] text-white rounded-[2rem] p-5 sm:p-7 shadow-xl flex flex-col justify-between gap-6 overflow-hidden">
                    <div class="flex justify-between gap-3 items-start">
                        <div><span class="text-xs text-gray-400 block mb-2">PILIHAN MINGGU INI</span><h2 class="text-xl font-bold">{{ $featured?->name ?? 'Temukan barang unikmu' }}</h2>
                            @if($featured)<p class="text-emerald-300 font-semibold mt-2">Rp {{ number_format((float)$featured->price,0,',','.') }}</p>@endif
                        </div>
                        <span class="border border-gray-600 text-gray-300 text-xs px-3 py-1.5 rounded-full shrink-0">Curated</span>
                    </div>
                    @if($featured)
                        <a href="{{ route('products.show', $featured) }}" class="block rounded-2xl overflow-hidden bg-[#2d3137]">
                            <img src="{{ $featured->image_url ?: 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=900&q=85' }}" alt="{{ $featured->name }}" class="w-full h-56 object-cover">
                        </a>
                    @else
                        <div class="rounded-2xl bg-[#2d3137] h-56 flex items-center justify-center text-gray-400">Belum ada produk unggulan</div>
                    @endif
                    <div class="flex items-end justify-between gap-4"><div><span class="text-xs text-gray-400 block mb-1">THRIFT SMARTER</span><p class="font-semibold">Temukan cerita di setiap barang.</p></div><a href="#produk" class="bg-white text-black text-xs font-semibold px-4 py-3 rounded-xl hover:bg-gray-100">Jelajahi</a></div>
                </div>
            </section>

            <section id="kategori" class="space-y-4">
                <div><h2 class="text-xl font-extrabold">Jelajahi kategori</h2><p class="text-sm text-gray-400 mt-1">Cari gaya yang paling cocok buat kamu.</p></div>
                <div class="flex gap-2 flex-wrap">
                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ !request('category') ? 'bg-black text-white':'bg-white border border-gray-200 hover:bg-gray-100' }}">Semua</a>
                    @foreach($categories as $category)
                        <a href="{{ route('home', array_merge(request()->except('page'), ['category'=>$category])) }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ request('category')===$category ? 'bg-black text-white':'bg-white border border-gray-200 hover:bg-gray-100' }}">{{ $category }}</a>
                    @endforeach
                </div>
            </section>

            <section id="produk" class="space-y-5">
                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3">
                    <div><h2 class="text-2xl font-extrabold">New Drop</h2><p class="text-sm text-gray-400 mt-1">Barang thrift pilihan, siap menemukan pemilik baru.</p></div>
                    <form action="{{ route('home') }}" method="GET" class="flex gap-2">
                        @if(request('q'))<input type="hidden" name="q" value="{{ request('q') }}">@endif
                        @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
                        <select name="sort" onchange="this.form.submit()" class="bg-white border border-gray-200 rounded-xl px-3 py-2.5 text-sm focus:outline-none">
                            <option value="latest" @selected(request('sort','latest')==='latest')>Terbaru</option>
                            <option value="price_asc" @selected(request('sort')==='price_asc')>Harga terendah</option>
                            <option value="price_desc" @selected(request('sort')==='price_desc')>Harga tertinggi</option>
                        </select>
                    </form>
                </div>

                @if($products->count())
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                        @foreach($products as $product)
                            <article class="product-card bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-lg transition">
                                <a href="{{ route('products.show', $product) }}" class="block overflow-hidden bg-gray-100 relative">
                                    <img src="{{ $product->image_url ?: 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=85' }}" alt="{{ $product->name }}" class="product-img w-full h-44 sm:h-60 object-cover" loading="lazy">
                                    @if($product->is_featured)<span class="absolute top-3 left-3 bg-white/95 text-black text-[10px] uppercase tracking-wide font-bold px-2.5 py-1.5 rounded-full">Pilihan</span>@endif
                                </a>
                                <div class="p-3.5 sm:p-4">
                                    <p class="text-xs text-gray-400">{{ $product->category }} · {{ $product->condition }}</p>
                                    <a href="{{ route('products.show', $product) }}" class="block font-bold text-sm sm:text-base mt-1.5 hover:underline">{{ $product->name }}</a>
                                    <p class="font-extrabold mt-2">Rp {{ number_format((float)$product->price,0,',','.') }}</p>
                                    <div class="flex items-center justify-between mt-3 text-xs text-gray-400"><span>Ukuran {{ $product->size ?: '-' }}</span><span>Stok {{ $product->stock }}</span></div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                    <div>{{ $products->links() }}</div>
                @else
                    <div class="bg-white border border-gray-200 rounded-2xl p-10 text-center">
                        <div class="mx-auto w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center"><i data-lucide="search-x"></i></div>
                        <h3 class="font-bold mt-4">Produk belum ditemukan</h3><p class="text-sm text-gray-500 mt-1">Coba kata kunci atau kategori lain.</p>
                        <a href="{{ route('home') }}" class="inline-block mt-4 bg-black text-white px-4 py-2.5 rounded-xl text-sm">Reset pencarian</a>
                    </div>
                @endif
            </section>

            <section id="jual" class="bg-emerald-50 border border-emerald-100 rounded-3xl p-6 sm:p-8 flex flex-col sm:flex-row sm:items-center justify-between gap-5">
                <div><p class="text-xs font-bold tracking-widest text-emerald-700">PUNYA BARANG YANG LAYAK PAKAI?</p><h2 class="text-2xl font-extrabold mt-2">Beri barangmu cerita baru.</h2><p class="text-sm text-gray-600 mt-2 max-w-xl">Fitur penjualan akan tersedia melalui akun seller setelah modul akun dan manajemen produk diaktifkan.</p></div>
                <a href="#akun" class="shrink-0 bg-black text-white rounded-xl px-5 py-3 text-sm font-semibold">Info Mode Seller</a>
            </section>

            <footer id="akun" class="border-t border-gray-200 pt-6 pb-3 flex flex-col sm:flex-row justify-between gap-3 text-sm text-gray-500">
                <span class="font-bold text-gray-900">ThriftShopKampus</span><span>Temukan gaya unik. Pakai kembali dengan bangga.</span><span>© {{ date('Y') }} ThriftShopKampus</span>
            </footer>
        </main>
    </div>
</div>
<script>lucide.createIcons();</script>
</body>
</html>
