<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantDashboardController extends Controller
{
    public function edit(Tenant $tenant) {
        return view('admin.tenant.edit', [
            'title' => 'Wetermefy - Edit Data Pengguna',
            'tenant' => $tenant
        ]);
    }

    public function update(Request $request, Tenant $tenant) {
        $valdateData = $request->validate([
            'name' => 'required|min:3|max:100',
            'status' => 'required|min:3|max:100',
            'url' => 'min:0',
        ]);

        Tenant::where('id', $tenant->id)->update($valdateData);

        return redirect('/admin/dashboard')->with('sukses', 'User berhasil diedit');
    }
}
