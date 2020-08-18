<?php
namespace Sx\ContainerTest\Mock;

class FactoryResult
{
    public $options;

    public $class;

    public function __construct(array $options, string $class)
    {
        $this->options = $options;
        $this->class = $class;
    }
}
