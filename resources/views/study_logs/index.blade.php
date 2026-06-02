<x-layouts.app title="学習記録一覧">
    <div class="header">
        <h1 class="title">学習記録一覧</h1>
        <a class="button" href="{{ route('study-logs.create') }}">新規作成</a>
    </div>

    <div class="stack">
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @forelse ($studyLogs as $studyLog)
            <article class="log">
                <h2 style="margin: 0; font-size: 20px;">{{ $studyLog->title }}</h2>
                <p class="meta">
                    {{ $studyLog->study_time }}分 /
                    理解度: {{ ['1' => '激ムズ', '2' => '理解できた', '3' => 'かんたん'][$studyLog->understood_level] }} /
                    気分: {{ ['1' => '楽しい', '2' => 'ふつう', '3' => 'もやもや'][$studyLog->mood] }}
                </p>
                <p style="white-space: pre-wrap;">{{ $studyLog->study_content }}</p>
                <p class="meta">{{ $studyLog->created_at->format('Y/m/d H:i') }}</p>
                <div class="actions">
                    <a class="button secondary" href="{{ route('study-logs.edit', $studyLog) }}">編集</a>
                </div>
            </article>
        @empty
            <div class="panel empty">学習記録はまだありません。</div>
        @endforelse
    </div>
</x-layouts.app>
