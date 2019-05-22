<?php

namespace App\Tests;

use App\Services\NumberFormatter;
use PHPUnit\Framework\TestCase;

/**
 * Class NumberFormatterTest
 *
 * @package App\Tests
 */
class NumberFormatterTest extends TestCase
{

    /**
     * @return array
     */
    public function providerNumbers(): array
    {
        return [
            [2835779, '2.84M'],
            [999500, '1.00M'],
            [999499, '999K'],
            [535216, '535K'],
            [99950, '100K'],
            [99949, '99 949'],
            [27533.78, '27 534'],
            [1000.02, '1 000'],
            [999.99, '999.99'],
            [999.9999, '1 000'],
            [533.1, '533.10'],
            [66.6666, '66.67'],
            [12.00, '12'],
            [0.01, '0.01'],
//          [0.00, '0'],
            [-2835779, '-2.84M'],
            [-999500, '-1.00M'],
            [-999499, '-999K'],
            [-535216, '-535K'],
            [-99950, '-100K'],
            [-99949, '-99 949'],
            [-27533.78, '-27 534'],
            [-1000.02, '-1 000'],
            [-999.99, '-999.99'],
            [-999.9999, '-1 000'],
            [-533.1, '-533.10'],
            [-66.6666, '-66.67'],
            [-12.00, '-12'],
            [-0.01, '-0.01']
        ];
    }

    /**
     * @dataProvider providerNumbers
     * @param string $originNumber
     * @param string $formatedNumber
     */
    public function testFormatting($originNumber, $formatedNumber) :void
    {
        $format = new NumberFormatter();
        $this->assertEquals($formatedNumber, $format->changeFormat($originNumber));
    }
}
