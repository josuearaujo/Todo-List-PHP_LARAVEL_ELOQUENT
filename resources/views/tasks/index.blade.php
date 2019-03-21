@extends('layouts.app')


@section('content')
	<div>
		<form action="{{ route('tasks.store', ['mode' => $mode]) }}" method='POST' class="form-row">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">


			<div class="col-md-9">
				<input type="text" name='newTaskName' class='form-control' placeholder="Add a new todo...">
			</div>

			<div class="col-md-3">
				<input type="submit" class='btn btn-primary btn-block' value='Add Task'>
			</div>
		</form>
	</div>

	<!-- Displaye stored tasks -->
	@if (count($storedTasks) > 0)
		
		<table class="table">
			<thead>
			<th>TASK</th>
			<th style="text-align: center">EDIT</th>
			<th style="text-align: center">DELETE</th>
			</thead>

			<tbody>
				@foreach($storedTasks as $storedTask)	
				<tr>
					<td class="col-md-6" style="max-width:200px">
						<a href="/tasks/changeStatus/{{$storedTask->id}}/{{$mode}}" style="font-size: 1.2em; font-weight: bold; width: 100%; word-wrap: break-word; text-align: left"
							@if($storedTask->status==1)
								class='btn'
							@else
								class='btn completed'
							@endif							
						>{{$storedTask->name}}</a>
						<input type="hidden" name="_method" value='PUT'> 
						
						<!-- href="{{ route('tasks.changeStatus', ['task', $storedTask->id]) }}" -->
					</td>
					<td class="col-md-3"><a href="{{ route('tasks.edit', ['task' => $storedTask->id, 'mode' => $mode]) }}" class="btn btn-primary">Edit</a></td>
					<td class="col-md-3">
						<form action="{{ route('tasks.destroy', ['task' => $storedTask->id, 'mode' => $mode]) }}" method='POST' class="col-md-3">
							{{ csrf_field() }}

							<input type="hidden" name="_method" value='DELETE'>
							<input type="submit" class='btn btn-danger' value='Delete'>
						</form>

					</td>
				</tr>
				@endforeach
			</tbody>	
		</table>
	@endif

		<div style="margin-top: 30px" class="d-flex d-inline">
			<a href="/tasks/loadView/1" class="btn btn-warning col-md-3 @if($mode==1) modeSelected @endif">All</a>
			<a href="/tasks/loadView/2" class="btn btn-warning col-md-3 @if($mode==2) modeSelected @endif">Active</a>
			<a href="/tasks/loadView/3" class="btn btn-warning col-md-3 @if($mode==3) modeSelected @endif">Completed</a>
			<form action="{{ route('tasks.destroy', ['task' => 0, 'mode' => $mode]) }}" method='POST' class="col-md-3" style="padding:0; margin: 0">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value='DELETE'>
				<input type="submit" class="btn btn-dark" value='Clear' style="width: 100%; height: 100%"></input>
			</form>
		</div>

	




@endsection