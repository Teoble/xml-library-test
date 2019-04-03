<?php

namespace App\Support;

use App\Support\XMLParserTest;
use Symfony\Component\DomCrawler\Crawler;

class DomCrawlerParserTest implements XMLParserTest{
    public function parseXML($url){
        $xml = file_get_contents($url);
        $crawler = new Crawler($xml);
        return $crawler;
    }
}