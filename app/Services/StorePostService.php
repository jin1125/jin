<?php

namespace App\Services;

use App\Models\Study;

class StorePostService
{
    /**
     * 新規投稿の処理
     *
     * @param  mixed $request
     * @return void
     */
    public function execute($request)
    {
      Study::create([
        'category'    => $request->input('category'),
        'title'       => $request->input('title'),
        'link'        => $request->input('link'),
        'status'      => $request->input('status'),
        'complete_at' => $request->input('complete_at'),
        'comment'     => $request->input('comment'),
      ]);
    }
}