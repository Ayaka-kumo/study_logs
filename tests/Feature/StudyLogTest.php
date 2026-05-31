<?php

namespace Tests\Feature;

use App\Models\StudyLog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudyLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_page_is_displayed(): void
    {
        $response = $this->get(route('study-logs.create'));

        $response->assertOk();
        $response->assertSee('学習記録登録');
    }

    public function test_study_log_can_be_created(): void
    {
        $response = $this->post(route('study-logs.store'), [
            'title' => 'Laravelのルーティング',
            'study_time' => 45,
            'study_content' => 'GETとPOSTのルートを確認した。',
            'understood_level' => 2,
            'mood' => 1,
        ]);

        $response->assertRedirect(route('study-logs.index'));
        $this->assertDatabaseHas('study_logs', [
            'title' => 'Laravelのルーティング',
            'study_time' => 45,
            'study_content' => 'GETとPOSTのルートを確認した。',
            'understood_level' => 2,
            'mood' => 1,
        ]);
        $this->assertSame(1, StudyLog::count());
    }

    public function test_title_is_required(): void
    {
        $response = $this->from(route('study-logs.create'))->post(route('study-logs.store'), [
            'title' => '',
            'study_time' => 45,
            'study_content' => '入力チェックの確認。',
            'understood_level' => 2,
            'mood' => 1,
        ]);

        $response->assertRedirect(route('study-logs.create'));
        $response->assertSessionHasErrors('title');
        $this->assertDatabaseCount('study_logs', 0);
    }
}
