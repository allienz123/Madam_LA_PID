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
use Illuminate\Support\Facades\DB;


class DashboardController extends OperatorController {

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $title = "Dashboard";

        $customers = Customers::count();
        $cids = DcCustomers::where('dc_customers.status', '=', '0')->count();

        // ********************************
        // ********************************
        // Show customer segmentation graph
        // ********************************
        // ********************************
        $query = Customers::join('customers_segment','customers_segment.id','=','customers.customers_segment')
                ->select('customers_segment.segment_name','customers_segment', DB::Raw('count(*) as total'))
                ->groupBy('customers_segment')
                ->get();
        
        //Pool data series in $counSegment array
        $countSegment = [];
        foreach ($query as $data) {
            //Show Legend Name
            $listSegment ['name'] = $data->segment_name;
            //Show data
            $listSegment ['y'] = $data->total;
            $listSegment ['url'] = $data->customers_segment;
            //echo $data->total.'<br>';
            array_push($countSegment, $listSegment);
            }  

        $segmentChart['series']=array(
            array(
            "name"=>'Total Customer',
            "colorByPoint" => 'true',
            'data'=>$countSegment
            ));
        $segmentChart["credits"] = array("enabled" => false); 
        $segmentChart["chart"] = array("type" => "pie");
        $segmentChart["title"] = array('text' => 'DC Customer Segmentation', 'style'=>array(
                'align'=>'center',
                'fontWeight'=>"bold"
                ));

        $segmentChart["plotOptions"] = array(
            'pie' =>array(
            'allowPointSelect'=> true,
            'cursor'=>'pointer',
            'point'=> 'events',
            'dataLabels'=>array(
                'enabled'=>true,
                'format'=> '<b>{point.name}</b>: {point.percentage:.1f} %',
                'style'=>array(
                'color'=>"(Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' ",
                'fontStyle'=>'italic',
                )   
            ),
            'showInLegend'=> 'true',
            
            )   
        );

        //print_r($countSegment);
        $segmentChart["legend"] = array(
            'title' => array('text'=>'Segmentation :', 'style'=>array('fontWeight'=>"bold")),
            'layout'=>'vertical',
            'verticalAlign'=>'middle',
            'align' => 'right');

		return view('operator.dashboard.index',  compact('title', 'countSegment','customers','cids'));
	}
}