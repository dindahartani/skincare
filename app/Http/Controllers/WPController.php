<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WPController extends Controller
{

        public function total()
    {
        //query untuk mengambil data waktu penggunaan skincare dan disimpan pada variabel result
        $wp = $this->sparql->query("SELECT * WHERE {?s rdf:type skincare:Waktu_Penggunaan. ?s skincare:Nama ?namawp.} ORDER BY ?s");
        $result = [];
        foreach($wp as $item){
            array_push($result, [
                'id'      => $this->parseData($item->s->getURI()),
                'namawp'      => $this->parseData($item->namawp->getValue())
            ]);
        }
        $data = [
            'wp' => $result
        ];
        return view('waktupenggunaan.totalwp', $data);
    }

        public function show($wp)
    {
         //query untuk mengambil data skincare berdasarkan waktu penggunaan tertentu dan disimpan pada variabel result
         $getnama = $this->sparql->query("SELECT* WHERE {?s skincare:memilikiWaktuPenggunaan skincare:".$wp."; skincare:Nama ?namaprod ; skincare:Gambar ?gambar .} ORDER BY ?s");
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
             'wp'     => $wp
         ];
 
         return view('waktupenggunaan.produk_wp', $data);

    }

}


