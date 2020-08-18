<?php
namespace Sx\ContainerTest\Mock;

use LogicException;
use Sx\Container\FactoryInterface;
use Sx\Container\Injector;

class ExceptionFactory implements FactoryInterface
{
    public function create(Injector $injector, array $options, string $class)
    {
        throw new LogicException('');
    }
}
