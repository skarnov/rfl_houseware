

public function manage_categories() {
        $data = array();
        $data['title'] = 'Categories';
        $data['all_categories'] = DB::table('categories')->paginate(10);
        $data['home'] = view('stock/manage_categories', $data);
        return view('admin/master', $data);
    }

    public function add_category() {
        $data = array();
        $data['title'] = 'Add Category';
        $data['home'] = view('stock/add_category', $data);
        return view('admin/master', $data);
    }

    public function save_category(Request $request) {
        request()->validate([
            'url_slug' => 'unique:categories'
        ]);
        $data = array();
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('name'))));
        $data['category_status'] = $request->input('status');
        $data['create_date'] = current_date();
        $data['create_time'] = current_time();
        $data['created_by'] = Auth::user()->id;
        DB::table('categories')->insert($data);
        return redirect('manage_categories')->with('message', 'Category Saved!');
    }

    public function edit_category($id) {
        $data = array();
        $data['title'] = 'Edit Category';
        $data['category_info'] = DB::table('categories')->where('category_id', $id)->first();
        $data['home'] = view('stock/edit_category', $data);
        return view('admin/master', $data);
    }

    public function update_category(Request $request) {
        $id = $request->input('id');
        request()->validate([
            'url_slug' => 'unique:categories,url_slug,' . $id,
        ]);
        $data = array();
        $data['category_serial'] = $request->input('serial');
        $data['category_name'] = $request->input('name');
        $data['url_slug'] = preg_replace("/-$/", "", preg_replace('/[^a-z0-9]+/i', "-", strtolower($request->input('name'))));
        $data['category_status'] = $request->input('status');
        $data['modify_date'] = current_date();
        $data['modify_time'] = current_time();
        $data['modified_by'] = Auth::user()->id;
        DB::table('categories')
                ->where('category_id', $request->input('id'))
                ->update($data);
        return redirect('manage_categories')->with('message', 'Category Updated!');
    }

    public function delete_category($id) {
        $result = DB::table('categories')->where('category_id', $id)->delete();
        if ($result) {
            return redirect('manage_categories')->with('message', 'Category Deleted!');
        } else {
            return redirect('manage_categories')->with('error', 'Category Not Deleted!');
        }
    }