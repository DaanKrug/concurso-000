@extends('inscricao.layout')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <style>
                    .rosa{
                        color: rgb(255, 9, 214);
                    }
                </style>
                <div class="rosa">
                <h4>Concurso Público para Desenvolvedor de Software</h4>
                <br>
                </div>
                <h5>Inscrição de Candidato</h5>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('inscricao.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Nome Completo :</strong>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>CPF:</strong>
                    <input id="cpf" type="text" name="cpf" class="form-control" maxlength="11">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Endereço:</strong>
                    <input type="text" name="endereco" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <select id="estado" name="estado" class="form-control">
                    @foreach($states as $estado)
                        <option value="{{$estado->sigla}}">{{$estado->nome}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>* Cidade:</strong>
                    <input type="text" name="cidade" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Cargo:</strong>
                    <input type="text" name="cargo" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Add Product</button>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('#cpf').mask('999.999.999-99');
        });
    </script>
@endsection
