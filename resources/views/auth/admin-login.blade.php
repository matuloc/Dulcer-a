@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="wrap">
                <p class="form-title">
                    Administrador</p>
                    <form class="login" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}
                      <input type="text" name="email" placeholder="Usuario" />
                      <input type="password" name="password" placeholder="Contraseña" />
                      <input type="submit" value="Sign In" class="btn btn-success btn-sm" />
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
