<?php
namespace Sx\Container;

use Psr\Container\NotFoundExceptionInterface;
use RuntimeException;

/**
 * This exception is thrown by a Container if the value to get was not set. It is always avoidable by checking has
 * before retrieving the value. To indicate this, the exception is an instance of \RuntimeException.
 */
class ContainerException extends RuntimeException implements NotFoundExceptionInterface
{
}
