<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <link rel="icon" type="image" href="{{ asset('img/watermefy (2).png') }}">

    <title>{{ ($title) }}</title>
</head>
<body>
    <div class="bg-admin-body w-full h-screen flex justify-center items-center">
        <div class="bg-white w-[93%] h-[87%] flex rounded-[20px] overflow-hidden">
            {{-- nav admin --}}
            <div class="bg-primary w-[195px] h-full">
                <a href="/"><img src="{{ asset('img/watermefy-logo.png') }}" alt="Logo" class="w-[135px] mx-auto my-10"></a>
            
                {{-- list admin --}}
                <ul>
                    <li class="{{ (Request::is('admin/dashboard*') ? 'bg-nav-admin-active' : 'bg-nav-admin-nonactive') }} h-10 flex items-center relative hover:bg-nav-admin-active">
                        <a href="/admin/dashboard" class="absolute w-full h-full"></a>
                        <i class="fas fa-home text-[18px] ml-5 mr-4 text-white-primary"></i>
                        <p class="text-[13px] text-white-primary">Dashboard</p>
                    </li>
                    <li class="{{ (Request::is('admin/setting*') ? 'bg-nav-admin-active' : 'bg-nav-admin-nonactive') }} h-10 mt-0.5 flex items-center relative hover:bg-nav-admin-active">
                        <a href="/admin/setting" class="absolute w-full h-full"></a>
                        <i class="fas fa-cog text-[20px] ml-5 mr-4 text-white-primary"></i>
                        <p class="text-[13px] text-white-primary">Setting</p>
                    </li>
                </ul>
            </div>

            {{-- container user --}}
            <div class="bg-sprite h-full w-full p-6 flex-[2]">
                <div class="w-full h-full flex flex-col">
                    {{-- container search dan dropdown user --}}
                    <div class="w-full flex justify-end relative">
                        {{-- search --}}
                        <form action="/admin/dashboard" method="get" autocomplete="off" class="bg-white w-[256px] h-11 mr-4 px-2 flex items-center rounded-[10px]">
                            <input type="search" name="search" maxlength="30" placeholder="Cari pengguna air bersih" value="{{ (request('search') ? : '') }}" oninput="checkInput()" class="inputSearch w-full h-[30px] mr-2 p-0 border border-transparent flex-[2] focus:ring-0 focus:border-transparent text-[12px]">
                            <button type="submit" disabled class="btnSearch bg-primary w-[30px] h-[30px] rounded-[5px]">
                                <i class="fas fa-search text-white-primary text-[12px]"></i>
                            </button>
                        </form>

                        {{-- admin dropdown --}}
                        <div class="adminDropDown bg-white w-[193px] h-11 px-2 flex justify-between items-center rounded-[10px] cursor-pointer relative">
                            <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/avatar.png') }}" alt="Profile" class="bg-primary w-[30px] mr-2 h-[30px] object-cover rounded-[5px]">
                            <p class="text-black-primary w-32 text-[12px] font-bold">{{ Str::title(Str::limit(Auth::user()->name, 15)) }}</p>
                            <i class="arrowDropdown fas fa-chevron-down text-black-primary text-[12px] duration-150"></i>
                        </div>
                        {{-- list dropdown --}}
                        <div class="listDropdown bg-white w-[193px] h-max py-1 hidden absolute z-10 -bottom-[165px] right-0 rounded-[10px] border border-slate-300 overflow-hidden">
                            <a href="/admin/register" class="h-12 w-full flex items-center hover:bg-slate-100">
                                <i class="fas fa-user-cog text-black-primary text-lg ml-6 mr-4"></i>
                                <p class="text-black-primary text-[13px]">Add an Admin</p>
                            </a>
                            <a href="/admin/setting" class="h-12 w-full flex items-center border-b border-slate-300 hover:bg-slate-100">
                                {{-- <i class="fas fa-user text-black-primary text-lg ml-6 mr-4"></i> --}}
                                <i class="fas fa-cog text-black-primary text-lg ml-6 mr-4"></i>
                                <p class="text-black-primary text-[13px]">Setting</p>
                            </a>
                            <form action="{{ route('logout') }}" method="post" class="w-full h-12">
                                @csrf
                                <button type="submit" class="w-full h-full mt-1 flex items-center hover:bg-slate-100">
                                    <i class="fas fa-sign-out-alt text-black-primary text-lg ml-6 mr-4"></i>
                                    <p class="text-black-primary text-[13px]">Log Out</p>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- container data user --}}
                    <div class="bg-white w-full h-full mt-5 flex-[2] rounded-[20px] overflow-hidden">
                        <div class="containerDataUser w-full h-full pb-5 overflow-auto">
                            {{-- section on /admin/dashboard page  --}}
                            @yield('section-on-admin-dashboard-page')
                            {{-- end section on page --}}
        
                            @yield('edit-update')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- section on /admin/dashboard page two  --}}
    @yield('section-on-admin-dashboard-page-two')
    {{-- end section on page two --}}


    {{-- alert tenant berhasil ditambah --}}
    @if (session()->has('sukses'))
        <div class="alert-user-berhasil w-full fixed z-40 bottom-0 left-0 flex justify-center items-end">
            <div class="bg-primary p-3 m-3 text-white rounded-md shadow-md shadow-slate-400">{{ session('sukses') }}</div>
        </div>
    @endif

    @yield('script-admin-setting')

    <script src="{{ asset('js/script-admin-dasboard.js') }}"></script>
    <script src="https://kit.fontawesome.com/209072fbdb.js" crossorigin="anonymous"></script>
</body>
</html>