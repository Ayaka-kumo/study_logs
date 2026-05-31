<x-layouts.app title="学習記録登録">
    <div class="header">
        <h1 class="title">学習記録登録</h1>
        <a class="button secondary" href="{{ route('study-logs.index') }}">戻る</a>
    </div>

    <form class="panel stack" action="{{ route('study-logs.store') }}" method="post">
        @csrf

        @if ($errors->any())
        <div class="errors">
            入力内容を確認してください。
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="field">
            <label for="title">タイトル</label>
            <input id="title" name="title" type="text" value="{{ old('title') }}" maxlength="255">
        </div>

        <div class="field">
            <label for="study_time">学習時間</label>
            <input id="study_time" name="study_time" type="number" value="{{ old('study_time', 0) }}" min="0" step="1">
        </div>

        <div class="field">
            <label for="study_content">学習内容</label>
            <textarea id="study_content" name="study_content" maxlength="10000">{{ old('study_content') }}</textarea>
        </div>

        <div class="field">
            <label for="understood_level">理解度</label>
            <select id="understood_level" name="understood_level">
                <option value="1" @selected(old('understood_level')==='1' )>激ムズ</option>
                <option value="2" @selected(old('understood_level')==='2' )>理解できた</option>
                <option value="3" @selected(old('understood_level')==='3' )>かんたん</option>
            </select>
        </div>

        <div class="field">
            <label for="mood">気分</label>
            <select id="mood" name="mood">
                <option value="1" @selected(old('mood')==='1' )>楽しい</option>
                <option value="2" @selected(old('mood')==='2' )>ふつう</option>
                <option value="3" @selected(old('mood')==='3' )>もやもや</option>
            </select>
        </div>

        <div class="actions">
            <button class="button" type="submit">登録</button>
            <a class="button secondary" href="{{ route('study-logs.index') }}">戻る</a>
        </div>
    </form>
</x-layouts.app>