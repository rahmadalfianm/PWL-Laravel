<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        //Ambil data tabel Mhs
        $mahasiswa = DB::table('mahasiswa')->get();

        //Kirim data Mhs ke view index
        return view('index',['mahasiswa' => $mahasiswa]);
    }

    public function tambah()
    {
        //panggil view tambah
        return view('tambah');
    }

    public function simpan(Request $request)
    {
        //tambah data ke table mhs
        DB::table('mahasiswa')->insert([
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
        $mahasiswa = DB::table('mahasiswa')->where('id',$id)->get();
        //kirim data mhs yg diambil ke edit.blade.php
        return view('detail',['mahasiswa' => $mahasiswa]);
    }

    public function edit($id)
    {
        //ambil data mhs brdsr id
        $mahasiswa = DB::table('mahasiswa')->where('id',$id)->get();
        //kirim data mhs ke view edit
        return view('edit',['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request)
    {
        //tambah data ke table mhs
        DB::table('mahasiswa')->where('id',$request->id)->update([
            'nama' => $request->namamhs,
            'nim' => $request->nimmhs,
            'email' => $request->emailmhs,
            'jurusan' => $request->jurusanmhs
        ]);
        return redirect('/mahasiswa');
    }

    public function hapus($id)
    {
        //ambil data mhs brdsr id
        $mahasiswa = DB::table('mahasiswa')->where('id',$id)->delete();
        //kirim data mhs ke view edit
        return redirect('/mahasiswa');
    }
}
