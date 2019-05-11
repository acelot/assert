<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Unit\Rule;

use Acelot\Assert\Rule\In\InException;
use Acelot\Assert\Exception\RuleMisuseException;
use Acelot\Assert\Rule\Contains\Contains;
use Acelot\Assert\Tests\Fixtures\IterableClass;
use PHPUnit\Framework\TestCase;

class ContainsTest extends TestCase
{
    public function validProvider()
    {
        return [
            [1, [1]],
            [true, [0, 1], false],
            ['a', ['a', 'b', 'c']],
            ['two', new IterableClass(['one', 'two', 'three'])]
        ];
    }

    /**
     * @dataProvider validProvider
     *
     * @param mixed $needle
     * @param mixed $haystack
     * @param bool  $strict
     */
    public function testValid($needle, $haystack, bool $strict = true)
    {
        try {
            $rule = new Contains($needle, $strict);
            $rule->assert($haystack);
            $this->assertTrue(true);
        } catch (RuleMisuseException $e) {
            $this->fail();
        } catch (InException $e) {
            $this->fail();
        }
    }

    public function invalidProvider()
    {
        return [
            [1, []],
            [true, [0, 1]],
            ['c', ['a', 'b']],
            [null, new IterableClass(['one', 'two', 'three'])]
        ];
    }

    /**
     * @dataProvider invalidProvider
     *
     * @param mixed $needle
     * @param mixed $haystack
     * @param bool  $strict
     */
    public function testInvalid($needle, $haystack, bool $strict = true)
    {
        $this->expectException(InException::class);
        $rule = new Contains($needle, $strict);

        try {
            $rule->assert($haystack);
        } catch (RuleMisuseException $e) {
            $this->fail();
        }
    }

    public function testRuleMisuse()
    {
        $this->expectException(RuleMisuseException::class);
        $rule = new Contains(1);
        $rule->assert(1);
    }
}
