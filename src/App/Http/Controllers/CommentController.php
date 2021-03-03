<?php

declare(strict_types=1);

namespace Asseco\Comments\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Asseco\Comment\App\Comment;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param string  $modelName
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function index(Request $request, string $modelName): JsonResponse
    {
        $model = $this->extractModelClass($modelName);

        return response()->json($model::search($request->all())->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     * @return JsonResponse
     */
    public function update(Request $request, string $modelName): JsonResponse
    {
        $model = $this->extractModelClass($modelName);
        $comment = $model::search($request->except('update'));

        if (!$request->has('update')) {
            throw new Exception('Missing update parameters');
        }

        $comment->update($request->update);

        return response()->json($comment->get());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param integer $ticketId
     * @return JsonResponse
     */
    public function store(Request $request, int $ticketId): JsonResponse
    {

        $comment = Comment::query()->create($request->all());

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
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Request $request, string $modelName): JsonResponse
    {
        $model = $this->extractModelClass($modelName);
        $isDeleted = $model::comment($request->all())->delete();

        return response()->json($isDeleted ? 'true' : 'false');
    }

    /**
     * @param string $modelName
     *
     * @throws Exception
     *
     * @return Model
     */
    protected function extractModelClass(string $modelName): Model
    {
        $mapping = config('asseco-comment.model_mapping');

        if (array_key_exists($modelName, $mapping)) {
            return new $mapping[$modelName]();
        }

        $namespaces = config('asseco-comment.models_namespaces');

        $formattedModelName = Str::studly(Str::singular($modelName));

        foreach ($namespaces as $namespace) {
            $model = "$namespace\\$formattedModelName";
            if (class_exists($model)) {
                return new $model();
            }
        }

        throw new Exception("Model $model does not exist");
    }
}

