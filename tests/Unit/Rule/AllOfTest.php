<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Unit\Rule;

use Acelot\Assert\Exception\AllOfException;
use Acelot\Assert\Rule\AllOf;
use Acelot\Assert\Rule\MaxLength;
use Acelot\Assert\Rule\MinLength;
use Acelot\Assert\Rule\IsEmpty;
use Acelot\Assert\Rule\Not;
use Acelot\Assert\Rule\StringType;
use Acelot\Assert\AssertExceptionInterface;
use PHPUnit\Framework\TestCase;

class AllOfTest extends TestCase
{
    public function testEmpty()
    {
        $rule = new AllOf();

        try {
            $rule->assert(null);
            $this->assertTrue(true);
        } catch (AssertExceptionInterface $e) {
            $this->fail();
        }
    }

    public function testSingle()
    {
        $rule = new AllOf(
            new StringType()
        );

        try {
            $rule->assert('');
            $this->assertTrue(true);
        } catch (AssertExceptionInterface $e) {
            $this->fail();
        }
    }

    public function testMultiple()
    {
        $rule = new AllOf(
            new StringType(),
            new Not(new IsEmpty()),
            new MinLength(3),
            new MaxLength(6)
        );

        try {
            $rule->assert('test');
            $this->assertTrue(true);
        } catch (AssertExceptionInterface $e) {
            $this->fail();
        }
    }

    public function testInvalid()
    {
        $rule = new AllOf(
            new StringType()
        );

        $this->expectException(AllOfException::class);
        $rule->assert(123);
    }
}
