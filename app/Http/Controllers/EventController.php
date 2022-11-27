<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function eventAdd(Request $request)
    {
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'event_name' => 'required|max:32',
            'start_time' => 'required|max:32',
            'end_time' => 'required|max:32',
            'enter_month' => 'required|max:32',
        ]);

        // 登録処理
        $event = new Event;
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        $event->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $event->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $event->event_name = $request->input('event_name');
        $event->start_time = $request->input('start_time');
        $event->end_time = $request->input('end_time');
        $event->enter_month = $request->input('enter_month');
        $event->book_link = $request->input('book_link');
        $event->handout_link = $request->input('handout_link');
        $event->save();

        return;
    }
    
    public function eventGet(Request $request)
    {
        // バリデーション
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        // カレンダー表示期間
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);

        // 登録処理
        return Event::query()
            ->select(
                // FullCalendarの形式に合わせる
                'start_date as start',
                'end_date as end',
                'event_name as title',
            )
            // FullCalendarの表示範囲のみ表示
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }
      
    public function eventEdit(Request $request)
    {
        // カレンダー表示期間
        $id = $request->input('id');
        // 登録処理
        Event::query()
            ->where('id', '=', $id)
            ->get();
            
        return redirect('/student_calendar');
    }
    
}
