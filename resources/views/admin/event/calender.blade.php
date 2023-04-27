<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script>
        // Ignore this in your implementation
        window.isMbscDemo = true;
    </script>

    <title>
        Add/edit/delete events
    </title>

    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>

    <!-- Mobiscroll JS and CSS Includes -->
    <link rel="stylesheet" href="{{asset('assets/css/mobiscroll.jquery.min.css')}}">
    <script src="{{asset('assets/js/mobiscroll.jquery.min.js')}}"></script>

    <style type="text/css">
            body {
        margin: 0;
        padding: 0;
    }

    body,
    html {
        height: 100%;
    }

            .event-color-c {
        display: flex;
        margin: 16px;
        align-items: center;
        cursor: pointer;
    }
    
    .event-color-label {
        flex: 1 0 auto;
    }
    
    .event-color {
        width: 30px;
        height: 30px;
        border-radius: 15px;
        margin-right: 10px;
        margin-left: 240px;
        background: #5ac8fa;
    }
    
    .crud-color-row {
        display: flex;
        justify-content: center;
        margin: 5px;
    }
    
    .crud-color-c {
        padding: 3px;
        margin: 2px;
    }
    
    .crud-color {
        position: relative;
        min-width: 46px;
        min-height: 46px;
        margin: 2px;
        cursor: pointer;
        border-radius: 23px;
        background: #5ac8fa;
    }
    
    .crud-color-c.selected,
    .crud-color-c:hover {
        box-shadow: inset 0 0 0 3px #007bff;
        border-radius: 48px;
    }
    
    .crud-color:before {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-top: -10px;
        margin-left: -10px;
        color: #f7f7f7;
        font-size: 20px;
        text-shadow: 0 0 3px #000;
        display: none;
    }
    
    .crud-color-c.selected .crud-color:before {
        display: block;
    }
    </style>

</head>

<body>

    <div mbsc-page class="demo-create-read-update-delete-CRUD">
        <div style="height:100%">
                <div id="demo-add-delete-event"></div>
    
    <div style="display: none">
    <div id="demo-add-popup">
        <div class="mbsc-form-group">
            <label>
                Title
                <input mbsc-input id="event-title">
            </label>
            <label>
                Description
                <textarea mbsc-textarea id="event-desc"></textarea>
            </label>
        </div>
        <div class="mbsc-form-group">
            <label>
                All-day
                <input mbsc-switch id="event-all-day" type="checkbox" />
            </label>
            <label>
                Starts
                <input mbsc-input id="start-input" />
            </label>
            <label>
                Ends
                <input mbsc-input id="end-input" />
            </label>
            <div id="event-date"></div>
            <div id="event-color-picker" class="event-color-c">
                <div class="event-color-label">Color</div>
                <div id="event-color-cont">
                    <div id="event-color" class="event-color"></div>
                </div>
            </div>
            <label>
                Show as busy
                <input id="event-status-busy" mbsc-segmented type="radio" name="event-status" value="busy">
            </label>
            <label>
                Show as free
                <input id="event-status-free" mbsc-segmented type="radio" name="event-status" value="free">
            </label>
            <div class="mbsc-button-group">
                <button class="mbsc-button-block" id="event-delete" mbsc-button data-color="danger" data-variant="outline">Delete event</button>
            </div>
        </div>
    </div>
    
    <div id="demo-event-color">
        <div class="crud-color-row">
            <div class="crud-color-c" data-value="#ffeb3c">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#ffeb3c"></div>
            </div>
            <div class="crud-color-c" data-value="#ff9900">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#ff9900"></div>
            </div>
            <div class="crud-color-c" data-value="#f44437">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#f44437"></div>
            </div>
            <div class="crud-color-c" data-value="#ea1e63">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#ea1e63"></div>
            </div>
            <div class="crud-color-c" data-value="#9c26b0">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#9c26b0"></div>
            </div>
        </div>
        <div class="crud-color-row">
            <div class="crud-color-c" data-value="#3f51b5">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#3f51b5"></div>
            </div>
            <div class="crud-color-c" data-value="">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check"></div>
            </div>
            <div class="crud-color-c" data-value="#009788">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#009788"></div>
            </div>
            <div class="crud-color-c" data-value="#4baf4f">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#4baf4f"></div>
            </div>
            <div class="crud-color-c" data-value="#7e5d4e">
                <div class="crud-color mbsc-icon mbsc-font-icon mbsc-icon-material-check" style="background:#7e5d4e"></div>
            </div>
        </div>
    </div>
    </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var SITEURL = "{{ url('/') }}";
            mobiscroll.setOptions({
        locale: mobiscroll.localeEn,                    // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                                   // Specify theme like: theme: 'ios' or omit setting to use default
            themeVariant: 'light'                       // More info about themeVariant: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-themeVariant
    });
    
    $(function () {
        var oldEvent,
            tempEvent = {},
            deleteEvent,
            restoreEvent,
            colorPicker,
            tempColor,
            $title = $('#event-title'),
            $description = $('#event-desc'),
            $allDay = $('#event-all-day'),
            $statusFree = $('#event-status-free'),
            $statusBusy = $('#event-status-busy'),
            $deleteButton = $('#event-delete'),
            $color = $('#event-color'),
            datePickerResponsive = {
                medium: {
                    controls: ['calendar'],
                    touchUi: false
                }
            },
            datetimePickerResponsive = {
                medium: {
                    controls: ['calendar', 'time'],
                    touchUi: false
                }
            },
            now = new Date(),
            myData = [{
                id: 1,
                start: '2023-03-08T13:00',
                end: '2023-03-08T13:45',
                title: 'Lunch @ Butcher\'s',
                description: '',
                allDay: false,
                free: true,
                color: '#009788'
            }];
    
        function createAddPopup(elm) {
            // hide delete button inside add popup
            $deleteButton.hide();
    
            deleteEvent = true;
            restoreEvent = false;
    
            // set popup header text and buttons for adding
            popup.setOptions({
                headerText: 'New event',  
                                                        // More info about headerText: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-headerText
                buttons: ['cancel', {                   // More info about buttons: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-buttons
                    text: 'Add',
                    keyCode: 'enter',
                    handler: function () {
                        calendar.updateEvent({
                            id: tempEvent.id,
                            title: tempEvent.title,
                            description: tempEvent.description,
                            allDay: tempEvent.allDay,
                            start: tempEvent.start,
                            end: tempEvent.end,
                            color: tempEvent.color,
                        });
                        // navigate the calendar to the correct view
                        calendar.navigateToEvent(tempEvent);
                        deleteEvent = false;
                        popup.close();
                    },
                    cssClass: 'mbsc-popup-button-primary add-class'
                    
                }]
            });
    
            // fill popup with a new event data
            $title.mobiscroll('getInst').value = tempEvent.title;
            $description.mobiscroll('getInst').value = '';
            $allDay.mobiscroll('getInst').checked = true;
            range.setVal([tempEvent.start, tempEvent.end]);
            $statusBusy.mobiscroll('getInst').checked = true;
            range.setOptions({ controls: ['date'], responsive: datePickerResponsive });
            selectColor('', true);
    
            // set anchor for the popup
            popup.setOptions({ anchor: elm });
    
            popup.open();

            $.ajax({
                            url: SITEURL + "/calendar-crud-ajax",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                id: tempEvent.id,
                                title: tempEvent.title,
                                description: tempEvent.description,
                                allDay: tempEvent.allDay,
                                start: tempEvent.start,
                                end: tempEvent.end,
                                color: tempEvent.color,
                                type: 'create'
                            },
                            type: "POST",
                            success: function (data) {
                            
                                // displayMessage("Event created.");
                                calendar.fullCalendar('renderEvent', {
                                    "_token": "{{ csrf_token() }}",
                                    id: data.id,
                                    title: data.title,
                                    description: data.description,
                                    allDay: data.allDay,
                                    start: data.start,
                                    end: data.end,
                                    color: data.color,
                                    type: 'create'
                                }, true);
                                calendar.fullCalendar('unselect');
                            }
                        });
        }
    
        function createEditPopup(args) {
            var ev = args.event;
            // show delete button inside edit popup
            $deleteButton.show();
    
            deleteEvent = false;
            restoreEvent = true;
    
            // set popup header text and buttons for editing
            popup.setOptions({
                headerText: 'Edit event',               // More info about headerText: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-headerText
                buttons: ['cancel', {                   // More info about buttons: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-buttons
                    text: 'Save',
                    keyCode: 'enter',
                    handler: function () {
                        var date = range.getVal();
                        var eventToSave = {
                            id: ev.id,
                            title: $title.val(),
                            description: $description.val(),
                            allDay: $allDay.mobiscroll('getInst').checked,
                            start: date[0],
                            end: date[1],
                            free: $statusFree.mobiscroll('getInst').checked,
                            color: ev.color,
                        };
                        // update event with the new properties on save button click
                        calendar.updateEvent(eventToSave);
                        // navigate the calendar to the correct view
                        calendar.navigateToEvent(eventToSave);
                        restoreEvent = false;
                        popup.close();
                    },
                    cssClass: 'mbsc-popup-button-primary'
                }]
            });
    
            // fill popup with the selected event data
            $title.mobiscroll('getInst').value = ev.title || '';
            $description.mobiscroll('getInst').value = ev.description || '';
            $allDay.mobiscroll('getInst').checked = ev.allDay || false;
            range.setVal([ev.start, ev.end]);
            selectColor(ev.color, true);
    
            if (ev.free) {
                $statusFree.mobiscroll('getInst').checked = true;
            } else {
                $statusBusy.mobiscroll('getInst').checked = true;
            }
    
            // change range settings based on the allDay
            range.setOptions({
                controls: ev.allDay ? ['date'] : ['datetime'],
                responsive: ev.allDay ? datePickerResponsive : datetimePickerResponsive
            });
    
            // set anchor for the popup
            popup.setOptions({ anchor: args.domEvent.currentTarget });
            popup.open();
        }
    
        var calendar = $('#demo-add-delete-event').mobiscroll().eventcalendar({
            clickToCreate: 'double',                    // More info about clickToCreate: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-clickToCreate
            dragToCreate: true,                         // More info about dragToCreate: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-dragToCreate
            dragToMove: true,                           // More info about dragToMove: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-dragToMove
            dragToResize: true,                         // More info about dragToResize: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-dragToResize
            view: {                                     // More info about view: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-view
                calendar: { labels: true }
            },
            data: myData,                               // More info about data: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-data
            onEventClick: function (args) {             // More info about onEventClick: https://docs.mobiscroll.com/5-22-2/eventcalendar#event-onEventClick
                oldEvent = $.extend({}, args.event);
                tempEvent = args.event;
    
                if (!popup.isVisible()) {
                    createEditPopup(args);
                }
            },
            onEventCreated: function (args) {           // More info about onEventCreated: https://docs.mobiscroll.com/5-22-2/eventcalendar#event-onEventCreated
                popup.close();
    
                // store temporary event
                tempEvent = args.event;
                createAddPopup(args.target);
            },
            onEventDeleted: function () {               // More info about onEventDeleted: https://docs.mobiscroll.com/5-22-2/eventcalendar#event-onEventDeleted
                mobiscroll.snackbar({ 
                    
                    button: {
                        action: function () {
                            calendar.addEvent(args.event);
                        },
                        text: 'Undo'
                    },
                    message: 'Event deleted'
                });
            }
        }).mobiscroll('getInst');
    
        var popup = $('#demo-add-popup').mobiscroll().popup({
            display: 'bottom',                          // Specify display mode like: display: 'bottom' or omit setting to use default
            contentPadding: false,
            fullScreen: true,
            onClose: function () {                      // More info about onClose: https://docs.mobiscroll.com/5-22-2/eventcalendar#event-onClose
                if (deleteEvent) {
                    calendar.removeEvent(tempEvent);
                } else if (restoreEvent) {
                    calendar.updateEvent(oldEvent);
                }
            },
            responsive: {                               // More info about responsive: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-responsive
                medium: {
                    display: 'anchored',                // Specify display mode like: display: 'bottom' or omit setting to use default
                    width: 400,                         // More info about width: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-width
                    fullScreen: false,
                    touchUi: false
                }
            }
        }).mobiscroll('getInst');
    
        $title.on('input', function (ev) {
            // update current event's title
            tempEvent.title = ev.target.value;
        });
    
        $description.on('change', function (ev) {
            // update current event's title
            tempEvent.description = ev.target.value;
        });
    
        $allDay.on('change', function () {
            var checked = this.checked
    
            // change range settings based on the allDay
            range.setOptions({
                controls: checked ? ['date'] : ['datetime'],
                responsive: checked ? datePickerResponsive : datetimePickerResponsive
            });
    
            // update current event's allDay property
            tempEvent.allDay = checked;
        });
    
        var range = $('#event-date').mobiscroll().datepicker({
            controls: ['date'],
            select: 'range',
            startInput: '#start-input',
            endInput: '#end-input',
            showRangeLabels: false,
            touchUi: true,
            responsive: datePickerResponsive,           // More info about responsive: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-responsive
            onChange: function (args) {
                var date = args.value;
    
                // update event's start date
                tempEvent.start = date[0];
                tempEvent.end = date[1];
            }
        }).mobiscroll('getInst');
    
        $('input[name=event-status]').on('change', function () {
            // update current event's free property
            tempEvent.free = $statusFree.mobiscroll('getInst').checked;
        });
    
        $deleteButton.on('click', function () {
            // delete current event on button click
            calendar.removeEvent(tempEvent);
            
            // save a local reference to the deleted event
            var deletedEvent = tempEvent;
    
            popup.close();
    
            mobiscroll.snackbar({ 
                
                button: {
                    action: function () {
                        calendar.addEvent(deletedEvent);
                    },
                    text: 'Undo'
                },
                message: 'Event deleted'
            });
        });
    
        colorPicker = $('#demo-event-color').mobiscroll().popup({
            display: 'bottom',                          // Specify display mode like: display: 'bottom' or omit setting to use default
            contentPadding: false,
            showArrow: false,
            showOverlay: false,
            buttons: [                                  // More info about buttons: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-buttons
                'cancel',
                {
                    text: 'Set',
                    keyCode: 'enter',
                    handler: function (ev) {
                        setSelectedColor();
                    },
                    cssClass: 'mbsc-popup-button-primary'
                }
            ],
            responsive: {                               // More info about responsive: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-responsive
                medium: {
                    display: 'anchored',                // Specify display mode like: display: 'bottom' or omit setting to use default
                    anchor: $('#event-color-cont')[0],  // More info about anchor: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-anchor
                    buttons: {},                        // More info about buttons: https://docs.mobiscroll.com/5-22-2/eventcalendar#opt-buttons
                }
            }
        }).mobiscroll('getInst');
    
        function selectColor(color, setColor) {
            $('.crud-color-c').removeClass('selected');
            $('.crud-color-c[data-value="' + color + '"]').addClass('selected');
            if (setColor) {
                $color.css('background', color || '');
            }
        }
    
        function setSelectedColor() {
            tempEvent.color = tempColor;
            $color.css('background', tempColor);
            colorPicker.close();
        }
    
        $('#event-color-picker').on('click', function () {
            selectColor(tempEvent.color || '');
            colorPicker.open();
        });

        $('.crud-color-c').on('click', function (ev) {
            var $elm = $(ev.currentTarget);
    
            tempColor = $elm.data('value');
            selectColor(tempColor);
    
            if (!colorPicker.s.buttons.length) {
                setSelectedColor();
            }
        });
    });
    </script>

</body>

</html>