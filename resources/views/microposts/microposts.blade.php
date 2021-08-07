<ul class="list-unstyled">
    @foreach ($microposts as $micropost)
        <li class="media mb-3">
        <img class="mr-2 rounded" src="https://www.kurieisha.com/wp-content/uploads/2021/05/007.jpg" alt="" style="width:120px;">
            <div class="media-body">
                <div>
                     <a href="{{ route('users.show', $micropost->user->id) }}"><span class="text-muted">posted at {{ $micropost->created_at }}</span></a>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
                <div class="d-flex justify-content-start">
                   @include('user_favorite.favorite_button', ['micropost' => $micropost])

                    @if (Auth::id() == $micropost->user_id)
                      <form method="post" action="{{ route('microposts.destroy', $micropost->id) }}" class="ml-4">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">削除</button>
                      </form>
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}