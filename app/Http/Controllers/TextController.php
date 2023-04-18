<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TextController extends Controller
{
    /**
     * Show the welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Get a list of texts for DataTables.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

     public function getDatatable()
    {
        $texts = Text::select(['id', 'text', 'created_at']);

        return DataTables::of($texts)
            ->addColumn('action', function ($text) {
                return '<button type="button" class="btn btn-sm btn-danger" onclick="deleteText('.$text->id.')">Delete</button>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Save a new text.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveText(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $text = new Text;
        $text->text = $request->input('text');
        $text->save();

        return response()->json(['success' => true]);
    }

    /**
     * Delete a text.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteText($id)
    {
        $text = Text::find($id);
        if (!$text) {
            return response()->json(['error' => 'Text not found.'], 404);
        }

        $text->delete();

        return response()->json(['success' => true]);
    }
    public function  autocomplete(){
            $term = request('term');
            $data = Text::table('texts')
                ->where('text', 'LIKE', '%'.$term.'%')
                ->distinct()
                ->get(['text']);
            $results = [];
            foreach ($data as $row) {
                $results[] = $row->text;
            }
            return response()->json($results);

    }
}
