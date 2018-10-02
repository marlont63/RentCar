<?php

namespace BackedBundle\Entity;

/**
 * Vehicle
 */
class Vehicle
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $vehicletype;

    /**
     * @var string
     */
    private $vehiclegroup;

    /**
     * @var string
     */
    private $vehiclebrand;

    /**
     * @var string
     */
    private $vehiclemodel;

    /**
     * @var integer
     */
    private $vehicleseats;

    /**
     * @var integer
     */
    private $vehicledoors;

    /**
     * @var string
     */
    private $vehicletransmission;

    /**
     * @var string
     */
    private $vehiclefuel;

    /**
     * @var string
     */
    private $vehicleimage;

    /**
     * @var float
     */
    private $vehiclepriceperday;

    /**
     * @var string
     */
    private $vehicleobservations;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set vehicletype
     *
     * @param string $vehicletype
     *
     * @return Vehicle
     */
    public function setVehicletype($vehicletype)
    {
        $this->vehicletype = $vehicletype;

        return $this;
    }

    /**
     * Get vehicletype
     *
     * @return string
     */
    public function getVehicletype()
    {
        return $this->vehicletype;
    }

    /**
     * Set vehiclegroup
     *
     * @param string $vehiclegroup
     *
     * @return Vehicle
     */
    public function setVehiclegroup($vehiclegroup)
    {
        $this->vehiclegroup = $vehiclegroup;

        return $this;
    }

    /**
     * Get vehiclegroup
     *
     * @return string
     */
    public function getVehiclegroup()
    {
        return $this->vehiclegroup;
    }

    /**
     * Set vehiclebrand
     *
     * @param string $vehiclebrand
     *
     * @return Vehicle
     */
    public function setVehiclebrand($vehiclebrand)
    {
        $this->vehiclebrand = $vehiclebrand;

        return $this;
    }

    /**
     * Get vehiclebrand
     *
     * @return string
     */
    public function getVehiclebrand()
    {
        return $this->vehiclebrand;
    }

    /**
     * Set vehiclemodel
     *
     * @param string $vehiclemodel
     *
     * @return Vehicle
     */
    public function setVehiclemodel($vehiclemodel)
    {
        $this->vehiclemodel = $vehiclemodel;

        return $this;
    }

    /**
     * Get vehiclemodel
     *
     * @return string
     */
    public function getVehiclemodel()
    {
        return $this->vehiclemodel;
    }

    /**
     * Set vehicleseats
     *
     * @param integer $vehicleseats
     *
     * @return Vehicle
     */
    public function setVehicleseats($vehicleseats)
    {
        $this->vehicleseats = $vehicleseats;

        return $this;
    }

    /**
     * Get vehicleseats
     *
     * @return integer
     */
    public function getVehicleseats()
    {
        return $this->vehicleseats;
    }

    /**
     * Set vehicledoors
     *
     * @param integer $vehicledoors
     *
     * @return Vehicle
     */
    public function setVehicledoors($vehicledoors)
    {
        $this->vehicledoors = $vehicledoors;

        return $this;
    }

    /**
     * Get vehicledoors
     *
     * @return integer
     */
    public function getVehicledoors()
    {
        return $this->vehicledoors;
    }

    /**
     * Set vehicletransmission
     *
     * @param string $vehicletransmission
     *
     * @return Vehicle
     */
    public function setVehicletransmission($vehicletransmission)
    {
        $this->vehicletransmission = $vehicletransmission;

        return $this;
    }

    /**
     * Get vehicletransmission
     *
     * @return string
     */
    public function getVehicletransmission()
    {
        return $this->vehicletransmission;
    }

    /**
     * Set vehiclefuel
     *
     * @param string $vehiclefuel
     *
     * @return Vehicle
     */
    public function setVehiclefuel($vehiclefuel)
    {
        $this->vehiclefuel = $vehiclefuel;

        return $this;
    }

    /**
     * Get vehiclefuel
     *
     * @return string
     */
    public function getVehiclefuel()
    {
        return $this->vehiclefuel;
    }

    /**
     * Set vehicleimage
     *
     * @param string $vehicleimage
     *
     * @return Vehicle
     */
    public function setVehicleimage($vehicleimage)
    {
        $this->vehicleimage = $vehicleimage;

        return $this;
    }

    /**
     * Get vehicleimage
     *
     * @return string
     */
    public function getVehicleimage()
    {
        return $this->vehicleimage;
    }

    /**
     * Set vehiclepriceperday
     *
     * @param float $vehiclepriceperday
     *
     * @return Vehicle
     */
    public function setVehiclepriceperday($vehiclepriceperday)
    {
        $this->vehiclepriceperday = $vehiclepriceperday;

        return $this;
    }

    /**
     * Get vehiclepriceperday
     *
     * @return float
     */
    public function getVehiclepriceperday()
    {
        return $this->vehiclepriceperday;
    }

    /**
     * Set vehicleobservations
     *
     * @param string $vehicleobservations
     *
     * @return Vehicle
     */
    public function setVehicleobservations($vehicleobservations)
    {
        $this->vehicleobservations = $vehicleobservations;

        return $this;
    }

    /**
     * Get vehicleobservations
     *
     * @return string
     */
    public function getVehicleobservations()
    {
        return $this->vehicleobservations;
    }
}

