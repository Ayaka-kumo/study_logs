<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ログイン</title>
        <style>
            :root {
                color: #20252c;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                background: #f6f7f2;
            }

            * {
                box-sizing: border-box;
            }

            body {
                display: grid;
                min-height: 100vh;
                margin: 0;
                place-items: center;
            }

            .login {
                width: min(100% - 32px, 420px);
                border: 1px solid #d7dbd0;
                border-radius: 8px;
                background: #fff;
                padding: 28px;
            }

            h1 {
                margin: 0 0 24px;
                font-size: 28px;
            }

            .stack {
                display: grid;
                gap: 16px;
            }

            .field {
                display: grid;
                gap: 8px;
            }

            label {
                font-weight: 700;
            }

            input {
                width: 100%;
                border: 1px solid #c8cec0;
                border-radius: 6px;
                padding: 11px 12px;
                font: inherit;
            }

            button {
                min-height: 42px;
                border: 1px solid #1f2933;
                border-radius: 6px;
                background: #1f2933;
                color: #fff;
                font: inherit;
                font-weight: 700;
                cursor: pointer;
            }

            .errors {
                border: 1px solid #efb0a8;
                border-radius: 8px;
                background: #fff1ef;
                padding: 12px 14px;
                color: #8a2419;
            }

            .errors ul {
                margin: 8px 0 0;
                padding-left: 20px;
            }
        </style>
    </head>
    <body>
        <main class="login">
            <h1>ログイン</h1>

            <form class="stack" action="{{ route('login.store') }}" method="post">
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
                    <label for="name">ユーザーネーム</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="username">
                </div>

                <div class="field">
                    <label for="password">パスワード</label>
                    <input id="password" name="password" type="password" autocomplete="current-password">
                </div>

                <button type="submit">ログイン</button>
            </form>
        </main>
    </body>
</html>
