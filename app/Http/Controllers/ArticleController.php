<?php

namespace App\Http\Controllers;

// モデルを使う
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Repositories\Article\ArticleRepositoryInterface;


class ArticleController extends Controller
{
    protected $Article;

    public function __construct(ArticleRepositoryInterface $ArticleRepository)
    {
        $this->Article = $ArticleRepository;
    }

    public function index()
    {
        // allメソッドはモデルが持つクラスメソッド
        // $articles = Article::all()->sortByDesc('created_at');

        $articles = $this->Article->getAll();

        // viewメソッド
        // 第一引数はビューファイルの指定
        // 第二引数はビューファイルに渡す変数の名称と、その変数の値を連想配列で指定
        // return view('articles.index', ['articles' => $articles]);
        
        // コレでもイケる
        return view('articles.index')->with(['articles' => $articles]);

        // コレでもイケる。compact関数
        // return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    // 確認画面
    public function confirm(Request $request)
    {
        // 入力値の取得
        $articles = new Article($request->all());

        // セッションに保存
        // $request->session()->put('articles', '$articles');

        return view('articles.confirm')->with(['articles' => $articles]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();
        
        return view('articles.complete');
    }

    public function edit(Article $article)
    {
        return view('articles.edit')->with(['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        return redirect()->route('articles.index');
    }
}
