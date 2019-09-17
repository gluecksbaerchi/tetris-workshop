<?php


namespace App\Services;


use App\Models\Thing;

class SlowObjectMoveService extends ObjectMoveService
{
    public function moveLeft(Thing $object)
    {
        $object->x_axis = $object->x_axis - 0.5;
        $object->saveOrFail();
    }

    public function moveRight(Thing $object)
    {
        $object->x_axis = $object->x_axis + 0.5;
        $object->saveOrFail();
    }

    public function moveFront(Thing $object)
    {
        $object->y_axis = $object->y_axis + 0.5;
        $object->saveOrFail();
    }

    public function moveBack(Thing $object)
    {
        $object->y_axis = $object->y_axis - 0.5;
        $object->saveOrFail();
    }
}
