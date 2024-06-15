<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,600;1,600&display=swap"
          rel="stylesheet">
    <title>Dashboard | URL_SHORTENER</title>
</head>

<body class="flex justify-center items-center flex-col">
<style>
    * {
        font-family: 'Source Code Pro', monospace;
    }
</style>
<div class="z-40 absolute hidden" onclick="deleteAllForm()" id="overlay"
     style="display: none; background: rgba(0,0,0,0.5); position: fixed; width: 100%; height: 100%; top: 0; left: 0;">
</div>

<section class="w-[95%] xl:w-1/2 my-16">
    <div class="flex justify-between mb-4 flex-wrap">
        <h1 class="font-semibold text-3xl mb-4">Selamat Datang👋, {{ Auth::user()->name }}</h1>
        <div class="flex">
            <button onclick="showCPModal()" class="mr-4 py-2 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out">
                🧑‍💻Profile
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <button type="submit"
                        class="py-3 px-3 rounded-lg border border-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 ease-in-out">
                    🔓Logout
                </button>
            </form>
        </div>
    </div>
    <div class="border-2 border-slate-300 flex px-4 mb-6 rounded-2xl items-start">
        {{-- ANALYTICS --}}
        <div class="my-2">
            <h1 class="text-lg pb-2">📊Analytics</h1>
            <div class="flex">
                <div class="text-center mr-6">
                    <h1 class="text-6xl">{{ $totalUrl }}</h1>
                    <h1 class="mt-1 font-semibold">TOTAL URLS</h1>
                </div>
                <div class="text-center">
                    <h1 class="text-6xl">{{ $clicks }}</h1>
                    <h1 class="mt-1 font-semibold">TOTAL CLICKS</h1>
                </div>
            </div>
        </div>
        <div class="w-0.5 h-36 mx-4 bg-slate-300"></div>
        {{-- NEWS --}}
        <div class="my-2">
            <h1 class="text-lg pb-2">📢Announcement</h1>
            <p>Under Maintenance</p>
        </div>
    </div>

    {{-- NOTIFICATION --}}
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4" id="notif">
            <div class="flex justify-between items-center">
                {{ session('success') }}
                <button onclick="hideNotif()">❌</button>
            </div>
        </div>
    @endif

    @if (session('errors'))
        <div class="bg-red-500 text-white p-4 rounded-lg mb-4" id="notif">
            <div class="flex justify-between items-center">
                <div class="">
                    @foreach (session('errors')->all() as $error)
                        <p>{{ $error }}</p><br>
                    @endforeach
                </div>
                <button onclick="hideNotif()">✖️</button>
            </div>
        </div>
    @endif


    {{-- FORM CREATE URL --}}
    <form action="{{ route('generate-url') }}" method="POST" class="border-2 border-slate-300 p-4 my-4 rounded-xl">
        @csrf
        <label for="original_url" class="font-semibold text-lg">🔗Your Long URL</label>
        <input type="text" name="original_url" class="border border-gray-400 rounded pl-2 h-10 w-full"
               placeholder="Enter URL"><br><br>
        <label for="shortened_url" class="font-semibold text-lg">🖊️Custom Your URL</label><br>
        <label for="shortened_url" class="text-red-500 tracking-tighter text-[0.8rem]">⚠️Isi custom url kamu, Klik
            tombol "Random" untuk generate url secara acak.</label><br>
        <label for="shortened_url" class="font-semibold text-lg">{{ $domain . '/' }}</label>
        <input type="text" name="shortened_url" class="border border-gray-400 rounded pl-2 h-10 w-1/2"
               placeholder="Enter Custom URL" id="shortened_url">
        <button type="button" name="generate"
                class="bg-blue-500 py-2 px-3 rounded-lg text-white text-lg border-2 hover:border-blue-500 hover:bg-transparent transition-all ease-in-out duration-300 hover:text-black"
                onclick="generateRandomURL()">🔀Random
        </button>
        <br>
        <button type="submit" name="submit"
                class="mt-8 py-2 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out">
            📥Create
            Shorten URL
        </button>
    </form>

    <div class="border-2 border-slate-300 flex px-4 py-4 rounded-2xl items-start flex-col">
        {{-- CARD --}}
        @foreach ($urls as $u)
            <div class="border-b-2 border-slate-300 p-2 w-full mb-2 flex justify-between flex-col flex-wrap">
                <div class="mb-4">
                    <a id="link{{ $loop->iteration }}" class="font-semibold text-2xl tracking-tight"
                       id="shortened_url"><span class="text-blue-500">{{ $domain . '/' . $u->shortened_url }}</a>
                    {{-- info bawah --}}
                    <div class="mt-2 flex flex-wrap justify-between">
                        <h1 class="mr-4">🔗{{ \Illuminate\Support\Str::limit($u->original_url, 50) }}</h1>
                        <div class="flex">
                            <h1 class="mr-4">🕑{{ $u->created_at }}</h1>
                            <h1 class="mr-4">👆{{ $u->clicks }}</h1>
                        </div>
                    </div>
                </div>
                <div class="xl:mt-0">
                    <button onclick="copyLink('link{{ $loop->iteration }}')"
                            class="h-auto py-1 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out">
                        📋Copy
                    </button>
                    <button
                        onclick="showEditForm('{{ $u->original_url }}', '{{ $u->shortened_url }}', {{ $u->id }})"
                        class="py-1 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out">
                        ✏️Edit
                    </button>
                    <button onclick="showDeleteModal('{{ $u->shortened_url }}', {{ $u->id }})"
                            class="py-1 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out">
                        🗑️Delete
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $urls->links() }}
    </div>
</section>

{{-- EDIT MODAL --}}
<div class="z-50 absolute flex justify-center items-center w-full">
    <form action="{{ route('edit-url', ['id' => request()->input('id')]) }}" method="POST"
          class="editModal border-2 border-slate-300 p-4 rounded-xl bg-white w-[90%] sm:w-3/4 md:w-1/2 hidden"
          id="editModal">
        @csrf
        @method('PUT')
        <label for="original_url" class="font-semibold text-lg">🔗Your Long URL</label>
        <input type="text" name="original_url" class="border border-gray-400 rounded pl-2 h-10 w-full"
               placeholder="Enter URL"><br><br>
        <label for="shortened_url" class="font-semibold text-lg">🖊️Custom Your URL</label><br>
        <label for="shortened_url" class="text-red-500 tracking-tighter text-[0.8rem]">⚠️Isi
            custom url kamu, Klik
            tombol "Random" untuk generate url secara acak.</label><br>
        <label for="shortened_url" class="font-semibold text-lg">{{ $domain . '/' }}</label>
        <input type="text" name="shortened_url" class="border border-gray-400 rounded pl-2 h-10 w-1/2"
               placeholder="Enter Custom URL" id="shortened_url">
        <button type="button" name="generate"
                class="bg-blue-500 py-2 px-3 rounded-lg text-white text-lg border-2 hover:border-blue-500 hover:bg-transparent transition-all ease-in-out duration-300 hover:text-black"
                onclick="generateRandomURL()">🔀Random
        </button>
        <br>
        <button type="submit" name="submit"
                class="mt-8 py-2 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out">
            📤Edit
            URL
        </button>
        <a onclick="deleteAllForm()"
           class="mt-8 py-2 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out cursor-pointer">🔙Cancel</a>
        <input name="id" type="hidden" value="">
    </form>
</div>

{{-- DELETE MODAL --}}
<div class="z-50 absolute flex justify-center items-center w-full">
    <form action="{{ route('delete-url', ['id' => request()->input('id')]) }}" method="POST"
          class="deleteModal border-2 border-slate-300 p-3 rounded-xl bg-white w-96 hidden" id="deleteModal">
        @csrf
        @method('DELETE')
        <h1 class="font-semibold text-2xl mb-2">⚠️PERHATIAN !!</h1>
        <div class="flex flex-wrap text-blue-500">
            <p class="text-black">Apakah kamu yakin ingin menghapus</p>
            <span class="underline">{{ $domain . '/' }}</span>
            <h3 class="underline"></h3><span class="text-black underline-no">?</span>
        </div>
        <div class="flex justify-between">
            <a onclick="deleteAllForm()"
               class="mt-8 py-2 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out cursor-pointer">🔙Cancel</a>
            <button type="submit" name="submit"
                    class="mt-8 py-2 px-3 rounded-lg border border-red-500 hover:bg-red-500 hover:text-white transition-all duration-200 ease-in-out">
                🗑️Delete
            </button>
        </div>
        <input name="id" type="hidden" value="">
    </form>
</div>

{{-- PROFILE MODAL --}}
<div class="z-50 absolute flex justify-center items-center w-full">
        <form action="{{ route('change-password') }}" method="POST" id="cpModal" class="flex items-start flex-col p-4 w-1/4 border border-2 rounded-xl bg-white hidden">
            @csrf
            @method('PUT')

        <p class="text-2xl font-bold mb-4">Profile</p>
        <h1 class="text-xl mb-2">Username: {{ Auth::user()->name }}</h1>
            <h1 class="text-xl mb-6">Email: {{ Auth::user()->email }}</h1>
            @error('current_password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <label for="current_password">Current Password</label><br>
            <input type="password" name="current_password" class="border-2 border-slate-300" required><br><br>
            <label for="new_password">New Password</label><br>
            <input type="password" name="new_password" class="border-2 border-slate-300" required><br><br>
            <label for="confirm_password">Confirm Password</label><br>
            <input type="password" name="confirm_password" class="border-2 border-slate-300" required><br><br>
            @error('confirm_password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <button onclick="showCPModal()" class="text-center mt-8 py-2 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out">
                🔒Change Password
            </button>
<button onclick="deleteAllForm()" class="text-center mt-4 py-2 px-3 rounded-lg border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-200 ease-in-out cursor-pointer">🔙Cancel</button>
        </form>
</div>

<script>
    let showEditForm = (original_url, shortened_url, id) => {
        let editModal = document.getElementById('editModal')
        let overlay = document.getElementById('overlay')
        editModal.style.display = 'block'
        overlay.style.display = 'block'

        document.querySelector("#editModal input[name='original_url']").value = original_url
        document.querySelector("#editModal input[name='shortened_url']").value = shortened_url
        document.querySelector("#editModal input[name='id']").value = id
    }

    let showDeleteModal = (shortened_url, id) => {
        let deleteModal = document.getElementById('deleteModal')
        let overlay = document.getElementById('overlay')
        deleteModal.style.display = 'block'
        overlay.style.display = 'block'

        document.querySelector("#deleteModal h3").textContent = shortened_url
        document.querySelector("#deleteModal input[name='id']").value = id
    }

    let showCPModal = () => {
        let cpModal = document.getElementById('cpModal')
        let overlay = document.getElementById('overlay')
        cpModal.style.display = 'block'
        overlay.style.display = 'block'
    }

    let deleteAllForm = () => {
        let editModal = document.getElementById('editModal')
        let deleteModal = document.getElementById('deleteModal')
        let cpModal = document.getElementById('cpModal')
        let overlay = document.getElementById('overlay')
        editModal.style.display = 'none'
        deleteModal.style.display = 'none'
        cpModal.style.display = 'none'
        overlay.style.display = 'none'
    }

    let generateRandomURL = () => {
        let chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        let shortUrl = "";
        for (let x = 0; x <= 6; x++) {
            shortUrl += chars[Math.floor(Math.random() * chars.length)];
        }
        document.getElementById('shortened_url').value = shortUrl;
    }

    // let generateRandomEmoji = () => {
    // 	let allEmoji = ["👦", "🧑", "👧", "👩", "🥷", "👨‍🎓", "👨‍💻", "👩‍💻", "👨‍🔬", "👨‍🚀", "👩‍🚀", "🧕"]
    // 	let emoji = allEmoji[Math.floor(Math.random() * allEmoji.length)]
    // 	document.querySelector("#profileModal p").textContent = emoji
    // }

    let copyLink = (elementId) => {
        let link = document.getElementById(elementId)
        navigator.clipboard.writeText(link.textContent)
        alert("Copied the text: " + link.textContent);
    }

    let hideNotif = () => {
        let notif = document.getElementById('notif')
        notif.style.display = 'none'
    }
</script>
</body>

</html>
