<?php
namespace FilmTools\Contrast;

abstract class ContrastAbstract implements ContrastInterface
{

    /**
     * The contrast value, usually the slope of a straight line between two points on a curve.
     * @var float
     */
    public $value;


    /**
     * Name for the contrast evalaution method.
     *
     * @var string|null
     */
    public $type;

    /**
     * @return bool
     */
    public function valid() : bool
    {
        return !is_null( $this->value );
    }


    /**
     * @inheritDoc
     */
    public function getType() : ?string
    {
        return $this->type;
    }


    /**
     * @inheritDoc
     */
    public function getValue() : ?float
    {
        return $this->value;
    }


    /**
     * Calculates the degree equivalent of the contrast value's Arc tangent.
     * @inheritDoc
     */
    public function getAngle() : ?float
    {
        $gradient = $this->getValue();

        return is_null($gradient) ? null : rad2deg( atan( $gradient ));
    }

}
