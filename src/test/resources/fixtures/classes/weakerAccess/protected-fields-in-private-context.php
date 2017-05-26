<?php

class ProtectedFieldsInPrivateContext {
    private $private;
    public  $public;

    protected $protectedUsedInPublic;
    protected $protectedUsedInPublicProtected;
    protected $protectedUsedInPublicPrivate;
    protected $protectedUsedInPublicProtectedPrivate;
    protected $protectedUsedInProtected;
    protected $protectedUsedInProtectedPrivate;
    <weak_warning descr="Since the property used in private context only, it could be declared private.">protected</weak_warning> $protectedUsedInPrivate;

    public function publicMethod() {
        return [
            $this->private,
            $this->public,

            $this->protectedUsedInPublic,
            $this->protectedUsedInPublicProtected,
            $this->protectedUsedInPublicPrivate,
            $this->protectedUsedInPublicProtectedPrivate
        ];
    }

    protected function protectedMethod() {
        return [
            $this->private,
            $this->public,

            $this->protectedUsedInPublic,
            $this->protectedUsedInPublicProtected,
            $this->protectedUsedInPublicPrivate,
            $this->protectedUsedInPublicProtectedPrivate,
            $this->protectedUsedInProtected,
            $this->protectedUsedInProtectedPrivate
        ];
    }

    private function pivateMethod() {
        return [
            $this->private,
            $this->public,

            $this->protectedUsedInPublicPrivate,
            $this->protectedUsedInPublicProtectedPrivate,
            $this->protectedUsedInProtectedPrivate,
            $this->protectedUsedInPrivate
        ];
    }
}

class ProtectedFieldsInMagicContext {
    <weak_warning descr="Since the property used in private context only, it could be declared private.">protected</weak_warning> $protectedUsedInMagic;

    public function __construct($protectedUsedInMagic)
    {
        $this->protectedUsedInMagic = $protectedUsedInMagic;
    }
}