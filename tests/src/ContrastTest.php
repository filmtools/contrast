<?php
namespace tests;

use FilmTools\Contrast\Contrast;

class ContrastTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideCtorArguments
     */
    public function testSimple( $value, $type )
    {
        $sut = new Contrast( $value, $type);

        $this->assertEquals( $value, $sut->getValue());
        $this->assertEquals( $type, $sut->getType());
    }

    /**
     * @dataProvider provideCtorArguments
     */
    public function testAngle( $value, $type )
    {
        $sut = new Contrast( $value, $type);

        $this->assertEquals($sut->getAngle(), rad2deg( atan( $sut->getValue() )));
    }


    public function provideCtorArguments()
    {
        return array(
            [ 0.6, "foo bar"]
        );
    }
}
