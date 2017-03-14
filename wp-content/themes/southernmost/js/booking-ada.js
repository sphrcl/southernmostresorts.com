


// Calendar elements

var $this_input,
	$calendar_wrap,
	calendar_wrap_id,
	$focused_input_class,
	$calendar_table,
	calendar_cell_today,
	calendar_cell_month,
	calendar_cell_year,
	calendar_cell_active,
	calendar_cell_focused,
	calendar_cell_default,
	calendar_cell_highlighted,
	$prev,
	$next,
	$prev_text,
	$next_text,
	prev_class,
	next_class,
	prev_class_only,
	next_class_only,
	day_wrapper,
	calendar_summary = 'A calendar to select your arrival. The week in this calendar starts on a Sunday. Your current position is today. Press right to highlight tomorrow.',
	ENABLED_SELECTOR;



var calendar_cell_today_class,
	calendar_cell_default_class,
	calendar_cell_month_class,
	calendar_cell_year_class,
	calendar_cell_active_class,
	calendar_cell_focused_class,
	calendar_cell_highlighted_class,
	calendar_cell_highlighted_class_only,
	calendar_cell_default_class_only,
	calendar_cell_focused_class_only;
	// todo: create Arrival or Departure field state
	// field_state;



$(document).ready(function() {
	dayTripper();
});



function dayTripper() {

	var $booking_activator = $('.hasDatepicker');

	$booking_activator.bind('click focus', function () {

		setTimeout(function () {

		$this_input = $(this);
		$calendar_wrap = $('#ui-datepicker-div');
		calendar_wrap_id = '#ui-datepicker-div';
		$calendar_table = $calendar_wrap.find('table');
		$focused_input_class = $(this).attr('class');
		$prev = $calendar_wrap.find('.picker__nav--prev');
		$next = $calendar_wrap.find('.picker__nav--next');
		$prev_text = $prev.attr('title');
		$next_text = $next.attr('title');


		// Calendar state classes - with the '.' except for calendar_cell_highlighted_class_only

		calendar_cell_today_class = '.ui-datepicker-today a';
		calendar_cell_default_class_only = 'ui-state-default';
		calendar_cell_month_class = '.ui-datepicker-month';
		calendar_cell_year_class = '.ui-datepicker-year';
		calendar_cell_active_class = '.ui-state-active';
		calendar_cell_focused_class = '.ui-state-focus';
		calendar_cell_current_class = '.ui-datepicker-current';
		calendar_cell_highlighted_class_only = 'ui-state-highlight';
		calendar_cell_highlighted_class = '.' + calendar_cell_highlighted_class_only;
		calendar_cell_default_class = '.' + calendar_cell_default_class_only;
		calendar_cell_focused_class_only = 'picker__day--infocus';
		day_wrapper = 'a';
		prev_class_only = 'ui-datepicker-prev';
		next_class_only = 'ui-datepicker-next';
		prev_class = '.' + prev_class_only;
		next_class = '.' + next_class_only;
		// todo: create Arrival or Departure field state
		// field_state = $this_input.attr


		calendar_cell_today = $calendar_wrap.find(calendar_cell_today_class);
		calendar_cell_default = $calendar_wrap.find(calendar_cell_default_class);
		calendar_cell_month = $calendar_wrap.find(calendar_cell_month_class);
		calendar_cell_year = $calendar_wrap.find(calendar_cell_year_class);
		calendar_cell_active = $calendar_wrap.find(calendar_cell_active_class);
		calendar_cell_focused = $calendar_wrap.find(calendar_cell_focused_class);
		calendar_cell_highlighted = $calendar_wrap.find(calendar_cell_highlighted_class);

			var today = $(calendar_wrap_id + ' ' + calendar_cell_today_class)[0];

			if (!today) {
				today = $(calendar_wrap_id + ' ' + calendar_cell_active_class)[0] ||
						$(calendar_wrap_id + ' ' + calendar_cell_default_class)[0];
			}

		
			// Hide the entire page (except the date picker)
			// from screen readers to prevent document navigation
			// (by headings, etc.) while the popup is open
			// $("main").attr('id','dp-container');
			// $("#dp-container").attr('aria-hidden','true');
			// $("#skipnav").attr('aria-hidden','true');

			// Hide the "today" button because it doesn't do what 
			// you think it supposed to do
			$(calendar_wrap_id + ' ' + calendar_cell_current_class).hide();

			$(today).focus();
			datePickHandler();

		}, 0);
	});

}



function datePickHandler() {

	var activeDate;
	var container = $calendar_wrap[0];
	var table = $calendar_table[0];
	var input = document.getElementById('arrival_date');
	
	// if (!container || !input) {
	// 	return;
	// }

	$(container).find('table').first().attr('role', 'grid');

	container.setAttribute('role', 'application');
	container.setAttribute('aria-label', 'Calendar date-picker');
	table.setAttribute('summary', 'A datepicker calendar application to set your booking dates. The week in this calendar starts on a Sunday. Your current position is today. Press right to highlight tomorrow.');

	// the top controls:
	var prev = $(calendar_wrap_id + ' ' + prev_class)[0],
		next = $(calendar_wrap_id + ' ' + next_class)[0],
		prev_text = $(calendar_wrap_id + ' ' + prev_class + ' span'),
		next_text = $(calendar_wrap_id + ' ' + next_class + ' span');

// This is the line that needs to be fixed for use on pages with base URL set in head
	next.href = 'javascript:void(0)';
	prev.href = 'javascript:void(0)';

	prev_text.html('Previous');
	next_text.html('Next');

	next.setAttribute('role', 'button');
	next.removeAttribute('title');
	prev.setAttribute('role', 'button');
	prev.removeAttribute('title');

	appendOffscreenMonthText(next);
	appendOffscreenMonthText(prev);

	// delegation won't work here for whatever reason, so we are
	// forced to attach individual click listeners to the prev /
	// next month buttons each time they are added to the DOM
	$(next).on('click', handleNextClicks);
	$(prev).on('click', handlePrevClicks);

	monthDayYearText();

	$(container).on('keydown', function calendarKeyboardListener(keyVent) {
		var which = keyVent.which;
		var target = keyVent.target;
		var dateCurrent = getCurrentDate(container);

		if (!dateCurrent) {
			dateCurrent = $(calendar_wrap_id + ' ' + calendar_cell_default_class)[0];
			setHighlightState(dateCurrent, container);
		}

		if (27 === which) {
			keyVent.stopPropagation();
			return closeCalendar();
		} else if (which === 9 && keyVent.shiftKey) { // SHIFT + TAB
			keyVent.preventDefault();
			if ($(target).hasClass('ui-datepicker-close')) { // close button
			$(calendar_wrap_id + ' ' + prev_class)[0].focus();
			} else if ($(target).hasClass(calendar_cell_default_class_only)) { // a date link
			$(calendar_wrap_id + ' ' + '.close-dp')[0].focus();
			} else if ($(target).hasClass(prev_class_only)) { // the prev link
			$(calendar_wrap_id + ' ' + next_class)[0].focus();
			} else if ($(target).hasClass(next_class_only)) { // the next link
			activeDate = $(calendar_wrap_id + ' ' + calendar_cell_highlighted_class) ||
						$(calendar_wrap_id + ' ' + calendar_cell_active_class)[0];
			if (activeDate) {
				activeDate.focus();
			}
			}
		} else if (which === 9) { // TAB
			keyVent.preventDefault();
			if ($(target).hasClass('ui-datepicker-close')) { // close button
			activeDate = $(calendar_wrap_id + ' ' + calendar_cell_highlighted_class) ||
						$(calendar_wrap_id + ' ' + calendar_cell_active_class)[0];
			if (activeDate) {
				activeDate.focus();
			}
			} else if ($(target).hasClass(calendar_cell_default_class_only)) {
			$(calendar_wrap_id + ' ' + next_class)[0].focus();
			} else if ($(target).hasClass(next_class_only)) {
			$(calendar_wrap_id + ' ' + prev_class)[0].focus();
			} else if ($(target).hasClass(prev_class_only)) {
			$(calendar_wrap_id + ' ' + '.close-dp')[0].focus();
			} 
		} else if (which === 37) { // LEFT arrow key
			// if we're on a date link...
			if (!$(target).hasClass('ui-datepicker-close') && $(target).hasClass(calendar_cell_default_class_only)) {
			keyVent.preventDefault();
			previousDay(target);
			}
		} else if (which === 39) { // RIGHT arrow key
			// if we're on a date link...
			if (!$(target).hasClass('ui-datepicker-close') && $(target).hasClass(calendar_cell_default_class_only)) {
			keyVent.preventDefault();
			nextDay(target);
			}
		} else if (which === 38) { // UP arrow key
			if (!$(target).hasClass('ui-datepicker-close') && $(target).hasClass(calendar_cell_default_class_only)) {
			keyVent.preventDefault();
			upHandler(target, container, prev);
			}
		} else if (which === 40) { // DOWN arrow key
			if (!$(target).hasClass('ui-datepicker-close') && $(target).hasClass(calendar_cell_default_class_only)) {
			keyVent.preventDefault();
			downHandler(target, container, next);
			}
		} else if (which === 13) { // ENTER
			if ($(target).hasClass(calendar_cell_default_class_only)) {
			setTimeout(function () {
				closeCalendar();
			}, 100);
			} else if ($(target).hasClass(prev_class_only)) {
			handlePrevClicks();
			} else if ($(target).hasClass(next_class_only)) {
			handleNextClicks();
			}
		} else if (32 === which) {
			if ($(target).hasClass(prev_class_only) || $(target).hasClass(next_class_only)) {
			target.click();
			}
		} else if (33 === which) { // PAGE UP
			moveOneMonth(target, 'prev');
		} else if (34 === which) { // PAGE DOWN
			moveOneMonth(target, 'next');
		} else if (36 === which) { // HOME
			var firstOfMonth = $(target).closest('tbody').find(calendar_cell_default_class)[0];
			if (firstOfMonth) {
			firstOfMonth.focus();
			setHighlightState(firstOfMonth, $calendar_wrap[0]);
			}
		} else if (35 === which) { // END
			var $daysOfMonth = $(target).closest('tbody').find(calendar_cell_default_class);
			var lastDay = $daysOfMonth[$daysOfMonth.length - 1];
			if (lastDay) {
			lastDay.focus();
			setHighlightState(lastDay, $calendar_wrap[0]);
			}
		}

		$(calendar_wrap_id + ' ' + calendar_cell_current_class).hide();
	});

}

function closeCalendar() {
	var container = $calendar_wrap;
	$(container).off('keydown');
	var input = $(calendar_wrap_id)[0];
	$(input).datepicker('hide');
	
	input.focus();
}

function removeAria() {
	// make the rest of the page accessible again:
	$("#dp-container").removeAttr('aria-hidden');
	$("#skipnav").removeAttr('aria-hidden');
}

///////////////////////////////
//////////////////////////// //
///////////////////////// // //
// UTILITY-LIKE THINGS // // //
///////////////////////// // //
//////////////////////////// //
///////////////////////////////
function isOdd(num) {
	return num % 2;
}

function moveOneMonth(currentDate, dir) {
	var button = (dir === 'next')
				? $(calendar_wrap_id + ' ' + next_class)[0]
				: $(calendar_wrap_id + ' ' + prev_class)[0];

	// if (!button) {
	// return;
	// }

	var ENABLED_SELECTOR = '#ui-datepicker-div tbody td:not(.ui-state-disabled)';
	var $currentCells = $(ENABLED_SELECTOR);
	var currentIdx = $.inArray(currentDate.parentNode, $currentCells);

	button.click();
	setTimeout(function () {
	updateHeaderElements();

	var $newCells = $(ENABLED_SELECTOR);
	var newTd = $newCells[currentIdx];
	var newAnchor = newTd && $(newTd).find('a')[0];

	while (!newAnchor) {
		currentIdx--;
		newTd = $newCells[currentIdx];
		newAnchor = newTd && $(newTd).find('a')[0];
	}

	setHighlightState(newAnchor, $calendar_wrap[0]);
	newAnchor.focus();

	}, 0);

}

function handleNextClicks() {
	setTimeout(function () {
	updateHeaderElements();
	prepHighlightState();
	$(calendar_wrap_id + ' ' + next_class).focus();
	$(calendar_wrap_id + ' ' + calendar_cell_current_class).hide();
	}, 0);
}

function handlePrevClicks() {
	setTimeout(function () {
	updateHeaderElements();
	prepHighlightState();
	$(calendar_wrap_id + ' ' + prev_class).focus();
	$(calendar_wrap_id + ' ' + calendar_cell_current_class).hide();
	}, 0);
}

function previousDay(dateLink) {
	var container = $calendar_wrap[0];
	// if (!dateLink) {
	// return;
	// }
	var td = $(dateLink).closest('td');
	// if (!td) {
	// return;
	// }

	var prevTd = $(td).prev(),
		prevDateLink = $(calendar_cell_default_class, prevTd)[0];

	if (prevTd && prevDateLink) {
	setHighlightState(prevDateLink, container);
	prevDateLink.focus();
	} else {
	handlePrevious(dateLink);
	}
}


function handlePrevious(target) {
	var container = $calendar_wrap[0];
	// if (!target) {
	// return;
	// }
	var currentRow = $(target).closest('tr');
	// if (!currentRow) {
	// return;
	// }
	var previousRow = $(currentRow).prev();

	if (!previousRow || previousRow.length === 0) {
	// there is not previous row, so we go to previous month...
	previousMonth();
	} else {
	var prevRowDates = $('td ' + calendar_cell_default_class, previousRow);
	var prevRowDate = prevRowDates[prevRowDates.length - 1];

	if (prevRowDate) {
		setTimeout(function () {
		setHighlightState(prevRowDate, container);
		prevRowDate.focus();
		}, 0);
	}
	}
}

function previousMonth() {
	var prevLink = $(calendar_wrap_id + ' ' + prev_class)[0];
	var container = $calendar_wrap[0];
	prevLink.click();
	// focus last day of new month
	setTimeout(function () {
	var trs = $('tr', container),
		lastRowTdLinks = $('td ' + calendar_cell_default_class, trs[trs.length - 1]),
		lastDate = lastRowTdLinks[lastRowTdLinks.length - 1];

	// updating the cached header elements
	updateHeaderElements();

	setHighlightState(lastDate, container);
	lastDate.focus();

	}, 0);
}

///////////////// NEXT /////////////////
/**
 * Handles right arrow key navigation
 * @param	{HTMLElement} dateLink The target of the keyboard event
 */
function nextDay(dateLink) {
	var container = $calendar_wrap[0];
	// if (!dateLink) {
	// return;
	// }
	var td = $(dateLink).closest('td');
	// if (!td) {
	// return;
	// }
	var nextTd = $(td).next(),
		nextDateLink = $(calendar_cell_default_class, nextTd)[0];

	if (nextTd && nextDateLink) {
	setHighlightState(nextDateLink, container);
	nextDateLink.focus(); // the next day (same row)
	} else {
	handleNext(dateLink);
	}
}

function handleNext(target) {
	var container = $calendar_wrap[0];
	// if (!target) {
	// return;
	// }
	var currentRow = $(target).closest('tr'),
		nextRow = $(currentRow).next();

	if (!nextRow || nextRow.length === 0) {
	nextMonth();
	} else {
	var nextRowFirstDate = $(calendar_cell_default_class, nextRow)[0];
	if (nextRowFirstDate) {
		setHighlightState(nextRowFirstDate, container);
		nextRowFirstDate.focus();
	}
	}
}

function nextMonth() {
	nextMon = $(calendar_wrap_id + ' ' + next_class)[0];
	var container = $calendar_wrap[0];
	nextMon.click();
	// focus the first day of the new month
	setTimeout(function () {
	// updating the cached header elements
	updateHeaderElements();

	var firstDate = $(calendar_cell_default_class, container)[0];
	setHighlightState(firstDate, container);
	firstDate.focus();
	}, 0);
}

/////////// UP ///////////
/**
 * Handle the up arrow navigation through dates
 * @param	{HTMLElement} target	 The target of the keyboard event (day)
 * @param	{HTMLElement} cont	 The calendar container
 * @param	{HTMLElement} prevLink Link to navigate to previous month
 */
function upHandler(target, cont, prevLink) {
	prevLink = $(calendar_wrap_id + ' ' + prev_class)[0];
	var rowContext = $(target).closest('tr');
	// if (!rowContext) {
	// return;
	// }
	var rowTds = $('td', rowContext),
		rowLinks = $(calendar_cell_default_class, rowContext),
		targetIndex = $.inArray(target, rowLinks),
		prevRow = $(rowContext).prev(),
		prevRowTds = $('td', prevRow),
		parallel = prevRowTds[targetIndex],
		linkCheck = $(calendar_cell_default_class, parallel)[0];

	if (prevRow && parallel && linkCheck) {
	// there is a previous row, a td at the same index
	// of the target AND theres a link in that td
	setHighlightState(linkCheck, cont);
	linkCheck.focus();
	} else {
	// we're either on the first row of a month, or we're on the
	// second and there is not a date link directly above the target
	prevLink.click();
	setTimeout(function () {
		// updating the cached header elements
		updateHeaderElements();
		var newRows = $('tr', cont),
			lastRow = newRows[newRows.length - 1],
			lastRowTds = $('td', lastRow),
			tdParallelIndex = $.inArray(target.parentNode, rowTds),
			newParallel = lastRowTds[tdParallelIndex],
			newCheck = $(calendar_cell_default_class, newParallel)[0];

		if (lastRow && newParallel && newCheck) {
		setHighlightState(newCheck, cont);
		newCheck.focus();
		} else {
		// theres no date link on the last week (row) of the new month
		// meaning its an empty cell, so we'll try the 2nd to last week
		var secondLastRow = newRows[newRows.length - 2],
			secondTds = $('td', secondLastRow),
			targetTd = secondTds[tdParallelIndex],
			linkCheck = $(calendar_cell_default_class, targetTd)[0];

		if (linkCheck) {
			setHighlightState(linkCheck, cont);
			linkCheck.focus();
		}

		}
	}, 0);
	}
}

//////////////// DOWN ////////////////
/**
 * Handles down arrow navigation through dates in calendar
 * @param	{HTMLElement} target	 The target of the keyboard event (day)
 * @param	{HTMLElement} cont	 The calendar container
 * @param	{HTMLElement} nextLink Link to navigate to next month
 */
function downHandler(target, cont, nextLink) {
	nextLink = $(calendar_wrap_id + ' ' + next_class)[0];
	var targetRow = $(target).closest('tr');
	// if (!targetRow) {
	// return;
	// }
	var targetCells = $('td', targetRow),
		cellIndex = $.inArray(target.parentNode, targetCells), // the td (parent of target) index
		nextRow = $(targetRow).next(),
		nextRowCells = $('td', nextRow),
		nextWeekTd = nextRowCells[cellIndex],
		nextWeekCheck = $(calendar_cell_default_class, nextWeekTd)[0];

	if (nextRow && nextWeekTd && nextWeekCheck) {
	// theres a next row, a TD at the same index of `target`,
	// and theres an anchor within that td
	setHighlightState(nextWeekCheck, cont);
	nextWeekCheck.focus();
	} else {
	nextLink.click();

	setTimeout(function () {
		// updating the cached header elements
		updateHeaderElements();

		var nextMonthTrs = $('tbody tr', cont),
			firstTds = $('td', nextMonthTrs[0]),
			firstParallel = firstTds[cellIndex],
			firstCheck = $(calendar_cell_default_class, firstParallel)[0];

		if (firstParallel && firstCheck) {
		setHighlightState(firstCheck, cont);
		firstCheck.focus();
		} else {
		// lets try the second row b/c we didnt find a
		// date link in the first row at the target's index
		var secondRow = nextMonthTrs[1],
			secondTds = $('td', secondRow),
			secondRowTd = secondTds[cellIndex],
			secondCheck = $(calendar_cell_default_class, secondRowTd)[0];

		if (secondRow && secondCheck) {
			setHighlightState(secondCheck, cont);
			secondCheck.focus();
		}
		}
	}, 0);
	}
}


function onCalendarHide() {
	closeCalendar();
}

// add an aria-label to the date link indicating the currently focused date
// (formatted identically to the required format: mm/dd/yyyy)
function monthDayYearText() {
	var cleanUps = $('.amaze-date');

	$(cleanUps).each(function (clean) {
	// each(cleanUps, function (clean) {
	clean.parentNode.removeChild(clean);
	});

	var datePickDiv = $calendar_wrap[0];
	// in case we find no datepick div
	// if (!datePickDiv) {
	// return;
	// }

	var dates = $(calendar_cell_default_class, datePickDiv);

	$(dates).each(function (index, date) {
	var currentRow = $(date).closest('tr'),
		currentTds = $('td', currentRow),
		currentIndex = $.inArray(date.parentNode, currentTds),
		headThs = $('thead tr th', datePickDiv),
		dayIndex = headThs[currentIndex],
		daySpan = $('span', dayIndex)[0],
		monthName = $(calendar_wrap_id + ' ' + calendar_cell_month_class)[0].innerHTML,
		year = $(calendar_wrap_id + ' ' + calendar_cell_year_class)[0].innerHTML,
		number = date.innerHTML;

	// if (!daySpan || !monthName || !number || !year) {
	// 	return;
	// }

	// AT Reads: {month} {date} {year} {day}
	// "December 18 2014 Thursday"
	var dateText = monthName + ' ' + date.innerHTML + ' ' + year + ' ' + daySpan.title;
	// AT Reads: {date(number)} {name of day} {name of month} {year(number)}
	// var dateText = date.innerHTML + ' ' + daySpan.title + ' ' + monthName + ' ' + year;
	// add an aria-label to the date link reading out the currently focused date
	date.setAttribute('aria-label', dateText);
	});
}



// update the cached header elements because we're in a new month or year
function updateHeaderElements() {
	var context = $calendar_wrap;
	// if (!context) {
	// return;
	// }

	context.find('table').first().attr('role', 'grid');

	prev = $(calendar_wrap_id + ' ' + prev_class)[0];
	next = $(calendar_wrap_id + ' ' + next_class)[0];

	//make them click/focus - able
	next.href = 'javascript:void(0)';
	prev.href = 'javascript:void(0)';

	next.setAttribute('role', 'button');
	prev.setAttribute('role', 'button');
	appendOffscreenMonthText(next);
	appendOffscreenMonthText(prev);

	$(next).on('click', handleNextClicks);
	$(prev).on('click', handlePrevClicks);

	// add month day year text
	monthDayYearText();
}


function prepHighlightState() {
	var highlight;
	var cage = $calendar_wrap[0];
	highlight = $(calendar_wrap_id + ' ' + calendar_cell_highlighted_class)[0] ||
				$(calendar_wrap_id + ' ' + calendar_cell_default_class)[0];
	if (highlight && cage) {
	setHighlightState(highlight, cage);
	}
}

// Set the highlighted class to date elements, when focus is recieved
function setHighlightState(newHighlight, container) {
	var prevHighlight = getCurrentDate(container);
	// remove the highlight state from previously
	// highlighted date and add it to our newly active date
	$(prevHighlight).removeClass(calendar_cell_highlighted_class_only);
	$(newHighlight).addClass(calendar_cell_highlighted_class_only);
}


// grabs the current date based on the hightlight class
function getCurrentDate(container) {
	var currentDate = $(calendar_wrap_id + ' ' + calendar_cell_highlighted_class)[0];
	return currentDate;
}

/**
 * Appends logical next/prev month text to the buttons
 * - ex: Next Month, January 2015
 *		 Previous Month, November 2014
 */
function appendOffscreenMonthText(button) {
	var buttonText;
	var isNext = $(button).hasClass(next_class_only);
	var months = [
	'january', 'february',
	'march', 'april',
	'may', 'june', 'july',
	'august', 'september',
	'october',
	'november', 'december'
	];

	var currentMonth = $(calendar_wrap_id + ' .ui-datepicker-title ' + calendar_cell_month_class).text().toLowerCase();
	var monthIndex = $.inArray(currentMonth, months);
	var currentYear = $(calendar_wrap_id + ' .ui-datepicker-title ' + calendar_cell_month_class).text().toLowerCase();
	var adjacentIndex = (isNext) ? monthIndex + 1 : monthIndex - 1;

	if (isNext && currentMonth === 'december') {
	currentYear = parseInt(currentYear, 10) + 1;
	adjacentIndex = 0;
	} else if (!isNext && currentMonth === 'january') {
	currentYear = parseInt(currentYear, 10) - 1;
	adjacentIndex = months.length - 1;
	}

	buttonText = (isNext)
				? 'Next Month, ' + firstToCap(months[adjacentIndex]) + ' ' + currentYear
				: 'Previous Month, ' + firstToCap(months[adjacentIndex]) + ' ' + currentYear;

	$(button).find(calendar_wrap_id + ' .ui-icon').html(buttonText);

}

// Returns the string with the first letter capitalized
function firstToCap(s) {
	return s.charAt(0).toUpperCase() + s.slice(1);
}