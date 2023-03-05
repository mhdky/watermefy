@extends('layouts.main')

@section('main')
    {{-- jumbotron --}}
    <div class="jumbotron fixed -z-10 top-0 right-0 bottom-0 left-0">
        <div class="w-full h-full relative">
            <img src="{{ asset('img/jumbotron.jpg') }}" alt="jumbotron" class="w-full h-full object-cover absolute z-10">
            <div class="bg-[#000000d4] w-full h-full absolute z-20 flex flex-col justify-center">
                {{-- logo --}}
                <a href="/" class="w-[200px] fixed top-0 p-5 md-768:w-[300px] md-768:p-10 lg-1000:w-[320px] lg-1000:p-[50px]"><img src="{{ asset('img/watermefy.png') }}" alt="Logo" class="w-full"></a>

                {{-- welcome --}}
                <h1 class="text-[3rem] text-white-primary font-kanit font-bold px-7 md-768:text-[5rem] md-768:px-24 lg-1000:text-[96px] lg-1000:px-[132px]">Welcome to</h1>
                <h2 class="-mt-4 text-[2rem] text-white-primary font-kanit font-bold px-7 md-768:text-[4rem] md-768:px-24 md-768:-mt-8 lg-1000:text-[64px] lg-1000:px-[132px]"><span class="text-primary font-kanit font-bold">Water</span>mefy</h2>
                <p class="font-bold px-7 text-white-primary md-768:text-xl md-768:px-24 lg-1000:text-[24px] lg-1000:px-[132px]">Layanan penyewaan air bersih Ibu Laila</p>
            </div>
        </div>
    </div>

    <div class="bg-white w-full h-[100vh] mt-[100vh] flex flex-col">
        <div class="bg-white">
            {{-- navigation --}}
            <div class="bg-primary w-full p-3 flex justify-center md-768:px-10">
                <div class="w-full flex justify-between items-center">
                    <a href="/"><img src="{{ asset('img/watermefy-logo.png') }}" alt="jumbotron-2" class="w-[150px]"></a>
                    

                    {{-- list nav desktop --}}
                    <ul class="hidden text-white-primary font-bold md-768:flex">
                        <li class="ml-5"><a href="/">Beranda</a></li>
                        <li class="ml-5"><a href="/tentang">Tentang</a></li>
                    </ul>

                    {{-- burger button --}}
                    <div class="w-6 h-5 flex flex-col justify-between relative md-768:hidden" onclick="burgerButton()">
                        <span class="lineBurgerButton bg-white-primary w-full h-[3px] rounded-md duration-300"></span>
                        <span class="lineBurgerButton bg-white-primary w-full h-[3px] rounded-md duration-300"></span>
                        <span class="lineBurgerButton bg-white-primary w-full h-[3px] rounded-md duration-300"></span>

                        {{-- list nav mobile --}}
                        <div class="listNavMobile bg-blue-secondary w-40 hidden rounded-md absolute z-30 top-7 right-0 shadow-sm shadow-blue-90000 md-768:hidden">
                            <ul>
                                <li class="my-3 mx-5"><a href="/" class="text-white-primary font-bold cursor-default">Beranda</a></li>
                                <li class="my-3 mx-5"><a href="/tentang" class="text-white-primary font-bold cursor-default">Tentang</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- container search dan form pengguna air bersih --}}
            <div class="pt-5 sticky z-20 top-0 bg-white md-768:pt-10 md-768:-top-6">
                <div class="bg-primary w-[95%] h-14 mx-auto px-5 flex justify-between items-center sticky z-20 top-5 rounded-md md-768:w-[90%]  lg-1094:w-[1000px]">
                <h1 class="text-white-primary text-lg font-bold">Daftar Pengguna Air Bersih</h1>

                {{-- form cari pengguna desktop --}}
                <form action="/" method="get" autocomplete="off" class="hidden md-768:block">
                    <input type="search" name="search" id="search" placeholder="Cari pengguna" maxlength="30" value="{{ (request('search') ? : '') }}" oninput="checkInput()" class="inputSearch bg-blue-secondary w-72 py-1 px-2 rounded-md text-white-primary border-slate-500 focus:border-slate-500 focus:ring-0 focus:outline-none">
                    <button type="submit" disabled class="btnSearch"></button>
                </form>

                {{-- button cari pengguna --}}
                <div class="w-6 h-6 flex justify-end items-center md-768:hidden" onclick="buttonSearch()">
                    <i class="fa-solid fa-magnifying-glass text-white-primary"></i>
                </div>
            </div>
            </div>

            {{-- container nama pengguna --}}
            @foreach ($tenants as $tenant)
                <div class="container-nama-pangguna userName w-full">
                    {{-- nama pengguna --}}
                    <div class="btnDropDownNamaPengguna bg-gray-light w-[95%] h-11 mx-auto mt-1 rounded-md sticky z-10 top-[80px] flex justify-between items-center md-768:w-[90%] md-768:cursor-pointer lg-1094:w-[1000px]">
                        <h3 class="text-primary font-bold px-5 sm-393:hidden">{{ Str::limit(Str::title($tenant->name), 26) }}</h3>
                        <h3 class="text-primary font-bold px-5 hidden sm-393:block sm-428:hidden">{{ Str::limit(Str::title($tenant->name), 30) }}</h3>
                        <h3 class="text-primary font-bold px-5 hidden sm-428:block md-768:hidden">{{ Str::limit(Str::title($tenant->name), 35) }}</h3>
                        <h3 class="text-primary font-bold px-5 hidden md-768:block md-820:hidden">{{ Str::limit(Str::title($tenant->name), 65) }}</h3>
                        <h3 class="text-primary font-bold px-5 hidden md-820:block">{{ Str::limit(Str::title($tenant->name), 75) }}</h3>

                        <i class="arrowDown fa-solid fa-sort-down text-primary text-2xl -mt-3 px-5"></i>
                    </div>

                    {{-- container table --}}
                    <div class="dropDownNamaPengguna w-[95%] mx-auto h-0 mt-0.2 overflow-hidden md-768:w-[90%] lg-1094:w-[1000px]">
                        <table class="bg-gray-light w-max text-sm border-none lg-1094:w-[1000px]">
                            <tr class="rounded-md">
                                <th class="px-2 py-3">No</th>
                                <th class="px-2 py-3">Bulan</th>
                                <th class="px-2 py-3">Tahun</th>
                                <th class="px-2 py-3">Biaya Sewa Air</th>
                                <th class="px-2 py-3">Jumlah Yang Dibayar</th>
                                <th class="px-2 py-3">Sisa Biaya Air</th>
                                <th class="px-2 py-3">Tanggal Pembayaran Terakhir</th>
                                <th class="px-2 py-3">Tanggal Lunas</th>
                            </tr>
                            @foreach ($tenant->pay as $pay)
                                <tr class="rounded-md border-y-[4px] border-y-white">
                                    <td class="px-2 py-3 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-2 py-3 text-center">{{ $pay->month }}</td>
                                    <td class="px-2 py-3 text-center">{{ $pay->year }}</td>
                                    <td class="px-2 py-3 text-center">Rp. {{ number_format($pay->biaya_sewa_air,0,'','.') }}</td>
                                    <td class="px-2 py-3 text-center">Rp. {{ number_format($pay->telah_dibayar,0,'','.') }}</td>
                                    <td class="px-2 py-3 {{ ($pay->sisa_bayar == 0 ? 'text-green-600 font-bold' : '') }} text-center">{{ ($pay->sisa_bayar == 0 ? 'Lunas' : 'Rp. ' . number_format($pay->sisa_bayar,0,'','.')) }}</td>
                                    <td class="px-2 py-3 {{ ($pay->tanggal_dibayar === NULL ? 'text-red-600 font-bold' : '') }} text-center">{{ ($pay->tanggal_dibayar === NULL ? 'Belum Membayar' : Carbon\Carbon::parse($pay->tanggal_dibayar)->format('d F, Y')) }}</td>
                                    <td class="px-2 py-3 {{ ($pay->tanggal_lunas === NULL ? 'text-red-600 font-bold' : '') }} text-center">{{ ($pay->tanggal_lunas === NULL ? 'Belum Lunas' : Carbon\Carbon::parse($pay->tanggal_lunas)->format('d F, Y')) }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            @endforeach

            @if ($tenants->count() < 1)
                <div class="w-full h-10 mt-10 text-center">Tidak ada user yang ditemukan</div>
            @endif

            <div class="w-full py-5 px-5 flex justify-center items-center bg-white md-768:w-[90%] md-768:mx-auto md-768:px-0 md-768:justify-end lg-1094:w-[1000px]">
                <p class="text-footer-color text-[0.7rem] text-center md-768:text-sm">© 2023 <a href="https://mhdrizki.com">Muhammad Rizki</a></p>
            </div>
        </div>
        <div class="flex-grow"></div>
    </div>

    {{-- form cari pengguna mobile --}}
    <div class="containerFormSearch bg-[#00000038] hidden flex-col justify-end fixed z-30 top-0 right-0 bottom-0 left-0 md-768:hidden">
        <div class="closeSearch w-full h-full absolute z-10 md-768:hidden" onclick="closeSearch()"></div>

        <div class="formSearch bg-primary w-full h-[50vh] px-5 rounded-t-3xl absolute z-20 duration-300 md-768:hidden">
            <form action="/" method="get" autocomplete="off">
                <input type="search" name="search" id="search" placeholder="Cari pengguna" value="{{ (request('search') ? : '') }}" oninput="checkInputMobile()" class="inputSearchMobile w-full h-12 bg-blue-secondary mt-7 px-2 rounded-md text-white-primary border-slate-500 focus:border-slate-500 focus:ring-0 focus:outline-none">

                <button type="submit" disabled class="btnSearchMobile"></button>
            </form>
        </div>
    </div>
@endsection

@section('script-home')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection