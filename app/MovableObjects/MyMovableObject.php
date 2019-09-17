<?php

namespace App\MovableObjects;

use App\Collections\Collectable;
use App\MovesObjects;

abstract class MyMovableObject extends MovableObject implements Collectable, MovesObjects
{
    const TYPE_NORMAL = 'normal';
    const TYPE_SLOW = 'slow';
    const TYPE_FAST = 'fast';

    /** @var string  */
    protected $identifier;

    /** @var string  */
    protected $type;

    /**
     * MyObject constructor.
     * @param string $identifier
     * @param string $type
     */
    public function __construct(string $identifier, string $type = self::TYPE_NORMAL)
    {
        parent::__construct();
        $this->identifier = $identifier;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    public abstract function moveRight(): void;

    public abstract function moveLeft(): void;

    public abstract function moveFront(): void;

    public abstract function moveBack(): void;
}
