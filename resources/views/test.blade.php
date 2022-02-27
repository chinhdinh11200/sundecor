@foreach ($datas as $data)
    <p>{{ $data->name }}</p>
    @foreach ( $data->product_menu as  $value)
        <span>{{ $value->subcategory_id }}</span>
        <span> ưu tiên{{ $value->priority }}</span>
    @endforeach
@endforeach
{{-- $menus1 = Menu::where(function($query) {
    $query->where("menu_type_id",2)
        ->orWhere("menu_type_id",4);
})
->where('parent_menu_id', 0)
->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
->with(['products' => function($query) {
    $query->orderBy(DB::raw('ISNULL(priority), priority'), 'ASC')
            ->with('product_size');
}])
->get(); --}}
