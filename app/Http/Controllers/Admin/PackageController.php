<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\Typology;
use App\Apartment;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;



class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $packages = Package::paginate(6);


        $user = Auth::user();

        $employee_package = Package::where('user_id' , '=', $user->id)->get();

        // messaggio
        $request_info = $request->all();
        $show_deleted_message = isset($request_info['deleted']) ? $request_info['deleted'] : null;
           
        $data = [
            'packages' => $packages,
            'user' => $user,
            'employee_package' => $employee_package,
            'show_deleted_message' => $show_deleted_message,
        ];

        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typologies = Typology::all();
        $apartments = Apartment::all();
        // $users = User::all();
        $user = Auth::user();

        $data = [
            'typologies' => $typologies,
            'apartments' => $apartments,
            // 'users' => $users,
            'user' => $user
        ];

        return view('admin.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate($this->getValidation());

        $form_data_create = $request->all();
     
        $new_package = new Package();
        $new_package->title =  $form_data_create['title'];
        $new_package->description =  $form_data_create['description'];
        $new_package->typology_id =  $form_data_create['typology_id'];
        $new_package->apartment_id =  $form_data_create['apartment_id'];
        $new_package->user_id =  $form_data_create['user_id'];
        $new_package->departure =  $form_data_create['departure'];
        $new_package->return =  $form_data_create['return'];
        $new_package->price =  $form_data_create['price'];

        $new_package->save();

        return redirect()->route('admin.packages.show', ['package' => $new_package->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::findOrfail($id);

        // dd($package);
      
        $data = [
            'package' => $package,
        ];

        return view('admin.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::findOrfail($id);
        $typologies = Typology::all();
        $apartments = Apartment::all();
        $users = User::all();

        $data = [
            'package' =>  $package,
            'users' => $users,
            'typologies' => $typologies,
            'apartments' => $apartments
        ];

        return view('admin.edit',$data);
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
        $form_data_edit = $request->all();

        $new_package = Package::findOrFail($id);
       
        $new_package->title =   $form_data_edit['title'];
        $new_package->description =   $form_data_edit['description'];
        $new_package->typology_id =   $form_data_edit['typology_id'];
        $new_package->apartment_id =   $form_data_edit['apartment_id'];
        $new_package->user_id =   $form_data_edit['user_id'];
        $new_package->departure =   $form_data_edit['departure'];
        $new_package->return =   $form_data_edit['return'];
        $new_package->price =   $form_data_edit['price'];
        $new_package->update();
  
        return redirect()->route('admin.packages.show', ['package' => $new_package->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package_to_delete = Package::findOrfail($id);
        $package_to_delete->delete();

        return redirect()->route('admin.packages.index', ['deleted' => 'yes']);
    }

    public function getValidation(){
        return [
            'title' => 'required | max:255',
            'description' => 'required | max:60000',
            'departure' => 'required',
            'return' => 'required',
            'price' => 'required | max:7',
        ];
    }
}
