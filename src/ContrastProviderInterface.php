<?php
namespace FilmTools\Contrast;

interface ContrastProviderInterface
{

    /**
     * @return ContrastInterface
     */
    public function getContrast() : ContrastInterface;
}
