@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
    <form class="mb-4" method="post" action="{{ route('user.unfollow', $user->id) }}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger btn-block">Unfollow</button>
            </form>
    @else
    <form class="mb-4" method="post" action="{{ route('user.follow', $user->id) }}">
            @csrf
              <button type="submit" class="btn btn-primary btn-block">Follow</button>
            </form>
    @endif
@endif

