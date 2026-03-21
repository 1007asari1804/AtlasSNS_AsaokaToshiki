<x-login-layout>

<div class="search-container">

  {{ Form::open(['url' => '/search', 'method' => 'GET']) }}
  <div>
    {{ Form::text('keyword', null, ['placeholder' => 'ユーザー名']) }}
  </div>
  <button class="search-button" type="submit"><img src="{{ asset("images/search.png") }}"></button>
  {{ Form::close() }}
</div>

<div>
  @if(!empty($keyword))
    <p>検索ワード：{{ $keyword }}</p>
  @endif
</div>

<div>
  <table>
    @foreach ($users as $user)
    <tr>
      <td><img src="{{ asset('images/' . $user->icon_image) }}" width="50"></td>
      <td>{{ $user->username }}</td>
      <td>
        @if (auth()->id() !== $user->id)
            @if (auth()->user()->isFollowing($user->id))
                <form action="{{ route('unfollow', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', $user) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">フォローする</button>
                </form>
            @endif
        @endif
      </td>
    </tr>
    @endforeach
  </table>
</div>
</x-login-layout>
