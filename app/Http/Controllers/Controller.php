<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use EasyRdf\RdfNamespace;
use EasyRdf\Sparql\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $sparql;

    function __construct(){
        
        RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#');
        RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');
        RdfNamespace::set('owl', 'http://www.w3.org/2002/07/owl#');
        RdfNamespace::set('xsd', 'http://www.w3.org/2001/XMLSchema#');
        RdfNamespace::set('skincare', 'http://www.semanticweb.org/asus/ontologies/2021/9/Skincare#');

        $this->sparql = new Client('http://159.223.78.224/fuseki/skincarenew6/query');
    }

    public function parseData($str){
        return str_replace('http://www.semanticweb.org/asus/ontologies/2021/9/Skincare#','', $str);
    }

}
