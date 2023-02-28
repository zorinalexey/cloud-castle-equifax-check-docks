<?php

namespace CluodCastle\Check\Snils;

final class VerifySnils
{

    public ?string $currentHash = null;
    public ?string $hash = null;
    private ?string $snils = null;

    public function __construct(string $snils)
    {
        $this->snils = $snils;
        $this->init();
    }

    private function init(): void
    {
        $sum = (int)bcmod($this->getSum(), 101, 2);
        if ($sum === 100 || $sum === 0) {
            $this->hash = '00';
        } else {
            $this->hash = (string)$sum;
        }
    }

    private function getSum(): int
    {
        $sum = 0;
        $index = 9;
        $hash = '';
        foreach (str_split($this->snils) as $value) {
            if ($index > 0) {
                $sum += (int)$value * $index;
            } else {
                $hash .= (string)$value;
            }
            $index--;
        }
        $this->currentHash = $hash;
        return $sum;
    }

}