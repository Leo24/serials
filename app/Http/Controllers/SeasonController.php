<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Genre;
use App\Models\Season;
use App\Models\Serial;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;

class SeasonController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        return view('admin.season.index', [
            'data' => Season::where('serial_id', $id )->paginate(10),
            'serial' => Serial::find($id)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param $request
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $input = $request->all();
            if (!empty($input)) {
                $validator = $this->validator($input);
                if ($validator->fails()) {
                    return redirect('/admin/season/create')
                        ->withErrors($validator)
                        ->withInput($input);
                }

                if(empty($input['id'])){
                    $season = Season::create($input);
                } else {
                    $season = Season::find($input['id']);
                    $season->update($input);
                }

                if(!empty($input['genres'])) {
                    $season->genres()->sync($input['genres']);
                }

                if(!empty($input['countries'])) {
                    $season->countries()->sync($input['countries']);
                }

                $picture = $request->file('picture');
                if($picture) {
                    $season->update(['picture' => $picture->store('pictures', 'public')]);
                }

                return redirect(route('admin.seasons.index', ['id' => $input['serial_id']]))->with('success', Lang::get('admin.season.created'));
            }
        }
        return view('admin.season.create', [
            'genres' => Genre::get(),
            'countries' => Country::get(),
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @param $request
     * @return Response
     */
    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function edit($id)
    {
        return view('admin.season.create', [
                'season' => Season::find($id),
                'genres' => Genre::get(),
                'countries' => Country::get(),
            ]
        );
    }



    public function removePicture($id) {
        $season = Season::find($id);
        $file = $season->picture;
        $exists = Storage::disk('public')->exists($file);

        if ($exists == true){
            Storage::disk('public')->delete($file);
            $season->update(['picture' => null]);
            return back()->with('success', 'Picture removed.');
        }
        return back()->with('warning', 'Error while removing picture.');
    }

    public function delete($id){
        Season::find($id)->delete();
        return back()->with('success', Lang::get('season deleted'));
    }



    /**
     * Validator
     *
     * @param array $data
     * @return mixed
     */
    private function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|between:3,255',
//            'content' => 'required',
        ]);
    }

}