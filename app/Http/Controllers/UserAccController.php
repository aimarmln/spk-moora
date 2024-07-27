<?php

namespace App\Http\Controllers;

use App\Models\UserAcc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserAccController extends Controller
{
    public function admin() 
    {
        $users = UserAcc::all();

        $title = 'Registrasi Guru';
        $role = 'admin';

        return view('admin.registrasi_guru', compact('users', 'title', 'role'));
    }

    public function create()
    {
        $maxIdUser = UserAcc::max('id_user') ?? 0;
        $idUser = $maxIdUser + 1;

        $title = 'Tambah Data Guru';
        $role = 'admin';

        return view('admin.registrasi_guru_tambah', compact('idUser', 'title', 'role'));
    }

    public function store(Request $request) 
    {
        // Validasi data
        $request->validate([
            'id_user'   => 'required|integer',
            'nama_user' => 'required|string|max:50',
            'username'  => 'required|string|max:20',
            'password'  => 'required|string',
            'level'     => 'required|string|in:User',
        ]);

        // Simpan data ke database
        UserAcc::create([
            'id_user'   => $request->id_user,
            'nama_user' => $request->nama_user,
            'username'  => $request->username,
            'password'  => $request->password,
            'level'     => Hash::make($request->level),
        ]);

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.registrasi-guru')->with('insert_success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id) 
    {
        $dataGuru = UserAcc::findOrFail($id);

        $title = 'Edit Akun Guru';
        $role = 'admin';

        return view('admin.registrasi_guru_edit', compact('dataGuru', 'title', 'role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_user' => 'required|string|max:50',
            'username'  => 'required|string|max:20',
            'password'  => 'nullable|string',
        ]);

        $dataGuru = UserAcc::findOrFail($id);

        if (empty($request->password)) {
            $dataGuru->update([
                'nama_user' => $request->nama_user,
                'username'  => $request->username,
            ]);
        } else {
            $dataGuru->update([
                'nama_user' => $request->nama_user,
                'username'  => $request->username,
                'password'  => Hash::make($request->password),
            ]);
        }

        // Redirect ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('admin.registrasi-guru')->with('update_success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari siswa berdasarkan ID
        $guru = UserAcc::find($id);

        // Jika guru ditemukan, hapus
        if ($guru) {
            $guru->delete();
            return redirect()->route('admin.registrasi-guru')->with('delete_success', 'Data guru berhasil dihapus.');
        }

        // Jika guru tidak ditemukan, kembalikan dengan pesan error
        return redirect()->route('admin.registrasi-guru')->with('delete_error', 'Data guru tidak ditemukan.');
    }
}
