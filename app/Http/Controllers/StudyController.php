<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyRequest;
use App\Models\Study;
use App\Services\StorePostService;
use App\Services\UpdatePostService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $studyRecords = Study::get()->all();
        $categories   = Arr::pluck(
            $studyRecords,
            'category'
        );
        array_multisort(
            $categories,
            SORT_ASC,
            SORT_STRING,
            $studyRecords
        );

        return Inertia::render('Study', [
            'isLogin' => Auth::check(),
            'studyRecords' => $studyRecords
        ]);
    }

    /**
     * 新規投稿リクエストを送信
     */
    public function sendStorePost(
        StudyRequest $request,
        StorePostService $storePostService
    ) {
        $storePostService->execute($request);

        return redirect()->route('study');
    }

    /**
     * 投稿更新リクエストを送信
     */
    public function sendUpdatePost(
        StudyRequest $request,
        UpdatePostService $updatePostService
    ) {
        try {
            $updatePostService->execute($request);
        } catch (Throwable $e) {
            Log::error($e);

            return redirect()->route('study');
        }

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
