var btc_price = [];
var btc_time = [];
var areaChart = null;
$(document).ready(function() {

    $('#crypto').on('change',function(e) {
  
      // Set request
      var jenis = $('#crypto option:selected').val();
      $.ajax({
            url: 'chart/select',
            type: 'GET',
            data: { jenis: jenis },
            success: function(response)
            {
                console.log(response);
                var length = response.length;
                let times = [];
                let price = [];
                console.log(length);
                for (let i = 0; i < response.length; i++) {
                    times.push(response[i].created);
                    var pr = response[i].price.split(".").join("");
                    price.push(parseInt(pr));
                }

                btc_price=price;
                btc_time=times;
                if (areaChart!=null) {
                    areaChart.destroy();
                }
                chart(price,times,jenis);
            }
        });
  
    }).change();
  
  });

/* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
function chart(price,times,jenis) {
    var areaChartCanvas = $('#btc-chart').get(0).getContext('2d')
    
    console.log(price);
    var areaChartData = {
      labels  : times,
      datasets: [
        {
          label               : jenis,
          fill                  : false,
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : price
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: true
      },
    tooltips: {
        mode: 'index',
        intersect: false,
    },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          },
          ticks: {           
            min:100
        }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    areaChart       = new Chart(areaChartCanvas, { 
        type: 'line',
        data: areaChartData, 
        options: areaChartOptions
        })
    
}