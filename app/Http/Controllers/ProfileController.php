<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;


class ProfileController extends Controller
{
    public function profile()
{
    $user = Auth::user();

    return view('profiles.profile', compact('user'));
}

    public function update(Request $request)
    {
        // 1. ログイン中のユーザー情報を取得
        $user = Auth::user();

        // 2. 入力値のバリデーション（チェックルール）
        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|max:100|unique:users,mail,'.$user->id,
            'password' => 'nullable|string|min:4|max:12|confirmed', // confirmedを入れることでpassword_confirmationと自動一致チェック
            'bio' => 'nullable|string|max:150',
            'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像の制限
        ]);

        // 3. データの更新処理（パスワード以外）
        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->bio = $request->input('bio');

        // 4. パスワードが入力されていた場合のみハッシュ化して更新
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // 5. アイコン画像がアップロードされていた場合の処理
        if ($request->hasFile('icon_image')) {
            $file = $request->file('icon_image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // ファイル名の重複防止
            $file->move(public_path('images'), $fileName); // public/images フォルダに保存

            $user->icon_image = $fileName; // データベースにファイル名を保存
        }

        // 6. データベースに保存
        $user->save();

        // 7. 更新完了後、プロフィールの編集画面にメッセージ付きで戻る
        return redirect()->route('profile.update')->with('status', 'プロフィールを更新しました！');
    }
}
