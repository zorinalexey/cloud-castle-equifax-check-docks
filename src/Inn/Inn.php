<?php

namespace CluodCastle\Check\Inn;

final class Inn implements \CluodCastle\Check\Interfaces\VerifyInterface
{

    /**
     * @inheritDoc
     */
    public function __construct(string $number)
    {
        $this->inn = preg_replace('~(\D)~u', '', $number);
    }

    /**
     * @inheritDoc
     */
    public function verify(): bool
    {
        $verify = new VerifyInn($this->inn);
        return (int)$verify->hash === (int)$verify->currentHash;
    }
}