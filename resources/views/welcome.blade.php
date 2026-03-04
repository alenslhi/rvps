<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting?->nama_web ?? 'RVPS - Website Personal' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; }
        .text-shadow { text-shadow: 0 2px 4px rgba(0,0,0,0.5); }
        .timeline-line::before {
            content: '';
            position: absolute;
            left: 0.35rem; 
            top: 0.5rem;
            bottom: 0;
            width: 2px;
            background-color: #22c55e; 
        }
    </style>
</head>
<body class="antialiased text-gray-800">

    <div id="beranda" class="relative min-h-screen bg-cover bg-center flex flex-col" 
         style="background-image: url('{{ $setting?->hero_gambar ? asset('storage/' . $setting->hero_gambar) : 'https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?q=80&w=1920&auto=format&fit=crop' }}');">
        
        <div class="absolute inset-0 bg-black/50 z-0"></div>

        <nav class="relative z-10 flex justify-between items-center px-6 lg:px-16 py-6 w-full max-w-7xl mx-auto border-b border-white/10">
            <a href="#beranda" class="flex items-center gap-3 cursor-pointer group">
                <div class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 group-hover:bg-white/30 transition">
                    <i class="fas fa-code text-white"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg leading-tight tracking-wide text-white text-shadow group-hover:text-[#00C853] transition">
                        {{ $setting?->nama_web ?? 'RVPS Studio' }}
                    </h1>
                    <p class="text-[10px] text-gray-300 uppercase tracking-widest text-shadow">Sistem Informasi</p>
                </div>
            </a>
            
            <ul class="hidden md:flex gap-8 text-sm font-medium text-gray-200">
                <li><a href="#beranda" class="hover:text-white hover:underline underline-offset-4 transition">Beranda</a></li>
                <li><a href="#profil" class="hover:text-white hover:underline underline-offset-4 transition">Profil Detail</a></li>
                <li><a href="#store" class="hover:text-white hover:underline underline-offset-4 transition">RVPS Store</a></li>
                <li><a href="#tutorial" class="hover:text-white hover:underline underline-offset-4 transition">Tutorial</a></li>
                <li><a href="#portofolio" class="hover:text-white hover:underline underline-offset-4 transition">Galeri</a></li>
            </ul>

            <a href="/admin" class="bg-[#00C853] text-white font-bold px-6 py-2 rounded-full text-sm hover:bg-green-600 transition shadow-lg">Masuk Admin</a>
        </nav>

        <main class="relative z-10 flex-grow flex flex-col lg:flex-row items-center justify-between px-6 lg:px-16 max-w-7xl mx-auto w-full py-12">
            <div class="max-w-xl w-full">
                <div class="inline-flex items-center gap-2 bg-black/30 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-6 shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#00C853] animate-pulse"></span>
                    <span class="text-xs font-semibold tracking-wider text-white text-shadow">WEBSITE PERSONAL RESMI</span>
                </div>
                <h2 class="text-5xl md:text-6xl font-extrabold leading-[1.15] mb-6 text-white text-shadow">
                    {{ $setting?->hero_judul ?? 'Selamat Datang di Website RVPS' }}
                </h2>
                <p class="text-gray-200 text-sm md:text-base mb-8 leading-relaxed text-shadow max-w-md">
                    {{ $setting?->hero_deskripsi ?? 'Menuju ekosistem digital mandiri, transparan, dan inovatif. Dapatkan layanan pengembangan sistem dan informasi terkini dalam satu genggaman.' }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="#profil" class="bg-[#00C853] hover:bg-green-600 text-white font-bold px-7 py-3 rounded-full flex items-center gap-2 transition shadow-lg">
                        Jelajahi Profil <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>

            <div class="flex flex-col gap-5 mt-12 lg:mt-0 w-full max-w-md hidden md:flex">
                <a href="#profil" class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 flex items-center gap-5 hover:bg-white/20 hover:scale-105 transition-all cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center border border-white/20 group-hover:bg-[#00C853] transition-colors">
                        <i class="fas fa-user-graduate text-2xl text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-white text-shadow group-hover:text-green-300">Profil RVPS</h3>
                        <p class="text-xs text-gray-200 mb-1">Pendidikan & Pengalaman</p>
                    </div>
                </a>

                <a href="#store" class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 flex items-center gap-5 hover:bg-white/20 hover:scale-105 transition-all cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center border border-white/20 group-hover:bg-[#00C853] transition-colors">
                        <i class="fas fa-store text-2xl text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-white text-shadow group-hover:text-green-300">Produk Digital</h3>
                        <p class="text-xs text-gray-200 mb-1">Belanja produk lokal & kode</p>
                    </div>
                </a>

                <a href="#tutorial" class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-5 flex items-center gap-5 hover:bg-white/20 hover:scale-105 transition-all cursor-pointer group shadow-xl">
                    <div class="w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center border border-white/20 group-hover:bg-[#00C853] transition-colors">
                        <i class="fas fa-newspaper text-2xl text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-white text-shadow group-hover:text-green-300">Tutorial Terkini</h3>
                        <p class="text-xs text-gray-200 mb-1">Info project & dokumentasi</p>
                    </div>
                </a>
            </div>
        </main>
    </div>

    <section id="profil" class="max-w-6xl mx-auto px-6 py-20 scroll-mt-10">
        @if($profile)
        <div class="flex flex-col lg:flex-row gap-8 items-start">
            <div class="w-full lg:w-1/3 bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden sticky top-6 hover:shadow-md transition">
                <div class="bg-green-50 h-32 w-full"></div>
                <div class="flex flex-col items-center px-6 pb-8 -mt-16">
                    <div class="w-32 h-32 rounded-full border-4 border-white shadow-md overflow-hidden bg-gray-200 mb-4 z-10">
                        @if($profile->foto_profil)
                            <img src="{{ asset('storage/' . $profile->foto_profil) }}" alt="Foto Profil" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gray-300"><span class="text-gray-500 text-xs">No Photo</span></div>
                        @endif
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 text-center">{{ $profile->nama_lengkap }}</h2>
                    <p class="text-sm text-gray-500 font-medium mb-1">{{ $profile->peran }}</p>
                    <p class="text-xs font-bold text-[#00C853] bg-green-50 px-3 py-1 rounded-full mb-6">NIM: {{ $profile->nim ?? 'F52123032' }}</p>

                    <div class="bg-green-50/50 rounded-2xl p-6 text-center w-full relative">
                        <i class="fas fa-quote-left text-green-200 text-2xl absolute top-4 left-4"></i>
                        <p class="text-gray-600 text-sm italic font-medium relative z-10 mt-4 leading-relaxed">
                            "{{ $profile->bio_singkat }}"
                        </p>
                    </div>

                    <div class="flex gap-3 mt-6">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->whatsapp) }}" target="_blank" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#00C853] hover:text-white transition">
                            <i class="fab fa-whatsapp text-lg"></i>
                        </a>
                        <a href="mailto:{{ $profile->email }}" class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-[#00C853] hover:text-white transition">
                            <i class="fas fa-envelope text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-2/3 flex flex-col gap-6">
                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 hover:shadow-md transition">
                    <div class="space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center py-3 border-b border-gray-50">
                            <div class="flex items-center gap-3 sm:w-1/3 text-gray-500">
                                <i class="far fa-user text-[#00C853]"></i> <span class="text-sm">Nama Lengkap</span>
                            </div>
                            <div class="sm:w-2/3 font-semibold text-gray-800">{{ $profile->nama_lengkap }}</div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center py-3 border-b border-gray-50">
                            <div class="flex items-center gap-3 sm:w-1/3 text-gray-500">
                                <i class="far fa-calendar-alt text-[#00C853]"></i> <span class="text-sm">Usia</span>
                            </div>
                            <div class="sm:w-2/3 font-semibold text-gray-800">{{ $profile->usia ?? '21' }} Tahun</div>
                        </div>
                        <div class="flex flex-col sm:flex-row sm:items-center py-3">
                            <div class="flex items-center gap-3 sm:w-1/3 text-gray-500">
                                <i class="fas fa-map-marker-alt text-[#00C853]"></i> <span class="text-sm">Alamat Basis</span>
                            </div>
                            <div class="sm:w-2/3 font-semibold text-gray-800">{{ $profile->alamat }}</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1 h-6 bg-[#00C853] rounded-full"></div>
                        <h3 class="text-xl font-bold text-gray-800">Riwayat Pendidikan</h3>
                    </div>
                    <div class="relative pl-6 timeline-line space-y-6">
                        @if($profile && !empty($profile->pendidikan))
                            @foreach($profile->pendidikan as $edu)
                            <div class="relative">
                                <div class="absolute -left-[1.95rem] top-1 w-3 h-3 bg-[#00C853] rounded-full border-2 border-white"></div>
                                <h4 class="font-bold text-gray-800">{{ $edu['institusi'] ?? '' }} <span class="text-gray-400 font-normal text-sm ml-2">({{ $edu['tahun'] ?? '' }})</span></h4>
                                <p class="text-sm text-gray-500 mt-1">{{ $edu['deskripsi'] ?? '' }}</p>
                            </div>
                            @endforeach
                        @else
                            <p class="text-gray-500 text-sm">Belum ada data riwayat pendidikan.</p>
                        @endif
                    </div>
                </div> <div class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100 relative hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-1 h-6 bg-[#00C853] rounded-full"></div>
                        <h3 class="text-xl font-bold text-gray-800">Pengalaman Organisasi & Kerja</h3>
                    </div>
                    <div class="relative pl-6 timeline-line space-y-6">
                        @if($profile && !empty($profile->pengalaman))
                            @foreach($profile->pengalaman as $exp)
                            <div class="relative">
                                <div class="absolute -left-[1.95rem] top-1 w-3 h-3 bg-[#00C853] rounded-full border-2 border-white"></div>
                                <h4 class="font-bold text-gray-800">{{ $exp['posisi'] ?? '' }} <span class="text-gray-400 font-normal text-sm ml-2">({{ $exp['tahun'] ?? '' }})</span></h4>
                                <p class="text-sm text-gray-500 mt-1">{{ $exp['deskripsi'] ?? '' }}</p>
                            </div>
                            @endforeach
                        @else
                            <p class="text-gray-500 text-sm">Belum ada data pengalaman.</p>
                        @endif
                    </div>
                </div> </div>
        </div>
        @else
        <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
            <h2 class="text-xl font-semibold text-gray-600">Data profil belum diisi di Admin.</h2>
        </div>
        @endif
    </section>

    <section id="store" class="max-w-7xl mx-auto px-6 py-10 scroll-mt-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Produk Unggulan <span class="text-[#00C853]">RVPS Store</span></h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
            <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-md hover:shadow-xl transition flex flex-col h-full">
                <div class="relative h-48 bg-gray-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    <span class="absolute top-3 left-3 bg-white/90 text-xs font-semibold px-3 py-1 rounded-full">{{ $product->kategori }}</span>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg mb-2">{{ $product->nama_produk }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $product->deskripsi_singkat }}</p>
                    <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-50">
                        <span class="text-[#00C853] font-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        @php
                            $waNumber = $profile ? preg_replace('/[^0-9]/', '', $profile->whatsapp) : '';
                            $waText = urlencode("Halo, saya tertarik dengan produk {$product->nama_produk}");
                        @endphp
                        <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank" class="w-10 h-10 rounded-full border border-green-200 flex items-center justify-center text-[#00C853] hover:bg-green-50 transition">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <p class="col-span-full text-center text-gray-500 py-10">Belum ada produk di etalase RVPS Store.</p>
            @endforelse
        </div>
    </section>

    <section id="tutorial" class="max-w-7xl mx-auto px-6 py-10 scroll-mt-20">
        <div class="flex justify-between items-end mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Tutorial & Artikel <span class="text-[#00C853]">Terbaru</span></h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition">
                <div class="relative h-60 bg-gray-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->judul }}" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    <span class="absolute top-4 left-4 bg-[#00C853] text-white text-xs font-bold px-4 py-1.5 rounded-lg">{{ $article->kategori }}</span>
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-400 mb-2 font-medium"><i class="far fa-calendar-alt"></i> {{ $article->created_at->format('d M Y') }}</p>
                    <h3 class="font-bold text-xl mb-3 line-clamp-2 hover:text-[#00C853] transition cursor-pointer">{{ $article->judul }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-3">{{ Str::limit(strip_tags($article->konten), 120) }}</p>
                </div>
            </div>
            @empty
                <p class="col-span-full text-center text-gray-500 py-10">Belum ada artikel atau tutorial yang diterbitkan.</p>
            @endforelse
        </div>
    </section>

    <section id="portofolio" class="max-w-7xl mx-auto px-6 py-10 mb-20 scroll-mt-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-gray-800">Galeri <span class="text-[#00C853]">Portofolio</span></h2>
        </div>
        <div class="flex flex-col md:flex-row h-[500px] gap-4 md:gap-2">
            @forelse($portfolios as $portfolio)
            <div class="group relative flex-1 hover:flex-[4] transition-all duration-700 ease-in-out rounded-3xl overflow-hidden cursor-pointer bg-gray-800 shadow-md hover:shadow-2xl">
                <img src="{{ asset('storage/' . $portfolio->gambar) }}" alt="{{ $portfolio->judul }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-80 group-hover:opacity-100">
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="absolute inset-0 hidden md:flex items-center justify-center opacity-100 group-hover:opacity-0 transition-opacity duration-300">
                    <h3 class="text-white font-bold tracking-widest uppercase transform -rotate-90 whitespace-nowrap text-sm">{{ Str::limit($portfolio->judul, 20) }}</h3>
                </div>
                <div class="absolute bottom-0 left-0 p-6 opacity-0 group-hover:opacity-100 transition-all duration-500 delay-100 w-full">
                    <h3 class="text-white font-bold text-2xl drop-shadow-lg mb-2">{{ $portfolio->judul }}</h3>
                    <p class="text-gray-200 text-sm line-clamp-2 drop-shadow-md border-l-2 border-green-500/50 pl-3">{{ $portfolio->deskripsi_singkat }}</p>
                </div>
            </div>
            @empty
                <div class="w-full text-center py-20 bg-gray-50 rounded-3xl border border-dashed border-gray-300"><p class="text-gray-500">Belum ada portofolio.</p></div>
            @endforelse
        </div>
    </section>

    <section id="statistik" class="max-w-7xl mx-auto px-6 py-10 mb-20 scroll-mt-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Pencapaian dalam <span class="text-[#00C853]">Angka</span></h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 border-b-4 border-green-500 shadow-md text-center hover:-translate-y-2 transition duration-300">
                <h3 class="text-4xl font-extrabold text-gray-800 mb-1">{{ isset($totalPortfolios) ? $totalPortfolios : 0 }}</h3>
                <p class="text-sm font-medium text-gray-500">Project Selesai</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border-b-4 border-blue-500 shadow-md text-center hover:-translate-y-2 transition duration-300">
                <h3 class="text-4xl font-extrabold text-gray-800 mb-1">{{ isset($totalProducts) ? $totalProducts : 0 }}</h3>
                <p class="text-sm font-medium text-gray-500">Produk Tersedia</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border-b-4 border-yellow-500 shadow-md text-center hover:-translate-y-2 transition duration-300">
                <h3 class="text-4xl font-extrabold text-gray-800 mb-1">{{ isset($totalArticles) ? $totalArticles : 0 }}</h3>
                <p class="text-sm font-medium text-gray-500">Artikel & Tutorial</p>
            </div>
            <div class="bg-white rounded-2xl p-6 border-b-4 border-purple-500 shadow-md text-center hover:-translate-y-2 transition duration-300">
                <h3 class="text-4xl font-extrabold text-gray-800 mb-1">5+</h3>
                <p class="text-sm font-medium text-gray-500">Semester Studi IT</p>
            </div>
        </div>
    </section>

    <footer class="bg-[#111827] text-gray-300 py-16 mt-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 border-b border-gray-700 pb-12">
            <div>
                <h4 class="text-white font-bold text-lg mb-6 flex items-center gap-2">
                    <i class="fas fa-clock text-[#00C853]"></i> Jam Pelayanan Khusus
                </h4>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between border-b border-gray-700 pb-2"><span>Senin - Kamis</span><span>{{ $setting?->jam_senin_kamis ?? '08:00 - 15:00' }}</span></div>
                    <div class="flex justify-between border-b border-gray-700 pb-2"><span>Jumat</span><span>{{ $setting?->jam_jumat ?? '08:00 - 12:00' }}</span></div>
                    <div class="flex justify-between pb-2 text-gray-500"><span>Sabtu - Minggu</span><span class="bg-red-900/50 text-red-400 px-2 rounded text-xs font-bold">TUTUP</span></div>
                </div>
            </div>
            <div>
                <h4 class="text-white font-bold text-lg mb-6">Jelajahi</h4>
                <ul class="space-y-3 text-sm flex flex-col">
                    <li><a href="#profil" class="hover:text-[#00C853] transition inline-block">Sejarah & Profil RVPS</a></li>
                    <li><a href="#store" class="hover:text-[#00C853] transition inline-block">Etalase RVPS Store</a></li>
                    <li><a href="#portofolio" class="hover:text-[#00C853] transition inline-block">Galeri Project</a></li>
                    <li><a href="#statistik" class="hover:text-[#00C853] transition inline-block">Statistik Data</a></li>
                </ul>
            </div>
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center border border-white/20"><i class="fas fa-code text-white text-xs"></i></div>
                    <h4 class="text-white font-bold text-lg">{{ $setting?->nama_web ?? 'RVPS Studio' }}</h4>
                </div>
                <p class="text-sm mb-6 leading-relaxed">Website resmi personal. Media komunikasi, etalase project, dan penyediaan layanan digital untuk kebutuhan sistem informasi.</p>
                <div class="space-y-2 text-sm">
                    <p class="flex items-center gap-3"><i class="fas fa-phone-alt text-[#00C853]"></i> {{ $profile ? $profile->whatsapp : '+62 800 0000' }}</p>
                    <p class="flex items-center gap-3"><i class="fas fa-envelope text-[#00C853]"></i> {{ $profile ? $profile->email : 'hello@rvps.com' }}</p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 pt-6 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
            <p>&copy; {{ date('Y') }} {{ $setting?->nama_web ?? 'RVPS Studio' }} / Richard Valentino. All rights reserved.</p>
            <p class="mt-2 md:mt-0">Developed with Laravel & Tailwind CSS</p>
        </div>
    </footer>

</body>
</html>