<?php

namespace App\Http\Controllers\Front;

use App\Activity;
use App\HelperActivity;
use App\HelperPublication;
use App\Publication;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
            'message_act' => 'required',
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
        $publicationArray = HelperPublication::store($request);
        if(is_array($publicationArray) && array_key_exists('errors',$publicationArray)){
            return Redirect::back()->withErrors($publicationArray['errors']);
        }
        $activityArray = HelperActivity::store($request,$publicationArray);
        if(is_array($activityArray) && array_key_exists('errors',$activityArray)){
            return Redirect::back()->withErrors($activityArray['errors']);
        }
        $activity = Activity::create($activityArray);

        $publicationArray['activity_id'] = $activity->id;
        Publication::create($publicationArray);

        return Redirect::back();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAjax(Activity $activity)
    {
        if(\Request::ajax() && $activity != null) {

            if(HelperActivity::destroy($activity)){
                return \Response::json(array(
                    'success' => true
                ));
            }
        }
        return \Response::json(array(
            'success' => false
        ));
    }

    public function updateAjax(Request $request,$activity)
    {
        if(\Request::ajax()){
                $activityUpdate = HelperActivity::update($request,$activity);
                if(is_array($activityUpdate) && array_key_exists('errors',$activityUpdate)){
                    return \Response::json(array(
                        'success' => false,
                        'errors' => $activityUpdate['errors']
                    ));
                }
                $act = $activityUpdate['activity'];
                $act->save();

                return \Response::json($activityUpdate);
        }
        return \Response::json(array(
            'success' => false
        ));
    }

    public function signaleAjax(Activity $activity){
        if(\Request::ajax() && !is_null($activity)) {
            $activity->publication->score += 1;
            if($activity->publication->score > 10){
                $activity->publication->status = "Signaled";
            }
            $activity->publication->save();
        }
    }
}
