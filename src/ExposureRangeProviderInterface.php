<?php
namespace FilmTools\Contrast;

interface ExposureRangeProviderInterface
{
    /**
     * Returns the logH exposure range.
     * @return float
     */
    public function getRangeH() : float;

    /**
     * Returns the minimum exposure.
     * @return float
     */
    public function getHmin() : float;
}
