@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">{{$message}}</div>
                    @endif
                    <form accept-charset="UTF-8" role="form" method="post">
                        <p class="has-error">
                            @if ($message = Session::get('error'))
                                <?php echo $message; ?>
                            @endif
                        </p>
                        <fieldset>
                            <div class="form-group{{{ $errors->has('email') ? ' error' : '' }}}">
                                <input class="form-control" placeholder="E-mail" name="email" type="text" value="{{{ Input::old('email') }}}" required>
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                            </div>
                            <div class="form-group{{{ $errors->has('password') ? ' error' : '' }}}">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    <span class="help-block">
                                        {{ $errors->first('password') }}
                                    </span>
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop