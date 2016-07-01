<?php

namespace App\Http\Controllers\Front;

use App\Activity;
use App\Publication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Validator;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'message_act' => 'required|max:255',
            'picture_act' => 'mimes:jpeg,png,jpg',
            'date_start_act' => 'required',
            'sport_act' => 'required',
            'time_h_act' => 'numeric|min:0',
            'time_m_act' => 'numeric|min:0|max:59',
            'time_s_act' => 'numeric|min:0|max:59'
        ]);
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
        $data = $request->all();
        $data['time_h_act'] = intval($data['time_h_act']);
        $data['time_m_act'] = intval($data['time_m_act']);
        $data['time_s_act'] = intval($data['time_s_act']);
        $user = Auth::user();
        $validator = $this->validator($data);

        if ($validator->fails()) {
            dd($data);
            return redirect('/')->withErrors($validator);
        }
        $imageName = null;
        if ($request->hasFile('picture_act')) {
            $imageName = $user->id . '_' . date('YmdHis'). '_post.' . $request->file('picture_act')->getClientOriginalExtension();;

            $request->file('picture_act')->move(
                storage_path() . '\uploads', $imageName
            );
            $imageName = '/uploads/'.$imageName;
        }

        $time = ($data['time_h_act']*3600) + ($data['time_m_act'] * 60) + $data['time_s_act'];
        $dateStart = strtotime($data['date_start_act']);
        $dateStart = date("Y-m-d H:i:s", $dateStart);
        $activity = Activity::create(array(
            'sport_id' => $data['sport_act'],
            'user_id' => $user->id,
            'date_start' => $dateStart,
            'picture' => $imageName,
            'time' => $time,
            'description' => $data['message_act'],
            'status' => 'Success'
        ));

        Publication::create(array(
            'user_id' => $user->id,
            'activity_id' => $activity->id,
            'message' => $data['message_act'],
            'picture' => $imageName
        ));

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
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

    public function updateAjax(Request $request,$activity)
    {
        if(\Request::ajax()){
                $data = $request->all();
                $data['time_h_act_modal'] = intval($data['time_h_act_modal']);
                $data['time_m_act_modal'] = intval($data['time_m_act_modal']);
                $data['time_s_act_modal'] = intval($data['time_s_act_modal']);
                $user = Auth::user();
                $validator = Validator::make($data, [
                    'message_act_modal' => 'required|max:255',
                    'picture_act_modal' => 'mimes:jpeg,png,jpg',
                    'date_start_act_modal' => 'required',
                    'sport_act_modal' => 'required',
                    'time_h_act_modal' => 'numeric|min:0',
                    'time_m_act_modal' => 'numeric|min:0|max:59',
                    'time_s_act_modal' => 'numeric|min:0|max:59'
                ]);

                if ($validator->fails()) {
                    dd($data);
                    return redirect('/')->withErrors($validator);
                }
                $imageName = null;
                if ($request->hasFile('picture_act_modal')) {
                    $imageName = $user->id . '_' . date('YmdHis') . '_post.' . $request->file('picture_act_modal')->getClientOriginalExtension();;

                    $request->file('picture_act_modal')->move(
                        storage_path() . '\uploads', $imageName
                    );
                    $imageName = '/uploads/' . $imageName;
                    $activity->picture = $imageName;
                }

                $time = ($data['time_h_act_modal'] * 3600) + ($data['time_m_act_modal'] * 60) + $data['time_s_act_modal'];
                $dateExplode = explode(" ",$data['date_start_act_modal']);
                $dataExplode2 = explode("/", $dateExplode[0]);
                $date = $dataExplode2[2]."-".$dataExplode2[1]."-".$dataExplode2[0]." ".$dateExplode[1].":00";

                $activity->sport_id = intval($data['sport_act_modal']);
                $activity->user_id = $user->id;
                $activity->date_start = $date;

                $activity->time = $time;
                $activity->description = $data['message_act_modal'];
                $activity->save();

                return \Response::json(array(
                    'success' => true,
                    'activity' => $activity,
                    'dateAct' => $activity->getDateStartString(),
                    'timeAct' => $activity->time,
                    'timeSec' => $activity->getTimeSecondes(),
                    'sport' => $activity->sport
                ));
        }
        return \Response::json(array(
            'success' => false,
            'error' => "no ajax"
        ));
    }
}
