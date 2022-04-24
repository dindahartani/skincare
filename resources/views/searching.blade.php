<?php
  use EasyRdf\RdfNamespace;
  use EasyRdf\Sparql\Client;
  RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
  RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
  RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
  RdfNamespace::set('skincare', 'http://www.semanticweb.org/asus/ontologies/2021/9/Skincare#');

  $sparql = new Client('http://159.223.78.224/fuseki/skincarenew6/query');

  function parseData($str){
          return str_replace('http://www.semanticweb.org/asus/ontologies/2021/9/Skincare#','', $str);
      }
?>


@extends('layouts/app')

@section('namepage')
Halaman Searching
@endsection

@section('content')

    <!-- Main content -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row-fluid">
        <!-- Hide Div clas col-lg-3 col-6 buat dia jadi 1 layer -->
          <!-- <div class="col-lg-3 col-6"> -->
          <!-- end hide div -->

            <!-- small box -->
            <form action="" method="GET">
            
            <div class="row">  <!-- row1 -->
              
              <div class="col-lg-6 form-group col-sm-12">
              <!-- Merek Skincare -->
                <div class="col-12 form-group">
                  <h6 class="text-nowrap font-weight-bold" style="width: 8rem;">Merek Skincare</h6>
                    <div class="input-group mb-3">
                        <select class="custom-select form-control border-warning " id="merek" name="merek" >
                          <option value="kosong">Pilih Merek Skincare ....</option>
                          <?php
                      
                          $qrmerek = "SELECT * WHERE {?merek rdf:type skincare:Merek_Skincare. ?merek skincare:Nama ?nama} ORDER BY ASC(?skincare)";
                          $merek = $sparql->query($qrmerek);
                          foreach($merek as $item){
                              $idmerek = parseData($item->merek->getURI());
                              $namamerek = parseData($item->nama->getValue());
                          ?>
                          <option value="<?php echo $idmerek ?>">{{ $namamerek }}</option>
                          <?php }?>
                      </select>
                    </div>
                  </div>
                  
                  <!-- end Merek Skincare -->
               


            
                <!-- Jenis Skincare -->
                  <div class="col-12 form-group">
                    <h6 class="text-nowrap font-weight-bold" style="width: 8rem;">Jenis Skincare </h6>
                      <div class="input-group mb-3">
                        <select class="custom-select form-control border-warning" id="jenis" name="jenis">
                          <option value="kosong">Pilih Jenis Skincare...</option>
                           <?php
                       
                           $qrjenis = "SELECT * WHERE {?jenis rdf:type skincare:Jenis_Skincare . ?jenis skincare:Nama ?nama } ORDER BY ASC(?skincare)";
                           $jenis = $sparql->query($qrjenis);
                           foreach($jenis as $item){
                                $idjenis = parseData($item->jenis->getURI());
                               $namajenis = parseData($item->nama->getValue());
                           ?>
                           <option value="<?php echo $idjenis ?>">{{ $namajenis }}</option>
                           <?php }?>
                        </select>
                      </div>
                  </div>
                  <!-- end jenis skincare -->
  
               <!-- Usia-->
                  <div class="col-12 form-group">
                    <h6 class="text-nowrap font-weight-bold" style="width: 8rem;">Usia</h6>
                      <div class="input-group mb-3">
                       <select class="custom-select form-control border-warning" id="usia" name="usia">
                         <option value="kosong">Pilih Usia ...</option>
                          <?php
                      
                          $qrusia =  "SELECT * WHERE {?usia rdf:type skincare:Usia . ?usia skincare:Nama ?nama} ORDER BY ASC(?skincare)";
                          $usia = $sparql->query($qrusia);
                          foreach($usia as $item){
                               $idusia = parseData($item->usia->getURI());
                              $namausia = parseData($item->nama->getValue());
                          ?>
                          <option value="<?php echo $idusia ?>">{{ $namausia }}</option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                     <!-- Tipe Kulit -->
                   <div class="col-12 form-group">
                    <h6 class="text-nowrap font-weight-bold" style="width: 8rem;">Tipe Kulit</h6>
                    <div class="form-check form-check-inline form-control border-warning">
                      <div class="input-group row">

                        <?php
                     
                        $qrtk = "SELECT * WHERE {?tk rdf:type skincare:Tipe_Kulit. ?tk skincare:Nama ?nama} ORDER BY ASC(?skincare)";
                        $tk = $sparql->query($qrtk);
                        $tkhit=0;
                        $tknumber=[];
                        $cekminustk=[];
                       
                        
                        foreach($tk as $item){
                           $listidtk = parseData($item->tk->getUri());
                           $namatk = parseData($item->nama->getValue());
                           $tknumber[$tkhit]=0;
                           $tkhit++;
                           $cekminustk[$listidtk]['status']=false;
                          
                            ?> 
                             
                           <div class="form-check col-lg-3 col-sm-12">
                             <input class="form-check-input " name="tk[]" type="checkbox" id="tk" value="<?php echo $listidtk?>">
                             <label class="form-check-label" for="inlineCheckbox1"><?php echo $namatk ?></label>
                           </div>
                      
                        
                        <?php }   ?>
 
                      </div>
                    
                    </div>
                  </div>
                    <!-- end tipe kulit -->
                


                
                <!-- Waktu Penggunaan -->
                  <div class="col-12 form-group">
                    <h6 class="text-nowrap font-weight-bold" style="width: 8rem;">Waktu Penggunaan</h6>
                    <div class="form-check form-check-inline form-control border-warning">
                      <div class="input-group row">

                        <?php
                     
                        $qrwp = "SELECT * WHERE {?wp rdf:type skincare:Waktu_Penggunaan. ?wp skincare:Nama ?nama} ORDER BY ASC(?skincare)";
                        $wp = $sparql->query($qrwp);
                        $wphit=0;
                        $wpnumber=[];
                        $cekminuswp=[];
                       
                        
                        foreach($wp as $item){
                           $listidwp = parseData($item->wp->getUri());
                           $namawp = parseData($item->nama->getValue());
                           $wpnumber[$wphit]=0;
                           $wphit++;
                           $cekminuswp[$listidwp]['status']=false;
                          
                            ?> 
                             
                           <div class="form-check col-lg-3 col-sm-12">
                             <input class="form-check-input " name="wp[]" type="checkbox" id="wp" value="<?php echo $listidwp?>">
                             <label class="form-check-label" for="inlineCheckbox1"><?php echo $namawp ?></label>
                           </div>
                      
                        
                        <?php }   ?>
 
                      </div>
                    
                    </div>
                  </div>
                  <!-- end waktu penggunaan  -->

                </div>

                 <!-- Masalah Kulit-->
                 <div class="col-lg-6 form-group col-sm-12">
                  <h6 class="text-nowrap font-weight-bold" style="width: 8rem;">Masalah Kulit</h6>
                    <div class="form-check form-check-inline">
                      <div class="input-group row form-control border-warning">

                        <?php
                     
                        $qrmk = "SELECT * WHERE {?mk rdf:type skincare:Masalah_Kulit. ?mk skincare:Nama ?nama} ORDER BY ASC(?skincare)";
                        $mk = $sparql->query($qrmk);
                        $mkhit=0;
                        $mknumber=[];
                        $cekminusmk=[];
                       
                        
                        foreach($mk as $item){
                           $listidmk = parseData($item->mk->getUri());
                           $namamk = parseData($item->nama->getValue());
                           $mknumber[$mkhit]=0;
                           $mkhit++;
                           $cekminusmk[$listidmk]['status']=false;
                          
                            ?> 
                             
                           <div class="form-check col-lg-6 col-sm-12 ">
                             <input class="form-check-input " name="mk[]" type="checkbox" id="mk" value="<?php echo $listidmk?>">
                             <label class="form-check-label" for="inlineCheckbox1"><?php echo $namamk ?></label>
                           </div>
                      
                        
                        <?php }   ?>
 
                      </div>
                    </div>
                    <div class="col-6 my-3 mx-3">
                      <input type="submit" name="cari" value="Cari" class="btn btn-primary">
                      <input type="submit" name="reset" value="Reset" class="btn btn-danger" onclick="resetPage()">
                      </div>
                    </div>
                  </div>
                 
                <!-- end Masalah Kulit-->

                
              </div>
              
                
                </div>
                

               

             

              </div>  <!-- end row-fluid-->
              
      
              </form>
              
          

 
  <!-- end alert -->

        <?php
        if (isset($_GET['cari']))
        {
          
          
          $hasilmerek = $_GET['merek'];
          $hasiljenis = $_GET['jenis'];
          $hasilusia = $_GET['usia'];
         
          $querydata = 'SELECT * WHERE { ?skincare rdf:type skincare:Nama_Produk';
         
          if ($_GET['merek']!="kosong") {
            $querydata=$querydata.". ?skincare skincare:memilikiMerekSkincare skincare:".$_GET['merek'];
            
          } 
          if ($_GET['jenis']!="kosong") {
            $querydata=$querydata.". ?skincare skincare:memilikiJenisSkincare skincare:".$_GET['jenis'];
            
          }
          if ($_GET['usia']!="kosong") {
            $querydata=$querydata.". ?skincare skincare:digunakanUntukUsia skincare:".$_GET['usia'];
            
          } 
        
           
          // Masalah Kulit
          if (isset($_GET['mk'])) {
          $hasilmk = $_GET['mk'];   
          foreach($hasilmk as $item){
            $querydata = $querydata.". ?skincare skincare:digunakanUntukMengatasi skincare:".$item."";
        }

      }
        // Tipe Kulit
        if (isset($_GET['tk'])) {
          $hasiltk = $_GET['tk'];   
          foreach($hasiltk as $item){
            $querydata = $querydata.". ?skincare skincare:cocokUntukTipeKulit skincare:".$item."";
        }
      }

      // Tipe Kulit
      if (isset($_GET['wp'])) {
          $hasilwp = $_GET['wp'];   
          foreach($hasilwp as $item){
            $querydata = $querydata.". ?skincare skincare:memilikiWaktuPenggunaan skincare:".$item."";
        }

        // Spesifik
        //  $cekFasilitasTidakTerpilih = array("Ac" => "Ac", "Almari" => "Almari", "Cleaning_service" => "Cleaning_service", "Meja" =>  "Meja", "Laundry" => "Laundry", "Wifi" => "Wifi");
        // foreach($hasilFasilitas as $item){
        //     unset($cekFasilitasTidakTerpilih[$item]);
        // }
        // foreach($cekFasilitasTidakTerpilih as $item){
        //   $querydata = $querydata.". MINUS {?indekost indekost:Tersedia indekost:".$item."}";
        // }
 
       }
    //    else {
    //     $cekFasilitasTidakTerpilih = array("Ac" => "Ac", "Almari" => "Almari", "Cleaning_service" => "Cleaning_service", "Meja" =>  "Meja", "Laundry" => "Laundry", "Wifi" => "Wifi");
    //     foreach($cekFasilitasTidakTerpilih as $item){
    //       $querydata = $querydata.". MINUS {?indekost indekost:Tersedia indekost:".$item."}";
    //   }
    // }
          //  end fasilitas sekunder
            
           $querydata = $querydata.". ?skincare skincare:Nama ?nama}";
           $query=$sparql->query($querydata);
          
          $jumlah = 0;
          foreach($query as $getjumlah){
            $jumlah = $jumlah + 1;
          
          }
          
          $arrayuri = array();
          $arraylabel = array();
          $iterasiskincare = 0;
          foreach($query as $item){
            $idproduk = parseData($item->skincare->getUri());
            $namaproduk = parseData($item->nama->getValue());
   
            
            $arrayuri[$iterasiskincare] = $idproduk;
            $arraylabel[$iterasiskincare] = $namaproduk;
            $iterasiskincare++;
            
          }
         
        ?>

<!-- TAMPILAN HASIL SEARCHING -->
<div class="col">
<div class="container-fluid">
          <div class="text-nowrap font-weight-bold mt-3"><h2>Hasil</h2></div>
          <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $iteration = 0;
              if($jumlah > 0){
                
                for($skincare = 1; $skincare <= $jumlah; $skincare++){
                  if($skincare < $jumlah){
                    if($arrayuri[$skincare - 1] != $arrayuri[$skincare]){
                      $iteration = $iteration + 1;
                      $id = $arrayuri[$skincare - 1];
              ?>
              <tr>
                <th scope="row">{{ $iteration }}</th>
                <td><a href="{{ route ('detailproduk',[$id]) }}" class="text-decoration-none text-muted"><?php echo $arraylabel[$skincare - 1]; ?></a></td>
              </tr>
              <?php
                    }
                  } else { $iteration = $iteration + 1; $id = $arrayuri[$skincare - 1]; ?>
              <tr>
                <th scope="row">{{ $iteration }}</th>
                <td><a href="{{ route ('detailproduk',[$id]) }}" class="text-decoration-none text-muted"><?php echo $arraylabel[$skincare - 1]; ?></a></td>
              </tr>
              <?php
                  }
                } 
              } else { ?>
              <tr>
                <th scope="row"></th>
                <td>Tidak ada data Skincare dengan kriteria tersebut.</td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <?php } ?>
        </div>
        <?php 
        if (isset($_GET['cari'])){
          
        
        ?>
        <div class="col">
        <div class="alert alert-warning alert-dismissable">
        <p style="font-size: 20px;"><b>QUERY</b></p>
        <?php 
       echo $querydata;
        }
        ?>
      
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection