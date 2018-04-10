<?php declare(strict_types=1);

namespace Acelot\Validator\Tests\Unit\Rule;

use Acelot\Validator\Rule\AlwaysValid;
use Acelot\Validator\Rule\Equals;
use Acelot\Validator\Rule\FloatType;
use Acelot\Validator\Rule\IterableType;
use Acelot\Validator\Rule\RuleNameTrait;
use Acelot\Validator\Rule\ScalarType;
use Acelot\Validator\AssertInterface;
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
