<?php

namespace App\Http\Controllers;

use App\Models\StudyLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudyLogController extends Controller
{
    public function index(): View
    {
        $studyLogs = StudyLog::with('user')->latest()->get();

        return view('study_logs.index', compact('studyLogs'));
    }

    public function create(): View
    {
        return view('study_logs.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatedStudyLog($request);

        $validated['user_id'] = auth()->id() ?? $this->developmentUser()->id;

        StudyLog::create($validated);

        return redirect()->route('study-logs.index')->with('status', '学習記録を登録しました。');
    }

    public function edit(StudyLog $studyLog): View
    {
        return view('study_logs.edit', compact('studyLog'));
    }

    public function update(Request $request, StudyLog $studyLog)
    {
        $studyLog->update($this->validatedStudyLog($request));

        return redirect()->route('study-logs.index')->with('status', '学習記録を更新しました。');
    }

    public function destroy(StudyLog $studyLog)
    {
        $studyLog->delete();

        return redirect()->route('study-logs.index')->with('status', '学習記録を削除しました。');
    }

    private function validatedStudyLog(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'study_time' => ['required', 'integer', 'min:0'],
            'study_content' => ['required', 'string', 'max:10000'],
            'understood_level' => ['required', 'integer', 'in:1,2,3'],
            'mood' => ['required', 'integer', 'in:1,2,3'],
        ]);
    }

    private function developmentUser(): User
    {
        return User::firstOrCreate(
            ['email' => 'demo@example.com'],
            ['name' => 'Demo User', 'password' => 'password', 'time_goal' => 0],
        );
    }
}
