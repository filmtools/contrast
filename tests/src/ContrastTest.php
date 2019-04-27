<?php
namespace tests;

use FilmTools\Contrast\Contrast;
use FilmTools\Contrast\ContrastInterface;
use FilmTools\Contrast\ContrastProviderInterface;
use FilmTools\Contrast\ContrastDecoratorAbstract;

class MockContrastDecorator extends ContrastDecoratorAbstract
{

}

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

        $decorator = new MockContrastDecorator( $sut );
        $this->assertEquals( $value, $decorator->getValue());
        $this->assertEquals( $type, $decorator->getType());
    }


    /**
     * @dataProvider provideCtorArgumentsForValidAndInvalid
     */
    public function testValid( $value, $expected_valid )
    {
        $sut = new Contrast( $value, "FooBar");
        $this->assertEquals( $expected_valid, $sut->valid());

        $decorator = new MockContrastDecorator( $sut );
        $this->assertEquals( $expected_valid, $decorator->valid());
    }

    public function provideCtorArgumentsForValidAndInvalid()
    {
        return array(
            [ null, false ],
            [ 0.5, true ]
        );
    }


    /**
     * @dataProvider provideCtorArguments
     */
    public function testContrastProvider( $value, $type )
    {
        $sut = new Contrast( $value, $type);
        $this->assertInstanceOf( ContrastProviderInterface::class, $sut );
        $this->assertInstanceOf( ContrastInterface::class, $sut->getContrast() );
    }


    /**
     * @dataProvider provideCtorArguments
     */
    public function testDebugInfo( $value, $type )
    {
        $sut = new Contrast( $value, $type);

        $debug_info = $sut->__debugInfo();
        $this->assertInternalType( "array", $debug_info );
        $this->assertArrayHasKey( "type", $debug_info );
        $this->assertArrayHasKey( "value", $debug_info );

        $this->assertEquals($type, $debug_info['type']);
        $this->assertEquals($value, $debug_info['value']);
    }



    /**
     * @dataProvider provideCtorArguments
     */
    public function testAngle( $value, $type )
    {
        $sut = new Contrast( $value, $type);

        $this->assertEquals($sut->getAngle(), rad2deg( atan( $sut->getValue() )));

        $decorator = new MockContrastDecorator( $sut );
        $this->assertEquals($decorator->getAngle(), rad2deg( atan( $sut->getValue() )));
    }


    public function provideCtorArguments()
    {
        return array(
            [ 0.6, "foo bar"]
        );
    }
}
