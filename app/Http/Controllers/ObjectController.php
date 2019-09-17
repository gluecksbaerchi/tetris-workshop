<?php

namespace App\Http\Controllers;

use App\Http\Resources\ObjectResource;
use App\Models\Thing;
use App\Services\ObjectHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Http\ResponseFactory;
use Throwable;

class ObjectController extends Controller
{
    /**
     * @var ObjectHandler
     */
    protected $objectHandler;

    /**
     * ObjectController constructor.
     * @param ObjectHandler $objectHandler
     */
    public function __construct(ObjectHandler $objectHandler)
    {
        $this->objectHandler = $objectHandler;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function showObjects(): AnonymousResourceCollection
    {
        return ObjectResource::collection(Thing::all());
    }

    /**
     * @param $id
     * @return ObjectResource|Response|ResponseFactory
     */
    public function showObject($id)
    {
        $object = Thing::find($id);
        if ($object === null) {
            return response('Not Found', 404);
        }
        return new ObjectResource($object);
    }

    /**
     * @param Request $request
     * @return ObjectResource
     * @throws ValidationException
     * @throws Throwable
     */
    public function createObject(Request $request): ObjectResource
    {
        $this->validate($request, [
            'name' => 'string|required',
            'type' => [
                'required',
                Rule::in(['normal', 'slow', 'fast']),
            ],
        ]);
        $object = new Thing();
        $object->name = $request->get('name');
        $object->type = $request->get('type');
        $object->x_axis = 0;
        $object->y_axis = 0;
        $object->saveOrFail();
        return new ObjectResource($object);
    }

    /**
     * @param Request $request
     * @return ObjectResource
     * @throws ValidationException
     */
    public function moveObject(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'direction' => [
                'required',
                Rule::in(['l', 'r', 'v', 'z']),
            ],
            'width' => 'required|numeric'
        ]);

        $object = $this->objectHandler->moveObjectToDirection(
            $request->get('name'),
            $request->get('direction'),
            $request->get('width')
        );

        return new ObjectResource($object);
    }
}
