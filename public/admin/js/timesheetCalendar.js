/* ------------------------------------------------------------------------------
 *
 *  # Fullcalendar basic options
 *
 *  Demo JS code for extra_fullcalendar_views.html and extra_fullcalendar_styling.html pages
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var FullCalendarBasic = function(events) {
    //
    // Setup module components
    //

    if (!$().fullCalendar) {
        console.warn('Warning - fullcalendar.min.js is not loaded.');
        return;
    }

    // Add events
    var events = events;
    var today = new Date();
    var today_date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();

    // Agenda view
    $('.fullcalendar-agenda').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: today_date,
        defaultView: 'month',
        editable: false,
        businessHours: true,
        events: events,
        isRTL: $('html').attr('dir') == 'rtl' ? true : false,
        dayClick: function(date, jsEvent, view) {
            $('#activity_date').val(date.format());
            $('#modal_form_create').modal();
        },
        eventClick: function(calEvent, jsEvent, view) {
            var dt = calEvent.start;
            jsEvent.preventDefault(); 
           /* if (calEvent.url) {
                window.open(calEvent.url, '_blank',"toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
              }*/
            var activity_id = calEvent.id;
            $.ajax({
                type: 'GET',
                url: 'timesheet/edit/'+activity_id,
                success: function(data) { 
                    $('#climate_type1').val(data.climate_type);
                    $('#project_id1').val(data.project_id);
                    $('#activity_date1').val(data.activity_date);
                    $('#start_time1').val(data.start_time);
                    $('#end_time1').val(data.end_time);
                    $('#activity1').val(data.activity);
                    $('#work_completion_per1').val(data.work_completion_per);
                    $('#additional_note1').val(data.additional_note);
                    $('#activity_id').val(activity_id);  
                    $('.editTimesheet').attr('action', calEvent.url);               
                    $('#modal_form_edit').modal();
                }
            });
        }
    });
};
