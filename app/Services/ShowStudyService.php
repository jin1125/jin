<?php

namespace App\Services;

use App\Models\Study;
use Illuminate\Support\Arr;

class ShowStudyService
{
    /**
     * 投稿取得の処理
     *
     * @return array
     */
    public function execute()
    {
      $studyRecords = Study::get()->all();
      $categories   = Arr::pluck($studyRecords, 'category');
      
      array_multisort(
          $categories,
          SORT_ASC,
          SORT_STRING,
          $studyRecords
      );

      return $studyRecords;
    }
}