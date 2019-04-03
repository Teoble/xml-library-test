<?php

namespace App\Controller;

use App\Support\XMLParserCreator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

class XmlTestController extends AbstractController
{

    private $testXMLs = ['Spreaker', 'FeedBurner', 'PR News'];
    private $XMLLibs = ['DOM','simplexml','XMLReader', 'SabreXML', 'FluidXML', 'DOMCrawler'];
    /**
     * @Route("/xml/test", name="xml_test")
     */
    public function index()
    {
        return $this->render('xml_test/index.html.twig', [
            'testXMLs' => $this->testXMLs,
            'XMLLibs' => $this->XMLLibs
        ]);
    }

    public function loadDumps(Request $request)
    {
        $creator = new XMLParserCreator();
        $XMLUrl = "http://".$request->getHttpHost()."/assets/xml/".strtolower(str_replace(' ','_',$request->request->get('xml')).'.xml');
        $json = [
            'originalXML' => file_get_contents($XMLUrl)
        ];
        foreach ($this->XMLLibs as $lib) {
            $parser = $creator->createXMLParser($lib);
            $xmlObject = $parser->parseXML($XMLUrl);
            $json[$lib] = $this->stringfyDump($xmlObject);
        }

        return new JsonResponse($json);
    }

    private function stringfyDump($parser){
        $cloner = new VarCloner();
        $dumper = new HtmlDumper();
        $output = fopen('php://memory', 'r+b');

        $dumper->dump($cloner->cloneVar($parser), $output);
        return stream_get_contents($output, -1, 0);
    }
}
