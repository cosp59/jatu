<?php

namespace App\Http\Controllers;
use Auth;
use App\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //to make a User to see only their
        $loans = UserData::where('user_id', Auth::user()->id)->get(); 
        return view('page.userview',compact('loans') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new UserData();
        $data->name =$request->name;
        $data->user_id=Auth::user()->id;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->work = $request->work;
        $data->location = $request->location;
        $data->gender= $request->gender;
        
        $data->street = $request->street;
        $data->status= $request->status;
        
        $data->bond = $request->bond;

      
       $data->save();
       
       return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $data = UserData::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = UserData::findOrFail($id);
        // return $data;
        return view('page.useredit', compact('data'));
        //$data->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
    
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'work' => 'required',
            'location' => 'required',
            'street' => 'required',
            'status' => 'required',
        ]);
        UserData::whereId($id)->update($validatedData);

        return redirect('/home')->with('success', ' Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserData  $userData
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserData $userData)
    {
        //
    }
}
