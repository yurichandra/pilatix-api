<?php

namespace App\Http\Controllers;

use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\ResourceInterface;

class RestController extends Controller
{
    /**
     * Manager attributes
     *
     * @var string
     */
    protected $manager;

    /**
     * Transformer attributes.
     *
     * @var string
     */
    protected $transformer;

    /**
     * Construct RestController class
     *
     * @return void
     */
    public function __construct()
    {
        $this->manager = new Manager();
    }

    /**
     * Generate single model.
     *
     * @return Item
     */
    protected function generateItem($model, $transformer = null)
    {
        if (!is_null($transformer)) {
            return new Item($model, new $transformer);
        }

        return new Item($model, new $this->transformer);
    }

    /**
     * Generate collection of model.
     *
     * @return Collection
     */
    protected function generateCollection($model, $transformer = null)
    {
        if (!is_null($transformer)) {
            return new Collection($model, new $transformer);
        }

        return new Collection($model, new $this->transformer);
    }

    /**
     * Send response method.
     *
     * @return Response
     */
    protected function sendResponse(ResourceInterface $data = null, $status = 200)
    {
        if ($data === null) {
            return response()->json();
        }

        return response()->json(
            $this->manager->createData($data)->toArray(),
            $status
        );
    }

    /**
     * Send not found response method.
     *
     * @return Response
     */
    protected function sendNotFoundResponse($status)
    {
        return response()->json($status, 404);
    }

    /**
     * Send internal server error response method.
     *
     * @return Response
     */
    protected function sendIseResponse($status)
    {
        return response()->json($status, 500);
    }

    /**
     * Send not authorize response method.
     *
     * @return Response
     */
    protected function sendNotAuthorizeResponse($status)
    {
        return response()->json($status, 401);
    }

    /**
     * Send unprocessable entity response.
     *
     * @param string $status
     * @return void
     */
    protected function sendUnprocessableEntityResponse($status)
    {
        return response()->json($status, 422);
    }
}
