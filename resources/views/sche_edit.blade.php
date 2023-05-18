@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size:1rem;">編集画面</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/schedules') }}?page={{ request()->input('page') }}">ページ番号{{ request()->input('page') }}に戻る</a>
            </div>
        </div>
    </div>

    <div style="">
        <h2 style="font-size: 1.45rem;" class="mt-2">{{ $yyyy }}年{{ $mm }}月{{ $dd }}日の予定を編集してください。</h2>
    </div>
@endsection