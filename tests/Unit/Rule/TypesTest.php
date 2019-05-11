<?php declare(strict_types=1);

namespace Acelot\Assert\Tests\Unit\Rule;

use Acelot\Assert\AssertInterface;
use Acelot\Assert\Rule\ArrayType\ArrayType;
use Acelot\Assert\Rule\BooleanType\BooleanType;
use Acelot\Assert\Rule\FloatType\FloatType;
use Acelot\Assert\Rule\IntegerType\IntegerType;
use Acelot\Assert\Rule\IterableType\IterableType;
use Acelot\Assert\Rule\NullType\NullType;
use Acelot\Assert\Rule\ScalarType\ScalarType;
use Acelot\Assert\Rule\StringType\StringType;
use Acelot\Assert\Tests\Fixtures\IterableClass;
use Acelot\Assert\AssertExceptionInterface;
use Acelot\Assert\Tests\Fixtures\ValuesProvider;
use PHPUnit\Framework\TestCase;

class TypesTest extends TestCase
{
    public function passProvider()
    {
        return [
            [
                ArrayType::class, [
                [],
                [0, 1, 2],
                ['a' => 1, 'b' => 2, 'c' => 3],
            ]],
            [
                BooleanType::class, [
                true,
                false,
            ]],
            [
                FloatType::class, [
                PHP_FLOAT_MIN,
                0.0,
                PHP_FLOAT_MAX,
            ]],
            [
                IntegerType::class, [
                PHP_INT_MIN,
                0,
                PHP_INT_MAX,
            ]],
            [
                IterableType::class, [
                [],
                [0, 1, 2],
                new IterableClass([]),
                (function () {
                    yield 1;
                })(),
            ]],
            [
                ScalarType::class, [
                0,
                0.0,
                '',
                true,
            ]],
            [
                StringType::class, [
                '',
                'text'
            ]],
            [
                NullType::class, [
                null
            ]],
        ];
    }

    /**
     * @dataProvider passProvider
     *
     * @param string $class
     * @param array  $data
     */
    public function testPass(string $class, array $data)
    {
        /** @var AssertInterface $rule */
        $rule = new $class();

        foreach ($data as $value) {
            try {
                $rule->assert($value);
                $this->assertTrue(true);
            } catch (AssertExceptionInterface $e) {
                $this->fail();
            }
        }
    }

    public function failProvider()
    {
        return [
            [ArrayType::class, ValuesProvider::getTypesExcept('array')],
            [BooleanType::class, ValuesProvider::getTypesExcept('boolean')],
            [FloatType::class, ValuesProvider::getTypesExcept('float')],
            [IntegerType::class, ValuesProvider::getTypesExcept('integer')],
            [IterableType::class, ValuesProvider::getTypesExcept('array')],
            [ScalarType::class, ValuesProvider::getTypesExcept('boolean,integer,float,string')],
            [StringType::class, ValuesProvider::getTypesExcept('string')],
            [NullType::class, ValuesProvider::getTypesExcept('null')],
        ];
    }

    /**
     * @dataProvider failProvider
     *
     * @param string $class
     * @param array  $data
     */
    public function testFail(string $class, array $data)
    {
        /** @var AssertInterface $rule */
        $rule = new $class();

        foreach ($data as $value) {
            try {
                $rule->assert($value);
                $this->fail();
            } catch (AssertExceptionInterface $e) {
                $this->assertInstanceOf($class . 'Exception', $e);
            }
        }
    }
}
