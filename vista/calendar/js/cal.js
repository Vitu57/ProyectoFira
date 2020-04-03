window.onload = function init();

function init(){
	let pastDates = true, availableDates = false, availableWeekDays = false

            let calendar = new VanillaCalendar({
                selector: "#myCalendar",
                onSelect: (data, elem) => {
                    console.log(data, elem)
                }
            })

            let btnPastDates = document.querySelector('[name=pastDates]')
            btnPastDates.addEventListener('click', () => {
                pastDates = !pastDates
                calendar.set({pastDates: pastDates})
                btnPastDates.innerText = `${(pastDates ? 'Disable' : 'Enable')} past dates`
            })

            let btnAvailableDates = document.querySelector('[name=availableDates]')
            btnAvailableDates.addEventListener('click', () => {
                availableDates = !availableDates
                btnAvailableDates.innerText = `${(availableDates ? 'Clear available dates' : 'Set available dates')}`
                if (!availableDates) {
                    calendar.set({availableDates: [], datesFilter: false})
                    return
                }
                let dates = () => {
                    let result = []
                    for (let i = 1; i < 15; ++i) {
                        if (i % 2) continue
                        let date = new Date(new Date().getTime() + (60 * 60 * 24 * 1000) * i)
                        result.push({date: `${String(date.getFullYear())}-${String(date.getMonth() + 1).padStart(2, 0)}-${String(date.getDate()).padStart(2, 0)}`})
                    }
                    return result
                }
                calendar.set({availableDates: dates(), availableWeekDays: [], datesFilter: true})
            })

            let btnAvailableWeekDays = document.querySelector('[name=availableWeekDays]')
            btnAvailableWeekDays.addEventListener('click', () => {
                availableWeekDays = !availableWeekDays
                btnAvailableWeekDays.innerText = `${(availableWeekDays ? 'Clear available weekdays' : 'Set available weekdays')}`
                if (!availableWeekDays) {
                    calendar.set({availableWeekDays: [], datesFilter: false})
                    return
                }
                let days = [{
                    day: 'monday'
                }, {
                    day: 'tuesday'
                }, {
                    day: 'wednesday'
                }, {
                    day: 'friday'
                }]
                calendar.set({availableWeekDays: days, availableDates: [], datesFilter: true})
            })
}
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');
