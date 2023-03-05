<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // penyewa
    public function index(Request $request) {
        $query = $request->input('search');

        $tenant = Tenant::with(['pay' => function ($query) {
                $query->latest();
            }])
            ->when($query, function($q) use ($query) {
                return $q->where('name', 'like', '%' . $query . '%');
            })
            ->orderBy('name', 'asc') // menambahkan orderBy() untuk mengurutkan data User berdasarkan name
            ->get();

        return view('admin.dashboard.index', [
            'title' => 'Watermefy',
            'tenants' => $tenant
        ]);
    }

    // menambahkan penyewa
    public function store(Request $request) {
        $valdateData = $request->validate([
            'name' => 'required|min:3|max:100',
            'status' => 'required|min:3|max:100',
            'url' => 'min:0',
        ]);

        Tenant::create($valdateData);

        return redirect('/admin/dashboard')->with('sukses', 'User baru berhasil ditambahkan');
    }

    // menambahkan pay penyewa
    public function storePay(Request $request) {
        $valdateData = $request->validate([
            'month' => 'required',
            'year' => 'required',
            'biaya_sewa_air' => 'required|integer',
            'telah_dibayar' => 'integer|integer',
            'sisa_bayar' => 'integer',
            'tanggal_dibayar' => 'nullable',
            'tanggal_lunas' => 'nullable',
        ]);

        $valdateData['sisa_bayar'] = $valdateData['biaya_sewa_air'] - $valdateData['telah_dibayar'];

        $pay = Pay::create($valdateData);

        $pay->tenant()->attach(request('tenants'));

        return redirect('/admin/dashboard')->with('sukses', 'Tabel pembayaran berhasil ditambahkan');
    }

    // menghapus penyewa
    public function destroy(Tenant $tenant) {        
        Tenant::destroy($tenant->id);
        return redirect('/admin/dashboard')->with('sukses', 'User berhasil dihapus');
    }

    // menghapus pay
    public function destroyPay(pay $pay) {
        $pay->delete();

        return redirect('/admin/dashboard')->with('sukses', 'Tabel berhasil dihapus');
    }
}
