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
    <div class="detail-content-form-wrapper">
        <form action="/weight_logs/{{$log->id}}/update" class="detail-content-form" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="id" value="{{$log->id}}">
            <p class="detail-content-item-title">
                日付
            </p>
            <input type="date" class="detail-content-item-input" value="{{old('date', $log->date)}}" name="date">
            @error('date')
            <p class="error">{{ $message }}</p>
            @enderror
            <p class="detail-content-item-title">
                体重
            </p>
            <div class="detail-content-item">
                <input type="text" class="detail-content-item-input" value="{{old('weight', $log->weight)}}" name="weight">
                <span class="unit">kg</span>
            </div>
            @error('weight')
            <p class="error">{{ $message }}</p>
            @enderror
            <p class="detail-content-item-title">
                摂取カロリー
            </p>
            <div class="detail-content-item">
                <input type="text" class="detail-content-item-input" value="{{old('calories', $log->calories)}}" name="calories">
                <span class="unit">cal</span>
            </div>
            @error('calories')
            <p class="error">{{ $message }}</p>
            @enderror
            <p class="detail-content-item-title">
                運動時間
            </p>
            <input type="time" class="detail-content-item-input" value="{{old('exercise_time', $log->exercise_time)}}" name="exercise_time">
            @error('exercise_time')
            <p class="error">{{ $message }}</p>
            @enderror
            <p class="detail-content-item-title">
                運動内容
            </p>
            <textarea name="exercise_content" id="" class="detail-content-item-textarea" placeholder="運動内容を追加">
            {{old('exercise_content', $log->exercise_content)}}
            </textarea>
            @error('exercise_content')
            <p class="error">{{ $message }}</p>
            @enderror
            <div class="detail-content-buttons">
                <div class="detail-content-button-wrapper">
                    <a class="detail-content-button-back" href="/weight_logs">
                        戻る
                    </a>
                </div>
                <div class="detail-content-button-wrapper">
                    <button class="detail-content-button-update" submit>
                        更新
                    </button>
                </div>
            </div>
        </form>
        <form action="/weight_logs/{{$log->id}}/delete" class="detail-content-delete" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{$log->id}}">
            <div class="detail-content-button-delete">
                <button class="detail-content-button-delete-submit" submit>
                    <img src="{{asset('image/delete.png')}}" alt="">
                </button>
            </div>
        </form>
    </div>
    @endsection