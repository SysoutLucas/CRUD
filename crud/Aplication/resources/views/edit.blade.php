@extends('layout.layouthome')

    @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Editar Usuário</h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           
            <div class="card-body">
                <form class="user" id="form_edit" method="POST" action="{{url('edit')}}" >
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user['user_id']}}">
                    <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="name" class="form-control form-control-user" id="name" placeholder="Nome" value="{{$user['name']}}">
                    </div>
                    </div>
                    <div class="form-group">
                    <input type="email" name="login" class="form-control form-control-user" id="login" placeholder="E-mail" value="{{$user['login']}}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user ">
                    Salvar
                    </button>
                </form>
            </div>
           </div>

        </div>
        <!-- /.container-fluid -->
    @stop

    @section('scripts')
        <script src="{{url('js/forms.js')}}"></script>
    @stop