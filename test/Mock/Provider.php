<?php
namespace Sx\ContainerTest\Mock;

use Sx\Container\Injector;
use Sx\Container\ProviderInterface;

class Provider implements ProviderInterface
{
    public $provided = false;

    public function provide(Injector $injector): void
    {
        $this->provided = true;
    }
}
