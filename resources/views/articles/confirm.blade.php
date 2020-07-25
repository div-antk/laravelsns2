@extends('app')

@section('title', '投稿確認')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}">
                @csrf

                <input name="title" value="{{ $articles['title'] }}" type="hidden">
                <input name="body" value="{{ $articles['body'] }}" type="hidden">

                {{ $articles->title }}<br>
                {{ $articles->body }}<br>
                <button type="submit" name="action" value="submit">投稿する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection