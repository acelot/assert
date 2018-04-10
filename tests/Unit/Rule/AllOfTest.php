<?php declare(strict_types=1);

namespace Acelot\Validator\Tests\Unit\Rule;

use Acelot\Validator\Exception\AllOfException;
use Acelot\Validator\Rule\AllOf;
use Acelot\Validator\Rule\MaxLength;
use Acelot\Validator\Rule\MinLength;
use Acelot\Validator\Rule\IsEmpty;
use Acelot\Validator\Rule\Not;
use Acelot\Validator\Rule\StringType;
use Acelot\Validator\AssertExceptionInterface;
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
