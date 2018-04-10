<?php declare(strict_types=1);

namespace Acelot\Validator\Tests\Unit\Rule;

use Acelot\Validator\Rule\{
    ArrayType,
    BoolType,
    FloatType,
    IntType,
    IterableType,
    NullType,
    ScalarType,
    StringType
};
use Acelot\Validator\AssertInterface;
use Acelot\Validator\Tests\Fixtures\IterableClass;
use Acelot\Validator\AssertExceptionInterface;
use Acelot\Validator\Tests\Fixtures\ValuesProvider;
use PHPUnit\Framework\TestCase;

class TypesTest extends TestCase
{
    public function passProvider()
    {
        return [
            [ArrayType::class, [
                [],
                [0, 1, 2],
                ['a' => 1, 'b' => 2, 'c' => 3],
            ]],
            [BoolType::class, [
                true,
                false,
            ]],
            [FloatType::class, [
                PHP_FLOAT_MIN,
                0.0,
                PHP_FLOAT_MAX,
            ]],
            [IntType::class, [
                PHP_INT_MIN,
                0,
                PHP_INT_MAX,
            ]],
            [IterableType::class, [
                [],
                [0, 1, 2],
                new IterableClass([]),
                (function () {
                    yield 1;
                })(),
            ]],
            [ScalarType::class, [
                0,
                0.0,
                '',
                true,
            ]],
            [StringType::class, [
                '',
                'text'
            ]],
            [NullType::class, [
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
            [BoolType::class, ValuesProvider::getTypesExcept('boolean')],
            [FloatType::class, ValuesProvider::getTypesExcept('float')],
            [IntType::class, ValuesProvider::getTypesExcept('integer')],
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
                $className = array_reverse(explode('\\', $class))[0];
                $this->assertInstanceOf(sprintf('\\Acelot\\Validator\\Exception\\%sException', $className), $e);
            }
        }
    }
}
