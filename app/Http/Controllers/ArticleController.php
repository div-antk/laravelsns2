<?php

namespace App\Http\Controllers;

// モデルを使う
// use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    protected $article;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        // リポジトリパターン
        $this->articleRepository = $articleRepository;
        
        // ポリシーの適用
        // $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        // allメソッドはモデルが持つクラスメソッド
        $articles = $this->articleRepository->getAll();

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
        $articles = $this->articleRepository->sessionArticle($request);
        // セッションに保存
        $request->session()->put('articles', '$articles');

        return view('articles.confirm')->with(['articles' => $articles]);
    }

    // Laravelのコントローラーはメソッドの引数で型宣言を行うと
        // そのクラスのインスタンスが自動で生成されてメソッド内で使えるようになります。
    // このようにメソッドの内部で他のクラスのインスタンスを生成するのではなく
        // 外で生成されたクラスのインスタンスをメソッドの引数として受け取る流れをDI(Dependency Injection)と言います。

    public function store(Request $request)
    {
        $this->articleRepository->createArticle($request);
        
        return view('articles.complete');
    }

    public function edit(Article $article)
    {
        return view('articles.edit')->with(['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $this->articleRepository->updateArticle($request, $article);
        
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show')->with(['article' => $article]);
    }

    public function destroy(Article $article)
    {
        $this->articleRepository->deleteArticle($article);

        return redirect()->route('articles.index');
    }
}
