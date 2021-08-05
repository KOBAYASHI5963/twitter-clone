@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (Auth::id() == $user->id)
            <form class="mb-4" method="post" action="{{ route('microposts.store') }}">
            @csrf
              <div class="form-group">
                <label for="exampleFormControlTextarea1">ツイートする</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='content'></textarea>
              </div>
              <button type="submit" class="btn btn-primary">投稿する</button>
            </form>
            @endif
            @if (count($microposts) > 0)
                @include('microposts.microposts', ['microposts' => $microposts])
            @endif
        </div>
    </div>
@endsection