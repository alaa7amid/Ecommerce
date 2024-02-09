<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index(){

        return view('admin.dashboard');
    }


    public function admins()
    {
        $admins = User::where('is_admin',1)->select('id','lname','fname','phoneNumber','address','city','created_at','email','country','password')->get();
        return view('admin.admins.admins',compact('admins'));
    }
    public function adminsStore(Request $request)
    {
        $admin = new User();
        $admin->fname = $request->fname;
        $admin->lname = $request->lname;
        $admin->email= $request->email;
        $admin->password = Hash::make($request->password);
        $admin->phoneNumber = $request->phoneNumber;
        $admin->address = $request->address;
        $admin->country = $request->country;
        $admin->city = $request->city;
        $admin->is_admin = $request->is_admin ? '1' : '0';
        $admin->save();
        return redirect()->route('admins');
    }


    public function adminsCreate(Request $request)
    {
        return view('admin.admins.creat');
    }

    public function adminsUpdate(Request $request, $id)
    {
        // dd
        
        $admins=User::findOrFail($id);
        $admins->update([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'address'=>$request->address,
            'city'=>$request->city,
            'country'=>$request->country,
            ]);

            return redirect()->route('admins');

        }


        
    public function adminShow($id){
        $admin = User::find($id);
        return view('admin.admins.show',compact('admin'));
    }

    public function adminEdit($id)
    {
        $admin = User::find($id);
        return view('admin.admins.edit',compact('admin'));


    }


    public function adminDelete($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('admins');
    }

















    public static function NumberOfAdmins()
    {
        $numOfAdmins = User::where('is_admin','1')->count();
        return $numOfAdmins;
    }

    public static function NumberOfUsers()
    {
        $numOfAdmins = User::where('is_admin','0')->count();
        return $numOfAdmins;
    }

    public static function NumberOfCategory_Prodect()
{
    // احصل على قائمة جميع الأقسام
    $categories = Category::all();

    // انشئ مصفوفة لتخزين عدد المنتجات لكل قسم
    $productsCountByCategory = [];

    // حلق عبر كل قسم واحصل على عدد المنتجات لكل واحد منها
    foreach ($categories as $category) {
        // استخدم العلاقة hasMany للحصول على المنتجات المرتبطة بالقسم الحالي
        $productsCount = $category->prodects()->count();

        // أضف عدد المنتجات إلى مصفوفة العدادات
        $productsCountByCategory[$category->name] = $productsCount;
    }

    return $productsCountByCategory;
}

}
