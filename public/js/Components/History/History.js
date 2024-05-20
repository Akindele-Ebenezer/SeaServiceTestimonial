let History_SCHEDULED = document.querySelectorAll('.scheduled');
let History_TODAY = document.querySelectorAll('.today');
let History_THISWEEK = document.querySelectorAll('.this-week');
let History_LASTWEEK = document.querySelectorAll('.last-week');
let History_OLDER = document.querySelectorAll('.older');
 
if (History_SCHEDULED.length != 0) {
    History_SCHEDULED[0].classList.add('Show');
}
if (History_TODAY.length != 0) {
    History_TODAY[0].classList.add('Show');
}
if (History_THISWEEK.length != 0) {
    History_THISWEEK[0].classList.add('Show');
}
if (History_LASTWEEK.length != 0) {
    History_LASTWEEK[0].classList.add('Show');
}
if (History_OLDER.length != 0) {
    History_OLDER[0].classList.add('Show');
}
