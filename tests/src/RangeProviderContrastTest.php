<?php
namespace tests;

use FilmTools\Contrast\RangeProviderContrast;

class RangeProviderContrastTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideCtorArguments
     */
    public function testSimple( $hmin, $dmin, $rangeD, $rangeH, $type )
    {
        $sut = new RangeProviderContrast( $hmin, $dmin, $rangeD, $rangeH, $type);

        $this->assertEquals( $rangeD, $sut->getRangeD());
        $this->assertEquals( $rangeH, $sut->getRangeH());
        $this->assertEquals( $rangeD / $rangeH, $sut->getValue());
        $this->assertEquals( $type, $sut->getType());
        $this->assertEquals( $hmin, $sut->getHmin());
        $this->assertEquals( $dmin, $sut->getDmin());

        $this->assertEquals($sut->getAngle(), rad2deg( atan( $sut->getValue() )));
        return $sut;
    }



    public function provideCtorArguments()
    {
        return array(
            [ 0.3, 0.1, 1.3, 0.8, "default"]
        );
    }
}
