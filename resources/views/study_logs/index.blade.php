<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>学習記録一覧</title>
        <style>
            :root {
                color: #20252c;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                background: #f6f7f2;
            }

            body {
                margin: 0;
            }

            .page {
                max-width: 960px;
                margin: 0 auto;
                padding: 32px 20px 48px;
            }

            .header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
            }

            h1 {
                margin: 0;
                font-size: 32px;
            }

            .panel {
                margin-top: 24px;
                border: 1px solid #d7dbd0;
                border-radius: 8px;
                background: #fff;
                padding: 20px;
            }

            button {
                min-height: 40px;
                border: 1px solid #1f2933;
                border-radius: 6px;
                background: #fff;
                color: #1f2933;
                padding: 0 14px;
                font: inherit;
                font-weight: 700;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <main class="page">
            <div class="header">
                <h1>学習記録一覧</h1>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">ログアウト</button>
                </form>
            </div>

            <section class="panel">
                {{ auth()->user()->name }} さん、ログイン中です。
            </section>
        </main>
    </body>
</html>
