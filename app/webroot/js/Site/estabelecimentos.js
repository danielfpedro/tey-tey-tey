$(function(){

	$('div#estrelas-readonly').raty({
		score: function() {
			return $(this).attr('data-score');
		},		
		path: webroot + 'lib/raty-2.5.2/lib/img',
		readOnly: true,
	});
});