@extends('layouts.app')


@section('content')
	<div>
		<form action="{{ route('tasks.update',['task' => $id, 'mode' => $mode]) }}"" class="form-group" method='POST'>
			{{csrf_field()}}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group">
				<input type="text" class="form-control form-control-lg" name='nameEdited' value='{{$currentName}}' >
			</div>
			<div class="form-group">
				<input type="submit" value='Save Changes' class="btn btn-success">
				<a href="{{ route('tasks.loadView',['mode' => $mode] ) }}" class="btn btn-secondary float-right">Go Back!</a>
			</div>
		</form>
	</div>


@stop