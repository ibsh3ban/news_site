<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zlider;

class ZliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zliders =Zlider::orderBy('id' , 'desc')->paginate(5);
        return response()->view('cms.zlider.index' , compact('zliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return response()->view('cms.zlider.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  $users->actor()->associate($Authors);

     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() ,[
            'title' => 'required',

        ]);
        if(! $validator->fails()){
            $zliders = new Zlider();
            $zliders->title = $request->input('title');
            $zliders->descreption = $request->input('descreption');

            if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/zlider', $imageName);

                    $zliders->image = $imageName;
                    }
                $isSaved = $zliders->save();
                if($isSaved){
                    return response()->json(['icon' => 'success' , 'title' => 'Created is Successfully'] , 200);
                }
                else{
                    return response()->json(['icon' => 'error' , 'title' => 'Created is Failed'] , 400);

                }
            }
            else{
                return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);

            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zliders = Zlider::findOrFail($id);

        return response()->view('cms.zlider.edit' , compact('zliders'));
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
        $validator = Validator($request->all() , [
            'title' => 'required|string',
        ]);

        if(! $validator->fails()){
            $zliders = Zlider::findOrFail($id);
            $zliders->title = $request->get('title');
            $zliders->description = $request->get('description');


                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/zlider', $imageName);

                    $zliders->image = $imageName;
                    }

                    $isSaved = $zliders->save();
                    return ['redirect'=>route('zlider.index')];

                    if($isSaved){
                        return response()->json(['icon' => 'success' , 'title' => 'Created is Successfully'] , 200);
                    }
                    else{
                        return response()->json(['icon' => 'error' , 'title' => 'Created is Failed'] , 400);

                    }

    }
    else{
        return response()->json(['icon' => 'error' , 'title' =>$validator->getMessageBag()->first()] , 400);

    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zliders = Zlider::destroy($id);
    }
}
