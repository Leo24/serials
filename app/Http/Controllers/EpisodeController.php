<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Genre;
use App\Models\Episod;
use App\Models\Season;
use App\Models\Serial;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;

class EpisodeController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($serialId, $seasonId)
    {
        return view('admin.episode.index', [
            'data' => Episod::paginate(10),
            'serial' => Serial::find($serialId),
            'season' => Season::find($seasonId),
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
                    return redirect('/admin/episode/create')
                        ->withErrors($validator)
                        ->withInput($input);
                }

                if(empty($input['id'])){
                    $episode = Episod::create($input);
                    $message = 'admin.episode.created';
                } else {
                    $episode = Episod::find($input['id']);
                    $episode->update($input);
                    $message = 'admin.episode.updated';
                }

                if(!empty($input['genres'])) {
                    $episode->genres()->sync($input['genres']);
                }

                if(!empty($input['countries'])) {
                    $episode->countries()->sync($input['countries']);
                }

                $picture = $request->file('picture');
                if($picture) {
                    $episode->update(['picture' => $picture->store('pictures', 'public')]);
                }

                return redirect(route('admin.seasons.index', ['serialId' => $input['serial_id'] ]))->with('success', Lang::get($message));
            }
        }
        $query = $request->query();
        return view('admin.episode.create', [
                'serial' => Serial::find($query['serialId']),
                'season' => Season::find($query['seasonId']),
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
    public function edit(Request $request)
    {
        $query = $request->query();
        return view('admin.episode.create', [
                'episode' => Episod::find($query['id']),
                'serial' => Serial::find($query['serialId']),
                'season' => Season::find($query['seasonId']),
            ]
        );
    }


    public function removePicture($id) {
        $episode = Episod::find($id);
        $file = $episode->picture;
        $exists = Storage::disk('public')->exists($file);

        if ($exists == true){
            Storage::disk('public')->delete($file);
            $episode->update(['picture' => null]);
            return back()->with('success', 'Изображение удалено.');
        }
        return back()->with('warning', 'Ошибка при удалении изображения.');
    }

    public function delete($id){
        Episod::find($id)->delete();
        return back()->with('success', Lang::get('episode deleted'));
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