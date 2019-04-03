<?php

namespace App\Support;

use Sabre\Xml\Service;
use App\Support\XMLParserTest;

class SabreXMLParserTest implements XMLParserTest{
    public function parseXML($url){
        $service = new Service();
        $xmlContent = file_get_contents($url);
        return $service->parse($xmlContent);
    }
}