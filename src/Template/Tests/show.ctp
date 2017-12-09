<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Test[]|\Cake\Collection\CollectionInterface $tests
 */

?>
<div class="box box-primary">
    <div class="box-body no-padding">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /. box -->

<!-- fullCalendar -->
<script src="/js/fullcalendar.min.js"></script>

<!-- Page specific script -->
<script>
        var tests = JSON.parse('<?= json_encode($tests)?>'),
            events = [];
        console.log(tests[0].title);
        tests.forEach(function (test) {
            var color = getRandomColor();
            events.push({
                title: test.title,
                start: test.run_time,
                allDay: false,
                backgroundColor: color,
                borderColor: color,
                url: '/tests/view/' + test.id
            })
        });

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            //Random default events
            events: events,
            editable: false,
            droppable: false, // this allows things to be dropped onto the calendar !!!
        });
        $('.datepicker-inline').remove();
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
</script>

