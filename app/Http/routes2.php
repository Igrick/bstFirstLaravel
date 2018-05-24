<?php

  use App\News;
  use Illuminate\Http\Request;

  /**
   * Вывести панель с задачами
   */
  Route::get('/', function () {
      $news = News::orderBy('created_at', 'asc')->get();
    return view('news',
	    ['news' => $news
	    ]);
  });

  /**
   * Добавить новую задачу
   */
  Route::post('/task', function (Request $request) {
    //
  });

  /**
   * Удалить задачу
   */
  Route::delete('/task/{task}', function (Task $task) {
    //
  });