<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Unit\Rule;

use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\Rule\AlwaysValid\AlwaysValid;
use Acelot\Assert\Tests\Fixtures\ValuesProvider;
use PHPUnit\Framework\TestCase;

class AlwaysValidTest extends TestCase
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
        $rule = new AlwaysValid();

        try {
            $rule->assert($input);
            $this->assertTrue(true);
        } catch (AssertExceptionInterface $e) {
            $this->fail();
        }
    }
}
