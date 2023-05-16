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
        Storage::disk('public')->deleteDirectory('files');
        Storage::disk('public')->createDirectory('files');

        $pdfSample = Storage::disk('seed')->get('pdf-sample.pdf');
        $mdSample = Storage::disk('seed')->get('md-sample.md');

        $files = [
            [
                'file_name' => 'md-sample.md',
                'file_path' => ('/files' . '/md-sample.md'),
                'body' => $mdSample,
                'extracted_text' => $mdSample,
            ],
            [
                'file_name' => 'pdf-sample.pdf',
                'file_path' => ('/files' . '/pdf-sample.pdf'),
                'body' => $pdfSample,
                'extracted_text' => '
自己紹介名前: issei
UE
所属: 琉球大学工学部知能情報コース B4
趣味: Go, 音楽 (bass, guitar, tuba, etc..), NLP (自然言語処理),
Twitter: @iLP_isse
                ',
            ],
        ];

        foreach ($files as $file) {
            Storage::disk('public')->put($file['file_path'], $file['body']);
            $createdFile= File::create([
                'file_name' => $file['file_name'],
                'file_path' => 'storage' . $file['file_path'],
            ]);
            $createdFile->extractedTexts()->create([
                'extracted_text' => $file['extracted_text'],
            ]);
        }
    }
}
