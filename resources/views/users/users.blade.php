@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <img class="mr-2 rounded" src="https://www.kurieisha.com/wp-content/uploads/2021/05/007.jpg" alt="" style="width:90px">
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p><a href="{{route('users.show',$user->id) }}">view profile</a></p>
                    </div>
                </div>
            </li>
            @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif