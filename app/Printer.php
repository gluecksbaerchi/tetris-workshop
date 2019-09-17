<?php


namespace App;


use App\MovableObjects\MyMovableObject;

class Printer
{
    /**
     * @param MyMovableObject $object
     */
    public static function printMyMovableObject(MyMovableObject $object): void
    {
        printf("%s (%.1f, %.1f) \n", $object->getIdentifier(), $object->getXAxis(), $object->getYAxis());
    }

    public static function printBorder(): void
    {
        printf("////////////////////////////////////////////////////////\n");
    }
}
