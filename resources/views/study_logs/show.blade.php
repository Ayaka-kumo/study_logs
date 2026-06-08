<x-layouts.app title="学習記録詳細">
    <div class="header">
        <h1 class="title">学習記録詳細</h1>
        <a class="button secondary" href="{{ route('study-logs.index') }}">戻る</a>
    </div>

    <article class="panel stack">
        <div class="field">
            <span class="legend">タイトル</span>
            <p style="margin: 0;">{{ $studyLog->title }}</p>
        </div>

        <div class="field">
            <span class="legend">学習時間</span>
            <p style="margin: 0;">{{ $studyLog->study_time }}分</p>
        </div>

        <div class="field">
            <span class="legend">学習内容</span>
            <p style="margin: 0; white-space: pre-wrap;">{{ $studyLog->study_content }}</p>
        </div>

        <div class="field">
            <span class="legend">理解度</span>
            <p style="margin: 0;">{{ ['1' => '激ムズ', '2' => '理解できた', '3' => 'かんたん'][$studyLog->understood_level] }}</p>
        </div>

        <div class="field">
            <span class="legend">気分</span>
            <p style="margin: 0;">{{ ['1' => '楽しい', '2' => 'ふつう', '3' => 'もやもや'][$studyLog->mood] }}</p>
        </div>

        <p class="meta">作成日時: {{ $studyLog->created_at->format('Y/m/d H:i') }}</p>

        <div class="actions">
            <a class="button" href="{{ route('study-logs.edit', $studyLog) }}">編集</a>
            <a class="button secondary" href="{{ route('study-logs.index') }}">戻る</a>
        </div>
    </article>
</x-layouts.app>
