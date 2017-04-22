<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Genre;
use App\Models\Serial;
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('admin.serial.index', [
            'data' => Serial::paginate(10),
        ]);
    }


    public function show($id)
    {
        return view('site.show', [
            'data' => Serial::find($id),
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
                    return redirect('/admin/serial/create')
                        ->withErrors($validator)
                        ->withInput($input);
                }

                $serial = Serial::create($input);

                if(!empty($input['genres'])) {
                    $serial->genres()->sync($input['genres']);
                }

                if(!empty($input['countries'])) {
                    $serial->countries()->sync($input['countries']);
                }

                $picture = $request->file('picture');
                if($picture) {
                    $serial->update(['picture' => $picture->store('pictures', 'public')]);
                }

                return redirect('/admin/serials')->with('success', Lang::get('admin.serial.created'));
            }
        }
        return view('admin.serial.create', [
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
        return view('admin.serial.create', [
                'serial' => Serial::find($id),
                'genres' => Genre::get(),
                'countries' => Country::get(),
            ]
        );
    }

    public function update($id, Request $request)
    {
        if($request->isMethod('post')){
            $input = $request->all();
            if ($request->all()) {
                $validator = $this->validator($input);
                if ($validator->fails()) {
                    return back()->withErrors($validator);
                }

                $serial = Serial::find($id);
                $serial->update($input);

                if(!empty($input['genres'])) {
                    $serial->genres()->sync($input['genres']);
                }
                if(!empty($input['countries'])) {
                    $serial->countries()->sync($input['countries']);
                }

                $picture = $request->file('picture');
                if($picture) {
                    $serial->update(['picture' => $picture->store('pictures', 'public')]);
                }

                return back()->with('success', Lang::get('admin.serial.updated'));
            }
        }
    }

    public function removePicture($id) {
        $serial = Serial::find($id);
        $file = $serial->picture;
        $exists = Storage::disk('public')->exists($file);

        if ($exists == true){
            Storage::disk('public')->delete($file);
            $serial->update(['picture' => null]);
            return back()->with('success', 'Изображение удалено.');
        }
        return back()->with('warning', 'Ошибка при удалении изображения.');
    }

    public function delete($id){
        Serial::find($id)->delete();
        return back()->with('success', Lang::get('Serial deleted'));
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