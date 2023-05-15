@extends('app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="font-size:1rem;">登録画面</h2>
            </div>
            <div class="pull-right">
                <a class="btnbtn-success" href="{{ url('/blogs') }}">戻る</a>
            </div>
        </div>
    </div>

    <div style="text-align:right;">
        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row w-75">
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="タイトル">
                    </div>
                    @error('title')
                        <span style="color: red">タイトルは必須です。</span>
                    @enderror
                </div>

                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                        <textarea class="form-control" style="height: 100px" name="content" placeholder="本文"></textarea>
                    </div>
                    @error('content')
                        <span style="color: red">本文は必須です。</span>
                    @enderror
                </div>

                <div class="col-12 mb-2 mt-2">
                    <input type="file" name="image" accept=".jpg, .png, image/gif, image/jpeg, image/png">
                    @error('image')
                        <span style="color: red">画像を選択してください。</span>
                    @enderror
                </div>

                <div class="col-12 mb-2 mt-2">
                    <button type="submit" class="btn btn-primary w-100">登録</button>
                </div>
            </div>
        </form>
    </div>
@endsection