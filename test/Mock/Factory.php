<?php
namespace Sx\ContainerTest\Mock;

use Sx\Container\FactoryInterface;
use Sx\Container\Injector;

class Factory implements FactoryInterface
{
    public function create(Injector $injector, array $options, string $class): FactoryResult
    {
        return new FactoryResult($options, $class);
    }
}
