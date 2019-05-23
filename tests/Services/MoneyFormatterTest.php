<?php

namespace App\Services\Tests;

use App\Services\MoneyFormatter;
use App\Services\NumberFormatterInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ReflectionException;

/**
 * Class MoneyFormatterTest
 *
 * @package App\Tests
 */
class MoneyFormatterTest extends TestCase
{
    /**
     * @return array
     */
    public function providerNumbersEUR(): array
    {
        return [
            [2835779, '2.84M','2.84M €'],
            [999500, '1.00M','1.00M €'],
            [999499, '999K', '999K €'],
            [66.67, '66.67', '66.67 €'],
            [12, '12', '12 €'],
            [-533.10, '-533.10', '-533.10 €'],
            [-66.67, '-66.67', '-66.67 €'],
            [-12, '-12', '-12 €'],
        ];
    }

    /**
     * @return array
     */
    public function providerNumbersUSD(): array
    {
        return [
            [2835779, '2.84M','$2.84M'],
            [999500, '1.00M','$1.00M'],
            [999499, '999K', '$999K'],
            [66.67, '66.67', '$66.67'],
            [12, '12', '$12'],
            [-533.10, '-533.10', '$-533.10'],
            [-66.67, '-66.67', '$-66.67'],
            [-12, '-12', '$-12'],
        ];
    }

    /**
     * @dataProvider providerNumbersEUR
     * @param string $originNumber
     * @param $formattedNumber
     * @param string $expectedResult
     * @throws ReflectionException
     */
    public function testFormattingEUR($originNumber, $formattedNumber, $expectedResult) :void
    {

        $mockFormat = $this->mockCreate($formattedNumber);

        $format = new MoneyFormatter($mockFormat);
        $this->assertEquals($expectedResult, $format->formatEur($originNumber));
    }

    /**
     * @dataProvider providerNumbersUSD
     * @param string $originNumber
     * @param $formattedNumber
     * @param string $expectedResult
     * @throws ReflectionException
     */
    public function testFormattingUSD($originNumber, $formattedNumber, $expectedResult) :void
    {
        $mockFormat = $this->mockCreate($formattedNumber);

        $format = new MoneyFormatter($mockFormat);
        $this->assertEquals($expectedResult, $format->formatUsd($originNumber));
    }

    /**
     * @param $formattedNumber
     * @return NumberFormatterInterface|MockObject
     * @throws ReflectionException
     */
    private function mockCreate($formattedNumber)
    {

        $mockFormat = $this->createMock(NumberFormatterInterface::class);
        $mockFormat->expects($this->exactly(1))
            ->method('changeFormat')
            ->willReturn($formattedNumber);
        return $mockFormat;
    }
}
