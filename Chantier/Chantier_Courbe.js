// All the code for the JS line chart will come here
function getData() {
  //On entre les différents points de notre courbe (abscisses et ordonnées)
    return [
      ['1990',12],
      ['1991',14],
      ['1993',21],
      ['1994',21],
      ['1996',26],
      ['1998',26],
      ['2000',27],
      ['2002',31],
      ['2004',29],
      ['2006',31],
      ['2008',36],
      ['2010',41],
      ['2012',42],
      ['2014',48],
      ['2016',50],
      ['2018',57]
    ];
}
// create a data set on our data
var dataSet = anychart.data.set(getData());
// map data for the line chart,
// take x from the zero column and value from the first column
//Donc on définit x comme la colonne 0 et y comme la clonne 1
var seriesData = dataSet.mapAs({ x: 0, value: 1 });
// create a line chart
//Je sais pas c quoi
var chart = anychart.line();
// configure the chart title text settings
//Le titre du graphique
chart.title('Acceptance in the US over the last 2 decades');
// set the y axis title
chart.yAxis().title('% of people who accept ');
// create a line series with the mapped data
//Relier les points
var lineChart = chart.line(seriesData);
// set the container id for the line chart
chart.container('container');
// draw the line chart
chart.draw();

function data2(){
  return [
    ['1990',12],
    ['1991',14],
    ['1993',21],
    ['1994',21],
    ['1996',26],
    ['1998',26],
    ['2000',27],
    ['2002',31],
    ['2004',29],
    ['2006',31],
    ['2008',36],
    ['2010',41],
    ['2012',42],
    ['2014',48],
    ['2016',50],
    ['2018',57]
  ];
}
// create a data set on our data
var dataSet = anychart.data.set(data2());
// map data for the line chart,
// take x from the zero column and value from the first column
//Donc on définit x comme la colonne 0 et y comme la clonne 1
var seriesData = dataSet.mapAs({ x: 0, value: 1 });
// create a line chart
//Je sais pas c quoi
var chart = anychart.line();
// configure the chart title text settings
//Le titre du graphique
chart.title('Test 2eme courbe');
// set the y axis title
chart.yAxis().title('% of people who accept ');
// create a line series with the mapped data
//Relier les points
var lineChart = chart.line(seriesData);
// set the container id for the line chart
chart.container('graph2');
// draw the line chart
chart.draw();

  
