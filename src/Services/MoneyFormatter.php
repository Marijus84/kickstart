<?php


namespace App\Services;


/**
 * Class MoneyFormatter
 *
 * @package App\Services
 */
class MoneyFormatter
{
    /**
     * @var NumberFormatterInterface
     */
    private $formatter;

    /**
     * MoneyFormatter constructor.
     *
     * @param NumberFormatterInterface $formatter
     */
    public function __construct(NumberFormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatEur(float $number)
    {
        return $this->numberFormatter->changeFormat($number).' €';
    }

    /**
     * @param float $number
     * @return string
     */
    public function formatUsd(float $number)
    {
        return '$' . $this->numberFormatter->changeFormat($number);
    }
}

