// Mobile Menu

$ = jQuery;
$( document ).on( 'click', '.menu-bar', function(){
	$( '.menu' ).slideToggle();
	return false;
} );

// Menu disappearing fix
$( window ).resize( function(){
	if ( !$( '.menu-bar' ).is( ':visible' ) ) {
		$( '.menu' ).removeAttr( 'style' );
	}
} );

// Accordians
$( document ).on( 'click', 'a.accordian-link', function(){
	var $this = $( this );
	$this.closest( '.accordian-container' ).toggleClass( 'active' ).find( '.accordian-content' ).slideToggle();
	return false;
} );

// tabs
$( document ).on( 'click', '.tabs a', function(){
	var $this = $( this );
	if ( !$this.hasClass( 'active' ) ) {
		var tabId = $this.attr( 'href' );
		$( '.tab-content.active' ).fadeOut( function(){
			$( tabId ).fadeIn( function(){
				$( '.tab-content.active' ).removeClass( 'active' );
				$( tabId ).addClass( 'active' );
				$( '.tabs .active' ).removeClass( 'active' );
				$this.addClass( 'active' );
			} );
		} );
	}
	return false;
} );

// Tabs View for weeks
$( document ).on( 'click', '.tabs-timetable', function(){
	var $this = $( this );
	if ( !$this.hasClass( 'active' ) ) {
		var tabId = $this.find('a').attr( 'href' );

        $( '.tab-content-timetable.active' ).fadeOut(1, function(){
			$( tabId ).fadeIn( function(){
				$( '.tab-content-timetable.active' ).removeClass( 'active' ).addClass('hide');
                $( tabId ).addClass( 'active' ).removeClass( 'hide' );
				$( '.tabs-timetable.active' ).removeClass( 'active' );
				$this.addClass( 'active' );
			});
		});
	}
	return false;
} );



//
$(document).ready(function() {

	$('.main-slider').flexslider({
        animation: "slide",
        directionNav : false,
        controlNav: true,
        animationLoop: true,
    });

    $('.member-slide').flexslider({
        animation: "slide",
        directionNav : true,
        controlNav: false,
        animationLoop: true,
        itemWidth: 250,
        itemMargin:70,
        minItems: 1,
        maxItems: 3
    });

    $(".reformer-slider").slick({
        centerMode:true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        infinite: true,
        cssEase: 'linear',
        variableWidth: true,
        variableHeight: true
    });

    // Career Popup
    $('.popup-close').click(function (event) {
        event.preventDefault();
    	$(this).closest('.pop-wrapper').addClass('hide');
    });

    $('.hhw_show_role_info').click(function (event) {
        event.preventDefault();

    	var job = $(this);
		var poPupId = job.data('popup-id');

		$('[data-popup-id="'+poPupId+'"]').removeClass('hide');
    });

    $('[data-show-contact="1"]').click(function (event) {
        event.preventDefault();

        var applyNow = $(this);

        var jobDetails = applyNow.closest('.popup-job-details');
        jobDetails.addClass('hide');
        jobDetails.siblings('.pop-form').removeClass('hide');
        var position = jobDetails.siblings('.options-position').html();

        if(position) {
            $("select[name='position_interest']").html(position);
        }
	});

    // End career popup

    $('[data-map-id]').click(function (evnt) {
        event.preventDefault();

        var facility = $(this);

        var blockId = facility.data('map-id');

        if(blockId) {
            $('.hhw-facilities-single-block').addClass('hide');
            $('[data-map-id]').removeClass('active-facility');
            $('[data-block-id="'+blockId+'"]').removeClass('hide');
            facility.addClass('active-facility');
        }

    });

    //checked-gym-facilities

    $('[data-type="facility-interest"]').click(function (evnt) {
        event.preventDefault();

        var currentCheckbox =  $(this);
        var currentFacility = currentCheckbox.val();

        if( currentFacility ) {
            currentFacility = currentFacility+',';
        }

        var selectedFacilities = $('.checked-gym-facilities').val();

        if( currentCheckbox.checked ) {
            selectedFacilities = selectedFacilities+currentFacility;

        } else {
            selectedFacilities = selectedFacilities.replace(currentFacility, "");
        }

        $('.checked-gym-facilities').val(selectedFacilities);
    });

});

