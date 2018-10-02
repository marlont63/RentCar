<?php
namespace AppBundle\Services;

class Helpers {
    
        public function json($data) {
        
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer());
        $encode = array("json" => new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, $encode);
        $json = $serializer->serialize($data, "json");
        
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($json);
        $response->headers->set("Content-Type", "aplicacition/json");
        
        return $response;
        
    }
    
}
