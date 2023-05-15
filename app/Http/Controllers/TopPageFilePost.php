<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopPageFileRequest;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class TopPageFilePost extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(TopPageFileRequest $request)
    {
        $validatedData = $request->validated();
        $uploadedFile = $validatedData['file'];
        if (is_null($uploadedFile)){
            return Inertia::render('Welcome', ['message' => 'File not uploaded']);
        }
        $filename = $uploadedFile->getClientOriginalName();
        if (Storage::exists($filename)){
            return Inertia::render('Welcome', ['message' => 'File already exists']);
        }
        Storage::put($filename, $uploadedFile->get());
        return Inertia::render('Welcome', ['message' => 'File uploaded']);
    }
}
