(function(){
    var data = jQuery.parseJSON($('#data').val());
    // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(function(){
          drawChart();
          drawTechnologiesChart();
      });

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
          var results = jQuery.parseJSON($('#data').val());
              
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'User');
        data.addColumn('number', 'Time');
        data.addRows(results.map(Object.values));

        // Set chart options
        var options = {'title':'Time Used by User',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart1'));
        chart.draw(data, options);
      }
    
    function drawTechnologiesChart(){
          var results = jQuery.parseJSON($('#technologies').val());
              
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Technology');
        data.addColumn('number', 'Time');
        data.addRows(results.map(Object.values));

        // Set chart options
        var options = {'title':'Time Used by Technology',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart2'));
        chart.draw(data, options);
    }
})();