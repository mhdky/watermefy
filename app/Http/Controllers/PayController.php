<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function edit(Pay $pay) {
        return view('admin.pay.edit', [
            'title' => 'Watermefy - Edit Pembayaran Pengguna',
            'pay' => $pay
        ]);
    }

    public function update(Request $request, Pay $pay) {
        $valdateData = $request->validate([
            'month' => 'required',
            'year' => 'required',
            'biaya_sewa_air' => 'required|integer|min:1',
            'telah_dibayar' => 'integer|integer|min:0',
            'sisa_bayar' => 'integer|max:30',
            'tanggal_dibayar' => '',
            'tanggal_lunas' => '',
        ]);

        $valdateData['sisa_bayar'] = $valdateData['biaya_sewa_air'] - $valdateData['telah_dibayar'];

        $pay->update($valdateData);

        // $pay->user()->sync(request('users'));

        return redirect('/admin/dashboard')->with('sukses', 'Tabel pembayaran berhasil diupdate');
    }
}
