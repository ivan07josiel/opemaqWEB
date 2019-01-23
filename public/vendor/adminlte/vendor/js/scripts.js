// Scripts para interacao da pagina //
function verificaCampos(classe) {
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

$('.tdValidation').on("keyup click", function() {
  classe = $('.tdValidation');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    nt = parseInt($("#nt").val());
    ndf = parseInt($("#ndf").val());
    nimp = parseInt($("#nimp").val());
    jt = parseInt($("#jt").val());
    eg = parseInt($("#eg").val());
    
    td = (nt-(ndf + nimp)) * (jt*eg);
    $(".td").val(td);
    roValidation();
  }
  else {
    $(".td").val("");
    roValidation();
  }
});

$('.roValidation').on("keyup click", function() {
  roValidation();
});

function roValidation() {
  classe = $('.roValidation');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    at = parseFloat($("#at").val());
    td = parseFloat($("#td").val());
    
    ro =  at / td;
    $(".ro").val(ro);
  }
  else {
    $(".ro").val("");
  }
}

$('.cctValidation').on("keyup click", function() {
  cctValidation();
});

function cctValidation() {
  classe = $('.cctValidation');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    v = parseFloat($("#vcct").val());
    l = parseFloat($("#l").val());
    nump = parseFloat($("#numpcct").val());
    
    cct =  v * l / (10 * nump);
    $(".cct").val(cct);
  }
  else {
    $(".cct").val("");
  }
}

$('.cceValidation').on("keyup click", function() {
  cceValidation();
});

function cceValidation() {
  classe = $('.cceValidation');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    vcce = parseFloat($("#vcce").val());
    lcce = parseFloat($("#lcce").val());
    numpcce = parseFloat($("#numpcce").val());
    ec = parseFloat($("#eccce").val());
    
    cce =  vcce * lcce / (10 * numpcce) * ec;
    $(".cce").val(cce);
  }
  else {
    $(".cce").val("");
  }
}

$('.tmValidation').on("keyup click", function() {
  classe = $('.tmValidation');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    tp = parseFloat($("#tp").val());
    ti = parseFloat($("#ti").val());
    tpr = parseFloat($("#tpr").val());
    
    tm =  tp + ti + tpr;
    $(".tm").val(tm);
    ccoValidation();
  }
  else {
    $(".tm").val("");
    ccoValidation();
  }
});

$('.ccoValidation').on("keyup click", function() {
  ccoValidation();
});

function ccoValidation() {
  classe = $('.ccoValidation');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    atot = parseFloat($("#atot").val());
    tm = parseFloat($("#tm").val());

    cco =  atot/tm;
    $(".cco").val(cco);
  }
  else {
    $(".cco").val("");
  }
}

$('#btnec').click(function(){
  classe = $('.efcValidation');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    tpro = parseFloat($("#tpro").val());
    timp = parseFloat($("#timp").val());

    efc =  (tpro/timp);
    $("#efc").val(efc);
  }
  else {
    $("#efc").val("");
  }
});

$('#btnnc').click(function(){
  classe = $('.nc');
  isValid = verificaCampos(classe);

  if(isValid){
    // Recuperando valores dos campos
    ro = parseFloat($("#ro").val());
    cco = parseFloat($("#cco").val());

    nc =  (ro/cco);
    $("#nc").val(nc);
  }
  else {
    $("#nc").val("");
  }
});


$("#btn_cadastrar").on('click', function(){
  if($("#nc").val() =="" || $("#efc").val() ==""){
    alert("Um ou mais campos em branco!");      
    return false;
  }
});

// AJAX //
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#operacao').change(function (){
  var idOperacao = $(this).val();
  
  $.ajax({
      type: 'get',
      url: idOperacao + '/getlargura',
      dataType: 'json',
      success: function (largura) {
          $.each(largura, function (key, value){
              $('.l').val(value.tamanho);
          })
          cctValidation();
          cceValidation();
      },
      error: function (data) {
          console.log('Error:', data);
      }
  });
});


// Select2 //
$(document).ready(function() {
  $('.select2').select2();
});
