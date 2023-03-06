<?php

namespace CluodCastle\Check\Snils;

use CluodCastle\Check\Interfaces\VerifyInterface;

final class Snils implements VerifyInterface
{

    private ?string $snils = null;

    /**
     * @param string|null $number
     */
    public function __construct(?string $number)
    {
        if($number){
            $this->snils = preg_replace('~(\D)~u', '', $number);
        }
    }

    /**
     * Получить результат проверки
     * @return bool
     */
    public function verify(): bool
    {
        $verify = new VerifySnils($this->snils);
        if($verify->hash && $verify->currentHash){
            return (int)$verify->hash === (int)$verify->currentHash;
        }
        return false;
    }
}