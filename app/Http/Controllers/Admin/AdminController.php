<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Publication;
use App\Sport;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Publication::where('status', '!=', 'Blocked')
            ->orderBy('score', 'DESC')
            ->take(20)
            ->get();

        $comments = Comment::where('status', '!=', 'Blocked')
            ->orderBy('score', 'DESC')
            ->take(20)
            ->get();

        return view('admin.index', ['user' => $user, 'posts' => $posts, 'comments' => $comments]);
    }

    public function datauser(){
        $result = DB::table('users')
            ->select(DB::raw('count(*) as user_count, created_at as d'))
            ->groupBy('d')
            ->get();

        $data = array();
        foreach($result as $d){
            $date = explode(" ",$d->d);
            $data[] = array($date[0], $d->user_count);
        }

        return \Response::json(array(
            'data' => $data
        ));
    }

    public function dataactivite(){
        $dateend = Carbon::now()->toDateTimeString();
        $datestart = Carbon::now()->subDay(8)->toDateTimeString();

        $data = array();
        $sports = Sport::all();

        foreach ($sports as $sport){
            $result = DB::table('activities')
                ->join('sports', 'activities.sport_id', '=', 'sports.id')
                ->select(DB::raw('date(activities.created_at) as Day, count(*) as Count, sports.name'))
                ->where('sports.id', '=', $sport->id)
                ->whereBetween('activities.created_at', [$datestart, $dateend])
                ->groupBy(DB::raw('day(activities.created_at), activities.sport_id'))
                ->get();

            $s = array();

            foreach($result as $d){
                $s[$d->Day] = $d->Count;
            }
            $donnees = array_filter($s);
            if (!empty($donnees)) {
                $data[$sport->name] = $s;
            }
        }

        return $data;
    }

    public function datapublication($table = 'publications', $subDay = 30, $intervalle = 'jour', $jourSelection){
        //Fonction jour/mois/année
        // Inscrit / date
        // Commentaire / date
        //Publication / date
        // Activité / sport
        // message chat / jour
        //Association / sport
        // Event / sport
        // Event/ association
        $dateend = Carbon::now()->toDateTimeString();
        $datestart = Carbon::now()->subDay($subDay)->toDateTimeString();

        if($intervalle == 'jour'){
            $periode = 'day(`created_at`), hour(`created_at`)';
            $jourSelection = hour($jourSelection);
        } elseif ($intervalle == 'mois') {
            $periode = 'day(`created_at`)';
            $jourSelection = day($jourSelection);
        } else {
            $periode = '';
            $jourSelection = month($jourSelection);
        }

        $resultPublication = DB::table($table)
            ->select(DB::raw('created_at as Day, count(*) as Count'))
            ->whereBetween('created_at', [$datestart, $dateend])
            ->where($jourSelection)
            ->groupBy(DB::raw($periode))
            ->get();

        $post = array();
        foreach($resultPublication as $hour){
            $post[] = array($hour->Day, $hour->Count);
        }

        return \Response::json(array(
            'table' => $table,
            'post' => $post
        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
