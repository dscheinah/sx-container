<?php
namespace Sx\Container;

use Psr\Container\ContainerExceptionInterface;
use RuntimeException;

/**
 * A special container exception for the Injector. It usually does indicate a programming or configuration error.
 * It is a \RuntimeException to indicate this.
 */
class InjectorException extends RuntimeException implements ContainerExceptionInterface
{
}
