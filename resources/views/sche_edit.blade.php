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
        <form action="{{ route('schedule.update', $schedule->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row w-75">
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                        <input type="text" name="title" value="{{ $schedule->title }}" class="form-control" placeholder="タイトル">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <input type="hidden" name="page" value="{{ request()->input('page') }}">
                    <button type="submit" class="btn btn-primary w-100">編集する</button>
                </div>
            </div>
        </form>

        <form action="{{ route('schedule.destroy', $schedule->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="row w-75">
                <div class="col-12 mb-2 mt-2">
                    <input type="hidden" name="page" value="{{ request()->input('page') }}">
                    <button type="submit" class="btn btn-danger w-25">削除する</button>
                </div>
            </div>
        </form>
    </div>
@endsection