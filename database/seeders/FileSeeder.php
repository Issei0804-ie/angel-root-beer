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
Lab 在室把握システムを
作った話
issei (Univ. Ryukyu-B4)
自己紹介名前: issei
UE
所属: 琉球大学工学部知能情報コース B4
趣味: Go, 音楽 (bass, guitar, tuba, etc..), NLP (自然言語処理),
Twitter: @iLP_isse
今日話すこと
●
●
作ったきっかけ
アプリの詳細
アプリの仕組みの説明
できたもの
これからの改善等
作ったきっかけ (2/2)
先輩
●
載ってるメンバーが古いから新しくしてほしい
手動で在室状況を切り替えるのめんどくさい
isseiくん、 作ってよ
●
僕
●
楽しそう
●
GW の宿題としてやってみるかーという気持ちになった
アプリの詳細
達成したい目標
●
メンバーの追加を楽にしたい
自動的に在室状況を切り替えたい
アプリの仕組みの説明
弊学科は wifiが飛んでおり、 大体みんな接続している
MACアドレスに着目。
MACアドレスとユーザーを紐付ける辞書を作って、パケットキャプチャすればユーザーを特定でき
そう。
辞書はこんなイメージ({"mac_address": "member_name"})
このアプリの良い点
インターネットに繋がっていれば在室状況がわかる
メンバーの追加が楽 (curlでできます)
手動で在室状況を切り替えなくて良い
在学者
issei
帰宅者
• fuga
piyo
poyo
このアプリの改善点
HTML を見に行くのが面倒。
=> 弊学科 mattermost に通知を飛ばしたい
●研究室にいる、いないしかわからない。
=> ちょっと外出してるとか、いつ来る予定とかそういう状況がわかると良い
ユーザーの評価
神
なんか闇の技術っぽい
めちゃくちゃいいけどパンチが足りない
弊学科で宣伝して使うべきでは?
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
