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
    
    public function uploadImageAction(Request $request) {
        
        $file = $request->files->get("image");
        
        $id = $request->get("id");
        
        $em = $this->getDoctrine()->getManager();
        
        $vehicle = $em->getRepository("BackedBundle:Vehicle")->findOneBy(array(
            "id" => $id
        ));
        
        $result = null;
        
        if(isset($vehicle)) {

            if(!empty($file) && $file != null) {
                
                $ext = $file->guessExtension();
                $fileName = $vehicle->getvehiclebrand().$vehicle->getvehiclebrand().time().".".$ext;
                $file->move("uploads/vehicles",$fileName);
                
                $vehicle->setVehicleimage($fileName);
                $em->persist($vehicle);
                $em->flush();
                
                
                $result = array(
                    "code" => 200,
                    "msg" => "Imagen uploaded success!!!"
                );
                
                
            }else {
                $result = array(
                    "code" => 400,
                    "msg" => "Error"
                );
            }
            
            $helpers = $this->get("app.helpers");
            
            return $helpers->json($result);
        }
    }
    
    public function getAllRegisterVehicleAction(Request $request){
        
        
        
        $em = $this->getDoctrine()->getManager();
        $vehicles = $em->getRepository("BackedBundle:Vehicle")->findBy(
                array(),
                array('vehicletype' => 'ASC')
        );
        $helpers = $this->get("app.helpers");
        
        $array = array(
            "code" => "200",
            "data" => $vehicles
        );
        
        return $helpers->json($array);
    }
    
    public function updateVehicleResultAction(Request $request) {
        
        if($request->isMethod('POST')) {
            $formData = $request->request->get('form');
            $id = $formData['id'];
            
            $em = $this->getDoctrine()->getManager();
            
            $vehicle = $em->getRepository('BackedBundle:Vehicle')->find($id);
            
            
            $type = $formData['type'];
            $group = $formData['group'];
            $brand = $formData['brand'];
            $model = $formData['model'];
            $seasts = $formData['seasts'];
            $doors = $formData['doors'];
            $transmission = $formData['transmission'];
            $fuel = $formData['fuel'];
            
            $file = $request->files->get("image");

            $imageName = "";
            if(!empty($file) && $file != null) {
                $ext = $file->guessExtension();
                
                $imageName = $brand.$model.$group.time().".".$ext;
                
                $file->move("uploads/vehicle", $imageName);
            }
            
             $prince_per_day = $formData['prince_per_day'];            
             $observation = $formData['observation'];

            $vehicle->setVehicletype($type);
            $vehicle->setVehiclegroup($group);
            $vehicle->setVehiclebrand($brand);
            $vehicle->setVehiclemodel($model);
            $vehicle->setVehicleseats((int)$seasts);
            $vehicle->setVehicledoors((int)$doors);
            $vehicle->setVehicletransmission($transmission);
            $vehicle->setVehiclefuel($fuel);
            $vehicle->setVehicleimage($imageName);
            $vehicle->setVehiclepriceperday((double)$prince_per_day);        
            $vehicle->setVehicleobservations($observation);
            
            $em->persist($vehicle);
            $em->flush();
            
            return $this->render('BackedBundle:Default:updateVehicleResult.html.twig',[
                'info' => 'Vehiculo actualizado correctamente.',
                'image' => 'updateOk',
            ]);
            
        }else {
            return $this->render('BackedBundle:Default:updateVehicleResult.html.twig',[
                'info' => 'Error al intentar actualizar el vehiculo.',
                'image' => 'updateKO',
            ]);
        }        
    }
    
    
    public function removeVehicleAction(Request $request) {
        
        $vehicleId = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        
        $vehicle = $em->getRepository('BackedBundle:Vehicle')->find($vehicleId);
        
        if (!$vehicle) {
            return $this->render('BackedBundle:Default:removeVehicleResult.html.twig',[
            'info' => 'Error al intentar eliminar el vehiculo.',
            'image' => 'deleteKO',
        ]);
        }
        
        $em->remove($vehicle);
        $em->flush();
        
        
        return $this->render('BackedBundle:Default:removeVehicleResult.html.twig',[
            'info' => 'Vehiculo eliminado correctamente.',
            'image' => 'deleteOk',
        ]);
        
    }
    
    public function editVehicleAction(Request $request) {
        
        $vehicleId = $request->query->get('id');
        $em = $this->getDoctrine()->getManager();
        
        $vehicle = $em->getRepository('BackedBundle:Vehicle')->find($vehicleId);
        
        if (!$vehicle) {
            return $this->render('BackedBundle:Default:updateVehicleResult.html.twig',[
                'info' => 'Error al intentar actualizar el vehiculo.',
                'image' => 'updateKO',
            ]);
        }
        
        

        $form = $this->createFormBuilder(null) 
            ->add('id','hidden',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getId()),
                'mapped' => false))    
            ->add('type','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehicletype()),
                'mapped' => false))
            ->add('group','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehiclegroup()),
                'mapped' => false))
            ->add('brand','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehiclebrand()),
                'mapped' => false))
            ->add('model','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehiclemodel()),
                'mapped' => false))
            ->add('seasts','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getVehicleseats()),
                'mapped' => false))
            ->add('doors','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehicledoors()),
                'mapped' => false))
            ->add('transmission','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehicletransmission()),
                'mapped' => false))
            ->add('fuel','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehiclefuel()),
                'mapped' => false))
            ->add('image','file',array(
                'required' => false,
                'attr' => array('name' => 'tags','value'=> $vehicle->getvehicleimage()),
                'mapped' => false))
            ->add('prince_per_day','text',array(
                'required' => false,
                'attr' => array('name' => 'tags','value'=> $vehicle->getVehiclepriceperday()),
                'mapped' => false))
            ->add('observation','text',array(
                'required' => true,
                'attr' => array('name' => 'tags','value'=> $vehicle->getVehicleobservations()),
                'mapped' => false))
            ->getForm();
        
            return $this->render('BackedBundle:Default:updateVehicle.html.twig', array(
                 'form' => $form->createView()
            ));
    }
    
    public function showAllVehicleAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        $repo = $this->getDoctrine()->getRepository('BackedBundle:Vehicle');
        $AllVehicle = $repo->findAll();
        
        return $this->render('BackedBundle:Default:showAllVehicle.html.twig', array('vehicles' => $AllVehicle));
        
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
            
            $file = $request->files->get("image");

            $imageName = "";
            if(!empty($file) && $file != null) {
                $ext = $file->guessExtension();
                
                $imageName = $brand.$model.$group.time().".".$ext;
                
                $file->move("uploads/vehicle", $imageName);
            }
            
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
            $vehicle->setVehicleimage($imageName);
            $vehicle->setVehiclepriceperday((double)$prince_per_day);        
            $vehicle->setVehicleobservations($observation);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($vehicle);
            $em->flush();
            
            return $this->render('BackedBundle:Default:registerVehicleResult.html.twig',[
                'info' => 'Vehiculo registrado correctmente.',
                'image' => 'registerOK',
            ]);
        }else {
            return $this->render('BackedBundle:Default:registerVehicleResult.html.twig',[
                'info' => 'Error al intentar registrar el vehiculo.',
                'image' => 'deleteKO',
            ]);
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
        
        return $this->render('BackedBundle:Default:newVehicle.html.twig', array(
            'form' => $form->createView(),
        ));
        
    }
}
