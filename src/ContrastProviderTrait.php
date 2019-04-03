<?php
namespace FilmTools\Contrast;

trait ContrastProviderTrait
{

    /**
     * @var ContrastInterface
     */
    public $contrast;

    /**
     * @inheritDoc
     */
    public function getContrast() : ContrastInterface
    {
        return $this->contrast;
    }
}
