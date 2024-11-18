<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\IdeaStoreRequest;
use App\Http\Requests\IdeaUpdateRequest;
use App\Http\Requests\VoteRequest;
use App\Http\Resources\CommentResource;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\VoteResource;
use App\Models\Idea;
use App\Services\IdeaService;
use App\Services\Translation\TranslationServiceFactory;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function __construct(protected IdeaService $ideaService) {}

    /**
     * @throws \Exception
     */
    public function store(IdeaStoreRequest $request): JsonResponse
    {
        $translations = $this->ideaService->getTranslations($request->validated());

        // Create the idea with translations
        $idea = Idea::create([
            'title' => $translations['title'],
            'description' => $translations['description'] ?? null,
            'author_id' => auth()->user()->id,
        ]);

        return response()->json([
            'idea' => $this->ideaService->getIdeaResource($idea),
        ]);
    }

    /**
     * @throws \Exception
     */
    public function update(IdeaUpdateRequest $request, Idea $idea): JsonResponse
    {
        $translations = $this->ideaService->getTranslations($request->validated());

        $idea->setTranslations('title', $translations['title'])
            ->setTranslations('description', $translations['description'] ?? null);
        $idea->save();

        return response()->json([
            'idea' => $this->ideaService->getIdeaResource($idea),
        ]);
    }

    public function destroy(Idea $idea): JsonResponse
    {
        $idea->delete();

        return response()->json([
            'idea' => ['id' => $idea->id],
        ]);
    }

    public function vote(VoteRequest $request, Idea $idea): JsonResponse
    {
        $this->ideaService->vote($idea, $request->validated());

        return response()->json([
            'idea' => $this->ideaService->getIdeaResource($idea),
            'user_votes' => VoteResource::collection(UserService::getAuthUser(['votes'])->votes),
        ]);
    }

    public function comment(CommentRequest $request, Idea $idea): JsonResponse
    {
        $this->ideaService->addComment($idea, $request->validated());

        return response()->json([
            'idea' => $this->ideaService->getIdeaResource($idea),
            'user_comments' => CommentResource::collection(UserService::getAuthUser(['comments'])->comments),
        ]);
    }

    public function favorite(Request $request, Idea $idea): JsonResponse
    {
        $this->ideaService->toggleFavorite($idea);

        return response()->json([
            'idea' => $this->ideaService->getIdeaResource($idea),
            'user_favorites' => FavoriteResource::collection(UserService::getAuthUser(['favorites'])->favorites),
        ]);
    }


    public function show(Request $request, Idea $idea): JsonResponse
    {
        return response()->json([
            'idea' => $this->ideaService->getIdeaResource($idea),
        ]);
    }

}
