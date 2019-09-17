<?php

namespace App\MovableObjects;

class MySlowMovableObject extends MyMovableObject
{
    /**
     * MySlowMovableObject constructor.
     * @param string $identifier
     */
    public function __construct(string $identifier)
    {
        parent::__construct($identifier, self::TYPE_SLOW);
    }

    public function moveRight(): void
    {
        $this->moveRightForWidth(0.5);
    }

    public function moveLeft(): void
    {
        $this->moveLeftForWidth(0.5);
    }

    public function moveFront(): void
    {
        $this->moveFrontForWidth(0.5);
    }

    public function moveBack(): void
    {
        $this->moveBackForWidth(0.5);
    }
}
