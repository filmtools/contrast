<?php
namespace FilmTools\Contrast;

trait DensityRangeProviderTrait
{


    /**
     * @var float
     */
    public $rangeD;

    /**
     * @var float
     */
    public $dmin;

    /**
     * Returns the density range.
     * @return float
     */
    public function getRangeD() : float
    {
        return $this->rangeD;
    }


    /**
     * Returns the minimum density.
     * @return float
     */
    public function getDmin() : float
    {
        return $this->dmin;
    }
}
