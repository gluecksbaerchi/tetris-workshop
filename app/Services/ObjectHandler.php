<?php


namespace App\Services;


use App\Models\Thing;
use Exception;
use Throwable;

class ObjectHandler
{
    /** @var ObjectMoveService */
    protected $objectMoveService;

    /**
     * @param string $objectName
     * @param string $direction
     * @param int $width
     * @return Thing
     * @throws Exception
     */
    public function moveObjectToDirection(string $objectName, string $direction, int $width = 1): Thing
    {
        /** @var Thing $object */
        $object = Thing::where('name', '=', $objectName)->first();
        if ($object === null) {
            throw new Exception("Das Objekt konnte nicht gefunden werden.\n");
        }

        $this->buildObjectMoveService($object);

        $direction = $this->manipulateDirection($direction);

        switch ($direction) {
            case 'l':
                $this->objectMoveService->moveLeft($object);
                break;
            case 'r':
                $this->objectMoveService->moveRight($object);
                break;
            case 'v':
                $this->objectMoveService->moveFront($object);
                break;
            case 'z':
                $this->objectMoveService->moveBack($object);
                break;
            default:
                throw new Exception("Unbekannte Richtung.\n");
        }

        $object->saveOrFail();
        return $object;
    }

    /**
     * @param Thing $object
     */
    public function printObjectPosition(Thing $object): void
    {
        print_r("Das Objekt \"$object->name\" befindet sich derzeit an Position ($object->x_axis, $object->y_axis).\n");
    }

    /**
     * @param Thing $object
     * @throws Exception
     */
    public function buildObjectMoveService(Thing $object): void
    {
        switch ($object->type) {
            case 'slow':
                $this->objectMoveService = new SlowObjectMoveService();
                break;
            case 'fast':
                $this->objectMoveService = new FastObjectMoveService();
                break;
            case 'normal':
                $this->objectMoveService = new NormalObjectMoveService();
                break;
            default:
                throw new Exception('Unbekannter Objekttyp.');
        }
    }

    /**
     * @param string $direction
     * @return string
     * @throws Exception
     */
    public function manipulateDirection(string $direction): string
    {
        $reverse = true;

        if ($reverse) {
            switch ($direction) {
                case 'l':
                    $direction = 'r';
                    break;
                case 'r':
                    $direction = 'l';
                    break;
                case 'v':
                    $direction = 'z';
                    break;
                case 'z':
                    $direction = 'v';
                    break;
                default:
                    throw new Exception("Unbekannte Richtung.\n");
            }
        }
        return $direction;
    }
}
