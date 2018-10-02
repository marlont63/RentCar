<?php

namespace BackedBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use BackedBundle\Entity\Vehicle;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class VehicleController extends Controller
{
    
    public function showAllVehicleAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        
        
    }
    
    public function registerVehicleResultAction(Request $request)
    {
        if($request->isMethod('POST')) {
            $formData = $request->request->get('form');
            
            $type = $formData['type'];
            $group = $formData['group'];
            $brand = $formData['brand'];
            $model = $formData['model'];
            $seasts = $formData['seasts'];
            $doors = $formData['doors'];
            $transmission = $formData['transmission'];
            $fuel = $formData['fuel'];
            
            //$file = $formData['image']->getData();
            
             $prince_per_day = $formData['prince_per_day'];            
             $observation = $formData['observation'];
            
            
            
            
            
            $vehicle = new Vehicle();
            $vehicle->setVehicletype($type);
            $vehicle->setVehiclegroup($group);
            $vehicle->setVehiclebrand($brand);
            $vehicle->setVehiclemodel($model);
            $vehicle->setVehicleseats((int)$seasts);
            $vehicle->setVehicledoors((int)$doors);
            $vehicle->setVehicletransmission($transmission);
            $vehicle->setVehiclefuel($fuel);
            $vehicle->setVehicleimage("imageName".$brand.$model);
            $vehicle->setVehiclepriceperday((double)$prince_per_day);        
            $vehicle->setVehicleobservations($observation);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicle);
            $em->flush();
            
            
            return $this->render('BackedBundle:Default:registerVehicleOk.html.twig');
        }else {
            return $this->render('BackedBundle:Default:new.html.twig');
        }
    }
    
    public function registerVehicleFormAction(Request $request) 
    {   
        $form = $this->createFormBuilder(null)
                ->add('type','text', ['mapped' => false])
                ->add('group','text', ['mapped' => false])
                ->add('brand','text', ['mapped' => false])
                ->add('model','text', ['mapped' => false])
                ->add('seasts','number', ['mapped' => false])
                ->add('doors','number', ['mapped' => false])
                ->add('transmission','text', ['mapped' => false])
                ->add('fuel','text', ['mapped' => false])
                ->add('image','file')
                ->add('prince_per_day','number', ['mapped' => false])
                ->add('observation')
                ->getForm();
        
        return $this->render('BackedBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
}
