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
            <p class="weight-status">{{$target->target_weight}}<span>kg</span></p>
        </div>
        <div class="border"></div>
        <div class="weight-status-item">
            <p class="weight-status-title">
                目標まで
            </p>
            <p class="weight-status">-{{$goal}}<span>kg</span></p>
        </div>
        <div class="border"></div>
        <div class="weight-status-item">
            <p class="weight-status-title">最新体重</p>
            <p class="weight-status">{{$weight->weight}}<span>kg</span></p>
        </div>
    </div>
    <div class="admin-content">
        <div class="admin-content-forms">
            <div class="admin-content-search-form-wrapper">
                <form action="" class="admin-content-search-form">
                    @csrf
                    <input type="date" class="admin-content-search-form-input" name="olderDate" value="{{old('olderDate')}}"> ~ <input type="date" class="admin-content-search-form-input" name="newerDate" value="{{old('newerDate')}}">
                    <div class="admin-content-search-form-button-wrapper">
                        <button class="admin-content-search-form-button" type="submit">検索</button>
                    </div>
                </form>
            </div>
            <div class="admin-content-create-form-wrapper">
                <label class="admin-content-create-form" for="check-modal">データ追加</label>
                <input type="checkbox" id="check-modal" class="check-modal" hidden>
            </div>
        </div>
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
                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $log->exercise_time)->format('H:i') }}</td>
                    <td><img src="{{ asset('image/pen.png') }}" alt="サンプル画像"></td>
                </tr>
                @endforeach
            </table>
            {{$logs->links()}}
        </div>
    </div>
</div>
@endsection