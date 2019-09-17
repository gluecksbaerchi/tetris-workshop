<?php

namespace App\MovableObjects;

class MyNormalMovableObject extends MyMovableObject
{
    /**
     * MyNormalMovableObject constructor.
     * @param string $identifier
     */
    public function __construct(string $identifier)
    {
        parent::__construct($identifier, self::TYPE_NORMAL);
    }

    public function moveRight(): void
    {
        $this->moveRightForWidth(1);
    }

    public function moveLeft(): void
    {
        $this->moveLeftForWidth(1);
    }

    public function moveFront(): void
    {
        $this->moveFrontForWidth(1);
    }

    public function moveBack(): void
    {
        $this->moveBackForWidth(1);
    }
}
