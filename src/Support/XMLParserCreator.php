<?php

namespace App\Support;

use Exception;
use App\Support\DOMParserTest;

class XMLParserCreator{
    function createXMLParser($lib){
        switch($lib){
            case 'DOM':
                return new DOMParserTest();
                break;
            default:
                throw new Exception("XML Library not supported");
                break;
        }
    }
}