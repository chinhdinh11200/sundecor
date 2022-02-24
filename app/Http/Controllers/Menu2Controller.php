<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menutype;
use App\Rules\Required;
use App\Rules\Unique;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Menu2Controller extends Controller
{

    public function menu_type_id()
    {
        $id = $_GET['id'];
        $parent_menu_id = $_GET['parent_menu_id'];
        // dd($menu_id);
        $menu1 = Menu::where('parent_menu_id', 0)->where('menu_type_id', $id)->orderBy('name', 'ASC')->get();  //paginate: PHÂN TRANG
?>
        <?php if (count($menu1) != 0) : ?>
            <label for="exampleInputEmail1">Loại menu</label>
            <select type="text" class="form-control" id="parent_menu_id" name="parent_menu_id">
                <option value=<?php echo null?> >---Chọn menu cha---</option>
                <?php foreach ($menu1 as $mt1) : ?>
                    <option value="<?= $mt1->id ?>" <?php
                                                    if ($parent_menu_id == $mt1->id) {
                                                        echo "selected";
                                                    }
                                                    ?>><?= $mt1->name ?></option>
                <?php endforeach ?>
            </select>
        <?php endif; ?>
<?php
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::where('parent_menu_id', "<>", 0)->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->paginate(8);
        // dd($menu);
        $menu1 = Menu::where('parent_menu_id', 0)->where('menu_type_id', 2)->get();
        return view('admin.menu2.index', ['datas' => $menu, 'menu1' => $menu1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        $menu1 = Menu::where('parent_menu_id', 0);
        $menutype = Menutype::all();
        return view('admin.menu2.create', ['menu1' => $menu1, 'menutype' => $menutype])->with('menus', $menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [new Required, new Unique],
            'title' => [new Required, new Unique],
            'keyword' => [new Required, new Unique],
            'menu_type_id' => [new Required],
            'parent_menu_id' => [new Required],
        ]);
        $data = new Menu();
        $data->name = $request->input('name'); //nhận nhập tên loại trong input
        $data->title = $request->input('title'); //nhận nhập tên loại trong input
        $data->menu_type_id = $request->input('menu_type_id');
        $data->content_1 = $request->input('content_1'); //nhận nhập tên loại trong input
        $data->content_2 = $request->input('content_2');
        $data->slug = Str::slug($request->input('name')). '.html'; //nhận nhập tên loại trong input
        $data->keyword = $request->input('keyword'); //nhận nhập tên loại trong input
        $data->priority = $request->input('priority');
        if ($request->has('priority')) {
            $check = Menu::where('priority', $data->priority)->where('parent_menu_id', $request->input('parent_menu_id'))->first();
            if ($check != null) {
                $check->priority = null;
                $check->update();
            }
        }
        //$data->ten_img = $request->input('images'); //nhận nhập tên loại trong input
        if ($request->hasFile('images')) //has(name-input) //has-kiểm tra tồn tại hay ko
        {
            $file = $request->file('images');
            $ten_images = time() . '.' . $file->extension();
            $request->file('images')->move(public_path('upload/images/menu2'), $ten_images);
            $data->images = $ten_images;
        }
        $data->parent_menu_id = "0";
        if ($request->has('parent_menu_id')) {
            $data->parent_menu_id = $request->input('parent_menu_id');
        }

        $data->description = $request->input('description');
        $data->content_1 = $request->input('content_1');
        $data->content_2 = $request->input('content_2');
        $status = 0;
        if ($request->has('status')) //has(name-input) //has-kiểm tra tồn tại hay ko
        {
            $status = $request->input('status');
        }
        $data->status = $status;
        $data->save();
        return redirect()->route('admin.menu2.index'); //điều hướng đến foder category - flie index
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::where('parent_menu_id', $id)->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->paginate(20);
        $menu1 = Menu::where('parent_menu_id', 0)->where('menu_type_id', 2)->get();
        return view('admin.menu2.show', ['datas' => $menu, 'menu1' => $menu1, 'parent_menu_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $menus = Menu::all();
        $menu1 = Menu::where('parent_menu_id', 0);
        $menutype = Menutype::all();
        return view('admin.menu2.edit', ['menu1' => $menu1, 'menutype' => $menutype])->with('menus', $menus)->with('menu', $menu);
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
        $request->validate([
            'name' => [new Required],
            'title' => [new Required],
            'keyword' => [new Required],
            'menu_type_id' => [new Required],
            'parent_menu_id' => [new Required],
        ]);
        $menu_update = Menu::find($id);
        $image_url = '';

        if ($request->hasFile('images')) { // kiểm tra có up ảnh
            if ($menu_update->images) {  // kieemrtra cẩn sửa có ảnh chưa
                if (File::exists(public_path('upload/images/menu2/') . $menu_update->images)) {
                    unlink(public_path('upload/images/menu2/') . $menu_update->images);
                }
            }
            $image_url = time() . '.' . $request->images->extension();
            $request->images->move(public_path('upload/images/menu2'), $image_url);
            $menu_update->images = $image_url;
        }

        if ($request->has('priority')) {
            $menu_check = Menu::where('parent_menu_id', $request->input('parent_menu_id'))
                ->where('priority', $request->input('priority'))->first();
            if($menu_check){
                if($menu_check->id != $menu_update->id){
                    $menu_check->priority = null;
                    $menu_check->update();
                }
            }
        }

        $menu_update->name = $request->input('name'); //nhận nhập tên loại trong input
        $menu_update->title = $request->input('title'); //nhận nhập tên loại trong input
        $menu_update->menu_type_id = $request->input('menu_type_id');
        $menu_update->content_1 = $request->input('content_1'); //nhận nhập tên loại trong input
        $menu_update->content_2 = $request->input('content_2');
        $menu_update->slug = Str::slug($request->input('name')). '.html'; //nhận nhập tên loại trong input
        $menu_update->keyword = $request->input('keyword'); //nhận nhập tên loại trong input
        $menu_update->priority = $request->input('priority');
        $menu_update->status = $request->input('status');

        $menu_update->update();

        return redirect()->route('admin.menu2.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $menu = Menu::find($id);

        if($menu->images){
            if(File::exists(public_path('upload/images/menu2/') . $menu->images)){
                unlink(public_path('upload/images/menu2/') . $menu->images);
            }
        }

        $menu->delete();
        return redirect()->route('admin.menu2.index');

    }

    public function search(Request $request){
        $search = Str::slug(($request->input('s')));
        if($search == ''){
            return redirect()->route('admin.menu2.index');
        }else {
            $menu = Menu::where('parent_menu_id', "<>", 0)->where('menu_type_id', 2)->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')->where('slug', 'like', '%'.$search.'%')->paginate(8);
            $menu1 = Menu::where('parent_menu_id', 0)->where('menu_type_id', 2)->get();
            $menu->appends(['s' => $search]);
            return view('admin.menu2.search', ['datas' => $menu, 'menu1' => $menu1]);
        }
    }
}
