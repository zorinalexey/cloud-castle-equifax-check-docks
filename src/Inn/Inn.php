<?php

namespace CluodCastle\Check\Inn;

final class Inn implements \CluodCastle\Check\Interfaces\VerifyInterface
{
    /**
     * @var string|null
     */
    private ?string $inn = null;

    /**
     * @param string|null $number
     */
    public function __construct(?string $number)
    {
        if($number){
            $this->inn = preg_replace('~(\D)~u', '', $number);
        }
    }

    /**
     * @inheritDoc
     */
    public function verify(): bool
    {
        $verify = new VerifyInn($this->inn);
        if($verify->hash && $verify->currentHash){
            return (int)$verify->hash === (int)$verify->currentHash;
        }
        return false;
    }
}