import moment from 'moment'
import 'moment/locale/ja'

let today = moment().format('L');
let week = moment().format('dddd');

$(function() {
    setInterval(function() {
        $('#js-date').text(today + ' ' + week);
        $('#js-time').text(moment().format('LTS'));
        $('input[name="stamp_date"]').val(today + ' ' + week);
        $('input[name="stamp_time"]').val(moment().format('LTS'));
    }, 500);
});