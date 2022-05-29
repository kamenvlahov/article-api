<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    private CommentRepository $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CommentRequest $request, Article $article): JsonResponse
    {
        $input = $request->all();
        $input['user_id'] = (int)$request->user()->id;
        $input['article_id'] = (int)$article->id;
        $comments = $this->commentRepository->create($input);

        return response()->json($comments);
    }

    public function update(CommentRequest $request, Comment $comment, Article $article): JsonResponse
    {
        $comments = $this->commentRepository->update($request->all(), $comment->id);

        return response()->json($comments);
    }

    public function destroy(Comment $comments): JsonResponse
    {
        $comments = $this->commentRepository->delete($comments->id);

        return response()->json($comments);
    }
}
