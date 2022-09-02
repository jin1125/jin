<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyRequest;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Throwable;

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

    /**
     * 新規投稿リクエストを送信
     */
    public function sendNewPost(StudyRequest $request)
    {
        Study::create([
            'category'    => $request->input('category'),
            'title'       => $request->input('title'),
            'link'        => $request->input('link'),
            'progress'    => $request->input('progress'),
            'complete_at' => $request->input('complete_at'),
            'comment'     => $request->input('comment'),
        ]);

        return redirect()->route('study');
    }

    /**
     * 投稿更新リクエストを送信
     */
    public function sendUpdatePost(StudyRequest $request)
    {
        $postId = $request->only(['id']);

        try {
            $post = Study::where('id', $postId)->firstOrFail();
        } catch (Throwable $e) {
            Log::error($e);

            return redirect()->route('study');
        }

        $post->update([
            'category'    => $request->input('category'),
            'title'       => $request->input('title'),
            'link'        => $request->input('link'),
            'progress'    => $request->input('progress'),
            'complete_at' => $request->input('complete_at'),
            'comment'     => $request->input('comment'),
        ]);

        return redirect()->route('study');
    }

    /**
     * 投稿削除リクエストを送信
     */
    public function sendDestroyPost(Request $request)
    {
        Study::destroy($request->input('postId'));

        return redirect()->route('study');
    }
}
