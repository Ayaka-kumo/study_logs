<strong class="___4afqtp0 flh3ekv f19n0e5" data-lexical-text="true"># DB 定義書</strong>
<strong class="___4afqtp0 flh3ekv f19n0e5" data-lexical-text="true">---</strong>
<strong class="___4afqtp0 flh3ekv f19n0e5" data-lexical-text="true">### users</strong>
| No | 論理名 | 物理名 | データ型 | 主キー | NOT NULL | デフォルト | 備考 |
|----|--------|--------|----------|--------|----------|------------|------|
| 1 | ID | id | int | ○ | ○ | | Auto Increment |
| 2 | 名前 | name | varchar(255) | | ○ | | |
| 3 | メールアドレス | email | varchar(255) | | ○ | | |
| 4 | パスワード | password | varchar(255) | | ○ | | |
| 5 | 目標学習時間 | time_goal | int | | ○ | 0 | 単位は分 |
| 6 | 作成日時 | created_at | timestamp | | ○ | | |
| 7 | 更新日時 | updated_at | timestamp | | ○ | | |
<br><br><br>
<strong class="___4afqtp0 flh3ekv f19n0e5" data-lexical-text="true">### study_logs</strong>
| No | 論理名 | 物理名 | データ型 | 主キー | NOT NULL | デフォルト | 備考 |
|----|--------|--------|----------|--------|----------|------------|------|
| 1 | ID | id | int | ○ | ○ | | Auto Increment |
| 2 | ユーザー ID | user_id | int | | ○ | | user_id は users テーブルの id を参照する外部キーとする |
| 3 | タイトル | title | varchar(255) | | ○ | | |
| 4 | 学習時間 | study_time | int | | ○ | 0 | 単位は分 |
| 5 | 学習内容 | study_content | varchar(10000) | | ○ | | |
| 6 | 理解度 | understood_level | int | | ○ | | understood_level：1=激ムズ、2=理解できた、3=かんたん |
| 7 | 気分 | mood | int | | ○ | | mood：1=楽しい、2=ふつう、3=もやもや |
| 8 | 作成日時 | created_at | timestamp | | ○ | | |
| 9 | 更新日時 | updated_at | timestamp | | ○ | | |
<br><br><br>
<strong class="___4afqtp0 flh3ekv f19n0e5" data-lexical-text="true">### todos</strong>
| No | 論理名 | 物理名 | データ型 | 主キー | NOT NULL | デフォルト | 備考 |
|----|--------|--------|----------|--------|----------|------------|------|
| 1 | ID | id | int | ○ | ○ | | Auto Increment |
| 2 | ユーザー ID | user_id | int | | ○ | | user_id は users テーブルの id を参照する外部キーとする |
| 3 | タスク内容 | todo_content | varchar(255) | | ○ | | |
| 4 | 状態 | is_done | boolean | | ○ | false | |
| 5 | 作成日時 | created_at | timestamp | | ○ | | |
| 6 | 更新日時 | updated_at | timestamp | | ○ | | |
<br><br><br>
``
<br>
