<?php
namespace Hooloovoo\Config\Exception;

use RuntimeException;
use Throwable;

/**
 * Class KeyNotFoundException
 */
class KeyNotFoundException extends RuntimeException implements ExceptionInterface
{
    /**
     * KeyNotFoundException constructor.
     *
     * @param string $key
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $key, int $code = 0, Throwable $previous = null)
    {
        parent::__construct("Config key $key not found", $code, $previous);
    }
}