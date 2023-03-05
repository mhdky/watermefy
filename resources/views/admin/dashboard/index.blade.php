@extends('layouts.layout-admin')

@section('section-on-admin-dashboard-page')
    <div class="sectionNamePAB bg-white w-full py-5 pl-5 pr-[86px] flex justify-between items-center sticky top-0">
        <h1 class="text-primary text-[18px] font-bold">Pengguna Air Bersih</h1>
        <div class="tambahkanPenggunaAPembayaran text-[12px] font-bold underline hover:text-primary cursor-pointer">Tambahkan Tabel</div>
    </div>

    {{-- container tabel pengguna --}}
    <div class="containerTablePw-full pl-5 pr-16">
    <table class="w-full">
        @foreach ($tenants as $tenant)
            <tr class="border-b border-slte-200">
                <td class="w-[35%] px-3 pb-2 pt-5 text-[13px]">{{ Str::title($tenant->name) }}</td>
                <td class="px-3 pb-2 pt-5 text-[13px]">{{ $tenant->status }}</td>
                <td class="w-12 text-right pr-5 pb-2 pt-5"><a href="#"><i class="far fa-eye text-sm showDetailPembayaran"></i></a></td>
                <td class="w-12 text-right pr-5 pb-2 pt-5"><a href="/admin/tenant/{{ $tenant->id }}/edit"><i class="fas fa-edit text-sm"></i></a></td>
                <td class="w-12 text-right pr-5 pb-2 pt-5"><i class="buttonHapusUser fas fa-trash-alt text-sm cursor-pointer"></i></td>
            </tr>
        @endforeach
            
        {{-- jika tidak ada hasil dari pencarian --}}
        @if ($tenants->count() < 1)
            <tr>
                <td colspan="4" class="w-full text-[13px] text-center pr-5 pb-2 pt-5">Nama pengguna tidak ditemukan</td>
            </tr>
        @endif
    </table>
    </div>
@endsection
    
@section('section-on-admin-dashboard-page-two')
    {{-- tabel pembayaran user --}}
    @foreach ($tenants as $tenant)
    <div class="tabelDetailPembayaran bg-[#0000008a] fixed z-20 top-0 right-0 bottom-0 left-0 hidden justify-center items-center overflow-auto">
        <div class="bg-[#ffffff] w-[95%] h-[90%] rounded-[20px] flex flex-col border-[3px] border-[#C1C1C1] overflow-hidden">
            {{-- namesection name pengguna --}}
            <div class="bg-[#F4F4F4] w-full h-[67px] px-5 flex justify-between items-center border borderb-[#C1C1C1]">
                {{-- name pengguna --}}
                <h1 class="text-primary text-lg font-bold">{{ Str::title($tenant->name) }}</h1>

                    {{-- close table pembayar pengguna --}}
                    <div class="closeTableDetailPembayaran bg-transparent w-10 h-10 flex justify-center items-center rounded-full cursor-pointer hover:bg-[#E3E3E3]">
                        <i class="fas fa-times text-black-primary text-lg"></i>
                    </div>
                </div>

                <div class="containerTabelPembayaran bg-white w-full h-full flex-[2] overflow-auto px-5 pb-5">
                    <div class="w-full h-5 bg-white sticky z-20 top-0"></div>
                    <table class="w-full">
                        <tr class="trTablePembayaranPengguna border-b-[3px] border-b-white sticky top-5">
                            <th class="bg-[#F4F4F4] p-3 text-black-primary text-sm">No</th>
                            <th class="bg-[#F4F4F4] p-3 text-black-primary text-sm">Bulan</th>
                            <th class="bg-[#F4F4F4] p-3 text-black-primary text-sm">Tahun</th>
                            <th class="bg-[#F4F4F4] p-3 text-black-primary text-sm">Biaya Sewa Air</th>
                            <th class="bg-[#F4F4F4] p-3 text-black-primary text-sm">Jumlah Yang Dibayar</th>
                            <th class="bg-[#F4F4F4] p-3 text-black-primary text-sm">Sisa Biaya Air</th>
                            <th class="bg-[#F4F4F4] p-3 text-black-primary text-sm">Tanggal Pembayaran Terakhir</th>
                            <th class="bg-[#F4F4F4] py-3 pl-3 pr-6 text-black-primary text-sm">Tanggal Lunas</th>
                            <th colspan="2" class="bg-[#F4F4F4] pr-3 text-black-primary text-sm">Action</th>
                        </tr>
                        @foreach ($tenant->pay as $pay)
                            <tr class="border-b-[3px] border-b-white">
                                <td class="bg-[#F4F4F4] p-3 text-black-primary text-sm text-center">{{ $loop->iteration }}</td>
                                <td class="bg-[#F4F4F4] p-3 text-black-primary text-sm text-center">{{ $pay->month }}</td>
                                <td class="bg-[#F4F4F4] p-3 text-black-primary text-sm text-center">{{ $pay->year }}</td>
                                <td class="bg-[#F4F4F4] p-3 text-black-primary text-sm text-center">Rp {{ number_format($pay->biaya_sewa_air, 0, '', '.') }}</td>
                                <td class="bg-[#F4F4F4] p-3 text-black-primary text-sm text-center">Rp. {{ number_format($pay->telah_dibayar, 0, '', '.') }}</td>
                                <td class="bg-[#F4F4F4] p-3 {{ ($pay->sisa_bayar == 0 ? 'text-green-500 font-bold' : 'text-black-primary') }} text-sm text-center">{{ ($pay->sisa_bayar == 0 ? 'Lunas' : 'Rp. ' . number_format($pay->sisa_bayar,0,'','.')) }}</td>
                                <td class="bg-[#F4F4F4] p-3 text-black-primary {{ ($pay->tanggal_dibayar === NULL ? 'text-red-500 font-bold' : 'text-black-primary') }} text-sm text-center">{{ ($pay->tanggal_dibayar === NULL ? 'Belum Membayar' : Carbon\Carbon::parse($pay->tanggal_dibayar)->format('d F, Y')) }}</td>
                                <td class="bg-[#F4F4F4] py-3 pl-3 pr-6 text-black-primary {{ ($pay->tanggal_lunas === NULL ? 'text-red-500 font-bold' : 'text-black-primary') }} text-sm text-center">{{ ($pay->tanggal_lunas === NULL ? 'Belum Lunas' : Carbon\Carbon::parse($pay->tanggal_lunas)->format('d F, Y')) }}</td>
                                <td class="bg-[#F4F4F4] text-black-primary text-sm text-center"><a href="/admin/pay/{{ $pay->id }}/edit"><i class="fas fa-edit text-sm"></i></a></td>
                                <td class="bg-[#F4F4F4] pr-3 text-black-primary text-sm text-center"><i class="buttonHapusUser fas fa-trash-alt text-sm cursor-pointer"></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    @endforeach

    {{-- alert tambah pengguna atau pembayaran --}}
    <div class="containerAlertPAP bg-[#0000008a] fixed z-20 top-0 right-0 bottom-0 left-0 hidden justify-center items-center overflow-auto">
        <div class="bg-white w-[450px] py-7 rounded-[10px]">
            <h2 class="text-black-primary text-sm text-center">Tabel apa yang ingin anda tambahkan?</h2>
            
            <div class="flex justify-center my-5">
                <p class="tTP text-primary mx-5 text-sm font-bold cursor-pointer">Tabel Pengguna</p>
                <p class="tTPP text-green-600 mx-5 text-sm font-bold cursor-pointer">Tabel Pembayaran Pengguna</p>
            </div>

            <div class="flex justify-end">
                <p class="batalTambahkanTabel bg-red-500 mr-7 px-5 py-1 text-white text-sm rounded-md cursor-pointer">Batal</p>
            </div>
        </div>
    </div>

    {{-- alert tambah pengguna --}}
    <div class="alertTBP bg-[#0000008a] fixed z-20 top-0 right-0 bottom-0 left-0 hidden justify-center items-center overflow-auto">
        <div class="bg-white w-[500px] rounded-[10px] pt-5 pb-8 px-8">
            <form action="/9r2jfwdjsaf0" method="post" autocomplete="off">
                @csrf
                <input type="hidden" name="url" value="{{ uniqid() }}">
                <input type="text" name="name" placeholder="Masukan nama pengguna" maxlength="30" value="{{ old('name') }}" class="InputNP bg-transparent w-full pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                @error('name')
                    <p class="erorrNotif text-red-500 text-sm ml-3">{{ $message }}</p>
                @enderror

                <select name="status" maxlength="30" class="selectTblP bg-transparent w-full mt-5 pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                    @if (old('status') === 'Kontrakan')
                        <option disabled>Status</option>
                        <option selected value="Kontrakan" class="text-black-primary">Kontrakan</option>
                        <option value="Rumah Tangga" class="text-black-primary">Rumah Tangga</option>
                    @elseif(old('status') === 'Rumah Tangga')
                        <option disabled>Status</option>
                        <option value="Kontrakan" class="text-black-primary">Kontrakan</option>
                        <option selected value="Rumah Tangga" class="text-black-primary">Rumah Tangga</option>
                    @else
                        <option selected disabled>Status</option>
                        <option value="Kontrakan" class="text-black-primary">Kontrakan</option>
                        <option value="Rumah Tangga" class="text-black-primary">Rumah Tangga</option>
                    @endif
                </select>
                @error('status')
                    <p class="erorrNotif text-red-500 text-sm ml-3">{{ $message }}</p>
                @enderror

                <div class="flex justify-end mt-5">
                    <p class="batalTambahUser bg-red-500 text-white text-sm px-5 mr-3 py-2 rounded-lg cursor-pointer">Batal</p>
                    <button type="submit" disabled class="btnTblP bg-green-500 text-white text-sm px-5 py-2 rounded-lg opacity-50">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- alert tambah pembayaran pengguna --}}
    <div class="aTPP bg-[#0000008a] fixed z-20 top-0 right-0 bottom-0 left-0 hidden justify-center items-center overflow-auto">
        <div class="bg-white w-[500px] rounded-[10px] pt-5 pb-8 px-8">
            <form action="/ijqdwf03fjids" method="post">
                @csrf
                {{-- pilih user --}}
                <select name="tenants[]" required class="selectTblPay bg-transparent w-full mt-5 pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                    <option disabled selected value="Pilih Pengguna">Pilih Pengguna</option>
                    @foreach ($tenants as $tenant)
                        <option value="{{ $tenant->id }}">{{ Str::title($tenant->name) }}</option>
                    @endforeach
                </select>

                {{-- pilih bulan --}}
                <select name="month" required class="selectTblPay bg-transparent w-full mt-5 pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                    <option disabled selected value="Pilih Bulan">Pilih Bulan</option>
                    <option {{ (old('month') === 'Januari' ? 'selected' : '') }} value="Januari">Januari</option>
                    <option {{ (old('month') === 'Februari' ? 'selected' : '') }} value="Februari">Februari</option>
                    <option {{ (old('month') === 'Maret' ? 'selected' : '') }} value="Maret">Maret</option>
                    <option {{ (old('month') === 'April' ? 'selected' : '') }} value="April">April</option>
                    <option {{ (old('month') === 'Mei' ? 'selected' : '') }} value="Mei">Mei</option>
                    <option {{ (old('month') === 'Juni' ? 'selected' : '') }} value="Juni">Juni</option>
                    <option {{ (old('month') === 'Juli' ? 'selected' : '') }} value="Juli">Juli</option>
                    <option {{ (old('month') === 'Agustus' ? 'selected' : '') }} value="Agustus">Agustus</option>
                    <option {{ (old('month') === 'September' ? 'selected' : '') }} value="September">September</option>
                    <option {{ (old('month') === 'Oktober' ? 'selected' : '') }} value="Oktber">Oktber</option>
                    <option {{ (old('month') === 'November' ? 'selected' : '') }} value="November">November</option>
                    <option {{ (old('month') === 'MareDesember' ? 'selected' : '') }} value="Desember">Desember</option>
                </select>
                @error('month')
                    <p class="erorrNotif-2 mt-1 text-red-500 text-[12px]">{{ $message }}</p>
                @enderror

                {{-- tahun --}}
                <input type="number" name="year" placeholder="Masukan Tahun" value="{{ now()->year }}" class="inputText inputNumber inputNumberMax bg-transparent w-full mt-5 pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                @error('year')
                    <p class="erorrNotif-2 mt-1 text-red-500 text-[12px]">{{ $message }}</p>
                @enderror

                {{-- biaya sewa air --}}
                <input type="number" name="biaya_sewa_air" placeholder="Biaya Sewa Air Bulan Ini" class="inputText inputNumber inputNumberMax inputNumberFix bg-transparent w-full mt-5 pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                @error('biaya_sewa_air')
                    <p class="erorrNotif-2 mt-1 text-red-500 text-[12px]">{{ $message }}</p>
                @enderror

                {{-- biaya yang talah dibayar --}}
                <input type="number" name="telah_dibayar" placeholder="Biaya Yang Telah Dibayar" class="inputText inputNumber telahBayar inputNumberDua inputNumberMax inputNumberFix bg-transparent w-full mt-5 pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                @error('telah_dibayar')
                    <p class="erorrNotif-2 mt-1 text-red-500 text-[12px]">{{ $message }}</p>
                @enderror

                {{-- tanggal pembayaran terakhir --}}
                <p class="text-black-primary text-sm mt-5 ml-3">Tanggal Pembayaran Terakhir</p>
                <input type="date" name="tanggal_dibayar" class="inputDate dateRequired dateRequiredTwo bg-transparent w-full pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                @error('tanggal_dibayar')
                    <p class="erorrNotif-2 mt-1 text-red-500 text-[12px]">{{ $message }}</p>
                @enderror

                {{-- tanggal lunas --}}
                <p class="text-black-primary text-sm mt-5 ml-3">Tanggal Lunas</p>
                <input type="date" name="tanggal_lunas" class="inputDate dateRequired bg-transparent w-full pb-3 border-b-slate-200 border-transparent text-black-primary text-sm focus:border-transparent focus:border-b-slate-200 focus:ring-0">
                @error('tanggal_lunas')
                    <p class="erorrNotif-2 mt-1 text-red-500 text-[12px]">{{ $message }}</p>
                @enderror

                <div class="flex justify-end mt-5">
                    <p class="batalTambahPembayaran bg-red-500 text-white text-sm px-5 mr-3 py-2 rounded-lg cursor-pointer">Batal</p>
                    <button type="submit" disabled class="buttonPay bg-green-500 text-white text-sm px-5 py-2 rounded-lg opacity-50">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- alert hapus tenant --}}
    @foreach ($tenants as $tenant)
        <div class="alertHapusUser bg-[#0000008a] hidden justify-center items-center fixed z-50 top-0 right-0 bottom-0 left-0">
            <div class="bg-white w-80 px-10 py-5 rounded-md">
                <h1 class="text-black-primary text-center font-bold">Hapus {{ Str::title(Str::limit($tenant->name, 15)) }}</h1>
                <p class="text-slate-500 text-sm text-center font-bold mt-5">Apakah anda yakin?</p>
                <div class="w-full flex justify-end items-center mt-5">
                    <p class="tidakHapusUser bg-[#3b83f6cc] hover:bg-blue-500 py-1 px-4 mr-3 cursor-pointer rounded-md text-white">Tidak</p>
                    <form action="/9r2jfwdjsaf0/{{ $tenant->id }}" method="post">
                        @method('delete') 
                        @csrf 
                        <button type="submit" class="text-slate-700 hover:text-black">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- alert hapus pay --}}
    @foreach ($tenants as $tenant)
        @foreach ($tenant->pay as $pay)
            <div class="alertHapusUser bg-[#0000008a] hidden justify-center items-center fixed z-50 top-0 right-0 bottom-0 left-0">
                <div class="bg-white w-80 px-10 py-5 rounded-md">
                    <h1 class="text-center font-bold">Hapus tabel!</h1>
                    <p class="text-slate-500 text-sm text-center font-bold mt-5">Apakah anda yakin?</p>
                    <div class="w-full flex justify-end items-center mt-5">
                        <p class="tidakHapusUser bg-[#3b83f6cc] hover:bg-blue-500 py-1 px-4 mr-3 cursor-pointer rounded-md text-white">Tidak</p>
                        <form action="/ijqdwf03fjids/
                        {{ $pay->id }}" method="post">
                            @method('delete') 
                            @csrf 
                            <button type="submit" class="text-slate-700 hover:text-black">Hapus</button></form>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

    {{-- alert gagal menambah user dan gagal menambah pembayaran user --}}
    @if ($errors->all())
        <div class="alert-user-berhasil w-full fixed z-40 bottom-0 left-0 flex justify-center items-end">
            <div class="bg-red-500 p-3 m-3 text-white rounded-md shadow-md shadow-slate-400">Gagal menambahkan tabel, cek form yang anda isi!</div>
        </div>
    @endif
@endsection