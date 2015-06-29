<?php

namespace AppBundle\Tests\NasaApi;

use AppBundle\NasaApi\NasaApiClient;
use AppBundle\Tests\Mocks\BuzzMock;

class NasaApiClientTest extends \PHPUnit_Framework_TestCase
{

    private $nasaApiClient;

    function __construct() {
        $buzz = new BuzzMock();
        
        $this->nasaApiClient = new NasaApiClient('123', '1234', $buzz);
    }

    /**
    * Assert api_key is readable
    */
    public function testReadApiKey()
    {
        $this->assertEquals('123', $this->nasaApiClient->api_key);
    }

    /**
    * Assert api_key is not writeable
    * @expectedException ReflectionException
    */
    public function testWriteApiKey() {
        $NasaApiClientReflection = new \ReflectionClass('AppBundle\NasaApi\NasaApiClient');
        
        $prop = $NasaApiClientReflection->getProperty('api_key');
        $prop->setValue('321');
    }

    /**
    * Assert soundcloud_client_id is readable
    */
    public function testReadSoundcloudClientID()
    {
        $this->assertEquals('1234', $this->nasaApiClient->soundcloud_client_id);
    }

    /**
    * Assert soundcloud_client_id is not writeable
    * @expectedException ReflectionException
    */
    public function testWriteSoundcloudClientID() {
        $NasaApiClientReflection = new \ReflectionClass('AppBundle\NasaApi\NasaApiClient');
        
        $prop = $NasaApiClientReflection->getProperty('soundcloud_client_id');
        $prop->setValue('321');
    }

    /**
    * Assert getSounds is callable
    */
    public function testGetSounds()
    {
        $this->assertEquals('https://api.nasa.gov/planetary/sounds?api_key='.$this->nasaApiClient->api_key, $this->nasaApiClient->getSounds());
    }
}
