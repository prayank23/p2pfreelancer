<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AdminQuery;
use App\GigCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function viewdashboard()
    {
        return view('admin.dashboard.index');
    }

    public function usersQueries()
    {
        $queries = AdminQuery::with('user')->orderBydesc('created_at')->get();

       if(count($queries)>0){
           return view('admin.UserQueries.index')->withQueries($queries);
       }else{
           return view('admin.UserQueries.index')->with('info','No User Queries Found');
       }
    }

    public function getUserQueryModalData()
    {
        $id = request('id');

        $query = AdminQuery::with('user')->where('id',$id)->first();

        $view = \View::make('admin.modals.user-query-modal', ['query' => $query]);

        return $view;
    }

    public function postUserQueryStatus()
    {
        // dd(request()->all());

        $query = AdminQuery::find(request('id'));
        $query->status = request('status');
        $query->save();
    }

    public function deleteUserQuery(AdminQuery $query)
    {
        $query->delete();
        return back()->with('success','Query deleted successfully');
    }

    public function viewusers()
    {
        $users = User::all();
        return view('admin.Users.index')->withUsers($users);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return back()->with('success','User Deleted Successfully');
    }

    public function editUser(User $user)
    {
        $fields = DB::table('user_details_fields')->select('name')->get();
        return view('admin.Users.edit')->withUser($user)->withFields($fields);
    }

    public function updateUser()
    {
        $user = User::find(request('id'));

        request()->validate([
            'name'=>'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $data = request()->except('_token');
        $id = request('id');

        User::where('id',$id)
          ->update($data);






        // $user->name = request('name');
        // $user_name_parts = explode(' ',$user->name);
        // $first_name = $user_name_parts[0];
        // $last_name = end($user_name_parts);
        // $user->first_name = $first_name;
        // $user->last_name = $last_name;
        // $user->email = request('email');
        // $user->phone = request('phone');
        // $user->skills = request('skills');
        // $user->experience = request('experience');
        // $user->status = request('status');
        // $user->save();

        return back()->with('success','User Updated Successfully');
    }

    public function adminLoginDetailsView()
    {
        $admin = Admin::first();
        return view('admin.login.login-details-edit')->withAdmin($admin);
    }

    public function storeAdminLogin()
    {
        // dd(request()->all());
        $admin = Admin::first();

        if(!request('old_password')){
            request()->validate([
                'name' => 'required|string',
                'email' => 'required|email',
            ]);

             $admin->name = request('name');
             $admin->email = request('email');
             $admin->save();

             return back()->with('success','Settings saved successfully');
        }else{
            request()->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'old_password' => 'required',
                'password' => 'required|confirmed|min:5'
            ]);

             if (!Hash::check(request('old_password'), $admin->password)) {
                return back()->with('error','Wrong old Password');
            }

            $admin->name = request('name');
            $admin->email = request('email');
            $admin->password = bcrypt(request('password'));
            $admin->save();

            return back()->with('success','Settings saved successfully');
        }
    }

    public function createGigCategory()
    {
        $parent = GigCategory::where('parent_id',0)->get();
        return view('admin.gigs.category.index')->withParent($parent);
    }

    public function storecreateGigCategory()
    {
        request()->validate([
            'name' => 'required|string',
        ]);

        if(!request('main_category')){
            $main_category = 0;
        }else{
            $main_category = request('main_category');
        }

        $data = [
            'parent_id' => $main_category,
            'name' => request('name'),
        ];

        GigCategory::create($data);

        return back()->with('success','Category Created Successfully');

    }

    public function viewGigCategory()
    {
        $categories = GigCategory::all();
        return view('admin.gigs.category.view')->withCategories($categories);
    }

    public function editGigCategory(GigCategory $gigCategory)
    {
        $parent = GigCategory::where('parent_id',0)->get();

        return view('admin.gigs.category.edit')->withParent($parent)->withCategory($gigCategory);
    }

    public function updateGigCategory(GigCategory $gigCategory)
    {
        request()->validate([
            'name' => 'required|string',
        ]);

        if(request('main_category')) {
            $data = [
                'parent_id' => request('main_category'),
                'name' => request('name'),
            ];
        }else{

            $data = [
                'parent_id' => 0,
                'name' => request('name'),
            ];

        }

        $gigCategory->update($data);

        return back()->with('success','Category Updated Successfully');
    }

    public function deleteGigCategory(GigCategory $gigCategory)
    {
        $parent = $gigCategory->isparent($gigCategory->id);
        if(!$parent){

            $gigCategory->delete();

            return back()->with('success','Sub-Category deleted successfully');

        }else{
            GigCategory::where('parent_id',$gigCategory->id)->delete();
            GigCategory::where('id',$gigCategory->id)->delete();

            return back()->with('success','Category with all its children deleted successfully');
        }

    }

    public function storeUserDetailField()
    {
        // dd(request()->all());
        DB::table('user_details_fields')->insert(['name'=>request('field')]);

        $newColumnType = 'string';
        $newColumnName = request('field');

        Schema::table('users', function (Blueprint $table) use ($newColumnType, $newColumnName) {
            $table->$newColumnType($newColumnName)->nullable();
        });

        return back()->with('success','Settings saved successfully');
    }
}
