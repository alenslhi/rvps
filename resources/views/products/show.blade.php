<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nama_produk }} - {{ $setting?->nama_web ?? 'RVPS' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.3.1/index.min.js"></script>
    <style>body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; }</style>
</head>
<body class="py-10 px-6">
    <div class="max-w-5xl mx-auto">
        <a href="/" class="text-gray-500 hover:text-[#00C853] mb-6 inline-block font-bold"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-100">
            <div class="w-full md:w-1/2 p-6 bg-gray-50 border-r border-gray-100">
                <a data-fslightbox="produk" href="{{ asset('storage/' . $product->gambar) }}">
                    <img src="{{ asset('storage/' . $product->gambar) }}" class="w-full h-80 object-cover rounded-2xl shadow-sm mb-4 cursor-zoom-in hover:opacity-90 transition">
                </a>
                
                @if($product->galeri_produk)
                <div class="flex gap-3 overflow-x-auto pb-2">
                    @foreach($product->galeri_produk as $img)
                        <a data-fslightbox="produk" href="{{ asset('storage/' . $img) }}">
                            <img src="{{ asset('storage/' . $img) }}" class="w-20 h-20 object-cover rounded-xl border border-gray-200 cursor-zoom-in hover:border-[#00C853] transition">
                        </a>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                <span class="bg-green-100 text-green-800 text-[10px] font-black px-3 py-1 rounded-full w-max mb-4 uppercase tracking-widest">{{ $product->kategori }}</span>
                <h1 class="text-3xl font-extrabold text-gray-800 mb-2">{{ $product->nama_produk }}</h1>
                <p class="text-4xl font-black text-[#00C853] mb-6">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                
                <div class="bg-gray-50 p-4 rounded-xl mb-6 flex justify-between items-center border border-gray-100">
                    <span class="text-sm font-bold text-gray-700">Ketersediaan Stok:</span>
                    <span class="text-sm font-bold bg-{{ $product->stok > 0 ? 'green' : 'red' }}-100 text-{{ $product->stok > 0 ? 'green' : 'red' }}-700 px-3 py-1 rounded-lg">
                        {{ $product->stok > 0 ? $product->stok . ' Tersedia' : 'Habis' }}
                    </span>
                </div>

                <h3 class="font-bold text-gray-800 mb-2 uppercase text-xs tracking-widest">Deskripsi Detail:</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-8 whitespace-pre-line">{{ $product->deskripsi_singkat }}</p>

                @php
                    $waNumber = preg_replace('/[^0-9]/', '', $profile->whatsapp ?? '');
                    $waText = urlencode("Halo *{$setting?->nama_web}*, saya tertarik memesan produk: \n\n*{$product->nama_produk}*\nHarga: Rp " . number_format($product->harga, 0, ',', '.') . "\n\nApakah masih tersedia?");
                @endphp
                <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank" class="w-full bg-[#00C853] text-white text-center font-bold py-4 rounded-xl hover:bg-green-600 transition shadow-lg flex justify-center items-center gap-3">
                    <i class="fab fa-whatsapp text-2xl"></i> Pesan Sekarang
                </a>
            </div>
        </div>
    </div>
</body>
</html>