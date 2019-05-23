<?php

namespace App\Services;

interface NumberFormatterInterface
{
    public function changeFormat(float $value): ?string;
}
