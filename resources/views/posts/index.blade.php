<x-login-layout>

<div class="top-container">
  <img src="images/icon1.png">
  {{ Form::open(['url' => '/posts/create']) }}
  <div>
    {{ Form::textarea('post', null, ['rows' => 4, 'placeholder' => '投稿内容を入力してください。']) }}
    @error('post')
    <span>{{ $message }}</span>
    @enderror
  </div>
  <button class="post-button" type='submit'><img src="{{ asset("images/post.png") }}"></button>
  {{ Form::close() }}
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
      @if($post->user_id === Auth::id())
      <a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset("images/edit.png") }}" alt="編集"></a>
      <a href="/posts/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="{{ asset("images/trash.png") }}" alt="削除"></a>
      @endif
    </li>
    @endforeach
  </ul>
</div>

<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    {{ Form::open(['url' => '/posts/{id}/update']) }}
    {{ Form::textarea('upPost', $post->post, ['class' => 'modal_post']) }}
    {{ Form::hidden('id', $post->id, ['class' => 'modal_id']) }}
    <button type='submit'><img src="{{ asset("images/edit.png") }}"></button>
    {{ Form::close() }}
  </div>
</div>

</x-login-layout>
