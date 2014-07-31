@extends('layouts.default')

@section('title')
Create a Bug report ::
@parent
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form-horizontal" method="post">
                <fieldset>
                    <legend class="text-center">Add a bug report</legend>

                    <div class="form-group{{{ $errors->has('title') ? ' has-error' : '' }}}">
                        <label class="col-md-3 control-label" for="title">Title</label>
                        <div class="col-md-9">
                            <input id="title" name="title" type="text" placeholder="Bug title" class="form-control" value="{{{ Input::old('title') }}}">
                            <span class="help-block">
                                {{ $errors->first('title') }}
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="user">Assigned to</label>
                        <div class="col-md-9">
                            <select class="form-control" name="user">
                                <?php foreach($users as $user): ?>
                                    <option value="{{$user->id}}">{{$user->first_name . ' ' . $user->last_name }}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state">State</label>
                        <div class="col-md-9">
                            <select class="form-control" name="state">
                                <?php foreach($states as $state): ?>
                                    <option value="{{$state->id}}">{{$state->title}}</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group{{{ $errors->has('description') ? ' has-error' : '' }}}">
                        <label class="col-md-3 control-label" for="description">Bug description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="description" name="description" placeholder="Bug description" rows="5">{{{ Input::old('description') }}}</textarea>
                            <span class="help-block">
                                {{ $errors->first('description') }}
                            </span>
                        </div>
                    </div>

                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@stop