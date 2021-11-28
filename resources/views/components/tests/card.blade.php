<!-- 初期値を設定する -->
<!-- 全ての変数を書く必要がある -->
<!-- 連想配列で書く -->
<!-- 初期値を空にすることも可能 -->
@props([
  'title' ,
  'message' => '初期値です。',
  'content' => '本文初期値です。'
  ])

  <!-- CSSを変更したい時のために変数をつける -->
  <!-- 今のCSSに加えて変更を加えたい時はmergeで書く -->
<!-- <div $attributes class="border-2" shadow-md w-1/4 p-2> ↓ -->

<div {{ $attributes->merge([
  'class' => 'border-2 shadow-md w-1/4 p-2'
  ]) }}>

  <div>{{ $title }}</div>
  <div> 画像 </div>
  <div>{{ $content }}</div>
  <!-- コントローラーから変数を受け取りviewに渡す -->
  <div>{{ $message }}</div>
</div>
