<?php
require __DIR__ . "/../vendor/autoload.php";
class PHPDeviceCheckerTest extends PHPUnit_Framework_TestCase
{
    protected $iOsToken="7a20e06257a5d5c608cad848df5f351e6693ffce8aa04cc7bb290bca915a4f17";
    protected $androidToken="APA91bFiQLPpECz3fRRgrYZIsZJah9t20YRgITmu7nWaa4M2k115E83oZeGqzIx8_YKXYot--x_rVcV-JQG-9w1GsR2aQQJPbNYkH-mqJf15T10Ewy1pLXLnwcex0W5pJ6Bk-ubKlz9vXkyUu8eo_q_lp4um_IesCAPntEnagMfjP9dBDIP1sRw";
    public function testClassExists()
    {
        $this->assertTrue(class_exists('\PHPDeviceChecker\PHPDeviceChecker'));
    }

    public function testCheckiOsToken()
    {
        $testIos = new \PHPDeviceChecker\PHPDeviceChecker($this->iOsToken);
        $this->assertTrue($testIos->isiOs());
        $this->assertFalse($testIos->isAndroid());
        $this->assertTrue($testIos->isiOs($this->iOsToken));
        $this->assertFalse($testIos->isAndroid($this->iOsToken));
        $this->assertEquals('ios',$testIos->os());
        $this->assertEquals('ios',$testIos->os($this->iOsToken));
        echo $testIos->os($this->androidToken);
        $this->assertNull($testIos->os($this->androidToken));
    }

    public function testCheckAndroidToken()
    {
        $testAnfroid = new \PHPDeviceChecker\PHPDeviceChecker($this->androidToken);
        $this->assertFalse($testAnfroid->isiOs());
        $this->assertTrue($testAnfroid->isAndroid());
        $this->assertFalse($testAnfroid->isiOs($this->androidToken));
        $this->assertTrue($testAnfroid->isAndroid($this->androidToken));
        $this->assertEquals('android',$testAnfroid->os());
        $this->assertEquals('ios',$testAnfroid->os($this->androidToken));
        $this->assertNull($testAnfroid->os($this->iOsToken));
    }

    public function testCheckTokensArray()
    {
        $testArray = new \PHPDeviceChecker\PHPDeviceChecker([$this->iOsToken,$this->androidToken]);
        $this->assertTrue($testArray->isiOs());
        $this->assertFalse($testArray->isAndroid());

        $this->assertTrue($testArray->isiOs($this->iOsToken));
        $this->assertFalse($testArray->isAndroid($this->iOsToken));

        $this->assertTrue($testArray->isiOs($this->androidToken));
        $this->assertTrue($testArray->isAndroid($this->androidToken));

        $this->assertEquals('ios',$testArray->os());
        $this->assertEquals('ios',$testArray->os($this->iOsToken));
        $this->assertEquals('android',$testArray->os($this->androidToken));
    }
}