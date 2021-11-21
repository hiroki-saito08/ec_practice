<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    // サービスプロバイダーについて
    public function showServiceProviderTest()
    {
        // encryptで暗号化し、decryptで元に戻す
        // EncryptionServiceProviderを呼び出して使う
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password');

        $sample = app()->make('serviceProviderTest');

        dd($sample, $password, $encrypt->decrypt($password));
    }

    //サービスンテナについて
    public function showServiceContainerTest()
    {
        // サービスコンテナにデータを入れる
        app()->bind('lifeCycleTest', function () {
            return 'ライフサイクルテスト';
        });

        // サービスコンテナを呼び出す
        $test = app()->make('lifeCycleTest');

        // サービスコンテナなしのパターン
        $message = new Message();
        $sample = new Sample($message);
        $sample->run();

        // サービスコンテナありのパターン
        // 自動で依存関係を解決してくれる
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();

        // サービスンテナの中身を確認
        dd($test, app());
    }
}

// 本来は１ファイル１クラスが鉄則

class Sample
{
    public $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function run()
    {
        $this->message->send();
    }
}

class Message
{
    public function send()
    {
        echo ('メッセージ表示');
    }
}
