<x-login-layout>

<div class="top-container">
  <img src="{{ asset('images/' . ($user->icon_image ?? 'default.png')) }}">
  <div>
    <p>ユーザー名　　{{ $user->username }}</p>
    <p>自己紹介　　{{ $user->bio }}</p>
  </div>
  <div>
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
        </div>
</div>

<div>
  <ul>
    @foreach($posts as $post)
    <li class="post-block">
      <figure><img src="{{ asset("images/{$post->user->icon_image}") }}" alt="{{ $post->user->username }}"></figure>
      <div class="post-content">
        <div>
          <div class="post-name">{{ $post->user->username }}</div>
          <div>{{ $post->created_at->format('Y-m-d') }}</div>
        </div>
        <div>{!! nl2br(e($post->post)) !!}</div>
      </div>
    </li>
    @endforeach
  </ul>
</div>

</x-login-layout>
