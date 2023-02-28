<?php

namespace CluodCastle\Check\Interfaces;

interface VerifyInterface
{

    /**
     * @param int $number
     */
    public function __construct(string $number);

    /**
     * Получить результат проверки
     * @return bool
     */
    public function verify(): bool;
}