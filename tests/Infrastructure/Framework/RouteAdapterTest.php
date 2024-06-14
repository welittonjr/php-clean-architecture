<?php

namespace Tests\Infrastructure\Framework;

use App\Infrastructure\Framework\RouteAdapter;
use PHPUnit\Framework\TestCase;
use Slim\App;

class RouteAdapterTest extends TestCase
{
    public function testGetRouteIsRegistered()
    {
        $appMock = $this->createMock(App::class);

        $appMock->expects($this->once())
            ->method('get')
            ->with('/test', 'callable');
        
        $adapter = new RouteAdapter($appMock);

        $adapter->get('/test', 'callable');
    }

    public function testPostRouteIsRegistered()
    {
        $appMock = $this->createMock(App::class);

        $appMock->expects($this->once())
            ->method('post')
            ->with('/test', 'callable');

        $adapter = new RouteAdapter($appMock);

        $adapter->post('/test', 'callable');
    }

    public function testPutRouteIsRegistered()
    {
        $appMock = $this->createMock(App::class);

        $appMock->expects($this->once())
            ->method('put')
            ->with('/test', 'callable');

        $adapter = new RouteAdapter($appMock);

        $adapter->put('/test', 'callable');

    }

    public function testeDeleteRouteIsRegistered()
    {
        $appMock = $this->createMock(App::class);

        $appMock->expects($this->once())
            ->method('delete')
            ->with('/test', 'callable');

        $adapter = new RouteAdapter($appMock);

        $adapter->delete('/test', 'callable');
    }
}