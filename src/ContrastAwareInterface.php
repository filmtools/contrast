<?php
namespace FilmTools\Contrast;

interface ContrastAwareInterface extends ContrastProviderInterface
{
    /**
     * @param ContrastInterface $contrast
     */
    public function setContrast( ContrastInterface $contrast );
}
