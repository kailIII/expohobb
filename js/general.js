(function ($) {
  $(document).ready(function(){
    deplegableMenuEfects();
    initSocialNetworks();
    initPuginsForms();
    removePreviewImages();
    initModals();
    //$.removeCookie('expohobby_revista');
    set_cookie();
    validar_mail();
    registro_mail();
    initRegistro();
    initMarquee();


    var count_image = 0;
    var agregar_image = '<div class="add-image"><input id="agregar_image" type="file" name="agregar_image" class="input_file_publicidad input_file" /></div>';
    var sacar_image = '<input id="sacar-image" class="btn_general btn-classic2" type="button" value="-" name="sacar_image" />';
    $('#agregar_image').live('change', function(){
      $(this).parent().append(sacar_image);
      count_image++;
      $('#agregar_image').attr("id","agregar_image_" + count_image).attr("name","agregar_image_" + count_image);
      $('.input_wapper_image').append(agregar_image);
    });
    $('#sacar-image').live('click', function(){
      $(this).parent().remove();
    });
  });
   
  function set_cookie(){
    if($.cookie('expohobby_revista')){
      $("a.ver-revista").click(function(){
        id = $(this).attr('id').split("_");
        window.location = "ver_revista.php?q="+id[1];
      });
    }else{
      
      $("a.ver-revista").click(function(){
        id = $(this).attr('id').split("_");
        $('#revista_id').val(id[1]);
      });
      $('.ver-revista').magnificPopup({
        type: 'inline',
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,   
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-slide-bottom',
        alignTop: true,
        fixedContentPos: true,
        callbacks: {
          close: function() {
            if($('#estado_registro').val() == 'fin'){
              window.location = "ver_revista.php?q=" + $('#revista_id').val();
            }
          }
        }
      });
    }
  }

  function registro_mail(){
    $('#btn_registrar_mail').click(function(){
      var mail = $('#registration_mail').val();
	    var mails=$("#registration_mail").attr('title');
      if(mails=="Mail valido"){
        $("#btn_registrar_mail").hide("slow");
        $("#cargador3").show("slow");
      }
      $.ajax({
        type: "POST",
        url: "controllers.php",
        data: { registration_mail: mail, revista_id: $('#revista_id').val()}
      }).done(function( msg ) {
        if(msg == 'ok_registro'){
          text = '<h3>Revista Expohobby</h3>';
          text += '<p>Gracias Por registrarse, para terminar <strong>debe acceder a su e-mail</strong> y validar la misma.<br /><br />Desde ya muchas gracias.</p>';
          text += '<input type="hidden" id="estado_registro" value="medio" />';
          text += '<button title="Close (Esc)" type="button" class="mfp-close">×</button></div>';
          $('div.modal_registration').html(text);
        }else if(msg == 'ok_verificacion'){
          text = '<h3>Revista Expohobby</h3>';
          text += '<p>Gracias por ingresar, ya puede acceder a nuestros contenidos, en unos segundos será redireccionado</p><br>';
		  text += '<div id="cargador4"></div>';
          text += '<input type="hidden" id="estado_registro" value="fin" />';
          text += '<input type="hidden" id="revista_id" value="' + $('#revista_id').val() + '" />';
          text += '<button title="Close (Esc)" type="button" class="mfp-close">×</button></div>';
          $('div.modal_registration').html(text);
          $.cookie('expohobby_revista', mail);
          setTimeout(function() {
            window.location.reload();
          }, 3000);
        } else if(msg == 'a_verificar'){
          text = '<h3>Revista Expohobby</h3>';
          text += '<p>Usted ya esta registrado, para terminar debe acceder a su mail y validar la misma.<br /><br />Desde ya muchas gracias.</p>';
          text += '<input type="hidden" id="estado_registro" value="medio" />';
          text += '<button title="Close (Esc)" type="button" class="mfp-close">×</button></div>';
          $('div.modal_registration').html(text);
        }
      });
    });
  }

  function removePreviewImages(){
    $('#small_image_marquee').change(function (){ 
      $('#preview_small_image').remove();
    });
    $('#big_image_marquee').change(function (){ 
      $('#preview_big_image').remove();
    });
    $('#image_revista').change(function (){ 
     $('#preview_image').remove();
    });
    $('#image_publicidad').change(function (){
     $('#preview_image').remove();
    });
    $('#image_empresa').change(function (){ 
      $('#preview_image_empresa').remove();
    });
    $('#image').change(function (){ 
      $('#preview_image_expo').remove();
    });
    $('#plano').change(function (){ 
      $('#preview_plano').remove();
    });
  }

  function initPuginsForms(){
    $('#type_marquee').change(function(){
      if($(this).val() == 'imagen'){
        var newHTML = '<label>Imagen Grande</label><input id="big_image" type="file" name="big_image" required="required" class="input_file_marquee input_file" />';
        $('#wrapper_type_marquee').html(newHTML);
      }else if($(this).val() == 'video'){
        var newHTML = '<label>URL del Video</label><input id="big_image" name="big_image"  type="text" required="required" class="input_text_revista input_text" />';
        $('#wrapper_type_marquee').html(newHTML);
      }
    });
    $(function() {
      $("#edicion").datepicker();
      $("#edicion").datepicker( "option", "dateFormat", "yy-mm-dd");
    });
    $(function() {
      $("#inicio").datepicker();
      $("#inicio").datepicker( "option", "dateFormat", "yy-mm-dd");
    });
    $(function() {
      $("#fin").datepicker();
      $("#fin").datepicker( "option", "dateFormat", "yy-mm-dd");
    });
  }

  function deplegableMenuEfects(){
    $('.deplegablemenu').hide();
    $("nav a").click(function(){
      $("nav a").removeClass('select');
      $(this).addClass('select');
      $('.deplegablemenu').hide();
    });
    $("a[title='Exposiciones']").click(function(){
      $('.deplegablemenu').show();
    });
    $(".deplegablemenu").mouseleave(function(){
      $('.deplegablemenu').hide();
      $("nav a").removeClass('select');
    });
  }

  function initSocialNetworks(){
    /*$('#redes-sociales sd').fadeTo('slow', 0.5);
    $('#redes-sociales sd').hover(function() {
      $(this).fadeTo('slow', 1.0);
    }, function() {
      $(this).fadeTo('slow', 0.5);
   });*/ 
  }

  function initModals(){
    $('.eliminar_marquee').magnificPopup({
      type: 'inline',
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,   
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom',
      alignTop: true,
      fixedContentPos: true
    });

    $('.eliminar_revista').magnificPopup({
      type: 'inline',
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,   
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom',
      alignTop: true,
      fixedContentPos: true
    });

    $('.eliminar_publicidad').magnificPopup({
      type: 'inline',
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,   
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom',
      alignTop: true,
      fixedContentPos: true
    });
    
	$('.seleccionar_us').magnificPopup({
      type: 'inline',
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,   
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom',
      alignTop: true,
      fixedContentPos: true
    });


    $('#btn_cancelar').live('click',function(){
      $.magnificPopup.close();
    });
	  $('.btn_abrir_pop_up').magnificPopup({
      type: 'inline',
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,   
      midClick: true,
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom',
      alignTop: true,
      fixedContentPos: true
    });
  }

  function validar_mail() {
    $('#btn_registrar_mail').prop("disabled", true);
    $('#registration_mail').keyup(function(){
      validar = $('#registration_mail').val();
      regex = /^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/;
      resultado = regex.test(validar);
      if (resultado) {
        $('#registration_mail').css('border-color','green');
        $('#registration_mail').css('border-radius','5px');
        $('#registration_mail').attr('title','Mail valido');
        $('#btn_registrar_mail').prop("disabled", false);

      }
      else
      {
        $('#registration_mail').css('border-color','red');
        $('#registration_mail').css('border-radius','5px');
        $('#registration_mail').attr('title','Mail invalido');
        $('#btn_registrar_mail').prop("disabled", true);
      }
    })
  }
  function initMarquee(){
		$("#editar_marquee").click(function(){
			//$("#editar_marquee").hide("slow");
			//$("#cargador").show("slow");
    });  
  }
  function initRegistro(){
    $("#enviar_contacto").click(function(){
      var mail=$("#registration_mail").attr('title');
      var nombre=$("#nombre").attr('value');
      var comentario=$("#comentario").attr('value');
      if(mail=="Mail valido" && nombre!="" && comentario!=""){
        $("#enviar_contacto").hide("slow");
        $("#cargador2").show("slow");
      }
    });
  }
  
  
})(jQuery);