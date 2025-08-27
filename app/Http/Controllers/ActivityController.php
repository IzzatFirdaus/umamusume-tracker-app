<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class ActivityController extends Controller
{
    public function getRecent() {
        $activities = DB::table('activity_log')->select('description', 'icon_class', 'timestamp')->orderByDesc('timestamp')->limit(5)->get();
        return response()->json(['success' => true, 'activities' => $activities]);
    }
}
