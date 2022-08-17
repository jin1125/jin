<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StudyController extends Controller
{
    /**
     * Studyページを表示
     */
    public function showStudy()
    {
        return Inertia::render('Study', [
            'isLogin' => Auth::check(),
        ]);
    }
}
