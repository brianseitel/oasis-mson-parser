<?php

namespace Oasis;

use Exception;

class Parser
{
    public static $encoders = [
        'json' => JSONEncoder::class,
    ];

    public static function parse($data, $format = 'json')
    {
        if (!array_key_exists($format, self::$encoders)) {
            throw new Exception('Invalid encoder.');
        }

        $input = file_put_contents('/tmp/input', $data);
        $params = "drafter -f {$format} /tmp/input";

        $results = shell_exec($params);
        $encoder = self::$encoders[$format];

        return call_user_func([$encoder, 'encode'], $results);
    }
}
