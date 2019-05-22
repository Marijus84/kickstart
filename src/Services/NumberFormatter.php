<?php

namespace App\Services;

class NumberFormatter implements NumberFormatterInterface
{
    public function changeFormat(float $value): ?string
    {
        $absValue = abs(round($value, 2));

        switch ($absValue) {
            case ($absValue >= 999500):
                $formattedValue = number_format($value / 1000000, 2, '.', ' ') . 'M';
                break;

            case ($absValue >= 99950):
                $formattedValue = number_format($value / 1000) . 'K';
                break;

            case ($absValue >= 1000):
                $formattedValue = number_format($value, 0, '', ' ');
                break;

            default:
                $fraction  = $absValue - (int) $absValue;

                if ($fraction !=0) {
                    $formattedValue = number_format($value, 2, '.', ' ');
                } else {
                    $formattedValue = number_format($value, 0, '', ' ');
                }
                break;
        }

        return $formattedValue;
    }
}
