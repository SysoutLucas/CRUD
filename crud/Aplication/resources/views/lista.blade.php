@extends('layout.layouthome')

    @section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <form action="">
            @csrf
          </form>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista Usuários</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Login</th>
                      <th>Criado em</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  @foreach( $users as $user)
                  <tr>
                      <td>{{$user['user_id']}}</td>
                      <td>{{$user['name']}}</td>
                      <td>{{$user['login']}}</td>
                      <td>{{$user['created_at']}}</td>
                      <td> <a href="{{url('user/edit/')}}/{{$user['user_id']}}" class="btn btn-primary">Editar</a> <a href="#"  onclick="cancell({{$user['user_id']}})" class="btn btn-danger">Excluir</a> </td>
                    </tr>
                  @endforeach
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
    @stop

    @section('scripts')
        <script src="{{url('js/userlist.js')}}"></script>
    @stop