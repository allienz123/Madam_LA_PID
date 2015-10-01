<?php namespace App\Http\Controllers\Operator;

use App\Http\Controllers\OperatorController;
use App\Article;
use App\ArticleCategory;
use App\User;
use App\Video;
use App\VideoAlbum;
use App\Photo;
use App\PhotoAlbum;
use App\DcCustomers;
use App\Customers;

class DashboardController extends OperatorController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $title = "Dashboard";

        $customers = Customers::count();
        $cids = DcCustomers::count();
        $news = Article::count();
        $newscategory = ArticleCategory::count();
        $users = User::count();
        $photo = Photo::count();
        $photoalbum = PhotoAlbum::count();
        $video = Video::count();
        $videoalbum = VideoAlbum::count();
		return view('operator.dashboard.index',  compact('title','customers','cids','news','newscategory','video','videoalbum','photo',
            'photoalbum','users'));
	}
}