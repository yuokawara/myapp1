<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでApp Modelが扱えるようになる
use App\App;
use App\AppHistory;
use Carbon\Carbon;
use Storage;


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
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $app->image_path = Storage::disk('s3')->url($path);
      } else {
          $app->image_path = null;
      }
      // movie用保存
      if (isset($form['movie'])) {
        $path = Storage::disk('s3')->putFile('/',$form['movie'],'public');
        $app->movie = Storage::disk('s3')->url($path);
      } else {
          $app->movie = null;
      }


      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // movie //
      // unset($form['movie']);

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
            // それ以外はすべての投稿を取得する
            $posts = App::all();
        }
        return view('admin.app.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    // 以下を追記

  public function edit(Request $request)
  {
      // app Modelからデータを取得する
      $app = App::find($request->id);
      if (empty($app)) {
        abort(404);
      }
      return view('admin.app.edit', ['app_form' => $app]);
  }

      // Update
  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, App::$rules);
      // App Modelからデータを取得する
      $app = App::find($request->id);
      // 送信されてきたフォームデータを格納する
      $app_form = $request->all();
      if (isset($app_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $app->image_path = basename($path);
        unset($app_form['image']);
      } elseif (0 == strcmp($request->remove, 'true')) {
        $app->image_path = null;
      }
      // movie用
      // Validationをかける
      $this->validate($request, App::$rules);
      // // App Modelからデータを取得する
      $app = App::find($request->id);
      // // 送信されてきたフォームデータを格納する
      $app_form = $request->all();
      if (isset($app_form['movie'])) {
        $path = $request->file('movie')->store('public/movie');
        $app->movie = basename($path);
        unset($app_form['image']);
      } elseif (0 == strcmp($request->remove, 'true')) {
        $app->movie = null;
      }

      unset($app_form['_token']);
      unset($app_form['remove']);

      // 該当するデータを上書きして保存する
      $app->fill($app_form)->save();
      // 以下を追記
        $app_histories = new AppHistory;
        $app_histories->app_id = $app->id;
        $app_histories->edited_at = Carbon::now();
        $app_histories->save();


      return redirect('admin/app');
  }
  // 以下を追記
  public function delete(Request $request)
  {
      // 該当するApp Modelを取得
      $app = App::find($request->id);
      // 削除する
      $app->delete();
      return redirect('admin/app/');
  }
}
