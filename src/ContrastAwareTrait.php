<?php
namespace FilmTools\Contrast;

trait ContrastAwareTrait
{
    use ContrastProviderTrait;

    /**
     * @inheritDoc
     */
    public function setContrast( ContrastInterface $contrast)
    {
        $this->contrast = $contrast;
    }
}
