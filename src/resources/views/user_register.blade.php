@extends('layouts.user')

@section('title')
新規会員登録
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/user_register.css')}}">
@endsection

@section('content')
<h3 class="content-title">
    新規会員登録
</h3>
<p class="content-flow">
    STEP1 アカウント情報の登録
</p>
<div class="user-register-form-wrapper">
    <form action="/register/step1" class="user-register-form" method="post">
        @csrf
        <p class="user-register-form-section-title">お名前</p>
        <input type="text" class="user-register-form-input" placeholder="名前を入力" name="name" value="{{old('name')}}">
        @error('name')
        <p class="error">{{ $message }}</p>
        @enderror
        <p class=" user-register-form-section-title">メールアドレス</p>
        <input type="email" class="user-register-form-input" placeholder="メールアドレスを入力" name="email" value="{{old('email')}}">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        <p class="user-register-form-section-title">パスワード</p>
        <input type="password" class="user-register-form-input" placeholder="パスワードを入力" name="password" value="{{old('password')}}">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="user-register-form-button-wrapper">
            <button class="user-register-form-button" type="submit">
                次に進む
            </button>
        </div>
    </form>
</div>
<a href="/login" class="content-login">
    ログインはこちら
</a>
@endsection