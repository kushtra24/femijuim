<?php

namespace App\Http\Controllers;

use App\Models\Article;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // nxjerrmi te gjitha te dhenat nga tabela artikuj
        $articles = Article::all(); // SELECT * FROM articles

        // kthema nje pergjigje ne form te json me variablen (te dhenat) dhe nje status code 200
        return response()->json($articles, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // ne tabelen articles futi te gjitha te dhenat
        $article = Article::create($request->all());

        // kthema nje pergjigje json me 200
        return response()->json($article, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // nese ska id gjuje error
        if (!isset($id)) {
            throw new \InvalidArgumentException('Ska id', 400);
        }

        $article = Article::Where('id', $id); // Select * from Articles where Id = 12;

        return response()->json($article, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // a ka id
        if (!isset($id)) {
            throw new InvalidArgumentException('Ska ID Bac', 403);
        }
        //gjeje ate nje artikull me id te cilen e kam dhene
        $article = Article::find($id);
        // perditesoje ate artikull
        $article->update($request->all()); // Alter Articles where Id is 12 "'titullin', 'permbajtjen' etj"

        // kthema nje pergjigje
        return response()->json('Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // gjeje artikullin permes ketij ID-je
        $article = Article::find($id);
        // fshije artikullin
        $article->delete();
        // kthema nje pergjigje
        return response()->json('Deleted', 200);
    }
}
