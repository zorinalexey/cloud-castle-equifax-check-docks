<?php

namespace CluodCastle\Check\Uid;

final class Uidgen
{

    /**
     * @var string|null
     */
    private ?string $uid = null;

    public function __construct()
    {
        $this->uid = preg_replace('~(\w{8})(\w{4})(\w{3})(\w{4})(\w{12})~u', '$1-$2-1$3-$4-$5', md5(uniqid('', true)));
    }

    public function getUid():string
    {
        return $this->uid;
    }

    public function getUidHash():string
    {
        $hash = new UidHashGenerate($this->uid);
        return $this->uid.'-'. $hash->getHash();
    }
}