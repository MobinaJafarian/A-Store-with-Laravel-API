'use strict';
$(document).ready(function () {

    var events = [
        {
            title: 'مسافرت',
            start: '2020-10-30 00:00',
            constraint: 'businessHours',
            className: 'bg-danger',
            icon: "camera",
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        },
        {
            title: 'تخصیص تیم',
            start: '2020-10-15 00:00',
            constraint: 'availableForMeeting',
			className: 'bg-primary',
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        },
        {
            title: 'دوستان',
            start: '2020-10-10 00:00',
            end: '2020-10-11 00:00',
            className: 'bg-info',
			icon: "user-o",
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        },
        {
            title: 'تعطیلات',
            start: '2020-10-10 00:00',
            end: '2020-10-12 00:00',
			className: 'bg-success',
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        },
        {
            title: 'شرکت',
            start: '2020-10-03 00:00',
            className: 'bg-warning',
			icon: "building-o",
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        },
        {
            id: 'availableForMeeting',
            start: '2020-03-13 10:00:00',
            end: '2020-03-13 16:00:00',
			rendering: 'background',
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        },
        {
            start: '2020-03-24',
            end: '2020-03-29',
            overlap: false,
            rendering: 'background',
			color: '#ff9f89',
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        },
        {
            start: '2020-03-06',
            end: '2020-03-29',
            overlap: false,
            rendering: 'background',
			color: '#ff9f89',
			description: 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.',
        }
    ];

    $('#external-events .fc-event').each(function () {

        // store data so the calendar knows to render an event upon drop
        $(this).data('event', {
            title: $.trim($(this).text()), // use the element's text as the event title
            stick: true, // maintain when user navigates (see docs on the renderEvent method),
            color: $(this).find('i').css("color")
        });

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });

    });

    $('#calendar-demo').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
        },
		titleRangeSeparator: ' - ',
        editable: true,
        droppable: true,
        drop: function () {
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
        },
        weekNumbers: true,
        eventLimit: true, // allow "more" link when too many events
        events: events
    });

});