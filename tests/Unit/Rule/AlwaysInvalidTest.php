<?php declare(strict_types=1);

namespace Acelot\Validator\Tests\Unit\Rule;

use Acelot\Validator\Exception\AlwaysInvalidException;
use Acelot\Validator\Rule\AlwaysInvalid;
use Acelot\Validator\Tests\Fixtures\ValuesProvider;
use PHPUnit\Framework\TestCase;

class AlwaysInvalidTest extends TestCase
{
    public function valuesProvider()
    {
        return array_map(function ($value) {
            return [$value];
        }, ValuesProvider::getTypesExcept());
    }

    /**
     * @dataProvider valuesProvider
     * @param mixed $input
     */
    public function testAssert($input)
    {
        $rule = new AlwaysInvalid();
        $this->expectException(AlwaysInvalidException::class);
        $rule->assert($input);
    }
}
