<?php
return [
    'Development' => [
        'path' => 'dev',
        'setWritable' => ['web', 'runtime', 'storage'],
        'setExecutable' => [],
        'setCookieValidationKey' => []
    ],
    'Production' => [
        'path' => 'prod',
        'setWritable' => ['web', 'runtime', 'storage'],
        'setExecutable' => [],
        'setCookieValidationKey' => []
    ],
];
