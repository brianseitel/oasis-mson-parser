<?php

namespace Oasis;

use Exception;

/**
 * Parses MSON data.
 *
 * Example usage:
 *
 * $results = Parser::parse('# API Blueprint Title', 'json');
 *
 */
class Parser
{
    /**
     * List of decoders available to process input
     * @var array
     */
    public static $decoders = [
        'json' => JSONDecoder::class,
    ];

    /**
     * Parses the MSON input into an array.
     * @param  string $data   Must be valid MSON
     * @param  string $format Format to decode. Defaults to `json`
     * @return array          Array of MSON data
     */
    public static function parse($data, $format = 'json', $escape_warnings = true)
    {
        if (!array_key_exists($format, self::$decoders)) {
            throw new Exception('Invalid decoder.');
        }
        $decoder = self::$decoders[$format];

        $input = file_put_contents('/tmp/input', $data);
        if($escape_warnings) {
            $escape_warnings = ' 2> /dev/null';
        } else {
            $escape_warnings = '';
        }
        $params = "drafter -f {$format} /tmp/input$escape_warnings";

        $results = shell_exec($params);
        return call_user_func([$decoder, 'decode'], $results);
    }
}
