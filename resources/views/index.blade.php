<!DOCTYPE html>
<html>
   <head>
      <title>Laravel 8 FullCalendar Tutorial</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
   </head>
   <body>

      <div class="container">
      <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <form action="{{ url('logout') }}" method="post">
                    @csrf
                    <button type="submit">登出</button>
                </form>

                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">登出</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">申請會員</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
         <div class="jumbotron">
            <div class="container text-center">
               <h1>Laravel 8 月曆</h1>
            </div>
         </div>
         <div id='calendar'></div>
      </div>
      <script>
         $(document).ready(function () {

         var SITEURL = "{{ url('/') }}";

         $.ajaxSetup({
             headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         var calendar = $('#calendar').fullCalendar({
                     height: 650,  //月歷高度
                     header: { // 頂部排版
  			                  left: "prev,next today", // 左邊放置上一頁、下一頁和今天
  			                  center: "title", // 中間放置標題
  			                  right: "month,agendaWeek,agendaDay", // 右邊放置月、周、天
  		                     },

                             editable: true,
                             events: SITEURL + "/fullcalender", //事件
                             displayEventTime: false,
                             editable: true,
                             eventRender: function (event, element, view) {
                                 if (event.allDay === 'true') {
                                         event.allDay = true;
                                 } else {
                                         event.allDay = false;
                                 }
                             },
                             selectable: true,
                             selectHelper: true,

                           //   下面則是新增、更新以及刪除
                             select: function (start, end, allDay) {
                                 var title = prompt('Event Title:');
                                 if (title) {
                                     var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                     var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                     $.ajax({
                                         url: SITEURL + "/fullcalenderAjax",
                                         data: {
                                             title: title,
                                             start: start,
                                             end: end,
                                             type: 'add'
                                         },
                                         type: "POST",
                                         success: function (data) {
                                             displayMessage("成功更新");

                                             calendar.fullCalendar('renderEvent',
                                                 {
                                                     id: data.id,
                                                     title: title,
                                                     start: start,
                                                     end: end,
                                                     allDay: allDay
                                                 },true);

                                             calendar.fullCalendar('unselect');
                                         }
                                     });
                                 }
                             },


                             eventDrop: function (event, delta) {
                                 var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                 var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                                 $.ajax({
                                     url: SITEURL + '/fullcalenderAjax',
                                     data: {
                                         title: event.title,
                                         start: start,
                                         end: end,
                                         id: event.id,
                                         type: 'update'
                                     },
                                     type: "POST",
                                     success: function (response) {
                                         displayMessage("成功更新");
                                     }
                                 });
                             },
                             eventClick: function (event) {
                                 var deleteMsg = confirm("Do you really want to delete?");
                                 if (deleteMsg) {
                                     $.ajax({
                                         type: "POST",
                                         url: SITEURL + '/fullcalenderAjax',
                                         data: {
                                                 id: event.id,
                                                 type: 'delete'
                                         },
                                         success: function (response) {
                                             calendar.fullCalendar('removeEvents', event.id);
                                             displayMessage("成功刪除");
                                         }
                                     });
                                 }
                             }

                         });

         });

         function displayMessage(message) {
             toastr.success(message, '訊息');
         }

      </script>
   </body>
</html>