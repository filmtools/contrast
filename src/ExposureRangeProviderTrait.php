<?php
namespace FilmTools\Contrast;

trait ExposureRangeProviderTrait
{


    /**
     * @var float
     */
    public $rangeH;

    /**
     * @var float
     */
    public $hmin;

    /**
     * Returns the logH exposure range.
     * @return float
     */
    public function getRangeH() : float
    {
        return $this->rangeH;
    }


    /**
     * Returns the minimum exposure.
     * @return float
     */
    public function getHmin() : float
    {
        return $this->hmin;
    }
}
