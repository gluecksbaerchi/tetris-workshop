<?php

namespace App;

class TwoDObject
{
    /** @var float */
    protected $xAxis = 0;

    /** @var float */
    protected $yAxis = 0;

    /**
     * @return float
     */
    public function getXAxis(): float
    {
        return $this->xAxis;
    }

    /**
     * @param float $xAxis
     */
    public function setXAxis(float $xAxis): void
    {
        $this->xAxis = $xAxis;
    }

    /**
     * @return float
     */
    public function getYAxis(): float
    {
        return $this->yAxis;
    }

    /**
     * @param float $yAxis
     */
    public function setYAxis(float $yAxis): void
    {
        $this->yAxis = $yAxis;
    }
}
