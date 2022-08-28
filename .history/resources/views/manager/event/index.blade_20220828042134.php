<x-app-layout>
    @section('title', application('name')." | Events")
    <x-slot name="header">
        <h4 class="mb-sm-0 font-size-18">Event</h4>

        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item active">Manage Event</li>
            </ol>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-12">
           
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-grid">
                                <button class="btn font-16 btn-primary" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create
                                    New Event</button>
                            </div>
                        
                           
                            
                            <div id="external-events" class="mt-2">
                                <br>
                                <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                <div class="external-event fc-event bg-success" data-class="bg-success">
                                    <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>New Event Planning
                                </div>
                                <div class="external-event fc-event bg-info" data-class="bg-info">
                                    <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Meeting
                                </div>
                                <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                    <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating Reports
                                </div>
                                <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                    <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create New theme
                                </div>
                            </div>

                            <div class="row justify-content-center mt-5">
                                <img src="assets/images/verification-img.png" alt="" class="img-fluid d-block">
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div> 

            <div style='clear:both'></div>


            <!-- Add New Event MODAL -->
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header py-3 px-4 border-bottom-0">
                            <h5 class="modal-title" id="modal-title">Create a new event</h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                        </div>
                        <div class="modal-body p-4">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Event Name</label>
                                            <input class="form-control" placeholder="Insert Event Name"
                                                type="text" name="title" id="event-title" required value="" />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Event Description</label>
                                            <input class="form-control" placeholder="Insert Event Description"
                                                type="text" name="description" id="event-description" required value="" />
                                            <div class="invalid-feedback">Please provide a valid event description</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Type</label>
                                            <select class="form-control form-select" name="category" id="event-category">
                                                <option  selected> --Select-- </option>
                                                <option value="bg-danger">Danger</option>
                                                <option value="bg-success">Success</option>
                                                <option value="bg-primary">Primary</option>
                                                <option value="bg-info">Info</option>
                                                <option value="bg-dark">Dark</option>
                                                <option value="bg-warning">Warning</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div>
            <!-- end modal-->

        </div>
    </div>

    @section('scripts')
        <script>
                ! function (g) {
                    "use strict";

                    function e() {}
                    e.prototype.init = function () {
                        
                        var l = g("#event-modal"),
                            t = g("#modal-title"),
                            a = g("#form-event"),
                            i = null,
                            r = null,
                            s = document.getElementsByClassName("needs-validation"),
                            i = null,
                            r = null,
                            e = new Date,
                            n = e.getDate(),
                            d = e.getMonth(),
                            o = e.getFullYear();
                        new FullCalendarInteraction.Draggable(document.getElementById("external-events"), {
                            itemSelector: ".external-event",
                            eventData: function (e) {
                                return {
                                    title: e.innerText,
                                    className: g(e).data("class")
                                }
                            }
                        });
                        var c = [
                            @foreach ($events as $event){
                                title: "{{ $event->title() }}",
                                start: "{{ $event->created_at }}"
                            },
                            @endforeach
                        ],
                            v = (document.getElementById("external-events"), 
                            document.getElementById("calendar"));

                        function u(e) {
                            l.modal("show"), 
                            a.removeClass("was-validated"), 
                            a[0].reset(), 
                            g("#event-title").val(), 
                            g("#event-category").val(), 
                            g("#event-description").val(), 
                            t.text("Add Event"), 
                            r = e
                        }
                        var m = new FullCalendar.Calendar(v, {
                            plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid"],
                            editable: !0,
                            droppable: !0,
                            selectable: !0,
                            defaultView: "dayGridMonth",
                            themeSystem: "bootstrap",
                            header: {
                                left: "prev,next today",
                                center: "title",
                                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                            },
                            eventClick: function (e) {
                                l.modal("show"), 
                                a[0].reset(), 
                                i = e.event, 
                                g("#event-title").val(i.title), 
                                g("#event-category").val(i.classNames[0]), 
                                g("#event-description").val(i.classNames[0]), 
                                r = null, t.text("Edit Event"), 
                                r = null
                            },
                            dateClick: function (e) {
                                u(e)
                            },
                            events: c
                        });
                        m.render(), 
                        g(a).on("submit", function (e) {
                                e.preventDefault();
                                g("#form-event :input");
                                var t, 
                                a = g("#event-title").val(),
                                d = g("#event-description").val();
                                n = g("#event-category").val();

                                var data = $('#form-event').serializeArray();
                                var start = r.date;
                                var url = "{{ route('event.store') }}";
                                let dateStr = r.date
                                var newDate = new Date(dateStr).toISOString()
                                var start = {'name': 'start', 'value': newDate};
                                data[4] = start;
                                console.log(data);

                                // $.ajax({
                                //     type: "POST",
                                //     url, 
                                //     data: data,
                                //     success: function (response) {
                                //         toastr.success(response.message, 'Success!');
                                //         console.log(response);
                                //     }
                                // });
                            
                                !1 === s[0].checkValidity() ? (event.preventDefault(), event.stopPropagation(), s[0].classList.add("was-validated")) : (i ? (i.setProp("title", a), i.setProp("classNames", [n])) : (t = {
                                title: a,
                                start: r.date,
                                allDay: r.allDay,
                                className: n
                            }, m.addEvent(t)), l.modal("hide"))
                        }), 
                        g("#btn-delete-event").on("click", function (e) {
                            i && (i.remove(), i = null, l.modal("hide"))
                        }), 
                        g("#btn-new-event").on("click", function (e) {
                            u({
                                date: new Date,
                                allDay: !0
                            })
                        })
                    }, g.CalendarPage = new e, g.CalendarPage.Constructor = e
                }(window.jQuery),
                
                function () {
                    "use strict";
                    window.jQuery.CalendarPage.init()
                }();
        </script>
    @endsection
</x-app-layout>