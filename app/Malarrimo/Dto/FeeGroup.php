<?php

namespace Malarrimo\Dto;


class FeeGroup
{

    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $shortName;

    /** @var Fee[] */
    private $fees = array();

    /** @var bool */
    private $hasHighSeasonFees;

    /** @var bool */
    private $hasByPersonNumberFees;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return static
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return static
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return Fee[]
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @param Fee[] $fees
     * @return static
     */
    public function setFees($fees)
    {
        $this->fees = $fees;
        return $this;
    }

    /**
     * @param Fee $fee
     */
    public function addFee($fee)
    {
        $this->fees[] = $fee;
    }

    /**
     * @return boolean
     */
    public function isHasHighSeasonFees()
    {
        return $this->hasHighSeasonFees;
    }

    /**
     * @param boolean $hasHighSeasonFees
     * @return static
     */
    public function setHasHighSeasonFees($hasHighSeasonFees)
    {
        $this->hasHighSeasonFees = $hasHighSeasonFees;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isHasByPersonNumberFees()
    {
        return $this->hasByPersonNumberFees;
    }

    /**
     * @param boolean $hasByPersonNumberFees
     * @return static
     */
    public function setHasByPersonNumberFees($hasByPersonNumberFees)
    {
        $this->hasByPersonNumberFees = $hasByPersonNumberFees;
        return $this;
    }

}