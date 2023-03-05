@extends('layouts.layout-admin') 

@section('edit-update')
    <div class="w-full p-5">
        {{-- name section --}}
        <h1 class="text-sm text-primary"><a href="/admin/dashboard" class="hover:underline">Dashboard</a> / Edit Pembayaran Air Bersih <span class="font-medium underline">@foreach ($pay->tenant as $tenant) {{ Str::title($tenant->name) }} @endforeach</span></h1>
        
        <form action="/ijqdwf03fjids/{{ $pay->id }}" method="post" class="mt-10">
        @method('put')
        @csrf
        <div class="flex flex-col">
            {{-- bulan --}}
            <label for="status" class="text-slate-500 text-sm">Pilih Bulan</label>
            <select name="month" id="month" class="w-1/2 mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
                @if (old('month', $pay->month) === 'Januari')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option selected value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Februari')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option selected value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Maret')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option selected value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'April')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option selected value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Mei')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option selected value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Juni')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option selected value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Juli')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option selected value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Agustus')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option selected value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'September')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option selected value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Oktber')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option selected value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'November')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option selected value="November">November</option>
                    <option value="Desember">Desember</option>
                @elseif(old('month', $pay->month) === 'Desember')
                    <option disabled value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option selected value="Desember">Desember</option>
                @else
                    <option disabled selected value="Pilih Bulan">Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktber">Oktber</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                @endif
            </select>
            @error('month')
                <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            {{-- year --}}
            <label for="year" class="text-slate-500 text-sm">Tahun</label>
            <input type="number" name="year" id="year" value="{{ old('year', $pay->year)}}" class="inputNumValBut inputNumber inputNumberMaxTwo w-1/2 text-black-primary mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
            @error('year')
                <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            {{-- biaya sewa air --}}
            <label for="biaya_sewa_air" class="text-slate-500 text-sm">Biaya Sewa Air</label>
            <input type="number" name="biaya_sewa_air" id="biaya_sewa_air" value="{{ old('biaya_sewa_air', $pay->biaya_sewa_air)}}" class="inputNumValBut inputNumber biayaSewaAir totalFix inputNumberMaxTwo w-1/2 text-black-primary mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
            @error('biaya_sewa_air')
                <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            {{-- pembayaran terbaru --}}
            <div class="w-1/2 border-b border-slate-400 mb-5">
                <label for="pembayaran terbaru" class="text-slate-500 text-sm">Pembayaran Terbaru</label>
                <div class="flex items-center">
                    <input type="number" id="pembayaran terbaru" class="inputNumber pembayaranTerbaru totalFixTwo inputNumberMaxTwo w-full text-black-primary border border-transparent focus:border-transparent focus:ring-0">
                    <div disabled class="proses prosesTwo bg-blue-500 px-5 py-2 text-white text-sm rounded-md cursor-pointer">Proses</div>
                </div>
            </div>

            {{-- telah dibayar --}}
            <label for="telah_dibayar" class="text-slate-500 text-sm">Total pembayaran</label>
            <input type="number" name="telah_dibayar" id="telah_dibayar" readonly value="{{ old('telah_dibayar', $pay->telah_dibayar)}}" class="inputNumValBut inputNumber totalPembayaran inputNumberMaxTwo w-1/2 text-black-primary mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
            @error('telah_dibayar')
                <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            {{-- Tanggal pembayaran trakhir --}}
            <label for="tanggal_dibayar" class="text-slate-500 text-sm">Tanggal Pembayaran Terakhir</label>
            <input type="date" name="tanggal_dibayar" id="tanggal_dibayar" value="{{ old('tanggal_dibayar', $pay->tanggal_dibayar)}}" class="dateRequiredEdit dateRequiredEditTwo w-1/2 text-black-primary mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
            @error('tanggal_dibayar')
                <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            {{-- Tanggal Lunas --}}
            <label for="tanggal_lunas" class="text-slate-500 text-sm">Tanggal Lunas</label>
            <input type="date" name="tanggal_lunas" id="tanggal_lunas" value="{{ old('tanggal_lunas', $pay->tanggal_lunas)}}" class="dateRequiredEdit w-1/2 text-black-primary mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
            @error('tanggal_lunas')
                <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <div class="w-1/2 flex justify-end">
                <button type="submit" class="btnNumValBut bg-green-500 px-5 py-3 text-white text-sm rounded-md">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <div class="containerDataUser"></div>
    <div class="sectionNamePAB"></div>

    <script>
        // check pay form
        const inputNumValBut = document.querySelectorAll('.inputNumValBut');
        const btnNumValBut = document.querySelector('.btnNumValBut');
        inputNumValBut[0].addEventListener('input', checkValidity);
        inputNumValBut[1].addEventListener('input', checkValidity);
        inputNumValBut[2].addEventListener('input', checkValidity);
        function checkValidity() {
            if (
                inputNumValBut[0].value.length > 3 &&
                inputNumValBut[1].value.length > 1 &&
                inputNumValBut[2].value.length > 0
            ) {
                btnNumValBut.disabled = false; // Mengaktifkan btnNumValBut
                btnNumValBut.style.opacity = 1;
            } else {
                btnNumValBut.disabled = true; // Menonaktifkan btnNumValBut
                btnNumValBut.style.opacity = 0.5;
            }
        }

        // validasi user tidak boleh memasukan angka lebih kecil dari 0
        const inputsss = document.querySelectorAll('.inputNumber');
        inputsss.forEach(input => {
            input.addEventListener('input', function() {
                if (parseFloat(input.value) <= 0 && input.value !== '0') {
                    input.value = '';
                }
                if (/^0\d/.test(input.value)) {
                    input.value = '';
                }
                if (/^-?0$/.test(input.value)) {
                    input.value = '0';
                }
            });
        });

        // memproses pembayaran terbaru
        const totalPembayaran = document.querySelector('.totalPembayaran');
        const pembayaranTerbaru = document.querySelector('.pembayaranTerbaru');
        const biayaSewaAir = document.querySelector('.biayaSewaAir');
        const divProses = document.querySelector('.proses');
        const dateRequiredEdit = document.querySelectorAll('.dateRequiredEdit');

        // Menambahkan event listener ke divProses saat diklik
        divProses.addEventListener('click', function() {
        // Mengambil nilai dari totalPembayaran, pembayaranTerbaru, dan biayaSewaAir
        const number = parseInt(totalPembayaran.value);
        const pembayaran = parseInt(pembayaranTerbaru.value || 0);
        const biaya = parseInt(biayaSewaAir.value);
        
        // Melakukan pengecekan apakah pembayaranTerbaru memiliki nilai
        if (!pembayaran) {
            // Menonaktifkan div proses jika pembayaranTerbaru tidak memiliki nilai
            divProses.setAttribute('disabled', 'disabled');
            // Mengubah opacity pada div proses
            divProses.style.opacity = '0.5';
            // Keluar dari fungsi karena proses tidak dapat dilanjutkan
            return;
        } else {
            // Mengaktifkan div proses jika pembayaranTerbaru memiliki nilai
            divProses.removeAttribute('disabled');
            // Mengubah opacity pada div proses
            divProses.style.opacity = '1';
        }
        
        // Melakukan pengecekan apakah hasil pertambahan lebih besar dari biayaSewaAir
        const hasil = number + pembayaran;
        if (hasil > biaya) {
            // Mengubah nilai pada totalPembayaran menjadi nilai biayaSewaAir
            totalPembayaran.value = biaya;
            // Menyesuaikan nilai pembayaranTerbaru agar hasil penjumlahan sama dengan biayaSewaAir
            const sisa = biaya - number;
            alert(`Sisa pembayaran adalah Rp. ${sisa}`);
            pembayaranTerbaru.value = sisa;
        } else {
            // Mengubah nilai pada totalPembayaran jika hasil tidak lebih besar dari biayaSewaAir
            totalPembayaran.value = hasil;
        }

        // Mengecek apakah nilai totalPembayaran sama dengan biayaSewaAir
        if (hasil === biaya || hasil > biaya) {
            // Mengubah nilai atribut required pada input type date
            dateRequiredEdit.forEach(function(input) {
            input.setAttribute('required', 'required');
            });
        } else {
            // Menghapus nilai atribut required pada input type date
            dateRequiredEdit.forEach(function(input) {
            input.removeAttribute('required');
            });
        }
        });

        // Menambahkan event listener ke pembayaranTerbaru saat terjadi perubahan nilai
        pembayaranTerbaru.addEventListener('input', function() {
        // Menentukan apakah nilai dari pembayaranTerbaru kosong atau tidak
        const kosong = !pembayaranTerbaru.value;
        // Menonaktifkan atau mengaktifkan div proses berdasarkan apakah nilai dari pembayaranTerbaru kosong atau tidak
        kosong ? divProses.setAttribute('disabled', 'disabled') : divProses.removeAttribute('disabled');
        // Mengubah opacity pada div proses berdasarkan apakah nilai dari pembayaranTerbaru kosong atau tidak
        kosong ? divProses.style.opacity = '0.5' : divProses.style.opacity = '1';
        });



        const totalFixTwoInput = document.querySelector('.totalFixTwo');
        const dateRequiredEditTwoInput = document.querySelector('.dateRequiredEditTwo');
        const prosesTwoBtn = document.querySelector('.prosesTwo');

        prosesTwoBtn.addEventListener('click', function() {
        const totalFixTwoValue = parseInt(totalFixTwoInput.value, 10);

        if (totalFixTwoValue > 0) {
            dateRequiredEditTwoInput.required = true;
        } else {
            dateRequiredEditTwoInput.required = false;
        }
        });


        // validasi admin tidak boleh memasukan angka maksimal yang ditentukan laravel
        // Fungsi untuk membatasi nilai maksimum
        function limitMaxValue(input, max) {
            input.addEventListener("input", function() {
                if (this.value > max) {
                this.value = max;
                }
            });
        }    
        // Ambil semua elemen inputNumberMaxTwo
        var inputss = document.getElementsByClassName("inputNumberMaxTwo");

        // Terapkan batasan nilai maksimum pada semua elemen inputNumberMaxTwo
        limitMaxValue(inputss[0], 5000);
        limitMaxValue(inputss[1], 2147483647);
        limitMaxValue(inputss[2], 2147483647);
    </script>

@endsection