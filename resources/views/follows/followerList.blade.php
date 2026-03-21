<x-login-layout>

<div>
  <h2>フォロワーリスト</h2>
  <div>
    @foreach($followers as $follower)
    <img src="/images/{{$follower->icon_image}}">
    @endforeach
  </div>

  <div>
    <ul>
      @foreach($followerPosts as $followerPost)
      <li class="post-block">
        <figure>
          <a href="{{ route('profile.show', $followerPost->user->id) }}">
            <img src="{{ asset('images/' . ($followerPost->user->icon_image ?? 'default.png')) }}"
                alt="{{ $followerPost->user->username }}">
          </a>
        </figure>
        <div class="post-content">
          <div>
            <div class="post-name">{{ $followerPost->user->username }}</div>
            <div>{{ $followerPost->created_at->format('Y-m-d') }}</div>
          </div>
          <div>{!! nl2br(e($followerPost->post)) !!}</div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>

</x-login-layout>
