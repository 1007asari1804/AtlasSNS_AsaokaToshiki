<x-login-layout>

<div>
  <h2>フォローリスト</h2>
  <div>
    @foreach($follows as $follow)
    <img src="/images/{{$follow->icon_image}}">
    @endforeach
  </div>

  <div>
    <ul>
      @foreach($followPosts as $followPost)
      <li class="post-block">
        <figure>
          <a href="{{ route('profile.show', $followPost->user->id) }}">
            <img src="{{ asset('images/' . ($followPost->user->icon_image ?? 'default.png')) }}"
                alt="{{ $followPost->user->username }}">
          </a>
        </figure>
        <div class="post-content">
          <div>
            <div class="post-name">{{ $followPost->user->username }}</div>
            <div>{{ $followPost->created_at->format('Y-m-d') }}</div>
          </div>
          <div>{!! nl2br(e($followPost->post)) !!}</div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>

</x-login-layout>
