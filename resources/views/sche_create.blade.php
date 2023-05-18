@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size:1rem;">登録画面</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/schedules') }}?page{{ request()->input('page') }}">戻る</a>
            </div>
        </div>
    </div>

    <div style="">
        <h2 style="font-size:1.45rem;" class="mt-2">{{ $yyyy }}年{{ $mm }}月{{ $dd }}日の予定を登録してください。</h2>
        <form action="{{ route('schedule.store') }}" method="POST">
        @csrf

            <div class="row w-75">
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="予定">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <input type="hidden" name="yyyy" value="{{ $yyyy }}">
                    <input type="hidden" name="mm" value="{{ $mm }}">
                    <input type="hidden" name="dd" value="{{ $dd }}">
                    <input type="hidden" name="page" value="{{ $page }}">
                    <button type="submit" class="btn btn-primary w-100">登録</button>
                </div>
            </div>
        </form>
    </div>
@endsection