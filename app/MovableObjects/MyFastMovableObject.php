<?php

namespace App\MovableObjects;

class MyFastMovableObject extends MyMovableObject
{
    /**
     * MyFastMovableObject constructor.
     * @param string $identifier
     */
    public function __construct(string $identifier)
    {
        parent::__construct($identifier, self::TYPE_FAST);
    }

    public function moveRight(): void
    {
        $this->moveRightForWidth(2);
    }

    public function moveLeft(): void
    {
        $this->moveLeftForWidth(2);
    }

    public function moveFront(): void
    {
        $this->moveFrontForWidth(2);
    }

    public function moveBack(): void
    {
        $this->moveBackForWidth(2);
    }
}
