<?php

namespace App\Support;

use DOMDocument;
use App\Support\XMLParserTest;

class DOMParserTest implements XMLParserTest{
    public function parseXML($url){
        $dom = new DOMDocument();
        $xmlContent = file_get_contents($url);
        $dom->loadXML($xmlContent);
        return $dom->documentElement;
    }
}