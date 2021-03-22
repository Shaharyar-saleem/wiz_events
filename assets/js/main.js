$(document).ready(function() {
	$('[data-toggle="tooltip"]').tooltip({
		placement: "bottom"
	});

	var inview = new Waypoint.Inview({
		element: $(".event-of-week")[0],
		enter: function (direction, e) {
			console.log(this.element);
			if (!$(this.element).hasClass('slideInLeft')) {
				console.log("Hello");
				
				$(this.element).addClass('slideInLeft');
			}
		},
	});

	$(".show-more-event").click(function(e) {
		e.preventDefault();
		const parent = $(this).parents(".event-list");
		const activeIndex = parent.find(".event-item.active");
		const nextSibling = activeIndex.nextAll(".event-item").first();
		if (nextSibling.length > 0) {
			activeIndex.slideUp("slow", function() {
				activeIndex.removeClass("active");
			});
			nextSibling.slideUp("fast", function() {
				$(nextSibling).addClass("active");
			});
		}
	});

	$("[data-link]").click(function() {
		const url = $(this).attr("data-link");
		if (url.length > 0) {
			window.location.href = url;
		}
	});

	$("[data-js=check-toggle]").on("change load", function(e) {
		const target = $(this).attr("data-target");
		const value = $(this).attr("data-value");
		if ($(this).val() === value) {
			$(target).show();
		} else {
			$(target).hide();
		}
	});

	$("[data-js=checkbox-toggle]").on("change load", function(e) {
		const target = $(this).attr("data-target");
		if ($(this).is(":checked")) $(target).show();
		else $(target).hide();
	});

	$("[data-picker=time]")
		.daterangepicker({
			timePicker: true,
			timePicker24Hour: false,
			timePickerIncrement: 1,
			locale: {
				format: "hh:mm a"
			}
		})
		.on("show.daterangepicker", function(ev, picker) {
			picker.container.find(".calendar-table").hide();
		});

	$(".dropdown .dropdown-toggle").click(function(e) {
		// e.preventDefault();
		const parent = $(this).parent();
		const target = $(parent).find(".dropdown-menu");
		$(target).toggleClass("shown");
	});

	$(".floating__input input[value='']").val("");

	// $(".calender").clndr();

	$("[data-select=true]").select2({
		maximumSelectionLength: 3,
		placeholder: "Select a Industry"
	});

	$("#identity").on("change load", function(e) {
		var is_industry = $("option:selected", this).attr("data-industry");
		if (is_industry == 1) {
			$("#industry")
				.parent()
				.hide();
		} else {
			$("#industry")
				.parent()
				.show();
		}
	});

	$(".user-photos").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		dots: true,
		centerMode: true,
		focusOnSelect: true,
		centerPadding: "15px",
		nextArrow:
			'<button type="button" class="slide-next"><i class="fas fa-angle-right"></i></button>',
		prevArrow:
			'<button type="button" class="slide-prev"><i class="fas fa-angle-left"></i></button>'
	});

	$(".home-carousel").slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		centerMode: true,
		centerPadding: "0",
		autoplay: true,
		autoplaySpeed: 3000,
		nextArrow:
			'<button type="button" class="slide-next"><i class="fas fa-angle-right"></i></button>',
		prevArrow:
			'<button type="button" class="slide-prev"><i class="fas fa-angle-left"></i></button>'
	});

	// $(".post-slider").slick({
	// 	slidesToShow: 1,
	// 	slidesToScroll: 1,
	// 	arrows: true,
	// 	dots: false,
	// 	centerMode: true,
	// 	centerPadding: "0",
	// 	autoplay: true,
	// 	autoplaySpeed: 3000
	// });
});

function myFunction(x) {
  if (x.matches) { 
  	$(".post-slider").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		centerMode: true,
		centerPadding: "0",
		autoplay: true,
		autoplaySpeed: 3000
	});
  } else {
   $(".post-slider").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		centerMode: true,
		centerPadding: "0",
		autoplay: true,
		autoplaySpeed: 3000
	});
  }
}

var x = window.matchMedia("(max-width: 600px)")
myFunction(x)
x.addListener(myFunction)


let map;
let geocoder;
function initMap() {
	const mapElement = document.getElementById("map");
	if (mapElement) {
		geocoder = new google.maps.Geocoder();
		map = new google.maps.Map(document.getElementById("map"), {
			center: { lat: -34.397, lng: 150.644 },
			zoom: 8
		});
		const autoCompleteInput = document.getElementsByClassName("place-search");
		const autocomplete = new google.maps.places.Autocomplete(
			autoCompleteInput[0]
		);
		const autocomplete2 = new google.maps.places.Autocomplete(
			autoCompleteInput[1]
		);

		autocomplete.addListener("place_changed", function() {
			const place = autocomplete.getPlace();
			$(".place-search").val(place.formatted_address);

			addMarker(place.geometry.location, map);
			map.setCenter(place.geometry.location);
		});

		autocomplete2.addListener("place_changed", function() {
			const place = autocomplete2.getPlace();
			$(".place-search").val(place.formatted_address);
			addMarker(place.geometry.location, map);
			map.setCenter(place.geometry.location);
		});

		google.maps.event.addListener(map, "click", function(event) {
			geocoder.geocode({ location: event.latLng }, function(results, status) {
				console.log(results[0]);
				if (status == "OK") {
					map.setCenter(results[0].geometry.location);
					addMarker(results[0].geometry.location, map);
					document.querySelector("input.address-input").value =
						results[0].formatted_address;
					document.querySelector("#place-search").value =
						results[0].formatted_address;
				} else {
					alert(
						"Geocode was not successful for the following reason: " + status
					);
				}
			});
		});
	}
}
let marker;
function addMarker(location, map) {
	if (marker) {
		marker.setMap(null);
	}
	marker = new google.maps.Marker({
		position: location,
		map: map
	});
}


(function() {
		const heart = document.getElementById('heart');
		heart.addEventListener('click', function() {
			heart.classList.toggle('red');
		});
	})();
	(function() {
		const heart = document.getElementById('heart2');
		heart.addEventListener('click', function() {
			heart.classList.toggle('red');
		});
	})();


(function() {
  var ReadMore = function(element) {
    this.element = element;
    this.moreContent = this.element.getElementsByClassName('js-read-more__content');
    this.count = this.element.getAttribute('data-characters') || 200;
    this.counting = 0;
    this.btnClasses = this.element.getAttribute('data-btn-class');
    this.ellipsis = this.element.getAttribute('data-ellipsis') && this.element.getAttribute('data-ellipsis') == 'off' ? false : true;
    this.btnShowLabel = 'Read more';
    this.btnHideLabel = 'Read less';
    this.toggleOff = this.element.getAttribute('data-toggle') && this.element.getAttribute('data-toggle') == 'off' ? false : true;
    if( this.moreContent.length == 0 ) splitReadMore(this);
    setBtnLabels(this);
    initReadMore(this);
  };

  function splitReadMore(readMore) { 
    splitChildren(readMore.element, readMore); // iterate through children and hide content
  };

  function splitChildren(parent, readMore) {
    if(readMore.counting >= readMore.count) {
      Util.addClass(parent, 'js-read-more__content');
      return parent.outerHTML;
    }
    var children = parent.childNodes;
    var content = '';
    for(var i = 0; i < children.length; i++) {
      if (children[i].nodeType == Node.TEXT_NODE) {
        content = content + wrapText(children[i], readMore);
      } else {
        content = content + splitChildren(children[i], readMore);
      }
    }
    parent.innerHTML = content;
    return parent.outerHTML;
  };

  function wrapText(element, readMore) {
    var content = element.textContent;
    if(content.replace(/\s/g,'').length == 0) return '';// check if content is empty
    if(readMore.counting >= readMore.count) {
      return '<span class="js-read-more__content">' + content + '</span>';
    }
    if(readMore.counting + content.length < readMore.count) {
      readMore.counting = readMore.counting + content.length;
      return content;
    }
    var firstContent = content.substr(0, readMore.count - readMore.counting);
    firstContent = firstContent.substr(0, Math.min(firstContent.length, firstContent.lastIndexOf(" ")));
    var secondContent = content.substr(firstContent.length, content.length);
    readMore.counting = readMore.count;
    return firstContent + '<span class="js-read-more__content">' + secondContent + '</span>';
  };

  function setBtnLabels(readMore) { // set custom labels for read More/Less btns
    var btnLabels = readMore.element.getAttribute('data-btn-labels');
    if(btnLabels) {
      var labelsArray = btnLabels.split(',');
      readMore.btnShowLabel = labelsArray[0].trim();
      readMore.btnHideLabel = labelsArray[1].trim();
    }
  };

  function initReadMore(readMore) { // add read more/read less buttons to the markup
    readMore.moreContent = readMore.element.getElementsByClassName('js-read-more__content');
    if( readMore.moreContent.length == 0 ) {
      Util.addClass(readMore.element, 'read-more--loaded');
      return;
    }
    var btnShow = ' <button class="js-read-more__btn '+readMore.btnClasses+'">'+readMore.btnShowLabel+'</button>';
    var btnHide = ' <button class="js-read-more__btn is-hidden '+readMore.btnClasses+'">'+readMore.btnHideLabel+'</button>';
    if(readMore.ellipsis) {
      btnShow = '<span class="js-read-more__ellipsis" aria-hidden="true">...</span>'+ btnShow;
    }

    readMore.moreContent[readMore.moreContent.length - 1].insertAdjacentHTML('afterend', btnHide);
    readMore.moreContent[0].insertAdjacentHTML('afterend', btnShow);
    resetAppearance(readMore);
    initEvents(readMore);
  };

  function resetAppearance(readMore) { // hide part of the content
    for(var i = 0; i < readMore.moreContent.length; i++) Util.addClass(readMore.moreContent[i], 'is-hidden');
    Util.addClass(readMore.element, 'read-more--loaded'); // show entire component
  };

  function initEvents(readMore) { // listen to the click on the read more/less btn
    readMore.btnToggle = readMore.element.getElementsByClassName('js-read-more__btn');
    readMore.ellipsis = readMore.element.getElementsByClassName('js-read-more__ellipsis');

    readMore.btnToggle[0].addEventListener('click', function(event){
      event.preventDefault();
      updateVisibility(readMore, true);
    });
    readMore.btnToggle[1].addEventListener('click', function(event){
      event.preventDefault();
      updateVisibility(readMore, false);
    });
  };

  function updateVisibility(readMore, visibile) {
    for(var i = 0; i < readMore.moreContent.length; i++) Util.toggleClass(readMore.moreContent[i], 'is-hidden', !visibile);
    // reset btns appearance
    Util.toggleClass(readMore.btnToggle[0], 'is-hidden', visibile);
    Util.toggleClass(readMore.btnToggle[1], 'is-hidden', !visibile);
    if(readMore.ellipsis.length > 0 ) Util.toggleClass(readMore.ellipsis[0], 'is-hidden', visibile);
    if(!readMore.toggleOff) Util.addClass(readMore.btn, 'is-hidden');
    // move focus
    if(visibile) {
      var targetTabIndex = readMore.moreContent[0].getAttribute('tabindex');
      Util.moveFocus(readMore.moreContent[0]);
      resetFocusTarget(readMore.moreContent[0], targetTabIndex);
    } else {
      Util.moveFocus(readMore.btnToggle[0]);
    }
  };

  function resetFocusTarget(target, tabindex) {
    if( parseInt(target.getAttribute('tabindex')) < 0) {
      target.style.outline = 'none';
      !tabindex && target.removeAttribute('tabindex');
    }
  };

  //initialize the ReadMore objects
  var readMore = document.getElementsByClassName('js-read-more');
  if( readMore.length > 0 ) {
    for( var i = 0; i < readMore.length; i++) {
      (function(i){new ReadMore(readMore[i]);})(i);
    }
  };
}());

(function() {
  const heart = document.getElementById('heart');
  heart.addEventListener('click', function() {
    heart.classList.toggle('red');
  });
})();

var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

$(document).ready(function() {
  $("#toggle").click(function() {
    var elem = $("#toggle").text();
    if (elem == "Read More") {
      //Stuff to do when btn is in the read more state
      $("#toggle").text("Read Less");
      $("#text").slideDown();
    } else {
      //Stuff to do when btn is in the read less state
      $("#toggle").text("Read More");
      $("#text").slideUp();
    }
  });
});

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});


  $(document).ready(function() {
  $("#myCarousel").on("slide.bs.carousel", function(e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 3;
    var totalItems = $(".carousel-item").length;

    if (idx >= totalItems - (itemsPerSlide - 1)) {
      var it = itemsPerSlide - (totalItems - idx);
      for (var i = 0; i < it; i++) {
        // append slides to end
        if (e.direction == "left") {
          $(".carousel-item")
            .eq(i)
            .appendTo(".carousel-inner");
        } else {
          $(".carousel-item")
            .eq(0)
            .appendTo($(this).find(".carousel-inner"));
        }
      }
    }
  });
});
 
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});