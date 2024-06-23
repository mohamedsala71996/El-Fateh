<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Traits\media;
use App\Models\Comment;

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
        if ($request->hasFile('pdf')) {
            $pdfName = $this->upload_image($request->pdf, 'articles');
            $data['pdf'] = $pdfName;
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

        $oldPdfName = DB::table('articles')->select('pdf')->where('id', $id)->first()->pdf;

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
        if ($request->has('pdf')) {
            if (empty($request->pdf)) {
                $pdf_path = public_path('/dist/img/articles/' . $oldPdfName);
                $data['pdf'] = $pdf_path;
            } else {
                $oldPdfPath = public_path('/dist/img/articles/' . $oldPdfName);
                $this->delete_image($oldPdfPath);

                $pdfName = $this->upload_image($request->pdf, 'articles');
                $data['pdf'] = $pdfName;
            }
        }

        DB::table('articles')->where('id', $id)->update($data);
        return redirect()->route('all_articles')->with('success', 'Article updated successfully!');
    }




    public function delete_article($id)
    {
        $article = DB::table('articles')->select(['image','pdf'])->where('id', $id)->first();
        $oldImageName = $article->image;
        $oldPdfName = $article->pdf;

        $image_path = public_path('/dist/img/articles/' . $oldImageName);
        $pdf_path = public_path('/dist/img/articles/' . $oldPdfName);

        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }
        if (file_exists($pdf_path) && is_file($pdf_path)) {
            unlink($pdf_path);
        }

        $article = DB::table('articles')->where('id', $id)->first();
        if (!$article) {
            return redirect()->back()->with('error', 'Article not found.');
        }

        DB::table('articles')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Article deleted successfully.');
    }

   public function show_comments($article_id)
    {
        $comments = Comment::where('article_id',$article_id)->get();
        return view('dashboard.articles.show_comments', compact('comments'));

    }
   public function pending_comments()
    {
        $comments = Comment::where('status','pending')->get();
        return view('dashboard.articles.pending_comments', compact('comments'));

    }
   public function comment_controll(Request $request, $id)
    {
        $comment = Comment::where('id',$id)->update([
            'status' => $request->status
        ]);
        return redirect()->back()->with('success', 'Data saved successfully.');

    }
    
       public function comment_destroy($id)
    {
        $comment = Comment::destroy($id);
        return redirect()->back()->with('success', 'Comment deleted successfully.');

    }


}