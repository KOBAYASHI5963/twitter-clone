@if (Auth::user()->is_favoriting($micropost->id))
    <form method="post" action="{{ route('favorites.unfavorite', $micropost->id) }}">
      @csrf
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" class="btn btn-danger btn-block">お気に入り解除</button>
    </form>
@else
    <form method="post" action="{{ route('favorites.favorite', $micropost->id) }}">
      @csrf
      <button type="submit" class="btn btn-primary btn-block">お気に入り</button>
    </form>
@endif