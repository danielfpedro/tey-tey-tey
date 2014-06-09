$(function(){

	$('#btn-mais-comentarios').click(function(){
		var defaul_text = $(this).text();
		var loading_text = 'Carregando comentários';
		var final_text = 'Não há mais comentários para carregar';

		var $page = $('#comentarios-page');
		var page = $page.val();

		$this = $(this);

		var estabelecimento = $(this).attr('data-estabelecimento-id');

		$this.text(loading_text);

		$this.attr({disabled: true});

		$.post(webroot + 'ajax/mais_comentarios', {estabelecimento: estabelecimento, page: page}, function(data){
			page++;
			$page.val(page);
			//console.log(data);
			var comentarios = $.parseJSON(data);
			//console.log(comentarios);
			var total = comentarios.length;
			console.log(total);

			if (total > 0) {
				$.each(comentarios, function(key, value){
					//console.log(value);
					var media_wrap = $('<div/>').addClass('media-wrap');
					var media_thumb = $('<div/>').addClass('media-thumb');
					var thumb = $('<img/>').attr({src: webroot + 'img/Usuarios/' + value.Usuario.id + '/' + value.Usuario.Perfil.imagem});

					var media_body = $('<div/>').addClass('media-body');
						var h4 = $('<h4/>').text(value.Usuario.Perfil.name);
						var p = $('<p/>').text(value.Comentario.texto);

					var br_clear = $('<br />').css({clear: 'both'});

					$('#comentarios-container-pagination').append(media_wrap.append(media_thumb.append(thumb)).append(media_body.append(h4).append(p)).append(br_clear));

					$this.text(defaul_text).attr({disabled: false});
				});
			} else {
				$this.text(final_text);
			};
		});
	});
});