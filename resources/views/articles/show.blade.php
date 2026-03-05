<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->judul }} - {{ $setting?->nama_web ?? 'RVPS' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F8FAFC; }
        /* Typography Rich Editor Styling */
        .prose p { margin-bottom: 1.5em; line-height: 1.8; color: #4b5563; font-size: 1.05rem;}
        .prose h2 { font-size: 1.8em; font-weight: 800; margin-top: 1.5em; margin-bottom: 0.5em; color: #1f2937; }
        .prose h3 { font-size: 1.4em; font-weight: 700; margin-top: 1.2em; color: #1f2937; }
        .prose ul { list-style-type: disc; padding-left: 1.5em; margin-bottom: 1.5em; color: #4b5563;}
        .prose strong { color: #111827; }
        .prose a { color: #00C853; text-decoration: underline; }
    </style>
</head>
<body class="py-10 px-6">
    <div class="max-w-4xl mx-auto">
        <a href="/#tutorial" class="text-gray-500 hover:text-[#00C853] mb-6 inline-block font-bold"><i class="fas fa-arrow-left"></i> Kembali ke Kumpulan Cerita</a>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="relative h-72 md:h-96 w-full">
                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="w-full h-full object-cover">
                <div class="absolute top-6 right-6 bg-white/90 backdrop-blur-sm text-[#00C853] font-black px-4 py-2 rounded-lg text-xs uppercase tracking-widest shadow-lg">
                    {{ $article->kategori }}
                </div>
            </div>
            
            <div class="p-8 md:p-16">
                <div class="flex items-center gap-4 border-b border-gray-100 pb-6 mb-8">
                    <img src="{{ $profile?->foto_profil ? asset('storage/' . $profile->foto_profil) : 'https://ui-avatars.com/api/?name=RV' }}" class="w-12 h-12 rounded-full object-cover border border-gray-200">
                    <div>
                        <p class="text-sm font-bold text-gray-800">Ditulis oleh {{ $profile->nama_lengkap ?? 'Richard' }}</p>
                        <p class="text-xs text-gray-500"><i class="far fa-calendar-alt"></i> {{ $article->created_at->format('d F Y') }}</p>
                    </div>
                </div>

                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-10 leading-tight">{{ $article->judul }}</h1>
                
                <div class="prose max-w-none">
                    {!! $article->konten !!} 
                </div>
            </div>
        </div>
    </div>
</body>
</html>