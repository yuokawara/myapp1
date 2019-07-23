<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでApp Modelが扱えるようになる
use App\App;

class MyAppController extends Controller
{
  public function add()
  {
      return view('admin.app.create');
  }

  public function create(Request $request)
  {

      // 以下を追記
      // Varidationを行う
      $this->validate($request, App::$rules);

      $app = new App;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$app->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $app->image_path = basename($path);
      } else {
          $app->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $app->fill($form);
      $app->save();

      return redirect('admin/app/create');
  }
  // 以下を追記
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = App::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = App::all();
        }
        return view('admin.app.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
}
