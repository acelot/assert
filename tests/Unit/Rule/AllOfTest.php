<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Unit\Rule;

use Acelot\Assert\Rule\AllOf\AllOfException;
use Acelot\Assert\Rule\AllOf\AllOf;
use Acelot\Assert\Rule\MaxLength\MaxLength;
use Acelot\Assert\Rule\MinLength\MinLength;
use Acelot\Assert\Rule\IsEmpty\IsEmpty;
use Acelot\Assert\Rule\Not\Not;
use Acelot\Assert\Rule\StringType\StringType;
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
