<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Unit\Rule;

use Acelot\Assert\Rule\AlwaysInvalid\AlwaysInvalidException;
use Acelot\Assert\Rule\AlwaysInvalid\AlwaysInvalid;
use Acelot\Assert\Tests\Fixtures\ValuesProvider;
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
