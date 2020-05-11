(function() {
	const selector  	= n => document.querySelector(n);
	const selectorAll 	= n => document.querySelectorAll(n);
	const createElem 	= n => document.createElement(n);
	const container 	= selectorAll(".Datepicker");
	const getDaysInMonth= (month,year) => new Date(year, month, 0).getDate();
	const days = ["Lu","Ma","Me","Je","Ve", "Sa","Di"];
	const ucFirst = str => str.length > 0  && str[0].toUpperCase() + str.substring(1);
	container && container.forEach(item => {
		const limit = 42;
		let amout 	= false;
		const input = item.querySelector(".datepicker");
		let date 	= input.value ? new Date(input.value) : new Date();
		let day 	= date.getDate();
		let month 	= date.getMonth();
		let year 	= date.getFullYear();
		let selectedDate = date;
		let selectedDay = day;
		let selectedMonth = month;
		let selectedYear = year;


		//Select element
		const dates = new Date(year, month, day);
		
		// Create Elem
		const datePickerElement = createElem("div");
		const selecDateElement  = createElem("div");
		const dateElement  		= createElem("div");
		const monthElement 		= createElem("div");
		const nextMonthElement 	= createElem("div");
		const mthMonthElement 	= createElem("div");
		const prevMonthElement 	= createElem("div");
		const daysElement 		= createElem("div");
		const prevMonth 		= createElem("div");
		const nextMonth 		= createElem("div");

		const letterMonth = dates.toLocaleString('default', { month: 'long' });
		mthMonthElement.textContent = ucFirst(letterMonth) + ' ' + year;

		selecDateElement.textContent = formatDate(date);
		input.value = formatDate(date);
		selecDateElement.dataset.value = selectedDate;

		//Class elem
		datePickerElement.classList.add("date-picker");
		selecDateElement.classList.add('selected-date');
		dateElement.classList.add('dates');
		monthElement.classList.add('month');
		mthMonthElement.classList.add('mth');
		daysElement.classList.add('days');
		prevMonthElement.classList.add('arrows', 'prev-mth');
		nextMonthElement.classList.add('arrows', 'next-mth');
		prevMonth.classList.add('fas', 'fa-chevron-left');
		nextMonth.classList.add('fas', 'fa-chevron-right');

		//Event
		datePickerElement.addEventListener('click', toggleDatePicker);
		input.addEventListener('click', toggleDatePicker);
		nextMonthElement.addEventListener('click', goToNextMonth);
		prevMonthElement.addEventListener('click', goToPrevMonth);

		//Append 
		prevMonthElement.appendChild(prevMonth);
		nextMonthElement.appendChild(nextMonth);
		monthElement.appendChild(prevMonthElement);
		monthElement.appendChild(mthMonthElement);
		monthElement.appendChild(nextMonthElement);
		dateElement.appendChild(monthElement);
		dateElement.appendChild(daysElement);

		// datePickerElement.appendChild(selecDateElement);
		datePickerElement.appendChild(dateElement);
		item.appendChild(input);
		item.appendChild(datePickerElement);
		populateDates();
		function formatDate (d) {
			let day = d.getDate();
			if (day < 10) {
				day = '0' + day;
			}
			let month = d.getMonth() + 1;
			if (month < 10) {
				month = '0' + month;
			}
			let year = d.getFullYear();
			return day + '-' + month + '-' + year;
		}
		function goToNextMonth (e) {
			month++;
			if (month > 11) {
				month = 0;
				year++;
			}
		  const date = new Date(year, month, day);
		  const letterMonth = date.toLocaleString('default', { month: 'long' });
			mthMonthElement.textContent = ucFirst(letterMonth) + ' ' + year;
			populateDates();
		}
		function goToPrevMonth (e) {
			month--;
			if (month < 0) {
				month = 11;
				year--;
			}
		  	const date = new Date(year, month, day);
		  	const letterMonth = date.toLocaleString('default', { month: 'long' });
			mthMonthElement.textContent = ucFirst(letterMonth) + ' ' + year;
			populateDates();
		}
		function populateDates(e) {
			daysElement.innerHTML = "";
			let x = 0;
			let amount_days = getDaysInMonth(month + 1, year);
			let amount_days_prevMonth = getDaysInMonth(month, year);
			const testD = new Date(year,month,-1);
			days.forEach(item => {
			    const jour_element = document.createElement('div');
					jour_element.classList.add('jour');
					jour_element.innerHTML = item;
			    daysElement.appendChild(jour_element);
			});
			for(let i = testD.getDay(); i >= 0 ; i--) {
			    const vide_element = document.createElement('div');
				vide_element.classList.add('day');
			    vide_element.classList.add('prev');
			    vide_element.textContent =  (amount_days_prevMonth)- i;
			    selectedDates(vide_element, ((amount_days_prevMonth)- i - 1) , -1)
			    daysElement.appendChild(vide_element);
			    x++;
			}
			for (let i = 0; i < amount_days; i++) {
				const day_element = document.createElement('div');
				day_element.classList.add('day');
				day_element.textContent = i + 1;
				day_element.id = "date-" + (i + 1) + month + year;
				selectedDates(day_element, i , 0);
				daysElement.appendChild(day_element);
			}
			for(let i = 0; i < ((limit - x) - amount_days); i++) {
			    const vide_element2 = document.createElement('div');
			    vide_element2.classList.add('day');
			    vide_element2.classList.add('next');
			    vide_element2.textContent =  i+1;
			    selectedDates(vide_element2, i , 1);
			    daysElement.appendChild(vide_element2);
			}
			const elem = item.querySelector("#date-" + day + date.getMonth() + date.getFullYear());
			elem && elem.classList.add("current");
		}
		function selectedDates (elem, i , num) {
			if (selectedDay == (i + 1) && selectedYear == year && selectedMonth == (month + num)) {
				elem.classList.add('selected');
			}
			elem.addEventListener('click', function (event) {
				selectedDate = new Date(year , (month + num), (i + 1));
				selectedDay = (i + 1);
				selectedMonth = (month + num);
				selectedYear = year;
				selecDateElement.textContent = formatDate(selectedDate);
		   		selecDateElement.dataset.date = formatDate(selectedDate);
		   		input.value = formatDate(selectedDate);
				selecDateElement.dataset.value = selectedDate;
				if(num > 0) {
			    	goToNextMonth();
				} else if (num < 0 ) {
					goToPrevMonth();
				}
				populateDates();
				dateElement.classList.toggle('active');
			});
		}
		function checkEventPathForClass (path, selector) {
		for (let i = 0; i < path.length; i++) {
				if (path[i].classList && path[i].classList.contains(selector)) {
					return true;
				}
			}
			return false;
		}
		function toggleDatePicker (event) {
		  var path = event.path || (event.composedPath && event.composedPath());
			if (!checkEventPathForClass(path, 'dates')) {
				dateElement.classList.toggle('active');
				// Center element
				const inputSize = input.getBoundingClientRect().width;
				const datesSize = dateElement.getBoundingClientRect().width;
				const leftsize 	= (inputSize - datesSize) / 2;
				dateElement.style.left = leftsize  + "px"; 
			}
		}
	});
})();