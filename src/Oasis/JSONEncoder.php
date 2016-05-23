<?php

namespace Oasis;

use Oasis\Contracts\Encoder;

class JSONEncoder implements Encoder
{
    public static function encode(string $data)
    {
        return json_decode($data, 1);
    }
}
