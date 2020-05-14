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

// select link or upload
function switchInputType(changer) {
  $(changer).on('change', function(e) {
    let val = e.target.value;
    let targetWrapper = $(this).next();
    let dataValue = targetWrapper.data('link');
    let link = `<label for="link">Link</label>
                <input type="text" id="link" name="image" class="form-control" placeholder="Masukkan link" value="${typeof dataValue != 'undefined' ? dataValue : ''}">`;
    let upload = `<label for="upload">Upload</label>
                  <input type="file" id="upload" name="image" class="form-control" placeholder="Masukkan link">`;

    if (val === 'link') {
      targetWrapper.html(link);
    } else {
      targetWrapper.html(upload);
    }
  });
}

// initialize
switchInputType('#media-create');

// make preview image
$('.image-preview-button').on('click', function() {
  let wrapper = $(this).parents('.image-preview');
  wrapper.addClass('image-preview-active');
});

$('.image-preview-close').on('click', function() {
  let wrapper = $(this).parents('.image-preview');
  wrapper.removeClass('image-preview-active');
});