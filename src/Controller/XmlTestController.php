<?php

namespace App\Controller;

use App\Support\XMLParserCreator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class XmlTestController extends AbstractController
{

    private $testXMLs = ['Spreaker', 'FeedBurner', 'PR News'];
    private $XMLLibs = ['DOM','simplexml','XMLReader'];
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
        $parser = $creator->createXMLParser("DOM");
        $xmlObject = $parser->parseXML("http://".$request->getHttpHost()."/assets/xml/".strtolower($request->request->get('xml').'.xml'));
        return new JsonResponse(
                [
                    "DOM" => $this->stringfyDump($xmlObject)
                ]
        );
    }

    private function stringfyDump($parser){
        return htmlentities(print_r($parser,true));        
    }
}
