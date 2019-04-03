<?php
namespace FilmTools\Contrast;

interface DensityRangeProviderInterface
{
    /**
     * Returns the density range.
     * @return float
     */
    public function getRangeD() : float;

    /**
     * Returns the minimum density.
     * @return float
     */
    public function getDmin() : float;

}
