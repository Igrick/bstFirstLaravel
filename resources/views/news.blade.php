@extends('layouts.app1')

@section('content.errors')
<!-- Форма создания задачи... -->

<!-- Текущие задачи -->
@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Текущая задача
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">

	    <!-- Заголовок таблицы -->
	    <thead>
            <th>News</th>
            <th>&nbsp;</th>
	    </thead>

	    <!-- Тело таблицы -->
	    <tbody>
		@foreach ($news as $new)
		<tr>
		    <!-- Имя задачи -->
		    <td class="table-text">
			<div>{{ $news->name }}</div>
		    </td>

		    <td>
		<tr>
		    <!-- Имя задачи -->
		    <td class="table-text">
			<div>{{ $task->name }}</div>
		    </td>

		    <!-- Кнопка Удалить -->
		    <td>
			<form action="{{ url('task/'.$task->id) }}" method="POST">
			    {{ csrf_field() }}
			    {{ method_field('DELETE') }}

			    <button type="submit" class="btn btn-danger">
				<i class="fa fa-trash"></i> Удалить
			    </button>
			</form>
		    </td>
		</tr>
                </td>
		</tr>
		@endforeach
	    </tbody>
        </table>
    </div>
</div>
@endif
@endsection