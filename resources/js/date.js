import moment from 'moment'
import 'moment/locale/ja'

let today = moment().format('L');
let thisWeek = moment().format('dddd');

$(function() {
    setInterval(function() {
        $('#js-date').text(today + ' ' + thisWeek);
        $('#js-time').text(moment().format('LTS'));
        $('input[name="stamp_date"]').val(moment().format('YYYY-MM-DD'));
        $('input[name="stamp_time"]').val(moment().format('LTS'));
    }, 500);
});

let thisMonth = moment().format('YYYY-MM');
let index = 0;
const next = document.getElementById('js-next');
const previous = document.getElementById('js-previous');
$('#js-month').text(thisMonth);

if (next) {
    next.addEventListener('click', () => {
        index += 1
        calcMonth(index);
    });
}
if (previous) {
    previous.addEventListener('click', () => {
        index -= 1
        calcMonth(index);
    });
}
function calcMonth(index) {
    let updateMonth = moment().add(index, "months").format("YYYY-MM");
    $('#js-month').text(updateMonth);
}
