<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Study Logs' }}</title>
        <style>
            :root {
                color: #1f2933;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
                background: #f7f8f5;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
            }

            a {
                color: inherit;
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
                margin-bottom: 24px;
            }

            .title {
                margin: 0;
                font-size: clamp(24px, 5vw, 34px);
                line-height: 1.2;
            }

            .button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 42px;
                padding: 0 16px;
                border: 1px solid #1f2933;
                border-radius: 6px;
                background: #1f2933;
                color: #fff;
                font-weight: 700;
                text-decoration: none;
                cursor: pointer;
            }

            .button.secondary {
                background: #fff;
                color: #1f2933;
            }

            .stack {
                display: grid;
                gap: 16px;
            }

            .panel,
            .log {
                border: 1px solid #d7dbd0;
                border-radius: 8px;
                background: #fff;
                padding: 20px;
            }

            .status {
                border: 1px solid #a7d7b8;
                border-radius: 8px;
                background: #eefaf2;
                padding: 12px 14px;
                color: #165c2f;
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

            .field {
                display: grid;
                gap: 8px;
            }

            .field label,
            .legend {
                font-weight: 700;
            }

            input,
            textarea,
            select {
                width: 100%;
                border: 1px solid #c8cec0;
                border-radius: 6px;
                padding: 11px 12px;
                font: inherit;
                background: #fff;
            }

            textarea {
                min-height: 180px;
                resize: vertical;
            }

            .choices {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
                gap: 10px;
            }

            .choice {
                display: flex;
                gap: 8px;
                align-items: center;
                border: 1px solid #d7dbd0;
                border-radius: 6px;
                padding: 10px 12px;
                background: #fff;
            }

            .choice input {
                width: auto;
            }

            .actions {
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 4px;
            }

            .meta {
                margin: 8px 0 0;
                color: #657066;
                font-size: 14px;
            }

            .empty {
                color: #657066;
            }
        </style>
    </head>
    <body>
        <main class="page">
            {{ $slot }}
        </main>
    </body>
</html>
