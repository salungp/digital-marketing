<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/script.js'); ?>"></script>
<script type="text/javascript">
    AOS.init()
    $('.play-video').on('click', function(e) {
        $(this).prev().hide();
        $(this).parents('.video-section').css('background', 'none');
        $(this).next().removeClass('d-none')
        $(this).hide();
        document.querySelector('.video-obj').play()
    });

	$('.owl-carousel').owlCarousel({
        loop:true,
        autoplay: true,
        margin:20,
        nav:true,
        padding: 50,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    })
</script>