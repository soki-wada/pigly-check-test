@extends('layouts.app')

@section('title')
目標体重設定
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/update.css')}}">
@endsection

@section('content')
<div class="update-content">
    <h2 class="update-content-title">
        目標体重設定
    </h2>
    <div class="update-content-form-wrapper">
        <form action="" class="update-content-form">
            <div class="update-content-form-input-wrapper">
                <input type="text" class="update-content-form-input" name="target_weight" value="{{$target}}"><span>kg</span>
            </div>
            <div class="update-content-form-button-items">
                <div class="update-content-form-button-wrapper">
                    <a href="/weight_logs" class="update-content-form-button-back">
                        戻る
                    </a>
                </div>
                <div class="update-content-form-button-wrapper">
                    <button class="update-content-form-button-update">
                        更新
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection