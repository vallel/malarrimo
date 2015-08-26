<?php

namespace Malarrimo\Dto;


class Fee
{

    /** @var int */
    private $id;

    /** @var  string */
    private $name;

    /** @var int */
    private $conceptId;

    /** @var string */
    private $conceptName;

    /** @var string */
    private $conceptShortName;

    /** @var int */
    private $minPersonNumber;

    /** @var int */
    private $maxPersonNumber;

    /** @var float */
    private $pesosFee;

    /** @var float */
    private $dollarsFee;

    /** @var float */
    private $pesosFeeHigh;

    /** @var float */
    private $dollarsFeeHigh;

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
     * @return int
     */
    public function getConceptId()
    {
        return $this->conceptId;
    }

    /**
     * @param int $conceptId
     * @return static
     */
    public function setConceptId($conceptId)
    {
        $this->conceptId = $conceptId;
        return $this;
    }

    /**
     * @return string
     */
    public function getConceptName()
    {
        return $this->conceptName;
    }

    /**
     * @param string $conceptName
     * @return static
     */
    public function setConceptName($conceptName)
    {
        $this->conceptName = $conceptName;
        return $this;
    }

    /**
     * @return string
     */
    public function getConceptShortName()
    {
        return $this->conceptShortName;
    }

    /**
     * @param string $conceptShortName
     * @return static
     */
    public function setConceptShortName($conceptShortName)
    {
        $this->conceptShortName = $conceptShortName;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinPersonNumber()
    {
        return $this->minPersonNumber;
    }

    /**
     * @param int $minPersonNumber
     * @return static
     */
    public function setMinPersonNumber($minPersonNumber)
    {
        $this->minPersonNumber = $minPersonNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxPersonNumber()
    {
        return $this->maxPersonNumber;
    }

    /**
     * @param int $maxPersonNumber
     * @return static
     */
    public function setMaxPersonNumber($maxPersonNumber)
    {
        $this->maxPersonNumber = $maxPersonNumber;
        return $this;
    }

    /**
     * @return float
     */
    public function getPesosFee()
    {
        return $this->getFeeValue($this->pesosFee);
    }

    /**
     * @param float $pesosFee
     * @return static
     */
    public function setPesosFee($pesosFee)
    {
        $this->pesosFee = $pesosFee;
        return $this;
    }

    /**
     * @return float
     */
    public function getDollarsFee()
    {
        return $this->getFeeValue($this->dollarsFee);
    }

    /**
     * @param float $dollarsFee
     * @return static
     */
    public function setDollarsFee($dollarsFee)
    {
        $this->dollarsFee = $dollarsFee;
        return $this;
    }

    /**
     * @return float
     */
    public function getPesosFeeHigh()
    {
        return $this->getFeeValue($this->pesosFeeHigh);
    }

    /**
     * @param float $pesosFeeHigh
     * @return static
     */
    public function setPesosFeeHigh($pesosFeeHigh)
    {
        $this->pesosFeeHigh = $pesosFeeHigh;
        return $this;
    }

    /**
     * @return float
     */
    public function getDollarsFeeHigh()
    {
        return $this->getFeeValue($this->dollarsFeeHigh);
    }

    /**
     * @param float $dollarsFeeHigh
     * @return static
     */
    public function setDollarsFeeHigh($dollarsFeeHigh)
    {
        $this->dollarsFeeHigh = $dollarsFeeHigh;
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
     * @param float $fee
     * @return float|null
     */
    private function getFeeValue($fee)
    {
        return $fee > 0 ? $fee : null;
    }

}