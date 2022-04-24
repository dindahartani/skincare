<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsiaController extends Controller
{

        public function total()
    {
        //query untuk mengambil data usia skincare dan disimpan pada variabel result
        $usia = $this->sparql->query("SELECT * WHERE {?s rdf:type skincare:Usia. ?s skincare:Nama ?namausia.} ORDER BY ?s");
        $result = [];
        foreach($usia as $item){
            array_push($result, [
                'id'      => $this->parseData($item->s->getURI()),
                'namausia'      => $this->parseData($item->namausia->getValue())
            ]);
        }
        $data = [
            'usia' => $result
        ];
        return view('usia.totalusia', $data);
    }

        public function show($usia)
    {
         //query untuk mengambil data skincare berdasarkan usia tertentu dan disimpan pada variabel result
         $getnama = $this->sparql->query("SELECT* WHERE {?s skincare:digunakanUntukUsia skincare:".$usia."; skincare:Nama ?namaprod ; skincare:Gambar ?gambar .} ORDER BY ?s");
         $result = [];
         $jumlah = 0;
         foreach($getnama as $item){
             array_push($result, [
                 'id'            => $this->parseData($item->s->getUri()),
                 'namaprod'      => $this->parseData($item->namaprod->getValue()),
                 'gambar'        => $this->parseData($item->gambar->getValue())
                 
             ]);
             $jumlah = $jumlah + 1;
         }
        
       
         $data = [
             'skincare'  => $result,
             'jumlah'    => $jumlah,
             'usia'     => $usia
         ];
 
         return view('usia.produk_usia', $data);

    }

}


