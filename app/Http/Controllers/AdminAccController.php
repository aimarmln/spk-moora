<?php

namespace App\Http\Controllers;

use App\Models\AdminAcc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAccController extends Controller
{
    // mengambil semua data admin
    public function admin()
    {
        $admins = AdminAcc::all();

        $title = 'Registrasi Admin';
        $role = 'admin';

        return view('admin.registrasi_admin', compact('admins', 'title', 'role'));
    }

    // menampilkan form data admin
    public function create()
    {
        $maxIdAdmin = AdminAcc::max('id_admin') ?? 0;
        $idAdmin = $maxIdAdmin + 1;

        $title = 'Tambah Akun Admin';
        $role = 'admin';

        return view('admin.registrasi_admin_tambah', compact('idAdmin', 'title', 'role'));
    }

    // proses manambahkan data admin
    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required|integer',
            'nama_admin' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'level' => 'required|string|in:Admin'
        ]);

        AdminAcc::create([
            'id_admin' => $request->id_admin,
            'nama_admin' => $request->nama_admin,
            'username' => $request->username,
            'password' => $request->password,
            'level' => $request->level
        ]);

        return redirect()->route('admin.registrasi-admin')->with('insert_success', 'Data admin berhasil ditambahkan.');
    }

    // menampilkan form edit admin
    public function edit($id) 
    {
        $dataAdmin = AdminAcc::findOrFail($id);

        $title = 'Edit Akun Admin';
        $role = 'admin';

        return view('admin.registrasi_admin_edit', compact('dataAdmin', 'title', 'role'));
    }

    // proses edit data admin
    public function update(Request $request, $id)
    {
        $dataAdmin = AdminAcc::findOrFail($id);

        $request->validate([
            'nama_admin' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string',
        ]);

        if (empty($request->password)) {
            $dataAdmin->update([
                'nama_admin' => $request->nama_admin,
                'username' => $request->username,
            ]);
        } else {
            $dataAdmin->update([
                'nama_admin' => $request->nama_admin,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.registrasi-admin')->with('update_success', 'Data admin berhasil diperbarui.');
    }

    // menghapus data admin
    public function destroy($id)
    {
        $admin = AdminAcc::find($id);

        if ($admin) {
            $admin->delete();
            return redirect()->route('admin.registrasi-admin')->with('delete_success', 'Data admin berhasil dihapus.');
        }

        return redirect()->route('admin.registrasi-admin')->with('delete_error', 'Data admin tidak ditemukan.');
    }
}
