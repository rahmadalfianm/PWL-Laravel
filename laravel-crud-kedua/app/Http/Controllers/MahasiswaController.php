<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('index',['mahasiswa' => $mahasiswa]);
    }
    public function tambah()
    {
        return view('tambah');
    }
    public function simpan(Request $request)
    {
        //tambah data ke table mhs
        Mahasiswa::create([
            'nama' => $request->namamhs,
            'nim' => $request->nimmhs,
            'email' => $request->emailmhs,
            'jurusan' => $request->jurusanmhs
        ]);
        return redirect('/mahasiswa');
    }
    public function detail($id)
    {
        //mengambil data mhs brdsr id
        $mahasiswa = Mahasiswa::find($id);
        //kirim data mhs yg diambil ke edit.blade.php
        return view('detail',['mahasiswa' => $mahasiswa]);
    }

    public function edit($id)
    {
        //ambil data mhs brdsr id
        $mahasiswa = Mahasiswa::find($id);
        //kirim data mhs ke view edit
        return view('edit',['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request)
    {
        //tambah data ke table mhs
        $mahasiswa = Mahasiswa::find($request->id);
        $mahasiswa->nama = $request->namamhs;
        $mahasiswa->nim = $request->nimmhs;
        $mahasiswa->email = $request->emailmhs;
        $mahasiswa->jurusan = $request->jurusanmhs;
        $mahasiswa->save();
        return redirect('/');
    }

    public function hapus($id)
    {
        //ambil data mhs brdsr id
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        //kirim data mhs ke view edit
        return redirect('/mahasiswa');
    }
}
