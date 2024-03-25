<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\traits\media;

class ArticleController extends Controller
{
    use media;

    public function all_articles()
    {
        $articles = DB::table('articles')->get();
        $adminId = auth()->guard('admin')->id();

        $admin = DB::table('admins')->where('id', $adminId)->first();
        return view('dashboard.articles.all_articles', compact('articles', 'admin'));
    }

    public function create_article()
    {
        return view('dashboard.articles.add_article');
    }

    public function store_article(StoreArticleRequest $request)
    {
        $adminId = auth()->guard('admin')->id();

        $data = $request->except('_token');
        $data['admin_id'] = $adminId;

        if ($request->hasFile('image')) {
            $photoName = $this->upload_image($request->image, 'articles');
            $data['image'] = $photoName;
        }

        DB::table('articles')->insert($data);
        return redirect()->route('all_articles')->with('success', 'Article created successfully!');
    }


    public function edit_article($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();
        return view('dashboard.articles.edit_article', compact('article'));
    }

    public function update_article(UpdateArticleRequest $request, $id)
    {
        $data = $request->except('_token', '_method');

        $oldImageName = DB::table('articles')->select('image')->where('id', $id)->first()->image;

        if ($request->has('image')) {
            if (empty($request->image)) {
                $image_path = public_path('/dist/img/articles/' . $oldImageName);
                $data['image'] = $image_path;
            } else {
                $oldImagePath = public_path('/dist/img/articles/' . $oldImageName);
                $this->delete_image($oldImagePath);

                $photoName = $this->upload_image($request->image, 'articles');
                $data['image'] = $photoName;
            }
        }

        DB::table('articles')->where('id', $id)->update($data);
        return redirect()->route('all_articles')->with('success', 'Article updated successfully!');
    }




    public function delete_article($id)
    {
        $article = DB::table('articles')->select('image')->where('id', $id)->first();
        $oldImageName = $article->image;

        $image_path = public_path('/dist/img/articles/' . $oldImageName);

        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $article = DB::table('articles')->where('id', $id)->first();
        if (!$article) {
            return redirect()->back()->with('error', 'Article not found.');
        }

        DB::table('articles')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Article deleted successfully.');
    }
}