<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopPageViewRequest;
use App\Models\ExtractedText;
use App\Models\File;
use Inertia\Inertia;
use Illuminate\Database\Eloquent\Builder;

class TopPageView extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TopPageViewRequest $request): \Inertia\Response
    {
        $query= ExtractedText::query();
        $searchQuery= $request->validated()['searchQuery'] ?? null;
        $query->when(true, function (Builder $q)use($searchQuery) {
            $q->where('extracted_text', 'like', "%$searchQuery%");
        });
        $files = $query->get()->map(function (ExtractedText $extractedText) {
            return [
                'id' => $extractedText->file->id,
                'file_name' => $extractedText->file->file_name,
                'file_path' => $extractedText->file->file_path,
                'extracted_text' => $extractedText->extracted_text,
            ];
        });
        return Inertia::render('Welcome',
            [
                'files' => $files,
                'searchQuery' => $searchQuery,
            ]
        );
    }
}
