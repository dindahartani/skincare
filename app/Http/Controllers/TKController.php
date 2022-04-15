<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TKController extends Controller
{

        public function total()
    {
        //query untuk mengambil data tipe kulit skincare dan disimpan pada variabel result
        $tipekulit = $this->sparql->query("SELECT * WHERE {?s rdf:type skincare:Tipe_Kulit. ?s skincare:Nama ?namatipekulit.} ORDER BY ?s");
        $result = [];
        foreach($tipekulit as $item){
            array_push($result, [
                'id'      => $this->parseData($item->s->getURI()),
                'namatipekulit'      => $this->parseData($item->namatipekulit->getValue())
            ]);
        }
        $data = [
            'tipekulit' => $result
        ];
        return view('tipekulit.totaltipekulit', $data);
    }

        public function show($tipekulit)
    {
         //query untuk mengambil data skincare berdasarkan tipe kulit tertentu dan disimpan pada variabel result
         $getnama = $this->sparql->query("SELECT* WHERE {?s skincare:Cocok_Untuk_Tipe_Kulit skincare:".$tipekulit."; skincare:Nama ?namaprod ; skincare:Gambar ?gambar .} ORDER BY ?s");
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
             'tipekulit'     => $tipekulit
         ];
 
         return view('tipekulit.produk_tipekulit', $data);

    }

}


