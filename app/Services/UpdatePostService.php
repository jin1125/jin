<?php

namespace App\Services;

use App\Models\Study;

class UpdatePostService
{
    /**
     * 投稿を更新する
     *
     * @param  mixed $request
     * @return void
     */
    public function execute($request)
    {
      $postId = $request->only(['id']);
      $post   = Study::where('id', $postId)->firstOrFail();

      $post->update([
        'category'    => $request->input('category'),
        'title'       => $request->input('title'),
        'link'        => $request->input('link'),
        'progress'    => $request->input('progress'),
        'complete_at' => $request->input('complete_at'),
        'comment'     => $request->input('comment'),
      ]);
    }
}