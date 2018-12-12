<?php

namespace App\Http\Controllers;

use App\Buku;
use App\Kategori;
use App\Kota;
use App\User;
use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bukus = Buku::all();
        $kategoris = Kategori::select('id', 'kategori_name')->get();
        $kotas = Kota::select('id', 'kota_name')->get();

        return view('buku',compact('bukus','kategoris','kotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bukus = Buku::all();
        $kategoris = Kategori::select('id', 'kategori_name')->get();
        $kotas = Kota::select('id', 'kota_name')->get();

        return view('buku_create',compact('bukus','kategoris','kotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $bukus = new Buku();
        $gambar = $request->file('gambar');
        $ext = $gambar->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $gambar->move('uploads/file',$newName);
        $bukus->gambar = $newName;
        $bukus->judul = $request->judul;
        $bukus->penulis = $request->penulis;
        $bukus->penerbit = $request->penerbit;
        $bukus->kategori_id = $request->kategori_id;
        $bukus->tahun = $request->tahun;
        $bukus->isbn = $request->isbn;
        $bukus->kota_id = $request->kota_id;
        $bukus->harga = $request->harga;
        $bukus->deskripsi = $request->deskripsi;
        $bukus->stok = $request->stok;
        $bukus->save();
        return redirect()->route('buku.index')->with('alert-success','Berhasil Menambahkan Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bukus = Buku::findOrFail($id);
        $kategoris = Kategori::select('id', 'kategori_name')->get();
        $kotas = Kota::select('id', 'kota_name')->get();

        return view('edit_buku',compact('bukus','kategoris','kotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bukus = Buku::findOrFail($id);
        if(empty($request->file('gambar'))){
            $bukus->gambar = $bukus->gambar;
        }else{
            unlink('uploads/file/'.$bukus->gambar); //menghapus file lama
            $gambar = $request->file('gambar');
            $ext = $gambar->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar->move('uploads/file',$newName);
            $bukus->gambar = $newName;
        }
        $bukus->judul = $request->judul;
        $bukus->penulis = $request->penulis;
        $bukus->penerbit = $request->penerbit;
        $bukus->kategori_id = $request->kategori_id;
        $bukus->tahun = $request->tahun;
        $bukus->isbn = $request->isbn;
        $bukus->kota_id = $request->kota_id;
        $bukus->harga = $request->harga;
        $bukus->deskripsi = $request->deskripsi;
        $bukus->stok = $request->stok;
        $bukus->save();
        return redirect()->route('buku.index')->with(
        'alert-success','Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bukus = Buku::findOrFail($id);
        if($bukus->delete()){
            unlink('uploads/file/'.$bukus->gambar); //menghapus file lama
        }
        return redirect()->route('buku.index')->with('alert-succes','Data berhasil dihapus !!!');  
    }
}
