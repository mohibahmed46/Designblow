@extends('admin.includes.master')
@section('title', 'Leads')
@section('content')

<style>
</style>

<div class="container-fluid">
<div class="row">
<div class="col-lg-7"> 
    <div class="user-analytics">
    	<div class="card" id="user-analytics">
        	<div class="card-body">
            		<h4 class="card-title">User Analytics</h4>
            	<div>
                	<canvas id="chart2" height="150"></canvas>
            	</div>
                <div class="legend_div">
                    <ul>
                        <li>
                            <div class="" style="background-color: #67C7EB"></div>
                            <p>Assigned Lead</p>
                        </li>
                        <li>
                            <div class="" style="background-color: #B97D10"></div>
                            <p>Pending Lead</p>
                        </li>
                        <li>
                            <div class="" style="background-color: #FBCA03"></div>
                            <p>Marked Lead</p>
                        </li>
                        <li>
                            <div class="" style="background-color: #FF6700"></div>
                            <p>Follow-Up</p>
                        </li>
                    </ul>
                </div>
        	</div>
    	</div>
    </div>
</div>

<div class="col-lg-5">
  <div class="leads-analytics">
    <div class="card" id="leads-analytics">
        <div class="card-body">
            <h4 class="card-title">Leads Analytics</h4>
            <div>
                <canvas id="chart3" height="150"></canvas>
            </div>
            <div class="legend_div">
                <ul>
                    <li>
                        <div class="" style="background-color: #67C7EB"></div>
                        <p>Assigned Lead</p>
                    </li>
                    <li>
                        <div class="" style="background-color: #B97D10"></div>
                        <p>Pending Lead</p>
                    </li>
                    <li>
                        <div class="" style="background-color: #FBCA03"></div>
                        <p>Marked Lead</p>
                    </li>
                    <li>
                        <div class="" style="background-color: #FF6700"></div>
                        <p>Follow-Up</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </div>  
</div>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
  <div class="category-analytics">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category Analytics</h4>
            <div>
                <canvas id="chart6" height="150"></canvas>
            </div>
            <br><br>
            <div class="legend_div">
                    <ul>
                        <li>
                            <div class="" style="background-color: #cf9fff"></div>
                            <p>Fresh Lead</p>
                        </li>
                        <li>
                            <div class="" style="background-color: #67C7EB"></div>
                            <p>Assigned Lead</p>
                        </li>
                        <li>
                            <div class="" style="background-color: #B97D10"></div>
                            <p>Pending Lead</p>
                        </li>
                        <li>
                            <div class="" style="background-color: #FBCA03"></div>
                            <p>Marked Lead</p>
                        </li>
                        <li>
                            <div class="" style="background-color: #FF6700"></div>
                            <p>Follow-Up</p>
                        </li>
                    </ul>
                </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>

@endsection

@section('addScript')
	<script type="text/javascript">
		
    var ctx2 = document.getElementById("chart2").getContext("2d");
    var data2 = {
        labels: [ 
        	@foreach($users as $val)
        		"{{$val->name}}",
        	@endforeach
            @if(count($users) < 5)
                @for($i=0; $i<(5-count($users)); $i++)
                "N/A",
                @endfor
            @endif
        		],
        datasets: [
            {
                label: "Total Assinged ",
                fillColor: "#67C7EB",
                strokeColor: "#67C7EB",
                highlightFill: "#67C7EB",
                highlightStroke: "#67C7EB",
                data: [
		        	@foreach($users as $val)
		        		"{{count($val->pendingLeads) + count($val->markedLeads)}}",
		        	@endforeach
        		]

            },

            {
                label: "Assigned Leads",
                fillColor: "#B97D10",
                strokeColor: "#B97D10",
                highlightFill: "#B97D10",
                highlightStroke: "#B97D10",
                data: [
		        	@foreach($users as $val)
		        		"{{count($val->pendingLeads)}}",


		        	@endforeach
		        	]
            },
            {
                label: "Locked Leads",
                fillColor: "#FBCA03",
                strokeColor: "#FBCA03",
                highlightFill: "#FBCA03",
                highlightStroke: "#FBCA03",
                data: [
		        	@foreach($users as $val)
		        		"{{count($val->markedLeads)}}",
		        	@endforeach
		        	]
            },
            {
                label: "Follow-Up",
                fillColor: "#FF6700",
                strokeColor: "#FF6700",
                highlightFill: "#FF6700",
                highlightStroke: "#FF6700",
                data: [
                    @foreach($users as $val)
                        "{{count($val->followupLeads)}}",
                    @endforeach
                    ]
            },

        ]

    };


    
    var chart2 = new Chart(ctx2).Bar(data2, {
        scaleBeginAtZero : true,
        scaleShowGridLines : true,
        scaleGridLineColor : "rgba(0,0,0,.005)",
        scaleGridLineWidth : 0,
        scaleShowHorizontalLines: true,
        scaleShowVerticalLines: true,
        barShowStroke : true,
        barStrokeWidth : 0,
		tooltipCornerRadius: 2,
        barDatasetSpacing : 9,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });
	</script>

    <script type="text/javascript">
        
           var ctx3 = document.getElementById("chart3").getContext("2d");
    var data3 = [
        {
            value: {{$total_leads}},
            color:"#67C7EB",
            highlight: "#67C7EB",
            label: "Total Leads"
        },
        {
            value: {{$total_pending_leads}},
            color: "#B97D10",
            highlight: "#B97D10",
            label: "Assigned Leads"
        },
         {
            value: {{$total_marked_leads}},
            color: "#FBCA03",
            highlight: "#FBCA03",
            label: "Locked Leads"
        },
        {
            value: {{$followup}},
            color: "#FF6700",
            highlight: "#FF6700",
            label: "Follow-Up"
        },
    ];
    
    var myPieChart = new Chart(ctx3).Pie(data3,{
        segmentShowStroke : true,
        segmentStrokeColor : "#fff",
        segmentStrokeWidth : 0,
        animationSteps : 100,
        tooltipCornerRadius: 0,
        animationEasing : "easeOutBounce",
        animateRotate : true,
        animateScale : false,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });

    </script>

    <script>
        
    var ctx6 = document.getElementById("chart6").getContext("2d");
    var data6 = {
        labels: [
            @foreach($categories as $val)
                "{{$val->name}}",
            @endforeach
        ],
        datasets: [
            {
                label: "Total Leads",
                fillColor: "#67C7EB",
                strokeColor: "#67C7EB",
                pointColor: "#67C7EB",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#55ce63",
                data: [
                    @foreach($categories as $val)
                        {{count($val->totalLeads)}},
                    @endforeach
                ]
            },
            {
                label: "New Leads",
                fillColor: "#cf9fff",
                strokeColor: "#cf9fff",
                pointColor: "#cf9fff",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(97,100,193,1)",
                data: [
                    @foreach($categories as $val)
                        {{count($val->freshLeads)}},
                    @endforeach
                ]
            },
            {
                label: "Assigned Leads",
                fillColor: "#B97D10",
                strokeColor: "#B97D10",
                pointColor: "#B97D10",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(97,100,193,1)",
                data: [
                    @foreach($categories as $val)
                        {{count($val->pendingLeads)}},
                    @endforeach
                ]
            },
            {
                label: "Locked Leads",
                fillColor: "#FBCA03",
                strokeColor: "#FBCA03",
                pointColor: "#FBCA03",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(97,100,193,1)",
                data: [
                    @foreach($categories as $val)
                        {{count($val->markedLeads)}},
                    @endforeach
                ]
            },
            {
                label: "Follow-Up",
                fillColor: "#FF6700",
                strokeColor: "#FF6700",
                pointColor: "#FF6700",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(97,100,193,1)",
                data: [
                    @foreach($categories as $val)
                        {{count($val->followupLeads)}},
                    @endforeach
                ]
            }
        ]
    };
    
    var myRadarChart = new Chart(ctx6).Radar(data6, {
        scaleShowLine : true,
        angleShowLineOut : true,
        scaleShowLabels : false,
        scaleBeginAtZero : true,
        angleLineColor : "rgba(0,0,0,.1)",
        angleLineWidth : 1,
        pointLabelFontFamily : "'Arial'",
        pointLabelFontStyle : "normal",
        pointLabelFontSize : 10,
        pointLabelFontColor : "#666",
        pointDot : true,
        pointDotRadius : 3,
        tooltipCornerRadius: 2,
        pointDotStrokeWidth : 1,
        pointHitDetectionRadius : 20,
        datasetStroke : true,
        datasetStrokeWidth : 2,
        datasetFill : true,
        legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        responsive: true
    });

    </script>

@endsection