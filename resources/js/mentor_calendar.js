import '@fullcalendar/core/vdom'; // for Vite
import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import axios from 'axios';

var mentor_calendarEl = document.getElementById("mentor_calendar");

if (mentor_calendarEl != null){
    let mentor_calendar = new Calendar(mentor_calendarEl, {
        plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
        initialView: "dayGridMonth",
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,listWeek",
        },
        locale: "ja",
    
        // 日付をクリック、または範囲を選択したイベント
        selectable: true,
        select: function (info) {
            //alert("selected " + info.startStr + " to " + info.endStr);
    
            // 入力ダイアログ
            const eventName = prompt("イベントを入力してください");
    
            if (eventName) {
                // Laravelの登録処理の呼び出し
                axios
                    .post("/event-add", {
                        start_date: info.start.valueOf(),
                        end_date: info.end.valueOf(),
                        event_name: eventName,
                    })
                    .then(() => {
                        // イベントの追加
                        mentor_calendar.addEvent({
                            title: eventName,
                            start: info.start,
                            end: info.end,
                            allDay: true,
                        });
                    })
                    .catch(() => {
                        // バリデーションエラーなど
                        alert("登録に失敗しました");
                    });
            }
        },
        
        events: function (info, successCallback, failureCallback) {
            // Laravelのイベント取得処理の呼び出し
            axios
                .post("/event-get", {
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                })
                .then((response) => {
                    // 追加したイベントを削除
                    mentor_calendar.removeAllEvents();
                    // カレンダーに読み込み
                    successCallback(response.data);
                })
                .catch(() => {
                    // バリデーションエラーなど
                    alert("読み込みに失敗しました");
                });
        },
    
    });
    mentor_calendar.render();
}