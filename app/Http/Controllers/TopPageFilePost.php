<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\VisionAPI;
use App\Http\Requests\TopPageFileRequest;
use App\Models\File;
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
        if (is_null($uploadedFile)) {
            return Inertia::render('Welcome', ['message' => 'File not uploaded', 'files' => File::all()]);
        }
        $filename = $uploadedFile->getClientOriginalName();
        if (Storage::exists($filename)) {
            return Inertia::render('Welcome', ['message' => 'File already exists', 'files' => File::all()]);
        }

        $fileData = $uploadedFile->get();
        Storage::put($filename, $fileData);

        VisionAPI::detectText($fileData);
        return Inertia::render('Welcome', ['message' => 'File uploaded', 'files' => File::all()]);
    }
}
