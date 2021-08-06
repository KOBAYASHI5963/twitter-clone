@if (Auth::id() != $user->id)
    @if (Auth::user()->is_favarite($user->id))
    <form class="mb-4" method="post" action="{{ route('user.unfavorite', $user->id]) }}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger btn-block">Unfavorite</button>
            </form>
    @else
    <form class="mb-4" method="post" action="{{ route('user.favorite', $user->id) }}">
            @csrf
              <button type="submit" class="btn btn-primary btn-block">Favorite</button>
            </form>
    @endif
@endif
