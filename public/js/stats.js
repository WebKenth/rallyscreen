$(document).ready(function() {

	var seconds;
	var minutes;
	var progress;
	var child = 1;
	var random = Math.floor((Math.random() * 150000) + 270000);

	updateCounter = function() {
		seconds = parseInt($('.player-list .time > .counter > .seconds').text());
		minutes = parseInt($('.player-list .time > .counter > .minutes').text());

		if(seconds < 59) {
			++seconds;

			if(seconds < 10) {
				seconds = ('0' + seconds).slice(-2);
			}
		} else {
			seconds = 0;
			++minutes;
			if(minutes < 10) {
				minutes = ('0' + minutes).slice(-2);
			}
		}

		$('.player-list .time > .counter > .seconds').text(seconds);
		$('.player-list .time > .counter > .minutes').text(minutes);
	}

	updateProgress = function() {
		progress = $('.player-list .time > .progress').attr('data-progress');
		if(progress < 100) {
			$('.player-list .time > .progress').attr('data-progress', ++progress);
		}	
	}

	updateFuel = function() {
		$('.end > .total').text(Math.floor((Math.random() * 4) + 12) + ',' + Math.floor((Math.random() * 10) + 0) + ' km/l');
	}

	updateSections = function() {
		$('.player-list .right > .sections > .section:nth-child(' + child + ')').text($('.end > .total').text());
		++child;
		random = Math.floor((Math.random() * 150) + 270);

		if(child > 5) {
			clearInterval(sections);
		}
	}

	var counter = setInterval(updateCounter, 1000);
	var fuel = setInterval(updateFuel, 2850);
	var progressbar = setInterval(updateProgress, 15600);
	var sections = setInterval(updateSections, random);

});