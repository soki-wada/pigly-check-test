@extends('layouts.user')

@section('title')
初期体重登録
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/weight_register.css')}}">
@endsection

@section('content')
<h3 class="content-title">
    新規会員登録
</h3>
<p class="content-flow">
    STEP2 体重データの入力
</p>
<div class="weight-register-form-wrapper">
    <form action="/register/step2" class="weight-register-form" method="post">
        @csrf
        <p class="weight-register-form-section-title">現在の体重</p>
        <div class="weight-register-form-input-wrapper">
            <input type="text" class="weight-register-form-input" placeholder="現在の体重を入力" name="weight" value="{{old('weight')}}"><span>kg</span>
        </div>
        @error('weight')
        <p class="error">{{ $message }}</p>
        @enderror
        <p class="weight-register-form-section-title">目標の体重</p>
        <div class="weight-register-form-input-wrapper">
            <input type="text" class="weight-register-form-input" placeholder="目標の体重を入力" name="target_weight" value="{{old('target_weight')}}"><span>kg</span>
        </div>
        @error('target_weight')
        <p class="error">{{ $message }}</p>
        @enderror
        <div class="weight-register-form-button-wrapper">
            <button class="weight-register-form-button" type="submit">
                アカウント作成
            </button>
        </div>
    </form>
    @endsection