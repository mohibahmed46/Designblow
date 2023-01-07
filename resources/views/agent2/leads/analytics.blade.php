@extends('agent2.includes.master')
@section('title', 'Leads')
@section('content')

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
                label: "Assigned Leads",
                fillColor: "#67C7EB",
                strokeColor: "#67C7EB",
                pointColor: "#67C7EB",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "#55ce63",
                data: [
                    @foreach($categories as $val)
                        {{count($val->agent2pendingLead) + count($val->agent2markedLeads)}},
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
                pointHighlightStroke: "#55ce63",
                data: [
                    @foreach($categories as $val)
                        {{count($val->agent2pendingLead)}},
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
                pointHighlightStroke: "#55ce63",
                data: [
                    @foreach($categories as $val)
                        {{count($val->agent2markedLeads)}},
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
                pointHighlightStroke: "#55ce63",
                data: [
                    @foreach($categories as $val)
                        {{count($val->agent2followupLeads)}},
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