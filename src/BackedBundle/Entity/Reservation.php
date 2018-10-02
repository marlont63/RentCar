<?php

namespace BackedBundle\Entity;

/**
 * Reservation
 */
class Reservation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $pickupdate;

    /**
     * @var \DateTime
     */
    private $dropoffdate;

    /**
     * @var string
     */
    private $reservationnumber;

    /**
     * @var float
     */
    private $totalamount;

    /**
     * @var string
     */
    private $observations;

    /**
     * @var \BackedBundle\Entity\Client
     */
    private $clientid;

    /**
     * @var \BackedBundle\Entity\Vehicle
     */
    private $vehicleid;


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
     * Set pickupdate
     *
     * @param \DateTime $pickupdate
     *
     * @return Reservation
     */
    public function setPickupdate($pickupdate)
    {
        $this->pickupdate = $pickupdate;

        return $this;
    }

    /**
     * Get pickupdate
     *
     * @return \DateTime
     */
    public function getPickupdate()
    {
        return $this->pickupdate;
    }

    /**
     * Set dropoffdate
     *
     * @param \DateTime $dropoffdate
     *
     * @return Reservation
     */
    public function setDropoffdate($dropoffdate)
    {
        $this->dropoffdate = $dropoffdate;

        return $this;
    }

    /**
     * Get dropoffdate
     *
     * @return \DateTime
     */
    public function getDropoffdate()
    {
        return $this->dropoffdate;
    }

    /**
     * Set reservationnumber
     *
     * @param string $reservationnumber
     *
     * @return Reservation
     */
    public function setReservationnumber($reservationnumber)
    {
        $this->reservationnumber = $reservationnumber;

        return $this;
    }

    /**
     * Get reservationnumber
     *
     * @return string
     */
    public function getReservationnumber()
    {
        return $this->reservationnumber;
    }

    /**
     * Set totalamount
     *
     * @param float $totalamount
     *
     * @return Reservation
     */
    public function setTotalamount($totalamount)
    {
        $this->totalamount = $totalamount;

        return $this;
    }

    /**
     * Get totalamount
     *
     * @return float
     */
    public function getTotalamount()
    {
        return $this->totalamount;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return Reservation
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set clientid
     *
     * @param \BackedBundle\Entity\Client $clientid
     *
     * @return Reservation
     */
    public function setClientid(\BackedBundle\Entity\Client $clientid = null)
    {
        $this->clientid = $clientid;

        return $this;
    }

    /**
     * Get clientid
     *
     * @return \BackedBundle\Entity\Client
     */
    public function getClientid()
    {
        return $this->clientid;
    }

    /**
     * Set vehicleid
     *
     * @param \BackedBundle\Entity\Vehicle $vehicleid
     *
     * @return Reservation
     */
    public function setVehicleid(\BackedBundle\Entity\Vehicle $vehicleid = null)
    {
        $this->vehicleid = $vehicleid;

        return $this;
    }

    /**
     * Get vehicleid
     *
     * @return \BackedBundle\Entity\Vehicle
     */
    public function getVehicleid()
    {
        return $this->vehicleid;
    }
}

