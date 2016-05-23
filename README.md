# Oasis MSON Parser

### API Blueprint Parser for PHP
Oasis MSON Parser is a PHP wrapper for the [Drafter](https://github.com/apiaryio/drafter) library.

API Blueprint is Web API documentation language. You can find API Blueprint documentation on the [API Blueprint site](https://apiblueprint.org).

## Install
The best way to install this is via [Composer](http://getcomposer.org).

```sh
$ composer require brianseitel/oasis-mson-parser
```

**NOTE:** *Oasis MSON Parser depends on the [Drafter](https://github.com/apiaryio/drafter) library. Please see that repo for build instructions.*

## Getting started

### Signature

```php
function parse(string $data, $format = 'json')
```

### Quickstart Example

```php
<?php

require 'vendor/autoload.php';

$results = Oasis\Parser::parse('# My API', 'json');
```

### Parsing Result

Parsing this blueprint:

```
# GET /1
+ response
```

will produce the following object (`result` variable):

```json
{
  "element": "parseResult",
  "content": [
    {
      "element": "category",
      "meta": {
        "classes": [
          "api"
        ],
        "title": ""
      },
      "content": [
        {
          "element": "category",
          "meta": {
            "classes": [
              "resourceGroup"
            ],
            "title": ""
          },
          "content": [
            {
              "element": "resource",
              "meta": {
                "title": ""
              },
              "attributes": {
                "href": "/1"
              },
              "content": [
                {
                  "element": "transition",
                  "meta": {
                    "title": ""
                  },
                  "content": [
                    {
                      "element": "httpTransaction",
                      "content": [
                        {
                          "element": "httpRequest",
                          "attributes": {
                            "method": "GET"
                          },
                          "content": []
                        },
                        {
                          "element": "httpResponse",
                          "attributes": {
                            "statusCode": "200"
                          },
                          "content": []
                        }
                      ]
                    }
                  ]
                }
              ]
            }
          ]
        }
      ]
    }
  ]
}
```

### Contribute
Fork & Pull Request.

## License
MIT License. See the [LICENSE](https://github.com/apiaryio/protagonist/blob/master/LICENSE) file.