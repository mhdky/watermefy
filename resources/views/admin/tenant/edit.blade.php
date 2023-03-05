@extends('layouts.layout-admin')

@section('edit-update')
    <div class="w-full p-5">
        {{-- name section --}}
        <h1 class="text-sm text-primary"><a href="/admin/dashboard" class="hover:underline">Dashboard</a> / Edit Pengguna Air Bersih</h1>
        
        <form action="/9r2jfwdjsaf0/{{ $tenant->id }}" method="post" autocomplete="off" class="w-full mt-10">
            @method('put')
            @csrf
            <div class="flex flex-col">
                {{-- name --}}
                <label for="name" class="text-slate-500 text-sm">Nama Pengguna</label>
                <input type="text" name="name" id="name" maxlength="30" value="{{ old('name', Str::title($tenant->name)) }}" class="InputNPEdit w-1/2 text-black-primary mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
                @error('name')
                    <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
                @enderror

                {{-- status --}}
                <label for="status" class="text-slate-500 text-sm">Status</label>
                    <select name="status" id="status" class="w-1/2 mb-5 border border-transparent border-b-slate-400 focus:border-transparent focus:border-b-slate-400 focus:ring-0">
                        @if (old('status', $tenant->status) === 'Kontrakan')
                            <option selected value="Kontrakan" class="text-black-primary">Kontrakan</option>
                            <option value="Rumah Tangga" class="text-black-primary">Rumah Tangga</option>
                        @elseif(old('status', $tenant->status) === 'Rumah Tangga')
                            <option value="Kontrakan" class="text-black-primary">Kontrakan</option>
                            <option selected value="Rumah Tangga" class="text-black-primary">Rumah Tangga</option>
                        @endif
                </select>
                @error('status')
                    <p class="mb-5 text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <div class="w-1/2 flex justify-end">
                    <button type="submit" class="btnTblPEdit bg-green-500 px-5 py-3 text-white text-sm rounded-md">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // validasi uaer tidak mengosongkan input name
        const selectTblPEdit = document.querySelector('.InputNPEdit');
        const btnTblPEdit = document.querySelector('.btnTblPEdit');

        selectTblPEdit.addEventListener('input', () => {
            const valueWithoutSpaces = selectTblPEdit.value.replace(/\s+/g, '');
            const valueLength = valueWithoutSpaces.length;

            if (valueLength < 3) {
            btnTblPEdit.disabled = true;
            btnTblPEdit.style.opacity = 0.5;
            } else {
            btnTblPEdit.disabled = false;
            btnTblPEdit.style.opacity = 1;
            }
        });
    </script>
@endsection