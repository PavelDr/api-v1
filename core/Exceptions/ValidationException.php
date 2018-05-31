<?php

namespace Core\Exceptions;

/**
 * Class ValidationException
 * @package Core\Exceptions
 */
class ValidationException extends \Exception
{
    protected $code = 400;

    /**
     * ValidationException constructor.
     * @param string $message
     * @param int $code
     */
    public function __construct($message = "", $code = 400)
    {
        $this->code = $code;

        parent::__construct($message, $this->code);
    }
}