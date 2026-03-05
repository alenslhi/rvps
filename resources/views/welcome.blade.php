<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting?->nama_web ?? 'RVPS - Website Personal' }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.3.1/index.min.js"></script>

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; }
        .text-shadow { text-shadow: 0 2px 4px rgba(0,0,0,0.5); }
        .timeline-line::before {
            content: ''; position: absolute; left: 0.35rem; top: 0.5rem; bottom: 0;
            width: 2px; background-color: #22c55e; 
        }
        nav.sticky-active {
            background-color: rgba(0, 0, 0, 0.85);
            padding-top: 0.75rem; padding-bottom: 0.75rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="antialiased text-gray-800">

    <header id="beranda" class="relative min-h-screen flex flex-col overflow-hidden">
        
        <nav id="mainNav" class="fixed top-0 z-50 w-full flex justify-between items-center px-6 lg:px-16 py-6 border-b border-white/10 transition-all duration-500 bg-black/20 backdrop-blur-md">
            <a href="#beranda" class="flex items-center gap-3 cursor-pointer group">
                <div class="w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center border border-white/30 group-hover:bg-[#00C853] transition-all">
                    @if($setting?->logo)
                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="w-6 h-6 object-contain">
                    @else
                        <i class="fas fa-terminal text-white"></i>
                    @endif
                </div>
                <div>
                    <h1 class="font-bold text-lg leading-tight tracking-wide text-white text-shadow uppercase">
                        {{ $setting?->nama_web ?? 'RVPS Studio' }}
                    </h1>
                    <p class="text-[10px] text-gray-300 uppercase tracking-widest text-shadow">Sistem Informasi UNTAD</p>
                </div>
            </a>
            
            <ul class="hidden md:flex gap-8 text-sm font-medium text-gray-200">
                <li><a href="#beranda" class="hover:text-[#00C853] transition">Beranda</a></li>
                <li><a href="#profil" class="hover:text-[#00C853] transition">Profil</a></li>
                <li><a href="#store" class="hover:text-[#00C853] transition">Store</a></li>
                <li><a href="#tutorial" class="hover:text-[#00C853] transition">Blog</a></li>
            </ul>

            <a href="/admin" class="bg-[#00C853] text-white font-bold px-6 py-2 rounded-full text-sm hover:bg-green-600 shadow-lg">Masuk Admin</a>
        </nav>

        <div class="absolute inset-0 z-0 swiper heroSwiper">
            <div class="swiper-wrapper">
                @if($setting?->hero_slideshow && count($setting->hero_slideshow) > 0)
                    @foreach($setting->hero_slideshow as $slide)
                    <div class="swiper-slide bg-cover bg-center h-full relative" style="background-image: url('{{ asset('storage/' . $slide) }}')">
                        <div class="absolute inset-0 bg-black/50"></div>
                    </div>
                    @endforeach
                @else
                    <div class="swiper-slide bg-cover bg-center h-full relative" style="background-image: url('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?q=80&w=1920&auto=format&fit=crop')">
                        <div class="absolute inset-0 bg-black/50"></div>
                    </div>
                @endif
            </div>
        </div>

        <div class="relative z-10 flex-grow flex items-center px-6 lg:px-16 max-w-7xl mx-auto w-full pt-10">
            <div class="max-w-2xl text-white">
                <div class="inline-flex items-center gap-2 bg-black/40 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#00C853] animate-pulse"></span>
                    <span class="text-xs font-bold tracking-widest uppercase">E-Government Specialist</span>
                </div>
                <h2 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 text-shadow">
                    {{ $setting?->hero_judul ?? 'Selamat Datang di Website RVPS' }}
                </h2>
                <p class="text-gray-200 text-lg mb-8 leading-relaxed text-shadow max-w-xl">
                    {{ $setting?->hero_deskripsi ?? 'Mahasiswa Sistem Informasi UNTAD yang berfokus pada pengembangan sistem publik dan inovasi digital.' }}
                </p>
                <div class="flex gap-4">
                    <a href="#profil" class="bg-[#00C853] hover:bg-green-600 text-white font-bold px-10 py-4 rounded-full transition shadow-xl">Jelajahi Profil</a>
                </div>
            </div>
        </div>
    </header>

    <section id="profil" class="max-w-7xl mx-auto px-6 py-24 scroll-mt-20">
        @if($profile)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <div class="lg:col-span-4">
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 overflow-hidden sticky top-24">
                    <div class="bg-[#00C853] h-32 w-full opacity-10"></div>
                    <div class="flex flex-col items-center px-8 pb-10 -mt-20">
                        <div class="w-40 h-40 rounded-full border-8 border-white shadow-2xl overflow-hidden bg-gray-200 mb-6">
                            <img src="{{ $profile->foto_profil ? asset('storage/' . $profile->foto_profil) : 'https://ui-avatars.com/api/?name='.urlencode($profile->nama_lengkap) }}" alt="Foto Richard" class="w-full h-full object-cover">
                        </div>
                        <h2 class="text-2xl font-extrabold text-gray-800 text-center">{{ $profile->nama_lengkap }}</h2>
                        <p class="text-sm text-green-600 font-bold mb-1 uppercase tracking-widest">{{ $profile->peran }}</p>
                        <p class="text-xs text-gray-400 font-bold bg-gray-50 px-4 py-1 rounded-full mb-8 border border-gray-100">NIM: {{ $profile->nim ?? 'F52123032' }}</p>

                        <div class="bg-gray-50 rounded-3xl p-6 text-center w-full">
                            <i class="fas fa-quote-left text-green-200 text-3xl mb-4"></i>
                            <p class="text-gray-600 text-sm italic leading-relaxed">"{{ $profile->bio_singkat }}"</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-8 space-y-8">
                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-50 pb-4 flex items-center gap-3">
                        <i class="fas fa-id-card text-[#00C853]"></i> Identitas Mahasiswa
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest block mb-2">Umur</label>
                            <p class="font-bold text-gray-800 text-lg">{{ $profile->usia ?? '21' }} Tahun</p>
                        </div>
                        <div>
                            <label class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest block mb-2">Lokasi Saat Ini</label>
                            <p class="font-bold text-gray-800 text-lg">{{ $profile->alamat }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-50 pb-4 flex items-center gap-3">
                        <i class="fas fa-graduation-cap text-[#00C853]"></i> Riwayat Pendidikan
                    </h3>
                    <div class="relative pl-8 timeline-line space-y-10">
                        @if($profile->pendidikan)
                            @foreach($profile->pendidikan as $edu)
                            <div class="relative">
                                <div class="absolute -left-[2.15rem] top-1.5 w-4 h-4 bg-[#00C853] rounded-full border-4 border-white shadow-sm"></div>
                                <h4 class="font-bold text-gray-800 text-lg">{{ $edu['institusi'] }} <span class="text-gray-400 font-normal text-sm ml-2">| {{ $edu['tahun'] }}</span></h4>
                                <p class="text-sm text-gray-500 mt-2 leading-relaxed">{{ $edu['deskripsi'] }}</p>
                            </div>
                            @endforeach
                        @else
                            <p class="text-gray-500 italic text-sm">Belum ada data pendidikan.</p>
                        @endif
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] p-10 shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-800 mb-8 border-b border-gray-50 pb-4 flex items-center gap-3">
                        <i class="fas fa-briefcase text-[#00C853]"></i> Pengalaman Organisasi & Kerja
                    </h3>
                    <div class="relative pl-8 timeline-line space-y-10">
                        @if($profile->pengalaman)
                            @foreach($profile->pengalaman as $exp)
                            <div class="relative">
                                <div class="absolute -left-[2.15rem] top-1.5 w-4 h-4 bg-[#00C853] rounded-full border-4 border-white shadow-sm"></div>
                                <h4 class="font-bold text-gray-800 text-lg">{{ $exp['posisi'] }} <span class="text-gray-400 font-normal text-sm ml-2">| {{ $exp['tahun'] }}</span></h4>
                                <p class="text-sm text-gray-500 mt-2 leading-relaxed">{{ $exp['deskripsi'] }}</p>
                            </div>
                            @endforeach
                        @else
                            <p class="text-gray-500 italic text-sm">Belum ada data pengalaman yang ditambahkan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>

    <section id="store" class="max-w-7xl mx-auto px-6 py-20 scroll-mt-24">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-4">{{ $setting?->judul_section_store ?? 'RVPS Store' }}</h2>
            <p class="text-gray-500">Klik produk untuk melihat detail dan memesan.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
            <a href="{{ route('product.show', $product->id) }}" class="group bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-md hover:shadow-2xl transition-all h-full flex flex-col">
                <div class="relative h-52 bg-gray-100 overflow-hidden">
                    <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    <span class="absolute top-4 left-4 bg-black/70 text-white text-[9px] font-bold px-4 py-1.5 rounded-full uppercase backdrop-blur-md border border-white/20">{{ $product->kategori }}</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-bold text-xl mb-2 group-hover:text-[#00C853] transition">{{ $product->nama_produk }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2 mb-6">{{ $product->deskripsi_singkat }}</p>
                    <div class="mt-auto pt-4 border-t border-gray-50 flex justify-between items-center">
                        <span class="text-[#00C853] font-black text-lg">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                        <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center text-[#00C853] group-hover:bg-[#00C853] group-hover:text-white transition-all"><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>
            </a>
            @empty
                <p class="col-span-full text-center text-gray-500 italic">Etalase sedang dipersiapkan.</p>
            @endforelse
        </div>
    </section>

    <section id="tutorial" class="max-w-7xl mx-auto px-6 py-24 scroll-mt-24">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="text-4xl font-extrabold text-gray-800 mb-2">{{ $setting?->judul_section_blog ?? 'Catatan & Tutorial' }}</h2>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @forelse($articles as $article)
            <a href="{{ route('article.show', $article->slug) }}" class="bg-white rounded-[2.5rem] overflow-hidden border border-gray-50 shadow-sm hover:shadow-xl transition-all group block">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="{{ $article->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-8">
                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-[10px] font-black text-[#00C853] uppercase tracking-widest bg-green-50 px-3 py-1 rounded-lg">{{ $article->kategori }}</span>
                        <span class="text-xs text-gray-400 font-medium">{{ $article->created_at->format('d M Y') }}</span>
                    </div>
                    <h3 class="font-bold text-2xl mb-4 line-clamp-2 leading-tight group-hover:text-[#00C853] transition">{{ $article->judul }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-3 leading-relaxed mb-6">{{ Str::limit(strip_tags($article->konten), 120) }}</p>
                    <span class="text-[#00C853] font-bold text-sm flex items-center gap-2 group-hover:translate-x-2 transition-transform">
                        Baca Selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                    </span>
                </div>
            </a>
            @empty
                <p class="col-span-full text-center text-gray-500 italic">Belum ada cerita yang diunggah.</p>
            @endforelse
        </div>
    </section>

    <section id="portofolio" class="max-w-7xl mx-auto px-6 py-20 scroll-mt-24">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-gray-800">{{ $setting?->judul_section_portfolio ?? 'Galeri Momen' }}</h2>
            <p class="text-gray-500 mt-2">Klik foto untuk melihat ukuran penuh.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($portfolios as $portfolio)
            <a data-fslightbox="gallery" href="{{ asset('storage/' . $portfolio->gambar) }}" class="group relative aspect-square rounded-[2rem] overflow-hidden shadow-md block">
                <img src="{{ asset('storage/' . $portfolio->gambar) }}" alt="{{ $portfolio->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col justify-center items-center p-6">
                    <i class="fas fa-search-plus text-white text-3xl mb-2 opacity-80"></i>
                    <p class="text-white font-bold text-sm uppercase text-center">{{ $portfolio->judul }}</p>
                </div>
            </a>
            @empty
                <p class="col-span-full text-center text-gray-500 italic">Galeri masih kosong.</p>
            @endforelse
        </div>
    </section>

    <footer class="bg-[#0B1120] text-gray-400 py-24 mt-20 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-20 pb-20 border-b border-white/5">
            
            <div>
                <h4 class="text-white font-bold text-lg mb-10 flex items-center gap-3 uppercase tracking-widest">
                    <i class="fas fa-calendar-alt text-[#00C853]"></i> Jadwal Kuliah
                </h4>
                <div class="space-y-4 text-xs font-medium">
                    @forelse($schedules ?? [] as $sch)
                        <div class="flex justify-between items-center bg-white/5 p-4 rounded-2xl border border-white/5">
                            <span class="text-gray-100">{{ $sch->hari }}</span>
                            <span class="{{ strtolower($sch->status) == 'free' ? 'text-green-400' : 'text-yellow-400' }} tracking-widest">
                                {{ $sch->jam }} [{{ $sch->status }}]
                            </span>
                        </div>
                    @empty
                        <p class="italic">Jadwal belum diupdate.</p>
                    @endforelse
                </div>
            </div>

            <div>
                <h4 class="text-white font-bold text-lg mb-10 uppercase tracking-widest">Akses Cepat</h4>
                <ul class="space-y-4 text-sm font-semibold">
                    <li><a href="#profil" class="hover:text-white transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-[#00C853]"></i> Tentang RVPS</a></li>
                    <li><a href="#store" class="hover:text-white transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-[#00C853]"></i> RVPS Store</a></li>
                    <li><a href="#tutorial" class="hover:text-white transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-[#00C853]"></i> Blog & Artikel</a></li>
                </ul>
            </div>

            <div>
                <div class="flex items-center gap-4 mb-10">
                    <div class="w-12 h-12 bg-[#00C853] rounded-2xl flex items-center justify-center shadow-lg shadow-green-500/20 rotate-3">
                        <i class="fas fa-code text-white text-xl"></i>
                    </div>
                    <h4 class="text-white font-black text-2xl uppercase tracking-tighter">{{ $setting?->nama_web ?? 'RVPS Studio' }}</h4>
                </div>
                <p class="text-sm leading-relaxed mb-10 opacity-60">"Membangun ekosistem digital mandiri, transparan, dan inovatif."</p>
                <div class="flex gap-4">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->whatsapp ?? '') }}" class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-[#00C853] transition-all"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:{{ $profile->email ?? '' }}" class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-red-500 transition-all"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto px-6 pt-12 flex flex-col md:flex-row justify-between items-center text-[10px] font-bold uppercase tracking-[0.3em] opacity-40">
            <p>&copy; {{ date('Y') }} {{ $setting?->nama_web ?? 'RVPS Studio' }} | Richard Valentino - F52123032</p>
        </div>
    </footer>

    <script>
        const swiper = new Swiper('.heroSwiper', {
            loop: true,
            effect: 'fade',
            autoplay: { delay: 5000, disableOnInteraction: false },
            fadeEffect: { crossFade: true }
        });

        const nav = document.getElementById('mainNav');
        window.onscroll = function() {
            if (window.pageYOffset > 50) {
                nav.classList.add('sticky-active');
                nav.classList.replace('py-6', 'py-4');
            } else {
                nav.classList.remove('sticky-active');
                nav.classList.replace('py-4', 'py-6');
            }
        };
    </script>

</body>
</html>