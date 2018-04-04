<?php
use miloschuman\highcharts\Highcharts;
echo $content; 
echo Highcharts::widget([
   'options' => [
	'chart' => ['type' => 'column','width'=>'500'],
      'title' => ['text' => 'Rating Comparision'],
      'xAxis' => [
         'categories' => ['overall Rating', 'LMS']
      ],
      'yAxis' => [
         'title' => ['text' => 'Ratings']
      ],
      'series' => [
         ['name' => 'Ratings', 'data' => [$overall_rating, $lms]],
         
      ]
	  
	  
	  
   ]
]);
?>