@extends('layouts.app')
@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}

	<!-- Имя задачи -->
	<div class="form-group">
	    <label for="task" class="col-sm-3 control-label">Задача</label>

	    <div class="col-sm-6">
		<input type="text" name="name" id="task-name" class="form-control">
	    </div>
	</div>

	<!-- Кнопка добавления задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-default">
		    <i class="fa fa-plus"></i> Добавить задачу
		</button>
	    </div>
	</div>
    </form>
</div>

<!-- TODO: Текущие задачи -->
 @if (count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Список задач
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">

          <!-- Заголовок таблицы -->
          <thead>
            <th>Name</th>
            <th>action</th>
          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($tasks as $task)
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div>{{ $task->name }}</div>
                </td>

                <td>
		    <form method="post" action="/task/{{$task->id}}">
			{{method_field('DELETE')}}
			
			{{ csrf_field() }}
			<button>
			    <i class="fa fa-trash"></i>
			</button>
		    </form>
		    <form method="post" action="/taskedit/{{$task->id}}">
			
			{{ csrf_field() }}
			<button>
			    <i class="fa fa-edit"></i>
			</button>
		    </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection