<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\VariableCollection;
use App\Buku;
use App\Kategori;
use App\Kota;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $bukus = Buku::with('user','kategori','kota')->get();
        $kategoris = Kategori::all();
        $kategoriId = @$_GET['cat'];
        $matchedBukus = null; $kategoriName = null;
        if($kategoriId){
            $kategoriName = Kategori::find($kategoriId)->kategori_name;
            $matchedBukus = Buku::where('kategori_id', $kategoriId)->get();
        }

        $kotas = Kota::select('id', 'kota_name')->get();

        $kotas = Kota::all();
        $kotaId = @$_GET['kot'];
        $matchedBukusK = null; $kotaName = null;
        if($kotaId){
            $kotaName = Kota::find($kotaId)->kota_name;
            $matchedBukusK = Buku::where('kota_id', $kotaId)->get();
        }
        return view('inputsearch',compact('bukus','kategoris','kotas', 'matchedBukus','matchedBukusK','kategoriName','kotaName'));
    }

    public function searching(Request $request)
    {
        $bukus = Buku::with('user')->get();;
        $kategoris = Kategori::all();
        $kategoriId = @$_GET['cat'];
        $matchedBukus = null; $kategoriName = null;
        if($kategoriId){
            $kategoriName = Kategori::find($kategoriId)->kategori_name;
            $matchedBukus = Buku::where('kategori_id', $kategoriId)->get();
        }

        $kotas = Kota::select('id', 'kota_name')->get();

        $kotas = Kota::all();
        $kotaId = @$_GET['kot'];
        $matchedBukusK = null; $kotaName = null;
        if($kotaId){
            $kotaName = Kota::find($kotaId)->kota_name;
            $matchedBukusK = Buku::where('kota_id', $kotaId)->get();
        }
        // $keyword = 'Harry';
        $query = $request->keyword;
        $hasil = Buku::where('judul', 'LIKE', '%' . $query . '%')->get();

        $bukus = Buku::all();
        // dd($hasil);
        return view('hasilsearch',compact('kategoris','kotas','matchedBukus','matchedBukusK','kategoriName','kotaName','bukus','kotas','query','hasil'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
