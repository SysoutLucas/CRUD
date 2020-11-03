@extends('layout.layout')

    @section('content')
    <div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
      <div class="col-lg-7">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Criar uma conta</h1>
          </div>
          <form class="user" id="form_register" method="POST" action="{{url('register')}}" >
            @csrf
            <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Nome">
              </div>
            </div>
            <div class="form-group">
              <input type="email" name="login" class="form-control form-control-user" id="login" placeholder="E-mail">
            </div>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Senha">
              </div>
              <div class="col-sm-6">
                <input type="password" name="password_confirmation" class="form-control form-control-user" id="password_confirmation" placeholder="Confirmar senha">
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
              Cadastrar
            </button>
          </form>
          <hr>
          <div class="text-center">
            <a class="small" href="{{url('/')}}">Já tem uma conta? acesse aqui</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

    @stop