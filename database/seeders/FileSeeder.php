<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // delete file
        Storage::deleteDirectory('files');
        Storage::createDirectory('files');

        $pdfSample = Storage::disk('seed')->get('pdf-sample.pdf');
        $mdSample = Storage::disk('seed')->get('md-sample.md');

        $files = [
            ['file_name' => 'md-sample.md', 'file_path' => ('files' . '/md-sample.md'), 'body' => $mdSample],
            ['file_name' => 'pdf-sample.pdf', 'file_path' => ('files' . '/pdf-sample.pdf'), 'body' => $pdfSample],
        ];

        foreach ($files as $file) {
            Storage::disk('local')->put($file['file_path'], $file['body']);
            File::create([
                'file_name' => $file['file_name'],
                'file_path' => $file['file_path'],
            ]);
        }
    }
}
