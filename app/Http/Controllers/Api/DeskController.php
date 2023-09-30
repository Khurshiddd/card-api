<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Desk\StoreRequest;
use App\Http\Requests\Desk\UpdateRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use Exception;
use phpDocumentor\Reflection\Types\Float_;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        if (Desk::all()->count() % 15 == 0) {
            $info = Desk::all()->count() / 15;
        } else {
            $info = Desk::all()->count() / 15;
            $numberAsString = (string)$info;
            if ($numberAsString[2] < 5){
                $info = Desk::all()->count() / 15 + 1;
            }
        }

        $data = Desk::with('lists')->latest()->paginate(15);
        return $this->response(DeskResource::collection($data), round($info, 0));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            Desk::create($request->validated());
            return $this->success('desk created');
        } catch (Exception $e) {
            return $this->error('something went wrong');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $data = Desk::with('lists')->findOrFail($id);
        return $this->response(new DeskResource($data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Desk $desk): \Illuminate\Http\JsonResponse
    {
        try {
            $desk->update($request->validated());
            return $this->success('succesfully update desk');
        } catch (Exception) {
            return $this->error('something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desk $desk): \Illuminate\Http\JsonResponse
    {
        try {
            $desk->delete();
            return $this->success('successfully delete desk');
        } catch (Exception $e) {
            return $this->error("can not delete desk");
        }
    }
}
