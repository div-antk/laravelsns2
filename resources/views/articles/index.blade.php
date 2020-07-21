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
    <div class="card mt-3">
      <div class="card-body d-flex flex-row">
        <i class="fas fa-user-circle fa-3x mr-1"></i>
        <div>
          <div class="font-weight-bold">
            {{ $article->user->name }}
          </div>
          <div class="font-weight-lighter">
            {{ $article->created_at->format('Y/m/d H:i') }}
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pb-2">
        <h3 class="h4 card-title">
          {{ $article->title }}
        </h3>
        <div class="card-text">
          {{-- 改行文字の前に改行タグを挿入 --}}
          {!! nl2br(e( $article->body )) !!}
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endsection