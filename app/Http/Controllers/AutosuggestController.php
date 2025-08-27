<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class AutosuggestController extends Controller
{
    public function get(Request $request)
    {
        $field = $request->query('field', '');
        $search_query = trim($request->query('query', ''));
        $fieldMap = [
            'name'       => 'name',
            'race_name'  => 'race_name',
            'skill_name' => 'skill_name',
            'goal'       => 'goal'
        ];
        if (!isset($fieldMap[$field])) {
            return response()->json(['success' => false, 'error' => 'Invalid field for autosuggestion.'], 400);
        }
        $safeField = $fieldMap[$field];
        if ($safeField === 'skill_name') {
            $query = DB::table('skill_reference')->select('skill_name', 'description', 'stat_type', 'tag');
            if ($search_query !== '') {
                $query->where('skill_name', 'like', "%$search_query%");
            }
            $suggestions = $query->orderBy('skill_name')->limit(10)->get();
        } else {
            $query = DB::table('plans')->select(DB::raw("DISTINCT `$safeField` AS value"));
            if ($search_query !== '') {
                $query->where($safeField, 'like', "%$search_query%");
            }
            $suggestions = $query->orderBy($safeField)->limit(10)->get();
        }
        return response()->json(['suggestions' => $suggestions]);
    }
}
