@extends('app')

@section('title', '投稿完了')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list')
            <div class="card-text">
              できた
              <a href="{{ route('articles.index') }}">トップ</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection