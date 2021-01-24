@extends('layouts.app')

@section('content')
    <h1 class="mb-5">{{ __('views.task_status.edit.h1') }}</h1>

    {{ Form::model($taskStatus, ['url' => route('task_statuses.update', $taskStatus), 'method' => 'patch', 'class' => 'w-50']) }}
        {{ Form::bsText('name') }}
        {{ Form::submit(__('forms.submits.update'), ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
@endsection
