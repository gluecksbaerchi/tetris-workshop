<?php


namespace App\MovableObjects;


use \Exception;

class MyMovableObjectFactory
{
    /**
     * @param string $type
     * @param string $identifier
     * @return MyMovableObject
     * @throws Exception
     */
    public static function createMovableObject(string $type, string $identifier): MyMovableObject
    {
        switch ($type)
        {
            case MyMovableObject::TYPE_NORMAL:
                return new MyNormalMovableObject($identifier);
            case MyMovableObject::TYPE_SLOW:
                return new MySlowMovableObject($identifier);
            case MyMovableObject::TYPE_FAST:
                return new MyFastMovableObject($identifier);
            default:
                throw new Exception('Unbekannter Typ.');
        }
    }
}
