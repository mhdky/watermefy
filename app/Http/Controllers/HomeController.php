<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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

        return view('home', [
            'title' => 'Watermefy',
            'tenants' => $tenant
        ]);

    }
}
