<x-login-layout>

<div class="profile-edit-wrapper">
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="profile-edit-box">

            <div class="icon-area">
                <img src="{{ asset('images/' . ($user->icon_image ?? 'icon1.png')) }}" alt="icon">
                <input type="file" name="icon_image">
            </div>

            <div class="form-area">

                <div class="form-row">
                    <label>ユーザー名</label>
                    <input type="text" name="username" value="{{ old('username', $user->username) }}">
                </div>

                <div class="form-row">
                    <label>メールアドレス</label>
                    <input type="email" name="mail" value="{{ old('mail', $user->mail) }}">
                </div>

                <div class="form-row">
                    <label>パスワード</label>
                    <input type="password" name="password">
                </div>

                <div class="form-row">
                    <label>パスワード確認</label>
                    <input type="password" name="password_confirmation">
                </div>

                <div class="form-row">
                    <label>自己紹介</label>
                    <textarea name="bio">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="form-row">
                    <label>アイコン画像</label>
                    <div class="icon-upload">
                        <input type="file" name="icon_image">
                    </div>
                </div>

                <div class="submit-btn">
                    <button type="submit">更新</button>
                </div>

            </div>
        </div>
    </form>
</div>

</x-login-layout>
