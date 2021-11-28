<!-- コンポーネントを呼び出し -->
<x-tests.app>

  <x-slot name="header">ヘッダー1</x-slot>

コンポーネントテスト1

<!-- コンポーネントを部品で使う場合、下記のように属性をつける-->
<!-- 要素の宣言だけの場合は下記のように<内容 />とそのまま閉じてもいい -->
<!-- 変数を指定する時は、:〇〇という記述をする -->
  <x-tests.card title="タイトル1" content="本文1" :message="$message" />

  <!-- そのまま直で出すこともできるみたい -->
  {{$message}}

  <!-- propsを設定しないと、変数がありませんエラーになる -->
  <x-tests.card title="タイトル2" />

  <!-- そのままclassを書いても有効にならない -->
  <x-tests.card title="CSSを変更したい" class="bg-red-300" />

</x-tests.app>
