@extends('layouts.app')

@section('title')
詳細画面
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="detail-content">
    <h2 class="detail-content-title">
        Weight Log
    </h2>
    <div class="detail-content-item">
        <p class="detail-content-item-title">
            日付
        </p>
        <input type="text" class="detail-content-item-input">
    </div>
    <div class="detail-content-item">
        <p class="detail-content-item-title">
            体重
        </p>
        <input type="text" class="detail-content-item-input">
    </div>
    <div class="detail-content-item">
        <p class="detail-content-item-title">
            摂取カロリー
        </p>
        <input type="text" class="detail-content-item-input">
    </div>
    <div class="detail-content-item">
        <p class="detail-content-item-title">
            運動時間
        </p>
        <input type="text" class="detail-content-item-input">
    </div>
    <div class="detail-content-item">
        <p class="detail-content-item-title">
            運動内容
        </p>
        <input type="text" class="detail-content-item-input">
    </div>
    <div class="detail-content-button-items">
        <div class="detail-content-button-wrapper">
            <button class="detail-content-button-back">
                戻る
            </button>
        </div>
        <div class="detail-content-button-wrapper">
            <button class="detail-content-button-update">
                更新
            </button>
        </div>
    </div>
    <div class="detail-content-button-delete">
        <button class="detail-content-button-delete-submit">
            
        </button>
    </div>
</div>
@endsection