<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Controller\AboutController;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AboutControllerTest extends WebTestCase
{
  public function testAboutView()
  {
    $aboutService = $this->getMockBuilder('AppBundle\Services\AboutService')
                         ->setConstructorArgs(['This is a test'])
                         ->getMock();

    $client = static::createClient();

    $client->getContainer()->set('sounds.about_service', $aboutService);

    $crawler = $client->request('GET', '/about');

    $this->assertEquals(200, $client->getResponse()->getStatusCode());
    $this->assertTrue($crawler->filter('html:contains("This is a test")')->count() > 0, 'view contains phrase "This is a test"');
  }

  public function testAboutCtrl()
  {
    $aboutService = $this->getMockBuilder('AppBundle\Services\AboutService')
                         ->setConstructorArgs(['This is a test'])
                         ->getMock();

    $container = $this->getMock('Symfony\Component\DependencyInjection\ContainerInterface');
    $container->expects($this->at(0))
        ->method('get')
        ->with('sounds.about_service')
        ->will($this->returnValue($aboutService));

    $aboutCtrl = new AboutController();
    $aboutCtrl->setContainer($container);

    $actionResult = $aboutCtrl->aboutAction();

    $this->assertTrue(is_array($actionResult), '"aboutAction" result is not an array');
    $this->assertArrayHasKey('about', $actionResult, '"aboutAction" result must contain key "about"');
  }
}
