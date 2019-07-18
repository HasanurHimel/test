<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\BlogSection;
use App\MOdels\Carousel;
use App\Models\Category;
use App\Models\Media;
use App\Models\SubCategory;
use App\Notifications\NotifiAdmin;
use App\Policies\BlogPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Blog;



class BlogController extends Controller
{
   
   public function __construct()
    {
		$this->middleware('can:blogs.update,App\Models\Blog')->only(['show', 'update']);
    }
   
   
   
   
    public function index()
    {
        if (auth()->user()->can('blogs.viewAny')) {

            if (auth()->user()->can('admins.create')) {
                $blogs = Blog::orderBy('id', 'DESC')
                    ->get();
                return view('Backend.includes.blog.blog-manage', compact('blogs'));


            } else {
                $blogs = Blog::where('admin_id', auth()->user()->id)
                    ->orderBy('id', 'DESC')
                    ->get();
                return view('Backend.includes.blog.blog-manage', compact('blogs'));
            }
        }

          return redirect()->back();


}



    public function create()
    {
        if (auth()->user()->can('blogs.create')) {

            $data=[];
            $data['blogSections']=BlogSection::orderBy('name', 'ASC')->get();
            $data['categories']=Category::orderBy('category_name', 'ASC')->get();
            $data['subcategories']=SubCategory::orderBy('subcategory_name', 'ASC')->get();

            return view('Backend.includes.blog.blog-create', $data);
        }
        return redirect()->back();

    }

    function make_slug($string) {
        return preg_replace('/\s+/u', '-', trim($string));
    }




    public function store(Request $request)
    {

//        return $request->all();
        if (auth()->user()->can('blogs.create')) {

            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'blog_title' => 'required|min:5|max:120|unique:blogs',
                'blog_short_description' => 'required|min:5|max:180',
                'blog_long_description' => 'required|min:5',
                'blog_image' => 'required',
                'blog_section_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            try {

                $request->thumbnail ? : $request['thumbnail']=0;
                $blog=Blog::create([
                    'admin_id' => auth()->user()->id,
                    'category_id' => $request->input('category_id'),
                    'sub_category_id' => $request->input('subcategory_id'),
                    'blog_title' => $request->input('blog_title'),
                    'slug' => $this->make_slug($request->input('blog_title')),
                    'blog_short_description' => $request->input('blog_short_description'),
                    'blog_long_description' => $request->input('blog_long_description'),
                    'author_name' => auth()->user()->name,
                    'thumbnail' => $request->input('thumbnail'),
                    'blog_section_id' => $request->input('blog_section_id'),
                    'publication_status' => $request->input('publication_status'),
                ]);

        }
            catch (\Exception $e) {
                $this->setWarning('Please valid input');
            }
			$blog->addMedia($request->file('blog_image'))->toMediaCollection('blog');



//            Notifications for super admin




            foreach (auth()->user()->roles as $role) {
                if ($role->name=='Super-admin'){
                    $admin_id=$role->id;
                }
            }
            $admin=Admin::find(1);

            $admin->notify((new NotifiAdmin($blog)));


            $this->setSuccess('Your Blog created successfully done');
            return redirect()->back();

        }
        return redirect()->back();
    }


    public function show($id)
    {
        
            $data = [];
            $data['blogSections']=BlogSection::orderBy('name', 'ASC')->get();
            $data['categories'] = Category::orderBy('category_name', 'ASC')->get();
            $data['subcategories'] = SubCategory::orderBy('subcategory_name', 'ASC')->get();
            $data['blog'] = Blog::find($id);
            return view('Backend.includes.blog.blog-edit', $data);
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //return $request->all();
            $validator = Validator::make($request->all(), [
                'category_id' => 'required',
                'blog_title' => 'required|min:5|max:120',
                'blog_short_description' => 'required|min:5|max:180',
                'blog_long_description' => 'required|min:5',
                'blog_section_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $blog = Blog::find($id);
			
		
				$request->thumbnail ? : $request['thumbnail']=0;
           $blog->update([
                    'admin_id' => auth()->user()->id,
                    'category_id' => $request->input('category_id'),
                    'sub_category_id' => $request->input('subcategory_id'),
                    'blog_title' => $request->input('blog_title'),
                    'slug' => $this->make_slug($request->input('blog_title')),
                    'blog_short_description' => $request->input('blog_short_description'),
                    'blog_long_description' => $request->input('blog_long_description'),
                    'author_name' => auth()->user()->name,
                    'thumbnail' => $request->input('thumbnail'),
                    'blog_section_id' => $request->input('blog_section_id'),
                    'publication_status' => $request->input('publication_status'),

                ]);
		   
		   
            if ($request->file('blog_image')) {
                $existingImage = Media::where('model_id', $id)
                    ->where('collection_name', 'blog')
                    ->first();

                $newFile = $request->file('blog_image');
                $existingImage->updateFile($newFile);
            }


            $this->setSuccess('Your Blog updated successfully done');
            return redirect()->route('blog.index');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function publishedBlog($id){

        //if (auth()->user()->can('blogs.status')) {

            $blog = Blog::find($id);

            $blog->publication_status = 1;
            $blog->save();

            $this->setSuccess('Your blog Published successfully done');
            return redirect()->back();
        //}
        //return redirect()->back();
    }
    public function unpublishedBlog($id){

        //if (auth()->user()->can('blogs.status')) {
            $blog = Blog::find($id);

            $blog->publication_status = 0;
            $blog->save();

            $this->setSuccess('Your blog Published successfully done');
            return redirect()->back();

        //}
        //return redirect()->back();
    }

    public function deleteBlog($id){
        if (auth()->user()->can('blogs.delete')) {
            $blog = Blog::find($id);
            $blog->delete();
            $this->setSuccess('Your blog deleted successfully done !');
            return redirect()->back();
            }
        return redirect()->back();


        }
    }
