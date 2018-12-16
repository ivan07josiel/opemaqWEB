@extends('adminlte::page')

@section('css')
    <style>
    .select2-selection--multiple {
        min-height: 45px !important;
        text-align: center;
    }
    </style>
@endsection

@section('title', 'Editar conj. mecanizado')

@section('content_header')
    <h1>Editar Conjunto Mecanizado</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href=" {{route('conjuntos.index')}} ">Conjuntos Mecanizados</a></li>
        <li><a href="">Editar</a></li>
    </ol>
@stop


@section('content')
<div class="row">
<div class="col-md-12 ">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3>Dados do Conjunto Mecanizado</h3>
        </div>
        <form id="formFunc" action=" {{route('conjuntos.update')}} " method="POST" > 
            {{ csrf_field() }}   
            <input type="hidden" name="id" value="{{$conjunto->id}}">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-md-4 {{ $errors->has('apelido') ? 'has-error' : '' }}">
                        <label for="apelido">Apelido*</label>
                        <input type="text" class="form-control input-lg" value="{{$conjunto->apelido}}" id="apelido" name="apelido" placeholder="Nome do Conjunto Mecanizado">
                        @if ($errors->has('apelido'))
                            <span class="help-block invalid-feedback">
                                {{ $errors->first() }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label>Funcionários</label>
                        <select name="funcionarios[]" class="form-control select2" multiple="" data-placeholder="Selecione o(s) funcionário(s)" style="width: 100%; height: 100%;">
                            @foreach ($funcionarios as $funcionario)
                                <option value="{{$funcionario->id}}" 
                                    @foreach ($funcionariosSelected as $item)
                                        @if ($item->id_funcionario == $funcionario->id)
                                          {{'selected'}}
                                          @break
                                        @endif
                                    @endforeach
                                >
                                    {{$funcionario->nome}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="trator">Trator</label>
                        <select name="id_trator" id="trator" class="form-control input-lg">
                            @foreach ($tratores as $trator)
                                <option value="{{$trator->id}}"> {{$trator->apelido}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="implemento">Implemento</label>
                        <select name="id_implemento" id="implemento" class="form-control input-lg">
                            @foreach ($implementos as $implemento)
                                <option value="{{$implemento->id}}"> {{$implemento->apelido}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div> <!-- box-body -->

            <!-- Botoes -->
            <div class="box-footer">
                <a href=" {{ route('conjuntos.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-angle-left fa-lg"></i>          
                        &nbsp;Cancelar
                </a>
                <button type="submit" id="btn_salvar" class="btn btn-lg btn-primary">
                        <i class="fa fa-save fa-lg"></i>          
                        &nbsp;Salvar
                </button>    
            </div>
        </form>
    </div>
</div>
</div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection