<?php

namespace Selective\Validation\Encoder;

use UnexpectedValueException;

/**
 * Encoder interface.
 */
interface EncoderInterface
{
    /**
     * Encode the given data to string.
     *
     * @param mixed $data The data
     *
     * @throws UnexpectedValueException
     *
     * @return string The encoded string
     */
    public function encode($data): string;
}
