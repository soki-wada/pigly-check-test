@extends('layouts.user')

@section('title')
ログイン
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('content')
<h3 class="content-title">
    ログイン
</h3>
<div class="login-form-wrapper">
    <form action="/login" class="login-form" method="post">
        @csrf
        <p class="login-form-section-title">メールアドレス</p>
        <input type="email" class="login-form-input" placeholder="メールアドレスを入力" name="email" value="{{old('email')}}">
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
        <p class="login-form-section-title">パスワード</p>
        <input type="password" class="login-form-input" placeholder="パスワードを入力" name="password">
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="login-form-button-wrapper">
            <button class="login-form-button" type="submit">
                ログイン
            </button>
        </div>
    </form>
    <a href="/register/step1" class="content-register">
        アカウント作成はこちら
    </a>
</div>
@endsection