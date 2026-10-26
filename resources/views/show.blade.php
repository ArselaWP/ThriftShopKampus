<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} — ThriftShopKampus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body{font-family:Inter,sans-serif;background:#f6f7f9}</style>
</head>
<body class="text-slate-900">
<header class="bg-white border-b border-gray-100 px-5 sm:px-8 py-4 flex items-center justify-between">
    <a href="{{ route('home') }}" class="font-extrabold text-xl">ThriftShop<span class="text-emerald-500">Kampus</span></a>
    <a href="{{ route('home') }}" class="text-sm font-semibold hover:underline">← Kembali ke katalog</a>
</header>
<main class="max-w-5xl mx-auto p-5 sm:p-8">
    <div class="grid md:grid-cols-2 gap-8 bg-white rounded-3xl p-4 sm:p-7 border border-gray-100">
        <div class="rounded-2xl overflow-hidden bg-gray-100">
            <img src="{{ $product->image_url ?: 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=85' }}" alt="{{ $product->name }}" class="w-full h-[360px] sm:h-[500px] object-cover">
        </div>
        <div class="flex flex-col py-2">
            <span class="text-xs uppercase tracking-widest text-emerald-700 font-bold">{{ $product->category }}</span>
            <h1 class="text-3xl sm:text-4xl font-extrabold mt-3">{{ $product->name }}</h1>
            <p class="text-2xl font-extrabold mt-4">Rp {{ number_format((float)$product->price,0,',','.') }}</p>
            <div class="grid grid-cols-2 gap-3 mt-6">
                <div class="bg-gray-50 rounded-xl p-4"><p class="text-xs text-gray-400">Ukuran</p><p class="font-bold mt-1">{{ $product->size ?: 'Tidak dicantumkan' }}</p></div>
                <div class="bg-gray-50 rounded-xl p-4"><p class="text-xs text-gray-400">Kondisi</p><p class="font-bold mt-1">{{ $product->condition }}</p></div>
                <div class="bg-gray-50 rounded-xl p-4"><p class="text-xs text-gray-400">Stok tersedia</p><p class="font-bold mt-1">{{ $product->stock }}</p></div>
                <div class="bg-gray-50 rounded-xl p-4"><p class="text-xs text-gray-400">Kategori</p><p class="font-bold mt-1">{{ $product->category }}</p></div>
            </div>
            <h2 class="font-extrabold mt-7">Deskripsi produk</h2>
            <p class="text-sm text-gray-600 leading-relaxed mt-2">{{ $product->description ?: 'Belum ada deskripsi untuk produk ini.' }}</p>
            <div class="mt-auto pt-8">
                <button type="button" onclick="alert('Checkout belum diaktifkan. Tahap berikutnya adalah membuat akun, keranjang, dan transaksi.')" class="w-full bg-black text-white font-semibold rounded-xl py-3.5 hover:bg-gray-800">Beli sekarang</button>
                <p class="text-xs text-gray-400 text-center mt-3">Tombol beli belum memproses transaksi.</p>
            </div>
        </div>
    </div>
</main>
<script>lucide.createIcons();</script>
</body>
</html>
