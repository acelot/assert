<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Unit\Rule;

use Acelot\Assert\Rule\AlwaysValid;
use Acelot\Assert\Rule\Equals;
use Acelot\Assert\Rule\FloatType;
use Acelot\Assert\Rule\IterableType;
use Acelot\Assert\Rule\RuleNameTrait;
use Acelot\Assert\Rule\ScalarType;
use Acelot\Assert\AssertInterface;
use PHPUnit\Framework\TestCase;

class RuleNameTraitTest extends TestCase
{
    public function ruleNamesProvider()
    {
        return [
            [new AlwaysValid(), '$alwaysValid'],
            [new IterableType(), '$iterableType'],
            [new FloatType(), '$floatType'],
            [new Equals(1), '$equals'],
            [new ScalarType(), '$scalarType'],
        ];
    }

    /**
     * @dataProvider ruleNamesProvider
     *
     * @param AssertInterface $rule
     * @param string          $expected
     */
    public function testGetRuleName(AssertInterface $rule, string $expected)
    {
        $class = new class ()
        {
            use RuleNameTrait;
        };

        $this->assertEquals($expected, $class::getRuleName($rule));
    }
}
