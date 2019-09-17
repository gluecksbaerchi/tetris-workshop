<?php


namespace App\Services;


use App\Models\Thing;

abstract class ObjectMoveService
{
    public abstract function moveLeft(Thing $object);

    public abstract function moveRight(Thing $object);

    public abstract function moveFront(Thing $object);

    public abstract function moveBack(Thing $object);
}
