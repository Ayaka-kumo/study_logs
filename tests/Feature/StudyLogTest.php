<?php

namespace Tests\Feature;

use App\Models\StudyLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudyLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_page_is_displayed(): void
    {
        $this->actingAsUser();

        $response = $this->get(route('study-logs.create'));

        $response->assertOk();
        $response->assertSee('学習記録登録');
    }

    public function test_study_log_can_be_created(): void
    {
        $this->actingAsUser();

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
        $this->actingAsUser();

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

    public function test_index_has_detail_link(): void
    {
        $this->actingAsUser();
        $studyLog = $this->createStudyLog();

        $response = $this->get(route('study-logs.index'));

        $response->assertOk();
        $response->assertSee('詳細');
        $response->assertSee(route('study-logs.show', $studyLog), false);
    }

    public function test_detail_page_is_displayed(): void
    {
        $this->actingAsUser();
        $studyLog = $this->createStudyLog();

        $response = $this->get(route('study-logs.show', $studyLog));

        $response->assertOk();
        $response->assertSee('学習記録詳細');
        $response->assertSee('Laravel基礎');
        $response->assertSee('ルーティングとコントローラーを確認した。');
    }

    public function test_edit_page_is_displayed(): void
    {
        $this->actingAsUser();
        $studyLog = $this->createStudyLog();

        $response = $this->get(route('study-logs.edit', $studyLog));

        $response->assertOk();
        $response->assertSee('学習記録編集');
        $response->assertSee('Laravel基礎');
    }

    public function test_study_log_can_be_updated(): void
    {
        $this->actingAsUser();
        $studyLog = $this->createStudyLog();

        $response = $this->put(route('study-logs.update', $studyLog), [
            'title' => 'Laravel更新処理',
            'study_time' => 60,
            'study_content' => 'PUTで学習記録を更新した。',
            'understood_level' => 3,
            'mood' => 2,
        ]);

        $response->assertRedirect(route('study-logs.index'));
        $this->assertDatabaseHas('study_logs', [
            'id' => $studyLog->id,
            'title' => 'Laravel更新処理',
            'study_time' => 60,
            'study_content' => 'PUTで学習記録を更新した。',
            'understood_level' => 3,
            'mood' => 2,
        ]);
    }

    public function test_title_is_required_when_updating(): void
    {
        $this->actingAsUser();
        $studyLog = $this->createStudyLog();

        $response = $this->from(route('study-logs.edit', $studyLog))->put(route('study-logs.update', $studyLog), [
            'title' => '',
            'study_time' => 60,
            'study_content' => '入力チェックの確認。',
            'understood_level' => 3,
            'mood' => 2,
        ]);

        $response->assertRedirect(route('study-logs.edit', $studyLog));
        $response->assertSessionHasErrors('title');
        $this->assertDatabaseHas('study_logs', [
            'id' => $studyLog->id,
            'title' => 'Laravel基礎',
        ]);
    }

    public function test_study_log_can_be_deleted(): void
    {
        $this->actingAsUser();
        $studyLog = $this->createStudyLog();

        $response = $this->delete(route('study-logs.destroy', $studyLog));

        $response->assertRedirect(route('study-logs.index'));
        $this->assertDatabaseMissing('study_logs', [
            'id' => $studyLog->id,
        ]);
    }

    private function createStudyLog(): StudyLog
    {
        $user = User::factory()->create();

        return StudyLog::create([
            'user_id' => $user->id,
            'title' => 'Laravel基礎',
            'study_time' => 30,
            'study_content' => 'ルーティングとコントローラーを確認した。',
            'understood_level' => 2,
            'mood' => 1,
        ]);
    }

    private function actingAsUser(): User
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        return $user;
    }
}
