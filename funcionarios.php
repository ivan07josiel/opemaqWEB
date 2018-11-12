<?php
session_start();
/*
*Checa se a variavel ta vazia
*parte do codigo responsavel por
*segurança da rentrada na pagina.
*/
if(empty($_SESSION['id'])){
    $_SESSION['msg'] = "Realize o login para ter acesso";
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Funcionarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
    .selecionada {
        background-color: rgba(105, 105, 179, 0.568);
        color: black;
    }

    tbody {
        cursor: pointer;
    }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- JQuery -->
    <script src="scripts/jquery.js" type="text/javascript"></script>
    
    <!-- Bootstrap core JS -->
    <script src="scripts/bootstrap.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#users_table > tbody > tr").on("click", function (e) {
                // Remove a classe de todos os tr's adjacentes
                $(this).siblings().removeClass("selecionada");
                $(this).toggleClass("selecionada"); // Adiciona ou remove a classe 'selecionada'

                // Verifica se alguma linha possuia a classe selecionada e ativa ou não o bt editar
                if ($("tr").hasClass("selecionada")) {
                    $("#btn_editar").prop("disabled", false);
                    $("#btn_apagar").prop("disabled", false); 

                } else{
                    $("#btn_editar").prop("disabled", true);
                    $("#btn_apagar").prop("disabled", true); 
                    $("#btn_cadastrar").prop("disabled", false); // Ativa botão cadastrar                

                }
            });

            $('#btn_editar').click(function(){
                $("#btn_cadastrar").prop("disabled", true); // Dasativa botão cadastrar                
                $("#btn_salvar").prop("disabled", false); 

                $linha_tabela = $(".selecionada"); // recebe a tr que tem a classe selecionada

                // Recuperando valores da linha selecionada da tabela
                $nome_func = $linha_tabela.find("#nomeFunc").text(); // nome_func recebe o texto da td com id = nome_func da tabela
                $data_admissao = $linha_tabela.find("#dataAdFunc").text();
                $data_nasc = $linha_tabela.find("#dataNascFunc").text();
                $fgts = $linha_tabela.find("#fgtsFunc").text();
                $insalubridade = $linha_tabela.find("#insalubridadeFunc").text();
                $periculosidade = $linha_tabela.find("#periculosidadeFunc").text();
                $inss = $linha_tabela.find("#inssFunc").text();
                $experiencia = $linha_tabela.find("#experienciaFunc").text();
                $agua = $linha_tabela.find("#aguaFunc").text();
                $luz = $linha_tabela.find("#luzFunc").text();
                $aluguel = $linha_tabela.find("#aluguelFunc").text();
                $encargos = $linha_tabela.find("#encargosFunc").text();
                $funcao = $linha_tabela.find("#funcaoFunc").text();

                
                // Passando valores para o formulario
                $("#nome").val($nome_func);
                $("#dataAdmissao").val($data_admissao);
                $("#dataNascimento").val($data_nasc);
                $("#fgts").val($fgts);
                $("#insalubridade").val($insalubridade);
                $("#periculosidade").val($periculosidade);
                $("#inss").val($inss);
                $("#agua").val($agua);
                $("#luz").val($luz);
                $("#aluguel").val($aluguel);
                $("#encargos").val($encargos);
                $("#funcao").val($funcao);
                $("#experiencia").val($experiencia);

            });

        });

        // Muda action do form para cadastro
        function cadastrar() {
            if (confirm("Confirmar cadastramento do funcionário?")) {
                $("#formFunc").attr("action", "controller/FuncionarioController.php?action=cadastrar");
                $("#formFunc").submit();
            }
        }

        // Muda action do form para update
        function editar() {
            if (confirm("Confirmar atualização do funcionário?")) {
                // Pegando id da funcionario que será atualizada
                $id_func = $(".selecionada").find("#idFunc").text();
                
                // Modificando o action do formulario e passando a action e o id na url
                $("#formFunc").attr("action", "controller/FuncionarioController.php?action=editar&id_func="+$id_func);

                // Dando submit no formulario   
                $("#formFunc").submit();
            }
        }

        // Muda action do form para delete
        function apagar() {
            if (confirm("Confirmar remoção do funcionário selecionado?")) {
                // Pegando id do funcionario que será removido
                $id_func = $(".selecionada").find("#idFunc").text();
                
                // Modificando o action do formulario e passando a action e o id na url
                $("#formFunc").attr("action", "controller/FuncionarioController.php?action=remover&id_func="+$id_func);

                // Dando submit no formulario   
                $("#formFunc").submit();
            }
        }
    </script>

 </head>
<body>

    <!-- Incluindo menu da página -->
    <?php require_once "templates/header.php"; ?>

    <!-- Modal mensagem de retorno -->
    <div class="modal fade" id="modalMsgRetorno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tituloModalRetorno"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="msgModalRetorno">
            <!-- Mensagem do modal -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>
    
    
    <!-- Inicio formulario funcionario -->
    <form id="formFunc" action="" method="POST" style="padding: 10px;">    
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nome">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do funcionario">
            </div>
            <div class="form-group col-md-3">
                <label for="dataAdmissao">Data de admissão</label>
                <input type="date" class="form-control" id="dataAdmissao" name="dataAdmissao">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-3">
                <label for="dataNascimento">Data de nascimento</label>
                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento">
            </div>
            <div class="form-group col-md-3">
                <label for="fgts">FGTS</label>
                <input type="text" class="form-control" id="fgts" name="fgts" placeholder="Insira o FGTS">
            </div>
            <div class="form-group col-md-3">
                <label for="insalubridade">Insalubridade</label>
                <input type="text" class="form-control" id="insalubridade" name="insalubridade" placeholder="Digite o valor">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-3">
                <label for="periculosidade">Periculosidade</label>
                <input type="text" class="form-control" id="periculosidade" name="periculosidade" placeholder="Insira o nivel de periculosidade">
            </div>
            <div class="form-group col-md-3">
                <label for="inss">INSS</label>
                <input type="text" class="form-control" id="inss" name="inss" placeholder="Digite o número de INSS">
            </div>
            <div class="form-group col-md-3">
                <label for="agua">Água</label>
                <input type="text" class="form-control" id="agua" name="agua" placeholder="Digite o valor">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-3">
                <label for="luz">Luz</label>
                <input type="text" class="form-control" id="luz" name="luz" placeholder="Digite o valor">
            </div>
            <div class="form-group col-md-3">
                <label for="aluguel">Aluguel</label>
                <input type="text" class="form-control" id="aluguel" name="aluguel" placeholder="Digite o valor">
            </div>
            <div class="form-group col-md-3">
                <label for="encargos">Encargos</label>
                <input type="text" class="form-control" id="encargos" name="encargos" placeholder="Digite o valor">
            </div>
        </div>
        
        <div class="row">
            <div class="form-group col-md-4">
                <label for="funcao">Função</label>
                <input type="text" class="form-control" id="funcao" name="funcao" placeholder="Digite o valor">
            </div>
            <div class="form-group col-md-5">
                <label for="experiencia">Experiencia</label>
                <textarea type="text" id="experiencia" name="experiencia" class="md-textarea form-control" rows="3"></textarea>
            </div>
        </div>
        <!-- Botoes -->
        <div style="margin:0px">
            <button type="button" id="btn_cadastrar" class="btn btn-md btn-primary" onclick="cadastrar();">Cadastrar</button>    
            <button type="button" id="btn_salvar" class="btn btn-md btn-primary" disabled onclick="editar();">Salvar</button>    
            <button type="button" id="btn_editar" class="btn btn-md btn-primary" disabled>Editar</button>    
            <button type="button" id="btn_apagar" class="btn btn-md btn-danger" disabled onclick="apagar();">Apagar</button>    
        </div>
    </form> <!-- Fim formulario funcionarios-->


    <!-- Tabela de Funcionarios -->
    <table id="users_table" class="table table-hover table-bordered col-4" style="margin-left: 10px;">

        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col" hidden>Data Admissão</th>  
                <th scope="col" hidden>Data Nascimento</th>  
                <th scope="col" hidden>FGTS</th>  
                <th scope="col" hidden>Insalubridade</th>  
                <th scope="col" hidden>Periculosidade</th>  
                <th scope="col" hidden>INSS</th>  
                <th scope="col" hidden>Água</th>
                <th scope="col" hidden>Luz</th>  
                <th scope="col" hidden>Aluguel</th>  
                <th scope="col" hidden>Encargos</th>  
                <th scope="col">Função</th>  
            </tr>
        </thead>
        <tbody>
            <?php
                    include_once 'dao/FuncionarioDAO.php';
                    include_once 'models/FuncionarioModel.php';
                    $dao = new FuncionarioDAO();
                    $idUsuario = $_SESSION["id"];
                    $funcionarios = $dao->pesquisar($idUsuario);
                    foreach ($funcionarios as $f):
            ?>
                <tr>
                    <th id="idFunc" scope="row"><?= $f->getIdFuncionario()?></th>
                    <th id="nomeFunc"><?= $f->getNome()?></th>
                    <th id="dataAdFunc" hidden><?= $f->getDataAdmissao()?></th>
                    <th id="dataNascFunc" hidden><?= $f->getDataNascimento()?></th>
                    <th id="fgtsFunc" hidden><?= $f->getFgts()?></th>
                    <th id="insalubridadeFunc" hidden><?= $f->getInsalubridade()?></th>
                    <th id="periculosidadeFunc" hidden><?= $f->getPericulosidade()?></th>
                    <th id="inssFunc" hidden><?= $f->getInss()?></th>
                    <th id="experienciaFunc" hidden><?= $f->getExperiencia()?></th>
                    <th id="aguaFunc" hidden><?= $f->getAgua()?></th>
                    <th id="luzFunc" hidden><?= $f->getLuz()?></th>
                    <th id="aluguelFunc" hidden><?= $f->getAluguel()?></th>
                    <th id="encargosFunc" hidden><?= $f->getEncargos()?></th>
                    <th id="funcaoFunc"><?= $f->getFuncao()?></th>
                </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Fim da tabela de funcionarios -->

    <?php
		if(isset($_SESSION['msgCadastro'])){
			echo $_SESSION['msgCadastro'];
            unset($_SESSION['msgCadastro']);
		}
		/**
		*Se a pagina for atualizada e
		*a variavel $_SESSION tiver
		*valor, ele reseta a variavel.
		*/
	?>
</body>
</html>