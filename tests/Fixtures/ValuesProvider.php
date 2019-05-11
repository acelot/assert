<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Fixtures;

use stdClass;

class ValuesProvider
{
    /**
     * @param string $except
     *
     * @return array
     */
    public static function getTypesExcept($except = ''): array
    {
        $types = [
            'boolean' => true,
            'integer' => 0,
            'float' => 0.0,
            'string' => '',
            'array' => [],
            'object' => new stdClass(),
            'closure' => function () {
                return true;
            },
            'null' => null,
        ];

        return array_values(
            array_diff_key($types, array_flip(explode(',', $except)))
        );
    }
}
