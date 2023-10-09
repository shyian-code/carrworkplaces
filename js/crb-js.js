jQuery(document).ready(function($) {
	let maxHeight = 0;
	let maxHeightRows = 0;

	$(window).on('load resize', function() {
		$('.pricing__head').equalizeHeight();

		$('.pricing__inner .pricing__row').each(function(i, row){
			const index = i + 1;
			$('.pricing__row:nth-child(' + index + ')').equalizeHeight();
		});
	})

	$('.js-more').on('click', function (e) {
		e.preventDefault();

		$(this).parent().siblings().toggleClass('is-shown');
	})
});

$.fn.equalizeHeight = function(){
	var maxHeight = 0, itemHeight;

	this.css('height', '');

	for (var i = 0; i < this.length; i++){
		itemHeight = $(this[i]).height();
		if (maxHeight < itemHeight) {
			maxHeight = itemHeight;
		}
	}

	return this.height(maxHeight);
};
