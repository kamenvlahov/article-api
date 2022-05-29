<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\JsonResponse;
use \Prettus\Validator\Exceptions\ValidatorException;

class ArticleApiController extends Controller
{
    private ArticleRepository $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(): JsonResponse
    {
        $articles = $this->articleRepository->all();

        return response()->json($articles);
    }

    public function search(SearchRequest $request): JsonResponse
    {
        $articles = $this->articleRepository->whereLike(['title', 'description'], $request->search_word)->get();

        return response()->json($articles);
    }

    /**
     * @throws ValidatorException
     */
    public function store(ArticleRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['user_id'] = (int)$request->user()->id;
        $article = $this->articleRepository->create($input);

        return response()->json([
            'id' => $article->id,
        ]);
    }

    public function show(Article $article): JsonResponse
    {
        $article = $this->articleRepository->find($article->id);
        $article->comments;
        $article->images;

        return response()->json($article);
    }

    /**
     * @throws ValidatorException
     */
    public function update(ArticleRequest $request, Article $article): JsonResponse
    {
        $article = $this->articleRepository->update($request->all(), $article->id);

        return response()->json($article);
    }

    public function destroy(Article $article): JsonResponse
    {
        $article = $this->articleRepository->delete($article->id);

        return response()->json($article);
    }
}
