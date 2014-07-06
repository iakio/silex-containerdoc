<?php
require_once __DIR__ . '/../vendor/autoload.php';
use iakio\containerdoc\ContainerDocProvider;
use Silex\WebTestCase;

class ApplicationTest extends WebTestCase
{
    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    public function createApplication()
    {
        $app = new Silex\Application();
        $app['foo'] = 'bar';
        $app->mount('/containerdoc', new ContainerDocProvider());
        return $app;
    }

    public function test_containerdoc()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/containerdoc');
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertCount(1, $crawler->filter('td:contains("foo")'));
        $this->assertCount(1, $crawler->filter('td:contains("\'bar\'")'));
    }
}
