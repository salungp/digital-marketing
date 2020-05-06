// add class active id current url same href
$(function() {
  $('a[href="'+location.href+'"]').parents().addClass('active');
});

$(document).on('scroll', function() {
	if ($(document).scrollTop() > 100) {
		$('.navbar').addClass('fixed-top');
		$('.navbar').addClass('add-shadow');
    $('.back-to-top').show();
	} else if ($(document).scrollTop() < 100) {
		$('.navbar').removeClass('fixed-top');
		$('.navbar').removeClass('add-shadow');
    $('.back-to-top').hide();
	}
})

$('.back-to-top').on('click', function() {
  $(document).scrollTop(0)
})

function previewImage() {
  const fileReader = new FileReader();
  fileReader.readAsDataURL(document.getElementById('image-upload').files[0]);

  fileReader.onload = function(e) {
    $('.image-upload-wrapper').css({
      'background': `url(${e.target.result}) center center no-repeat`,
      'background-size': 'cover'
    });
  }
}