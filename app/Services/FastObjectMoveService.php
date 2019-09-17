<?php


namespace App\Services;


use App\Models\Thing;

class FastObjectMoveService extends ObjectMoveService
{
    public function moveLeft(Thing $object)
    {
        $object->x_axis = $object->x_axis - 2;
        $object->saveOrFail();
    }

    public function moveRight(Thing $object)
    {
        $object->x_axis = $object->x_axis + 2;
        $object->saveOrFail();
    }

    public function moveFront(Thing $object)
    {
        $object->y_axis = $object->y_axis + 2;
        $object->saveOrFail();
    }

    public function moveBack(Thing $object)
    {
        $object->y_axis = $object->y_axis - 2;
        $object->saveOrFail();
    }
}
