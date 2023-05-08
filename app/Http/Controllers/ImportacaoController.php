<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportacaoController extends Controller
{
    public function index()
    {

        $xmls_names = ['cidades', 'estados', 'regioes'];

        foreach ($xmls_names as $name){
            
        $xmlString = file_get_contents(storage_path("app/public/$name.xml"));
        $xmlObject = simplexml_load_string($xmlString);
                   
        $json = json_encode($xmlObject);
        $phpArray = json_decode($json, true); 

        $key = substr(strtoupper($name), 0, strlen($name) -1);
            dd($phpArray[$key]);
        }

    }
}
