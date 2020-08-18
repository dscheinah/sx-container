<?php

namespace Sx\ContainerTest;

use Sx\Container\Container;
use PHPUnit\Framework\TestCase;
use Sx\Container\ContainerException;

class ContainerTest extends TestCase
{
    private const FOUND = 'found';
    private const NOT_FOUND = 'not-found';

    private $container;

    protected function setUp(): void
    {
        $this->container = new Container();
        $this->container->set(self::FOUND, 'value');
    }

    public function testGet(): void
    {
        $this->container->get(self::FOUND);
        $this->expectException(ContainerException::class);
        $this->container->get(self::NOT_FOUND);
    }

    public function testHas(): void
    {
        $this->container->set(self::FOUND, 'value');
        self::assertTrue($this->container->has(self::FOUND));
        self::assertFalse($this->container->has(self::NOT_FOUND));
    }
}
