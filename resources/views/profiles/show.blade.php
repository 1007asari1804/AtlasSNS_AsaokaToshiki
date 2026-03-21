<x-login-layout>

<div class="top-container">
  <img src="{{ asset('images/' . ($user->icon_image ?? 'default.png')) }}">
  <div>
    <p>ユーザー名　　{{ $user->username }}</p>
    <p>自己紹介　　{{ $user->bio }}</p>
  </div>
</div>



</x-login-layout>
