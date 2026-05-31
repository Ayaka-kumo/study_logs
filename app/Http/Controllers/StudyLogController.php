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
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'study_time' => ['required', 'integer', 'min:0'],
            'study_content' => ['required', 'string', 'max:10000'],
            'understood_level' => ['required', 'integer', 'in:1,2,3'],
            'mood' => ['required', 'integer', 'in:1,2,3'],
        ]);

        $validated['user_id'] = auth()->id() ?? $this->developmentUser()->id;

        StudyLog::create($validated);

        return redirect()->route('study-logs.index')->with('status', '学習記録を登録しました。');
    }

    private function developmentUser(): User
    {
        return User::firstOrCreate(
            ['email' => 'demo@example.com'],
            ['name' => 'Demo User', 'password' => 'password', 'time_goal' => 0],
        );
    }
}
