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

function dispMonth(month) {
    $('#js-month').text(month);
    $('#js-input').val(month);
    ajaxFilter(month);
}dispMonth(thisMonth);

function calcMonth(index) {
    let updateMonth = moment().add(index, "months").format("YYYY-MM");
    dispMonth(updateMonth);
}

function ajaxFilter(month) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/attendance/filter",
        dataType:'json',
        type: "get",
        data: {'month': month},
        success: function(response){
            $('#js-target').empty();
            for (let i = 0; i < response.length; i++) {
                $(
                    '<tr><td>'
                    + response[i]['date'] +
                    '</td><td>'
                    + response[i]['attendanced_at'] +
                    '</td><td>'
                    + response[i]['leaved_at'] +
                    '</td><td>'
                    + response[i]['rest_time'] +
                    '</td><td>'
                    + response[i]['overtime'] +
                    '</td><td>'
                    + response[i]['total_worked'] +
                    '</td><td></td></tr>'
                ).appendTo('#js-target');
            }
        }
    });
}