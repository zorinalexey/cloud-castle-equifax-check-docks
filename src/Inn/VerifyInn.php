<?php

namespace CluodCastle\Check\Inn;

class VerifyInn
{
    /**
     * Множитель (для числа С)
     * @var array
     */
    private static array $c = [
        1 => 7,
        2 => 2,
        3 => 4,
        4 => 10,
        5 => 3,
        6 => 5,
        7 => 9,
        8 => 4,
        9 => 6,
        10 => 8
    ];

    /**
     * Множитель (для числа D)
     * @var array
     */
    private static array $d = [
        1 => 3,
        2 => 7,
        3 => 2,
        4 => 4,
        5 => 10,
        6 => 3,
        7 => 5,
        8 => 9,
        9 => 4,
        10 => 6,
        11 => 8
    ];

    /**
     * Вычисленный хеш
     * @var string|null
     */
    public ?string $hash = null;

    /**
     * Текущий (указанный) хеш
     * @var string|null
     */
    public ?string $currentHash = null;

    /**
     * @var array
     */
    private array $inn = [];

    public function __construct(string $inn)
    {
        $this->inn = str_split($inn);
        $this->init();
    }

    private function init():void
    {
        $this->currentHash = $this->inn[10].$this->inn[11];
        $this->hash .= $this->checkDigit($this->inn, self::$c);
        $this->hash .= $this->checkDigit($this->inn, self::$d);
    }

    private function checkDigit(array $inn, array $check):int
    {
        $n = 0;
        foreach ($check as $i => $k) {
            $n += $k * (int) $inn[$i - 1];
        }
        $sum = $n % 11;
        if($sum === 10){
            return 0;
        }
        return $sum % 10;
    }

}