<?php

declare(strict_types=1);

namespace Asseco\Comments\App\Http\Controllers;

use Asseco\Comments\App\Http\Requests\CommentRequest;
use Asseco\Comments\App\Models\Comment;
use Exception;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public Comment $comment;

    public function __construct()
    {
        $this->comment = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json($this->comment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CommentRequest $request
     * @return JsonResponse
     */
    public function store(CommentRequest $request): JsonResponse
    {
        $comment = $this->comment::query()->create($request->validated());

        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $comment
     * @return JsonResponse
     */
    public function show(Comment $comment): JsonResponse
    {
        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CommentRequest $request
     * @param Comment $comment
     * @return JsonResponse
     */
    public function update(CommentRequest $request, Comment $comment): JsonResponse
    {
        $comment->update($request->validated());

        return response()->json($comment->refresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Comment $comment): JsonResponse
    {
        $isDeleted = $comment->delete();

        return response()->json($isDeleted ? 'true' : 'false');
    }
}
