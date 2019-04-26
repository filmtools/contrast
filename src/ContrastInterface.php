<?php
namespace FilmTools\Contrast;

interface ContrastInterface
{

    /**
     * Returns the Contrast evaluation method name.
     * @return string|null
     */
    public function getType() : ?string;


    /**
     * Returns the contrast value (slope gradient).
     * @return float
     */
    public function getValue() : ?float;


    /**
     * Returns the contrast angle.
     * @return float
     */
    public function getAngle() : ?float;

    /**
     * @return bool
     */
    public function valid() : bool;
}
