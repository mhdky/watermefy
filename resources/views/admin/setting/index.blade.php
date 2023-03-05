@extends('layouts.layout-admin')

@section('edit-update')
    <div class="w-full p-5">
        <h1 class="text-primary text-lg font-bold mb-5">Admin Setting</h1>

        <div class="w-[90%] mx-auto flex justify-between">
            <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data" autocomplete="off" class="w-[45%]">
                @csrf
                @method('put')
                {{-- image profile --}}
                <div class="bg-primary w-20 h-20 rounded-full relative border-[4px] border-black-primary">
                    <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('img/avatar.png') }}" alt="Profile" class="imgPreview w-full h-full object-cover rounded-full">
                    <div class="bg-[#00000098] w-8 h-8 rounded-full absolute -right-2 -bottom-1 flex justify-center items-center hover:bg-[#000000bb]">
                        <div class="w-full h-full rounded-full relative">
                            <div class="absolute top-0 right-0 bottom-0 left-0 flex justify-center items-center rounded-full">
                                <i class="fa-solid fa-camera text-white-primary text-sm"></i>
                            </div>
                            <div class="absolute top-0 right-0 bottom-0 left-0 overflow-hidden rounded-full">
                                <input type="file" name="avatar" onchange="previewImage()" class="inputFile imageSuccess h-60 cursor-pointer -mt-20 -ml-32 opacity-0">
                            </div>
                        </div>
                    </div>
                </div>
                @error('avatar')
                    <p class="mt-2 mb-5 text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <div class="flex flex-col mt-5">
                    {{-- name --}}
                    <label for="name" class="text-black-primary text-[12px] font-bold">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', Str::title($user->name)) }}" autofocus class="inputNameSetting border-transparent border-b-slate-200 text-black-primary text-sm focus:border-b-slate-200 focus:border-transparent focus:ring-0">
                    @error('name')
                        <p class="text-red-500 text-[12px]">{{ $message }}</p>
                    @enderror

                    {{-- email --}}
                    <label for="email" class="mt-5 text-black-primary text-[12px] font-bold">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="inputEmailSetting border-transparent border-b-slate-200 text-black-primary text-sm focus:border-b-slate-200 focus:border-transparent focus:ring-0">
                    @error('email')
                        <p class="text-red-500 text-[12px]">{{ $message }}</p>
                    @enderror

                    <div class="w-full flex justify-end mt-5 relative">
                        <button type="submit" class="btnSetting bg-green-500 ml-3 px-4 py-2 rounded-md text-white text-[12px]">Simpan</button>
                    </div>
                </div>
            </form>

            <form action="{{ route('user.update.password') }}" method="post" class="w-[45%]">
                @csrf
                @method('PUT')
                <h1 class="text-primary font-bold">Update Password</h1>
                <div class="flex flex-col mt-5">
                    {{-- password lama --}}
                    <label for="password lama" class="text-black-primary text-[12px] font-bold">Password Saat Ini</label>
                    <input type="password" name="current_password" id="password lama" autofocus class="inputEditPass border-transparent border-b-slate-200 text-black-primary text-sm focus:border-b-slate-200 focus:border-transparent focus:ring-0">
                    @error('current_password')
                        <p class="text-red-500 text-[12px]">{{ $message }}</p>
                    @enderror

                    {{-- password baru --}}
                    <label for="password baru" class="mt-5 text-black-primary text-[12px] font-bold">Password Baru</label>
                    <input type="password" name="password" id="password baru" class="inputEditPass border-transparent border-b-slate-200 text-black-primary text-sm focus:border-b-slate-200 focus:border-transparent focus:ring-0">
                    @error('password')
                        <p class="text-red-500 text-[12px]">{{ $message }}</p>
                    @enderror

                    {{-- konfirmasi password baru --}}
                    <label for="konfirmasi password baru" class="mt-5 text-black-primary text-[12px] font-bold">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" id="konfirmasi password baru" class="inputEditPass border-transparent border-b-slate-200 text-black-primary text-sm focus:border-b-slate-200 focus:border-transparent focus:ring-0">
                    @error('password_confirmation')
                        <p class="text-red-500 text-[12px]">{{ $message }}</p>
                    @enderror

                    <div class="w-full flex justify-end mt-5">
                        <button type="submit" disabled class="btnEditPass opacity-50 bg-green-500 ml-3 px-4 py-2 rounded-md text-white text-[12px]">Simpan</button>
                    </div>
                </div>
            
            </form>
        </div>
    </div>

    <script>
        const inputNameSetting = document.querySelector('.inputNameSetting');
        const inputEmailSetting = document.querySelector('.inputEmailSetting');
        const btnSetting = document.querySelector('.btnSetting');

        inputNameSetting.addEventListener('input', validateInput);
        inputEmailSetting.addEventListener('input', validateInput);

        function validateInput() {
            let name = inputNameSetting.value;
            const email = inputEmailSetting.value;

            // menghapus spasi menggunakan method replace
            name = name.replace(/\s/g, '');

            const isNameValid = name.length >= 3;
            const isEmailValid = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email);

            btnSetting.disabled = !(isNameValid && isEmailValid);
            btnSetting.style.opacity = btnSetting.disabled ? 0.5 : 1;
        }

        // validasi update password
        const inputElements = document.querySelectorAll('.inputEditPass');
        const btnElement = document.querySelector('.btnEditPass');

        // Tambahkan event listener pada setiap input element
        inputElements.forEach(inputElement => {
            inputElement.addEventListener('input', validateInputs);
        });

        function validateInputs() {
            let isValid = true;

            // Loop melalui setiap input element
            inputElements.forEach(inputElement => {
                // Cek apakah input element memiliki nilai dan tidak hanya terdiri dari spasi
                const inputValue = inputElement.value;
                if (!inputValue || inputValue.length < 8) {
                isValid = false;
                }
            });

            // Jika semua input element terisi minimal 8 karakter dan tidak hanya terdiri dari spasi
            if (isValid) {
                // Enable button dan ubah opacity menjadi 1
                btnElement.disabled = false;
                btnElement.style.opacity = 1;
            } else {
                // Disable button dan ubah opacity menjadi 0.5
                btnElement.disabled = true;
                btnElement.style.opacity = 0.5;
            }
        }



    </script>
@endsection

@section('script-admin-setting')
    <script src="{{ asset('js/script-admin-setting.js') }}"></script>
@endsection