<?php
namespace FilmTools\Contrast;

class Contrast extends ContrastAbstract implements ContrastInterface, ContrastProviderInterface
{


    /**
     * @inheritDoc
     */
    public $type;


    /**
     * @param float  $value  Contrast value
     * @param string $type   Optional: Short description
     */
    public function __construct( float $value, string $type = null)
    {
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * @inheritDoc
     */
    public function getContrast() : ContrastInterface
    {
        return $this;
    }

    public function __debugInfo() {
        return [
            'type'     => $this->type,
            'value'    => $this->value
        ];
    }

}
