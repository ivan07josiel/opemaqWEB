// Scripts para interacao da pagina //
var novo, sucata, uso_anual, vida_util

function verificaCampos() {
    // Verifica se todos os campos estão preenchidos dentro do each 
    var isValid = true;
    $(classe).each(function() {
      var element = $(this);
      if (element.val() == "") { 
        return isValid = false;
      }
  
    }); // each Function
  
    return isValid;
}

function calculaJuros() {
    var impostos = parseFloat($('#impostos').val());
    juros = ((((novo + 0,1 * novo) / 2) * impostos) / uso_anual);
    $("#taxa_juros").val(juros);
}

function calculaAlojamento() {
    var alojamento = (0.02 * novo / uso_anual);
    $("#custo_alojamento_seguro").val(alojamento);
}

function calculaDepreciacao() {
    var vidaUtil = parseFloat($('#vida_util_horas').val());
    var depreciacao = (novo - sucata / vidaUtil);
    $("#depreciacao").val(depreciacao.toFixed(2));
}

function calculaCustoFixo() {
    var impostos = parseFloat($('#impostos').val());
    var alojamento = parseFloat($('#custo_alojamento_seguro').val());
    var custoFixo = (novo * (((1-sucata)/vida_util) + ((((1 + sucata)/2)*impostos) + alojamento)));
    $("#custo_fixo_total").val(custoFixo.toFixed(2));
}

function calcular() {
    calculaAlojamento();
    calculaJuros();
    calculaDepreciacao();
    calculaCustoFixo();
}

// AJAX //
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
  $('#id_trator').change(function (){
    var idTrator = $(this).val();
    
    $.ajax({
        type: 'get',
        url: idTrator + '/getTrator',
        dataType: 'json',
        success: function (trator) {
            $.each(trator, function (key, value){
                novo = parseFloat(value.novo); 
                sucata = parseFloat(value.sucata);
                uso_anual = parseFloat(value.uso_anual);
                vida_util = parseFloat(value.vida_util);
            })

            calcular();
            // verificaCampos();
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
  });