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
    <title>Propriedade</title>
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
    <script src="scripts/bootstrap.js" type="text/javascript"></script>
    
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
                $nome_propriedade = $linha_tabela.find("#nome_prop").text(); // nome_propriedade recebe o texto da td com id = nome_prop da tabela
                $data = $linha_tabela.find("#data_prop").text();
                $relevo = $linha_tabela.find("#relevo_prop").text().toLowerCase();
                $percuso_manobra = $linha_tabela.find("#perc_man_prop").text();
                $tamanho = $linha_tabela.find("#tam_prop").text();
                $solo = $linha_tabela.find("#solo_prop").text().toLowerCase();
                $fertilidade = $linha_tabela.find("#fertilidade_prop").text().toLowerCase();
                $declividade = $linha_tabela.find("#declividade_prop").text().toLowerCase();
                $valor = $linha_tabela.find("#val_prop").text().replace("R$", "");
                
                // Passando valores para o formulario
                $("#nomePropriedade").val($nome_propriedade);
                $("#data").val($data);
                $("#relevo").val($relevo);
                $("#percursoManobra").val($percuso_manobra);
                $("#solo").val($solo);
                $("#fertilidade").val($fertilidade);
                $("#declividade").val($declividade);
                $("#tamanho").val($tamanho);
                $("#valor").val($valor);

            });

        });

        // Muda action do form para cadastro
        function cadastrar() {
            if (confirm("Confirmar cadastramento da propriedade?")) {
                $("#form_prop").attr("action", "cadastroProp.php");
                $("#form_prop").submit();
            }
        }

        // Muda action do form para update
        function editar() {
            if (confirm("Confirmar atualização da propriedade?")) {
                // Pegando id da propriedade que será atualizada
                $id_prop = $(".selecionada").find("#id_prop").text();
                
                // Modificando o action do formulario para o arquivo de update e passando o id na url
                $("#form_prop").attr("action", "update_prop.php?id_prop="+$id_prop);

                // Dando submit no formulario   
                $("#form_prop").submit();
            }
        }

        // Muda action do form para delete
        function apagar() {
            if (confirm("Confirmar remoção da propriedade selecionada?")) {
                // Pegando id da propriedade que será removida
                $id_prop = $(".selecionada").find("#id_prop").text();
                
                // Modificando o action do formulario para o arquivo de remocao e passando o id na url
                $("#form_prop").attr("action", "delete_prop.php?id_prop="+$id_prop);

                // Dando submit no formulario   
                $("#form_prop").submit();
            }
        }
    </script>

 </head>
<body>

    <!-- Modal -->
    <div class="modal fade" id="modalMsg" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" id="tituloModalCadastro"></h4>
            </div>
            <div class="modal-body">
            <p id="txtModal"></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>

        </div>
    </div>

    <form id="form_prop" action="" method="POST" style="padding: 10px;">
        <div class="form-row">
            <fieldset class="col-lg-5">
                <legend>Dados da Propriedade</legend>
                <div class="form-group">
                    <input type="text" name="nomeProp" id="nomePropriedade" class="form-control" placeholder="Nome da propriedade" required autofocus>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="data" class="input-group-text">Data</label>
                        </div>
                        <input type="date" name="data" id="data">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="valorReais" class="input-group-text">Valor R$</label>
                        </div>
                        <input class="" type="number" id="valor" name="valorReais" id="valorReais" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="tamProp" class="input-group-text">Tamanho da propriedade</label>
                        </div>
                        <input class="col-2" type="number" id="tamanho" min="0" name="tamProp" aria-describedby="tamPropHelp">
                        <small class="text-muted" id="tamPropHelp" style="padding: 7px;">Hectares</small>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">    
                            <label for="percursoManobra" class="input-group-text">Percurso e manobra</label>
                        </div>
                        <select class="custom-select" name="percursoManobra" id="percursoManobra">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <small class="text-muted form-text" id="percursoManobra" style="padding: 7px;">Tipo de percurso e manobra varia de 1 a 4</small>
                    </div>
                </div>
            </fieldset> <!-- Fim fieldset propriedade-->

            <fieldset class="col-lg-4">
                <legend>Características da área</legend>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="relevo" class="input-group-text">Relevo</label>
                        </div>
                        <select name="relevo" class="custom-select" id="relevo">
                            <option	disabled selected>Selecione	o relevo</option>
                            <option	value="arenoso">Arenoso</option>
                            <option	value="argiloso">Argiloso</option>
                            <option	value="arenoArg">Areno Argiloso</option>
                            <option value="siltoso">Siltoso</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="solo" class="input-group-text">Solo</label>
                        </div>
                        <select name="solo" class="custom-select" id="solo">
                            <option	disabled selected>Selecione	o solo</option>
                            <option	value="plano">Plano</option>
                            <option	value="suave">Suave ondulado</option>
                            <option value="ondulado">Ondulado</option>
                            <option	value="forteOndulado">Forte ondulado</option>
                            <option value="montanhoso">Montanhoso</option>
                            <option	value="escarpa">Escarpa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="declividade" class="input-group-text">Declividade</label>
                        </div>
                        <select name="declividade" class="custom-select" id="declividade">
                            <option	disabled selected>Selecione	a declividade</option>
                            <option	value="0-3">0 - 3%</option>
                            <option	value="3-8">3 - 8%</option>
                            <option value="8-13">8 - 13%</option>
                            <option	value="13-20">13 - 20%</option>
                            <option value="20-45">20 - 45%</option>
                            <option	value="45-100">45 - 100%</option>
                            <option	value=">100">Maior que 100%</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label for="fertilidade" class="input-group-text">Fertilidade</label>
                        </div>
                        <select name="fertilidade" class="custom-select" id="fertilidade">
                            <option	disabled selected>Selecione	o nível de fertilidade</option>
                            <option	value="baixa">Baixa</option>
                            <option	value="media">Média</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>
                </div>
            </fieldset> <!-- Fim fieldset caracteristicas -->
        </div>
        <!-- Botoes -->
        <div style="margin:0px">
            <button type="button" id="btn_cadastrar" class="btn btn-md btn-primary" onclick="cadastrar();">Cadastrar</button>    
            <button type="button" id="btn_salvar" class="btn btn-md btn-primary" disabled onclick="editar();">Salvar</button>    
            <button type="button" id="btn_editar" class="btn btn-md btn-primary" disabled>Editar</button>    
            <button type="button" id="btn_apagar" class="btn btn-md btn-primary" disabled onclick="apagar();">Apagar</button>    
        </div>
    </form> <!-- Fim formulario propriedade-->


    <!-- Tabela de Propriedades -->
    <table id="users_table" class="table table-hover table-bordered col-4">

        <thead class="thead-dark">
            <tr>
                <th scope="col" hidden>Id Dono</th>  
                <th scope="col">Id</th>
                <th scope="col">Propriedade</th>
                <th scope="col" hidden>Data</th>  
                <th scope="col">Valor</th>  
                <th scope="col" hidden>Percuso e Manobra</th>  
                <th scope="col" hidden>Solo</th>  
                <th scope="col" hidden>Relevo</th>  
                <th scope="col" hidden>Fertilidade</th>  
                <th scope="col">Tamanho</th>
                <th scope="col" hidden>Declividade</th>  
            </tr>
        </thead>
        <tbody>
            <?php
                    include_once 'dao/PropriedadeDAO.php';
                    include_once 'models/Propriedade.php';
                    $dao = new PropriedadeDAO();
                    $propriedades = $dao->pesquisar();
                    foreach ($propriedades as $p):
            ?>
                <tr>
                    <th id="id_dono" hidden><?= $p->getId_dono()?></th>
                    <th id="id_prop" scope="row"><?= $p->getId_propriedade()?></th>
                    <th id="nome_prop"><?= $p->getNome()?></th>
                    <th id="data_prop" hidden><?= $p->getData()?></th>
                    <th id="val_prop"><?= "R$".$p->getValor()?></th>
                    <th id="perc_man_prop" hidden><?= $p->getPercuso_manobra()?></th>
                    <th id="solo_prop" hidden><?= $p->getSolo()?></th>
                    <th id="relevo_prop" hidden><?= $p->getRelevo()?></th>
                    <th id="fertilidade_prop" hidden><?= $p->getFertilidade()?></th>
                    <th id="tam_prop"><?= $p->getTamanho()?></th>
                    <th id="declividade_prop" hidden><?= $p->getDeclividade()?></th>
                </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Fim da tabela de propriedades -->

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