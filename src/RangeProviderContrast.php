<?php
namespace FilmTools\Contrast;

class RangeProviderContrast extends Contrast implements RangeProviderContrastInterface
{
    use DensityRangeProviderTrait,
        ExposureRangeProviderTrait;

    /**
     * @param float $hmin
     * @param float $dmin
     * @param float $rangeD
     * @param float $rangeH
     * @param string|null $type Optional: Short description
     */
    public function __construct( float $hmin, float $dmin, float $rangeD, float $rangeH, string $type = null)
    {
        $this->hmin = $hmin;
        $this->dmin = $dmin;
        $this->rangeD = $rangeD;
        $this->rangeH = $rangeH;
        $this->type = $type;
    }


    /**
     * Calculates Contrast from density range and exposure range.
     * @return float
     */
    public function getValue() : float{
        return $this->getRangeD() / $this->getRangeH();
    }


    public function __debugInfo() {
        return [
            'type'     => $this->type,
            'value'    => $this->value,
            'minH'     => $this->hmin,
            'minD'     => $this->dmin,
            'rangeD'   => $this->rangeD,
            'rangeH'   => $this->rangeH
        ];
    }


}
