@extends('layouts.app')

@section('title')
管理画面
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<div class="admin-wrapper">
    <div class="weight-status-wrapper">
        <div class="weight-status-item">
            <p class="weight-status-title">
                目標体重
            </p>
            <p class="weight-status">{{$target->target_weight}}<span class="unit">kg</span></p>
        </div>
        <div class="border"></div>
        <div class="weight-status-item">
            <p class="weight-status-title">
                目標まで
            </p>
            <p class="weight-status">-{{$goal}}<span class="unit">kg</span></p>
        </div>
        <div class="border"></div>
        <div class="weight-status-item">
            <p class="weight-status-title">最新体重</p>
            <p class="weight-status">{{$weight->weight}}<span class="unit">kg</span></p>
        </div>
    </div>
    <div class="admin-content">
        <div class="admin-content-forms">
            <div class="admin-content-search-form-wrapper">
                <form action="/weight_logs/search" class="admin-content-search-form" method="get">
                    @csrf
                    <input type="date" class="admin-content-search-form-input" name="olderDate" value="{{request('olderDate')}}"> ~ <input type="date" class="admin-content-search-form-input" name="newerDate" value="{{request('newerDate')}}">
                    <div class="admin-content-search-form-buttons">
                        <div class="admin-content-search-form-button-wrapper">
                            <button class="admin-content-search-form-button" type="submit">検索</button>
                        </div>
                        @if (request('olderDate') || request('newerDate'))
                        <div class="admin-content-search-form-button-wrapper">
                            <a href="/weight_logs" class="admin-content-search-form-button-reset">
                                リセット
                            </a>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="admin-content-create-form-wrapper">
                <label class="admin-content-create-form" for="check-modal">データ追加</label>
                <input type="checkbox" id="check-modal" class="check-modal" hidden>
                <div class="modal">
                    <div class="modal-content">
                        <h2 class="modal-content-title">
                            Weight Logを追加
                        </h2>
                        <div class="modal-content-form-wrapper">
                            <form action="/weight_logs/create" class="modal-content-form" method="post">
                                @csrf
                                <p class="modal-content-form-section-title">
                                    日付 <span class="necessary">必須</span>
                                </p>
                                <input type="date" class="modal-content-form-input" name="date" value="{{old('date', date('Y-m-d'))}}">
                                @error('date')
                                <p class="error">{{ $message }}</p>
                                @enderror
                                <p class="modal-content-form-section-title">
                                    体重 <span class="necessary">必須</span>
                                </p>
                                <div class="modal-content-form-input-wrapper">
                                    <input type="text" class="modal-content-form-input" name="weight" value="{{old('weight')}}" placeholder="50.0"><span class="unit">kg</span>
                                </div>
                                @error('weight')
                                <p class="error">{{ $message }}</p>
                                @enderror
                                <p class="modal-content-form-section-title">
                                    摂取カロリー <span class="necessary">必須</span>
                                </p>
                                <div class="modal-content-form-input-wrapper">
                                    <input type="text" class="modal-content-form-input" name="calories" value="{{old('calories')}}" placeholder="1200"><span class="unit">cal</span>
                                </div>
                                @error('calories')
                                <p class="error">{{ $message }}</p>
                                @enderror
                                <p class="modal-content-form-section-title">
                                    運動時間 <span class="necessary">必須</span>
                                </p>
                                <input type="time" class="modal-content-form-input" name="exercise_time" value="{{old('exercise_time', '00:00')}}">
                                @error('exercise_time')
                                <p class="error">{{ $message }}</p>
                                @enderror
                                <p class="modal-content-form-section-title">
                                    運動内容
                                </p>
                                <textarea name="exercise_content" id="" class="modal-content-form-textarea" placeholder="運動内容を追加">{{old('exercise_content')}}</textarea>
                                @error('exercise_content')
                                <p class="error">{{ $message }}</p>
                                @enderror
                                <div class="modal-content-form-buttons">
                                    <div class="modal-content-form-button-wrapper">
                                        <label for="check-modal" class="modal-content-form-button-back">
                                            戻る
                                        </label>
                                    </div>
                                    <div class="modal-content-form-button-wrapper">
                                        <button class="modal-content-form-button-create">
                                            登録
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (request('olderDate') || request('newerDate'))
        <p class="search-result">
            {{ isset($olderDate) ? \Carbon\Carbon::parse($olderDate)->format('Y年n月j日') : '' }} ~
            {{ isset($newerDate) ? \Carbon\Carbon::parse($newerDate)->format('Y年n月j日') : '' }} の検索結果
            {{ $sum ?? '' }}件
        </p>
        @endif
        <div class="admin-content-table-wrapper">
            <table class="admin-content-table">
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>食事摂取カロリー</th>
                    <th>運動時間</th>
                    <th></th>
                </tr>
                @foreach($logs as $log)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                    <td>{{$log->weight}}kg</td>
                    <td>{{$log->calories}}cal</td>
                    <td>
                        @if ($log->exercise_time)
                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $log->exercise_time)->format('H:i') }}
                        @else

                        @endif
                    </td>
                    <td>
                        <div class="admin-content-table-link-wrapper">
                            <a href="/weight_logs/{{$log->id}}" class="admin-content-table-link">
                                <img src="{{ asset('image/pen.png') }}" alt="サンプル画像">
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$logs->links()}}
        </div>
    </div>
</div>
@endsection