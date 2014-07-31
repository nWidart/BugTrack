@extends('layouts.default')

@section('content')
<h1>Bug tracking</h1>
<a type="button" class="btn btn-primary" href="{{ URL::route('bugs') }}">Handle bugs</a>
@stop