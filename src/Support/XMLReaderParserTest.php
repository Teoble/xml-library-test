<?php

namespace App\Support;

use XMLReader;
use App\Support\XMLParserTest;

class XMLReaderParserTest implements XMLParserTest{
    public function parseXML($url){
        $reader = new XMLReader();
        $reader->open($url);
        $reader->read();
        return $reader;
    }
}