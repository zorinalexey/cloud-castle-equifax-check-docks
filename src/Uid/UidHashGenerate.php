<?php

namespace CluodCastle\Check\Uid;

final class UidHashGenerate
{
    private static array $hex16 = [
        '0' => 0,
        '1' => 1,
        '2' => 2,
        '3' => 3,
        '4' => 4,
        '5' => 5,
        '6' => 6,
        '7' => 7,
        '8' => 8,
        '9' => 9,
        'a' => 10,
        'b' => 11,
        'c' => 12,
        'd' => 13,
        'e' => 14,
        'f' => 15
    ];

    /**
     * @var array|null
     */
    private array $uid;

    /**
     * @var string|null
     */
    private ?string $hash = null;

    public function __construct(string $uid)
    {
        $this->uid = str_split(preg_replace('~(\W)~u', '', $uid));
        $this->generate();
    }

    /**
     * Расчет хеша строки uid
     * @return void
     */
    private function generate():void
    {
        $sum = 0;
        $index = 1;
        foreach ($this->uid as $value){
            $int = self::$hex16[$value];
            $sum += $index * $int;
            $index++;
            if($index >10){
                $index = 1;
            }
        }
        $this->hash = array_search($sum % 16, self::$hex16, true);
    }

    /**
     * Получить значение хеша строки
     * @return string
     */
    public function getHash():string
    {
        return (string)$this->hash;
    }
}