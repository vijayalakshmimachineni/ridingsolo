<?php

namespace Selective\Validation\Exception;

use DomainException;
use Selective\Validation\ValidationResult;
use Throwable;

/**
 * Validation Exception.
 */
final class ValidationException extends DomainException
{
    /**
     * @var ValidationResult
     */
    private $validationResult;

    /**
     * Construct the exception.
     *
     * @param string $message The Exception message to throw
     * @param ValidationResult $validationResult The validation result object
     * @param int $code The Exception code
     * @param Throwable|null $previous The previous throwable used for the exception chaining
     */
    public function __construct(
        string $message,
        ValidationResult $validationResult,
        int $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->validationResult = $validationResult;
    }

    /**
     * Get the validation result.
     *
     * @return ValidationResult The validation result
     */
    public function getValidationResult(): ValidationResult
    {
        return $this->validationResult;
    }
}
