<?php

namespace App\Http\Controllers\UIF;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Category_News;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UIFIndexController extends Controller
{
    public function index(){

        $popular_news =News::orderByDesc('created_at')->take(3)->get();
        $news_banner_1 = News::orderByDesc('created_at')->first();
        $news_banner_2 = News::whereNot('id',$news_banner_1->id)->orderByDesc('created_at')->first();
        $news_banner_3 = News::whereNotIn('id',[$news_banner_1->id,$news_banner_2->id,])->orderByDesc('created_at')->first();
        $news = News::whereNotIn('id',[$news_banner_1->id,$news_banner_2->id,$news_banner_3->id])->orderByDesc('created_at')->get();

//        $news_with_category_get = DB::table('category_news')
//            ->join('news', 'news.id', 'category_news.id')
//            ->join('category', 'category.id', 'category_news.category_id')
//            ->select('news.*', 'category.category_name','category.slug as cate_slug')
//            ->whereNotIn('news.id',[$news_banner_1->news_id,$news_banner_2->news_id,$news_banner_3->news_id])
//            ->orderBy('news.created_at','DESC')
//            ->get();
//
//
//        $news_all = array();
//        $x = 0;
//        foreach ($news_all_get as $nag) {
//            $news_all[$x] = $nag->id;
//            $x++;
//        }
//
//
//        $news_with_category = array();
//        $i = 0;
//        foreach ($news_with_category_get as $nwcg) {
//            $news_with_category[$i] = $nwcg->id;
//            $i++;
//        }
//
//        $not_category_news = array_diff($news_all,$news_with_category);
//
//        $news_total = array_merge($not_category_news, $news_with_category);
//        $news =News::whereIn('id',$news_total)->get();

        $categories=Category_News::with('category')->get();


        return view('uif.index',compact('categories','popular_news','news_banner_1','news_banner_2','news_banner_3','news'));
    }


}
