<?php

namespace Sx\ContainerTest;

use stdClass;
use Sx\Container\Injector;
use PHPUnit\Framework\TestCase;
use Sx\Container\InjectorException;
use Sx\ContainerTest\Mock\ExceptionFactory;
use Sx\ContainerTest\Mock\Factory;
use Sx\ContainerTest\Mock\FactoryResult;
use Sx\ContainerTest\Mock\Provider;

class InjectorTest extends TestCase
{
    private const OPTIONS = ['key' => 'value'];

    private $injector;

    protected function setUp(): void
    {
        $this->injector = new Injector(self::OPTIONS);
    }

    public function testGet(): void
    {
        $this->injector->set(FactoryResult::class, Factory::class);
        /* @var FactoryResult $result */
        $result = $this->injector->get(FactoryResult::class);
        self::assertEquals(self::OPTIONS, $result->options);
        self::assertEquals(FactoryResult::class, $result->class);
        self::assertSame($result, $this->injector->get(FactoryResult::class));

        $this->injector->set(stdClass::class, stdClass::class);
        self::assertInstanceOf(stdClass::class, $this->injector->get(stdClass::class));

        $object = new stdClass();
        $this->injector->set('object', $object);
        self::assertSame($object, $this->injector->get('object'));
    }

    public function testGetExceptionNoObject(): void
    {
        $this->expectException(InjectorException::class);
        $this->injector->set('test', 'test');
        $this->injector->get('test');
    }

    public function testGetExceptionFactory(): void
    {
        $this->expectException(InjectorException::class);
        $this->injector->set(FactoryResult::class, ExceptionFactory::class);
        $this->injector->get(FactoryResult::class);
    }

    public function testMultiple(): void
    {
        $this->injector->set(FactoryResult::class, Factory::class);
        $this->injector->multiple(FactoryResult::class);
        self::assertNotSame($this->injector->get(FactoryResult::class), $this->injector->get(FactoryResult::class));
    }

    public function testSetup(): void
    {
        $provider = new Provider();
        $this->injector->setup($provider);
        self::assertTrue($provider->provided);
    }
}
