<?php

namespace App\Support;

use FluidXml\FluidXml;
use App\Support\XMLParserTest;

class FluidXMLParserTest implements XMLParserTest{
    public function parseXML($url){
        $xml =  FluidXml::load($url);
        return $xml;
    }
}