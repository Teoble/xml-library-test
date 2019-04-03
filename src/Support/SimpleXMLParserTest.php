<?php

namespace App\Support;

use App\Support\XMLParserTest;

class SimpleXMLParserTest implements XMLParserTest{
    public function parseXML($url){
        $xml =  \simplexml_load_file($url);
        return $xml;
    }
}