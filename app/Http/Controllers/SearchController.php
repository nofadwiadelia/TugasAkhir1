<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\VariableCollection;
use App\Buku;
use App\Kategori;
use App\Kota;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SearchController extends Controller
{
    private $variables;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->variables = new VariableCollection();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bukus = Buku::all();
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


        $bukus = Buku::all();

        return view('search',compact('kategoris','kotas','matchedBukus','matchedBukusK','kategoriName','kotaName','bukus','kotas'));
        
    }
    
        
    public function search(Request $request){
        $query = $request->get('q');
        $hasil = Buku::where('judul', 'LIKE', '%' . $query . '%')->get();
 
        return view('search', compact('hasil', 'query'));

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
