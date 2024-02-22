<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center mt-24 flex-col">
    <h1 class="font-bold text-blue-400 text-4xl">🔗FREE URL SHORTENER✨</h1>
    <h2 class="font-medium text-slate-500 text-2xl w-1/2 text-center mt-2">UBAH <span class="text-blue-500 underline">URL</span> <span class="tracking-widest">PANJANG</span> MENJADI <span class="tracking-tighter">PENDEK</span> DAN MUDAH DIINGAT DENGAN FREE URL SHORTENER DARI {{ $domain }}😎</h2>
    <div class="px-4 py-2 border-2 border-blue-600 rounded-lg flex my-4">
        <div class="text-center">
            <h1 class="font-bold text-blue-500 underline text-lg">example.com/ini-adalah-contoh-link-panjang-banget</h1>
            <h1 class="font-bold">❌❌❌ PANJANG!👎</h1>
        </div>
        <h1 class="font-bold text-xl mx-4">>>></h1>
        <div class="text-center">
            <h1 class="font-bold text-blue-500 underline text-lg">{{ $domain }}/contoh</h1>
            <h1 class="font-bold">✅✅✅ MANTAP👍</h1>
        </div>
    </div>
    <h3 class="font-medium mt-4 text-xl animate-bounce">COBA GRATIS SEKARANG!! 👇</h3>
    <a href="{{ url('/register') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2 font-medium text-2xl hover:border-2 hover:border-blue-500 hover:bg-transparent hover:text-black transition-all duration-100">DAFTAR AKUN 🚀</a>
</body>
</html>