(function(){
    
    // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(function(){
          drawUsersChart();
          drawTechnologiesChart();
          drawActivityTypesChart();
          drawCountriesChart();
          drawTerritoriesChart();
      });

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawUsersChart() {
          var results = jQuery.parseJSON($('#user_data').val());
              
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
        var chart = new google.visualization.PieChart(document.getElementById('user_chart'));
        chart.draw(data, options);
      }
    
    function drawTechnologiesChart(){
          var results = jQuery.parseJSON($('#technology_data').val());
              
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
        var chart = new google.visualization.PieChart(document.getElementById('technology_chart'));
        chart.draw(data, options);
    }
    
    function drawActivityTypesChart(){
          var results = jQuery.parseJSON($('#activity_type_data').val());
              
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Activity Type');
        data.addColumn('number', 'Time');
        data.addRows(results.map(Object.values));

        // Set chart options
        var options = {'title':'Time Used by Activity Type',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('activity_type_chart'));
        chart.draw(data, options);
    }
    
    function drawCountriesChart(){
          var results = jQuery.parseJSON($('#country_data').val());
              
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Country');
        data.addColumn('number', 'Time');
        data.addRows(results.map(Object.values));

        // Set chart options
        var options = {'title':'Time Used by Country',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('country_chart'));
        chart.draw(data, options);
    }
    
    function drawTerritoriesChart(){
          var results = jQuery.parseJSON($('#territory_data').val());
              
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Territory');
        data.addColumn('number', 'Time');
        data.addRows(results.map(Object.values));

        // Set chart options
        var options = {'title':'Time Used by Territory',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('territory_chart'));
        chart.draw(data, options);
    }
})();