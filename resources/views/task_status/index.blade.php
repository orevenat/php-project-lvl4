@extends('layouts.app')

@section('content')
<h1 class="mb-5">{{ __('views.task_status.index.h1') }}</h1>

<a href="{{route('task_statuses.create')}}" class="btn btn-primary">{{ __('views.task_status.index.add_new') }}</a>

<table class="table mt-2">
    <thead>
        <tr>
            <th>{{ __('models.task_status.id') }}</th>
            <th>{{ __('models.task_status.name') }}</th>
            <th>{{ __('models.task_status.created_at') }}</th>
            <th>{{ __('views.task_status.index.actions') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($taskStatuses as $taskStatus)
            <tr>
                <td>{{$taskStatus->id}}</td>
                <td>{{$taskStatus->name}}</td>
                <td>{{$taskStatus->created_at->format('M d Y')}}</td>
                <td>
                    <form action="{{ route('task_statuses.destroy', $taskStatus) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-danger">
                            {{ __('views.task_status.index.remove') }}
                        </button>
                    </form>
                    <a href="{{route('task_statuses.edit', $taskStatus->id)}}">
                        {{ __('views.task_status.index.edit') }}
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
