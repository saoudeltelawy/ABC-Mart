<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{




    public function __construct()
    {
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_delete'])->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        
        $allusers = User::whereRoleIs(['admin' , 'user'])->where( function($q) use($request) {
            return($q)-> when($request->table_search , function($alldata) use($request){

                return $alldata->where( 'name' , 'like' , '%' . $request->table_search . '%')
                ->orWhere( 'email' , 'like' , '%' . $request->table_search . '%')
                ->orwhere( 'id' , 'like' , '%' . $request->table_search . '%');
    
            });
        })->latest()->paginate(5);
        
        
        
        $numofallusers = User::all();

        return view('admin.user.index' , compact('allusers' , 'numofallusers'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.user.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'                  => 'required',
                'email'                 => 'required | unique:users',
                'password'              => 'required|confirmed',
                'profile_image'         => 'image',
                'role'                  => 'required ',
                'permissions'           => 'required | min:1',
                
            ]
            );
           
        $requested_data = $request->except(['password' , 'password_confirmation' , 'permissions' , 'role' , 'profile_image'] );

            if($request->profile_image){

               Image::make($request->profile_image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $request->profile_image->hashName()));
            $requested_data['profile_image'] = $request->profile_image->hashName();
            }
            else{
                $requested_data['profile_image'] = 'Profile_default.png'; 
            }
       
        $requested_data['password'] = bcrypt($request->password);

        $user = User::create($requested_data);
        $user->attachRole($request->role);
        $user->syncPermissions($request->permissions);


        session()->flash('success' , __('site.added_successfuly'));

        return redirect('/admin/user');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        return view ( 'admin.user.edit' , compact('user') );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        $request->validate(
            [
                'name'                  => 'required',
                'email'                 => ['required' ,  Rule::unique('users')->ignore($user->id), ],
                'profile_image'         => 'image',
                'role'                  => 'required ',
                'permissions'           => 'required | min:1',
            ]
            );

            $requested_data = $request->except([ 'permissions' , 'role' , 'profile_image'] );

            if($request->profile_image){
                if($user->profile_image != 'Profile_default.png'){

                    Storage::disk('public_uploads')->delete('/users/' . $user->profile_image);
         
                 }
                 Image::make($request->profile_image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/users/' . $request->profile_image->hashName()));
    
                
                $requested_data['profile_image'] =  $request->profile_image->hashName() ;
            }
         

            $user->update( $requested_data);

            $user->detachPermissions( [ 'users_create' , 'users_read' , 'users_update' , 'users_delete' ] );
            $user->detachRoles(['manager', 'admin' , 'user']); 

            $user->attachRole($request->role);
            $user->syncPermissions($request->permissions);
         
            session()->flash('success' , __('site.update_successfuly'));

            return redirect('/admin/user');








    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if($user->profile_image != 'Profile_default.png'){

           Storage::disk('public_uploads')->delete('/users/' . $user->profile_image);

        }
       
        $user->delete();

        session()->flash('success' , __('site.delete_successfuly'));

        return redirect()->route('user.index');

    }
}
