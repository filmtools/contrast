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

        $this->assertTrue($sut->valid());

        $this->assertEquals($sut->getAngle(), rad2deg( atan( $sut->getValue() )));
        return $sut;
    }

    /**
     * @dataProvider provideCtorArguments
     */
    public function testInvalidArgumentException( $hmin, $dmin, $rangeD, $rangeH, $type )
    {
        $this->expectException( \InvalidArgumentException::class );
        new RangeProviderContrast( $hmin, $dmin, $rangeD, 0, $type);
    }



    /**
     * @dataProvider provideCtorArguments
     */
    public function testDebugInfo(  $hmin, $dmin, $rangeD, $rangeH, $type )
    {
        $sut = new RangeProviderContrast( $hmin, $dmin, $rangeD, $rangeH, $type);

        $debug_info = $sut->__debugInfo();
        $this->assertInternalType( "array", $debug_info );

        $this->assertArrayHasKey( "type", $debug_info );
        $this->assertArrayHasKey( "value", $debug_info );
        $this->assertArrayHasKey( "minH", $debug_info );
        $this->assertArrayHasKey( "minD", $debug_info );
        $this->assertArrayHasKey( "rangeD", $debug_info );
        $this->assertArrayHasKey( "rangeH", $debug_info );

        $this->assertEquals($type, $debug_info['type']);
        $this->assertEquals($hmin, $debug_info['minH']);
        $this->assertEquals($dmin, $debug_info['minD']);
        $this->assertEquals($rangeD, $debug_info['rangeD']);
        $this->assertEquals($rangeH, $debug_info['rangeH']);
        $this->assertInternalType( "float", $debug_info['value'] );
    }



    public function provideCtorArguments()
    {
        return array(
            [ 0.3, 0.1, 1.3, 0.8, "default"]
        );
    }
}
