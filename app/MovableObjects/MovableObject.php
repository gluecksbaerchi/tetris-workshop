<?php


namespace App\MovableObjects;


use App\ReverseConfig;
use App\TwoDObject;

class MovableObject extends TwoDObject
{

    /**
     * @var ReverseConfig
     */
    protected $reverseConfig;

    /**
     * MyMovableObject constructor.
     */
    public function __construct()
    {
        $this->reverseConfig = ReverseConfig::getInstance();
    }

    /**
     * @param float $width
     */
    protected function moveRightForWidth(float $width): void
    {
        $this->setXAxis($this->getXAxis() + $width * $this->getReverseMultiplier());
    }

    /**
     * @param float $width
     */
    protected function moveLeftForWidth(float $width): void
    {
        $this->setXAxis($this->getXAxis() - $width * $this->getReverseMultiplier());
    }

    /**
     * @param float $width
     */
    protected function moveFrontForWidth(float $width): void
    {
        $this->setYAxis($this->getYAxis() + $width * $this->getReverseMultiplier());
    }

    /**
     * @param float $width
     */
    protected function moveBackForWidth(float $width): void
    {
        $this->setYAxis($this->getYAxis() - $width * $this->getReverseMultiplier());
    }

    /**
     * @return int
     */
    protected function getReverseMultiplier(): int
    {
        return $this->reverseConfig->isReverseMode() ? -1 : 1;
    }
}
