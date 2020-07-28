{{-- app.blade.phpをベースとして使うことを宣言 --}}
@extends('app')

{{-- app.blade.phpの@yield('title')に対応する --}}
@section('title', '記事一覧')

{{-- @extendと@sectionを使うことで、以下を実現できる --}}
  {{-- headタグやscriptタグでのCSSやJSONを、各画面のBladeで都度指定しなくて済む --}}
  {{-- その一方で、headタグ内のtitleタグの値を、各画面で異なるものにできる --}}

@section('content')
  @include('nav')
  <div class="container">
    @foreach($articles as $article)
      @include('articles.card')
    @endforeach
  </div>
@endsection