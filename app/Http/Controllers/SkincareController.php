<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkincareController extends Controller
{
    public function detail($idskincare){
          //query untuk mengambil data nama skincare
          $getnama = $this->sparql->query("SELECT * WHERE {skincare:".$idskincare." skincare:Nama ?namaprod }");

          foreach($getnama as $i){
              $nama = $this->parseData($i->namaprod->getValue());
          }
  
          //query untuk mengambil semua data pada satu skincare
          $sql = $this->sparql->query("SELECT * WHERE {skincare:".$idskincare." skincare:Memiliki_MerekSkincare ?m.  skincare:".$idskincare." skincare:Memiliki_JenisSkincare ?j.  skincare:".$idskincare." skincare:Digunakan_Untuk_Mengatasi ?mk. skincare:".$idskincare." skincare:Usia_Minimal ?u . skincare:".$idskincare." skincare:Harga ?h. skincare:".$idskincare." skincare:Volume ?v.skincare:".$idskincare." skincare:Deskripsi ?d. skincare:".$idskincare." skincare:Kandungan ?k. skincare:".$idskincare." skincare:Gambar ?gambar }");
          $jumlah = 0;
          foreach($sql as $item){
              $jumlah = $jumlah + 1;
          }
          $result = [];
          foreach($sql as $item){
              array_push($result, [
                  'merek'        => $this->parseData($item->m->getUri()),
                  'masalahkulit' => $this->parseData($item->mk->getUri()),
                  'jenis'        => $this->parseData($item->j->getUri()),
                  'usia'         => $this->parseData($item->u->getValue()),
                  'harga'        => $this->parseData($item->h->getValue()),
                  'volume'       => $this->parseData($item->v->getValue()),
                  'deskripsi'    => $this->parseData($item->d->getValue()),
                  'kandungan'    => $this->parseData($item->k->getValue()),
                  'gambar'       => $this->parseData($item->gambar->getValue())
              ]);
          }

          //query untuk mengambil data tipekulit skincare
          $gettk = $this->sparql->query("SELECT * WHERE { skincare:".$idskincare." skincare:Cocok_Untuk_Tipe_Kulit ?tk.}");
          $jumlahtk = 0;
          foreach($gettk as $item){
              $jumlahtk = $jumlahtk + 1;
          }
          $resulttk = [];
          foreach($gettk as $item){
              array_push($resulttk, [
                'tipekulit'    => $this->parseData($item->tk->getUri())
              ]);
          }
          
           //query untuk mengambil data waktu penggunaan skincare
           $getwp = $this->sparql->query("SELECT * WHERE { skincare:".$idskincare." skincare:Memiliki_WaktuPenggunaan ?wp.}");
           $jumlahwp = 0;
           foreach($getwp as $item){
               $jumlahwp = $jumlahwp + 1;
           }
           $resultwp = [];
           foreach($getwp as $item){
               array_push($resultwp, [
                'waktupenggunaan'         => $this->parseData($item->wp->getUri())
               ]);
           }

           //query untuk mengambil data usia skincare
           $getu = $this->sparql->query("SELECT * WHERE { skincare:".$idskincare." skincare:Digunakan_Untuk_Usia ?u.}");
           $jumlahu = 0;
           foreach($getu as $item){
               $jumlahu = $jumlahu + 1;
           }
           $resultu = [];
           foreach($getu as $item){
               array_push($resultu, [
                'usia'         => $this->parseData($item->u->getUri())
               ]);
           }
   
          $data = [
              'skincare'      => $result,
              'nama'          => $nama,
              'skincarewp'    => $resultwp,
              'skincaretk'    => $resulttk,
              'skincareu'    => $resultu,
              'jumlah'        => $jumlah,
              'jumlahtk'      => $jumlahtk,
              'jumlahu'      => $jumlahu,
              'jumlahwp'      => $jumlahwp
              
          ];
          return view('detailproduk', $data);
      
    }

    public function show (){
         //query untuk mengambil data skincare dan disimpan pada variabel result
         $skincare = $this->sparql->query("SELECT * WHERE {?s rdf:type skincare:Nama_Produk. ?s skincare:Nama ?o. ?s skincare:Gambar ?gambar.}");
         $jumlah = 0;
         foreach($skincare as $item){
            $jumlah = $jumlah + 1;
        }
         $result = [];
         foreach($skincare as $item){
             array_push($result, [
                 'namaprod' => $this->parseData($item->o->getValue()),
                 'idskincare'    => $this->parseData($item->s->getUri()),
                 'gambar'     => $this->parseData($item->gambar->getValue())
             ]);
         }
 
         $data = [
             'skincare' => $result,
             'jumlah' => $jumlah
         ];
 
         // parsing $result ke fungsi getPagination
         // $data = $this->getPagination($result);
 
         return view ('produk/totalproduk', $data);
         
         // return view untuk pagination
         // return view ('sepedamotor/index', compact('data'));

    }


}


                 

                 
                  