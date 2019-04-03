<?php
namespace FilmTools\Contrast;


abstract class ContrastDecoratorAbstract implements ContrastInterface
{

    /**
     * @var ContrastInterface
     */
    protected $contrast;


    public function __construct (ContrastInterface $contrast)
    {
        $this->contrast = $contrast;
    }

    /**
     * @inheritDoc
     */
    public function getType() : array
    {
        return $this->contrast->getType();
    }


    /**
     * @inheritDoc
     */
    public function getValue() : float
    {
        return $this->contrast->getValue();
    }


    /**
     * @inheritDoc
     */
    public function getAngle() : float
    {
        return $this->contrast->getAngle();
    }

}
