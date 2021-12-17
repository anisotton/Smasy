jQuery(document).ready(function() {
    jQuery('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
        defaultDate: '2017-05-12',
        locale: 'pt-br',
        buttonIcons: false, // show the prev/next text
        weekNumbers: true,
        navLinks: true, // can click day/week names to navigate views
        //events:getEvents(),
        events: {
            url: smasy.getBase()+"turmas/getTurmasCalendario",
            type: 'POST',
            cache: true
        },
    });
});

function getEvents(){

   /* var events = [];

    jQuery.ajax( {
        url: smasy.getBase()+"turmas/getTurmasCalendario",
        dataType: "json",
        success: function( data ) {
            events = data;
        }
    });
    console.log(events);*/

    return [
        {
            title: 'All Day Event',
            start: '2017-05-01',
        },
        {
            title: 'Long Event',
            start: '2017-05-07',
            end: '2017-05-10'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2017-05-09T16:00:00'
        },
        {
            id: 999,
            title: 'Repeating Event',
            start: '2017-05-16T16:00:00'
        },
        {
            title: 'Conference',
            start: '2017-05-11',
            end: '2017-05-13'
        },
        {
            title: 'Meeting',
            start: '2017-05-12T10:30:00',
            end: '2017-05-12T12:30:00'
        },
        {
            title: 'Lunch',
            start: '2017-05-12T12:00:00'
        },
        {
            title: 'Meeting',
            start: '2017-05-12T14:30:00'
        },
        {
            title: 'Happy Hour',
            start: '2017-05-12T17:30:00'
        },
        {
            title: 'Dinner',
            start: '2017-05-12T20:00:00'
        },
        {
            title: 'Birthday Party',
            start: '2017-05-13T07:00:00'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2017-05-28'
        }
    ];




}