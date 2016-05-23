<?php

namespace Oasis;

use Oasis\Contracts\Decoder;

class JSONDecoder implements Decoder
{
    /**
     * Decodes the string into an array
     * @param  string $data
     * @return array
     */
    public static function decode(string $data)
    {
        return json_decode($data, 1);
    }
}
