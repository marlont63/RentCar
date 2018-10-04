<?php

namespace BackedBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BackedBundle\Entity\Client;
use BackedBundle\Entity\Reservation;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ReserveController extends Controller
{
  
    public function addReserveAction(Request $request)
    {
        
        
        $json = $request->request->get('json');
        
//        $name = $request->request->get('name');
//        $lastName = $request->request->get('lastName');
//        $birthDay = $request->request->get('$birthDay');
//        $address = $request->request->get('$birthDay');
//        $email = $request->request->get('$email');
//        $telephone = $request->request->get('$telephone');
//        $vehicleId = $request->request->get('vehicleId');
//        $pickUpDate = $request->request->get('$pickUpDate');
//        $dropOffDate = $request->request->get('$dropOffDate');
//        $reserveNumber = $request->request->get('$reserveNumber');
//        $totalAmount = $request->request->get('$totalAmount');
        
        $param = json_decode($json);
        $name = (isset($param->name) ? $param->name : null);
        $lastName = (isset($param->lastName) ? $param->lastName : null);
        $birthDay = (isset($param->birthDay) ? $param->birthDay : null);
        $address = (isset($param->address) ? $param->address : null);
        $email = (isset($param->email) ? $param->email : null);
        $telephone = (isset($param->telephone) ? $param->telephone : null);
        $vehicleId = (isset($param->vehicleId) ? $param->vehicleId : null);
        $pickUpDate = (isset($param->pickUpDate) ? $param->pickUpDate : null);
        $dropOffDate = (isset($param->dropOffDate) ? $param->dropOffDate : null);
        $reserveNumber = (isset($param->reserveNumber) ? $param->reserveNumber : null);
        $totalAmount = (isset($param->totalAmount) ? $param->totalAmount : null);
        
        
        $newBirthDay = New \DateTime($birthDay);
                
        $client = new Client();
        $client->setName($name);
        $client->setLastName($lastName);
        $client->setBithDay($newBirthDay);
        $client->setAddress($address);
        $client->setEmail($email);
        $client->setTelephone($telephone);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($client);
        $em->flush();
        
        $clientId = $client->getId();
        $vehicleRegister = $em->getRepository('BackedBundle:Vehicle')->findOneBy(
                array(
                    "id" => $vehicleId
                )
        );
        
        $clientRegister = $em->getRepository("BackedBundle:Client")->findOneBy(
                array(
                    "id" => $clientId
                )
                );
        
        $newPickUpDate = New \DateTime($pickUpDate);
        $newDropOffDate = New \DateTime($dropOffDate);
        
        
        $reserve = new Reservation();
        $reserve->setClientid($clientRegister);
        $reserve->setVehicleid($vehicleRegister);
        $reserve->setPickupdate($newPickUpDate);
        $reserve->setDropoffdate($newDropOffDate);
        $reserve->setReservationnumber($reserveNumber);
        $reserve->setTotalamount($totalAmount);
        $em->persist($reserve);
        $em->flush();
    
        
        $helpers = $this->get("app.helpers");
        
        $array = array(
            "code" => 200,
            "info" => "success",
            "reserveNumber" => $reserve->getReservationnumber()
        );
        
        return $helpers->json($array);
    }
}
