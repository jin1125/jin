<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class StudyController extends Controller
{
    /**
     * Studyページを表示
     */
    public function showStudy()
    {
        $studyRecords = Study::get();

        return Inertia::render('Study', [
            'isLogin' => Auth::check(),
            'studyRecords' => $studyRecords
        ]);
    }
}
