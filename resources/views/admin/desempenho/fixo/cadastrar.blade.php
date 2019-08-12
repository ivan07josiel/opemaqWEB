@extends('adminlte::page')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        input[data-readonly] {
            pointer-events: none;
        }
    </style>
@endsection

@section('title', 'Cadastro Operação')

@section('content_header')
    <h1>Novo Desempenho Fixo</h1>

    <ol class="breadcrumb">
        <li><a href="/">
            <i class="fa fa-home"></i>            
            Inicio
        </a></li>
        <li><a href=" {{route('fixo.index')}} ">Desempenho Fixo</a></li>
        <li><a href="">Cadastrar</a></li>
    </ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3>Dados Cadastrais</h3>
            </div>
            <form id="formFunc" action=" {{route('analise.store')}} " method="POST" > 
                {{ csrf_field() }}   
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                                <label for="id_trator">Trator/Implemento</label>
                                <select name="id_trator" id="id_trator" class="form-control input-lg">
                                    @foreach ($tratores as $trator)
                                        <option value="{{$trator->id}}"> {{$trator->apelido}} </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="form-group col-md-3 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Vida útil</label>
                            <input type="text" class="form-control input-lg " id="vida_util_horas" name="vida_util_horas" placeholder="1500" required>
                            <small class="text-muted form-text">Horas</small>
                            @if ($errors->has('vidaUtil'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Impostos</label>
                            <input type="text" class="form-control input-lg " id="impostos" name="impostos" placeholder="Impostos">
                            <small class="text-muted form-text">(%)</small>
                            @if ($errors->has('impostos'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-md-3 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Taxa de juros aplicado ao capital</label>
                            <input type="text" class="form-control input-lg " id="taxa_juros" name="taxa_juros" 
                                readonly placeholder="Taxa de juros">
                            @if ($errors->has('impostos'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-2 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Custo do alojamento</label>
                            <input type="text" class="form-control input-lg " id="custo_alojamento_seguro" 
                                name="custo_alojamento_seguro" readonly placeholder="Custo">
                            <small class="text-muted form-text">Alojamento e seguro</small>
                            @if ($errors->has('impostos'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-2 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Depreciação</label>
                            <input type="text" class="form-control input-lg " id="depreciacao" name="depreciacao" 
                                readonly placeholder="Depreciação">
                            @if ($errors->has('impostos'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-3 {{ $errors->has('nome') ? 'has-error' : '' }}">
                            <label for="nome">Custo fixo total</label>
                            <input type="text" class="form-control input-lg " id="custo_fixo_total" name="custo_fixo_total" 
                                readonly placeholder="Custo fixo total">
                            @if ($errors->has('impostos'))
                                <span class="help-block invalid-feedback">
                                    {{ $errors->first() }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div> <!-- box-body -->

                <!-- Botoes -->
                <div class="box-footer text-right">
                    <button type="submit" id="btn_cadastrar" class="btn btn-lg btn-primary">
                            <i class="fa fa-save"></i>          
                            &nbsp;Cadastrar
                    </button>    
                    <a href=" {{ route('analise.index') }} " id="btn_voltar" class="btn btn-danger btn-lg">
                        <i class="fa fa-undo"></i>          
                        &nbsp;Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js')
    <script src="{{ asset('vendor/adminlte/vendor/js/desempenhoFixo.js') }}"></script>
@endsection