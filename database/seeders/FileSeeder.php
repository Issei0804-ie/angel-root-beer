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


        $files = [
            ['file_name' => 'pythonのlinter.md', 'file_path' => ('files' . '/pythonのlinter.md'), 'body' => '
            python の linter (mypy)

            [Python] って実は型ヒントが存在するけど型を無視してもランタイムエラーが出ない話

            code:python
             def sample(not_str: str) -> int:
                 return "s"


             sample(1)

            これが普通に通ってしまうのはおかしい(過激派)

            というわけでせめて linter でも使いましょう．

            [***** mypy]

             いい感じに型ヒントを出してくれる
            　made by python

            上のソースを実行するとこんな感じ

            code: sh
             mypy temp.py                                                                                                                                                                    ✔
             temp.py:2: error: Incompatible return value type (got "str", expected "int")
             temp.py:5: error: Argument 1 to "sample" has incompatible type "int"; expected "str"
             Found 2 errors in 1 file (checked 1 source file)

            いい感じ．ただ，
            デフォルトの設定だと型が無かったらエラーを吐くわけではない．


            code:python
             def sample(not_str):
                 return "s"


             sample(1)

            このコードを型検査すると特に問題なく通る．
            とりあえず，僕は型をつけたいので config を書く．

            code:mypy.ini
             [mypy]
             disallow_untyped_defs = True

            これをいい感じに渡せば

            code:sh
             mypy --config-file mypy.ini temp.py                                                                                                                                             ✔
             temp.py:1: error: Function is missing a type annotation
             Found 1 error in 1 file (checked 1 source file)

            これでやっといい感じ．

            ignore したいライブラリとかあればこっち

            code: ignore
             [mypy-requests.*]
             ignore_missing_imports = True


            [*** その他 ]

             勝手に型ヒント書いてほしい
             あと format 整えるツールも紹介して

            参考サイト
             [https://kimuson.dev/blog/python/mypy_pylance/]
             '],
        ];

        foreach ($files as $file) {
            Storage::put($file['file_path'], $file['body']);
            File::create([
                'file_name' => $file['file_name'],
                'file_path' => $file['file_path'],
            ]);
        }
    }
}
