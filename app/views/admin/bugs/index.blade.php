@extends('layouts.default')

@section('content')
<h2 class="float-left">Bugs</h2>
<div class="action">
    <a type="button" class="btn btn-success" href="{{ URL::route('create/bug') }}">Create bug report</a>
</div>
<div class="clearfix"></div>
@if ($success = Session::get('success'))
<div class="alert alert-success">{{$success}}</div>
@endif
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Assigned to</th>
        <th>State</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($bugs as $bug): ?>
        <tr>
            <td>{{ $bug->id }}</td>
            <td>{{ $bug->title }}</td>
            <td>{{ $bug->description }}</td>
            <td>{{ $bug->user->first_name }}</td>
            <td>{{ $bug->state->title }}</td>
            <td>
                <div class="btn-group">
                    <a type="button" class="btn btn-default"
                       href="{{ URL::route('edit/bug', $bug->id) }}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a type="button" class="btn btn-default jsDeleteBug"
                       href="{{ URL::route('delete/bug', $bug->id) }}"
                       data-bugId="{{$bug->id}}">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
@stop