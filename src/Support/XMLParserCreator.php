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
            case 'simplexml':
                return new SimpleXMLParserTest();
                break;
            case 'XMLReader':
                return new XMLReaderParserTest();
                break;
            case 'SabreXML':
                return new SabreXMLParserTest();
                break;
            case 'FluidXML':
                return new FluidXMLParserTest();
                break;
            case 'DOMCrawler':
                return new DomCrawlerParserTest();
                break;
            default:
                throw new Exception("XML Library not supported");
                break;
        }
    }
}