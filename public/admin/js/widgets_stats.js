/* ------------------------------------------------------------------------------
 *
 *  # Statistics widgets
 *
 *  Demo JS code for widgets_stats.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var StatisticWidgets = function() {

    // Progress arc - single color
    var _progressArcSingle = function(element, size) {
        if (typeof d3 == 'undefined') {
            console.warn('Warning - d3.min.js is not loaded.');
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if(element) {

            // Main variables
            var d3Container = d3.select(element),
                radius = size,
                thickness = 20,
                color = '#29B6F6';


            // Create chart
            // ------------------------------

            // Add svg element
            var container = d3Container.append("svg");
            
            // Add SVG group
            var svg = container
                .attr('width', radius * 2)
                .attr('height', radius + 20)
                .attr('class', 'gauge');


            // Construct chart layout
            // ------------------------------

            // Pie
            var arc = d3.svg.arc()
                .innerRadius(radius - thickness)
                .outerRadius(radius)
                .startAngle(-Math.PI / 2);


            // Append chart elements
            // ------------------------------

            //
            // Group arc elements
            //

            // Group
            var chart = svg.append('g')
                .attr('transform', 'translate(' + radius + ',' + radius + ')');

            // Background
            var background = chart.append('path')
                .datum({
                    endAngle: Math.PI / 2
                })
                .attr({
                    'd': arc,
                    'fill': '#eee'
                });

            // Foreground
            var foreground = chart.append('path')
                .datum({
                    endAngle: -Math.PI / 2
                })
                .style('fill', color)
                .attr('d', arc);

            // Counter value
            var value = svg.append('g')
                .attr('transform', 'translate(' + radius + ',' + (radius * 0.9) + ')')
                .append('text')
                .text(0 + '%')
                .attr({
                    'text-anchor': 'middle',
                    'fill': '#555'
                })
                .style({
                    'font-size': 19,
                    'font-weight': 400
                });


            //
            // Min and max text
            //

            // Group
            var scale = svg.append('g')
                .attr('transform', 'translate(' + radius + ',' + (radius + 15) + ')')
                .style({
                    'font-size': 12,
                    'fill': '#999'
                });

            // Max
            scale.append('text')
                .text(100)
                .attr({
                    'text-anchor': 'middle',
                    'x': (radius - thickness / 2)
                });

            // Min
            scale.append('text')
                .text(0)
                .attr({
                    'text-anchor': 'middle',
                    'x': -(radius - thickness / 2)
                });


            //
            // Animation
            //

            // Interval
            setInterval(function() {
                update(Math.random() * 100);
            }, 1500);

            // Update
            function update(v) {
                v = d3.format('.0f')(v);
                foreground.transition()
                    .duration(750)
                    .call(arcTween, v);

                value.transition()
                    .duration(750)
                    .call(textTween, v);
            }

            // Arc
            function arcTween(transition, v) {
                var newAngle = v / 100 * Math.PI - Math.PI / 2;
                transition.attrTween('d', function(d) {
                    var interpolate = d3.interpolate(d.endAngle, newAngle);
                    return function(t) {
                        d.endAngle = interpolate(t);
                        return arc(d);
                    };
                });
            }

            // Text
            function textTween(transition, v) {
                transition.tween('text', function() {
                    var interpolate = d3.interpolate(this.innerHTML, v),
                        split = (v + '').split('.'),
                        round = (split.length > 1) ? Math.pow(10, split[1].length) : 1;
                    return function(t) {
                        this.innerHTML = d3.format('.0f')(Math.round(interpolate(t) * round) / round) + '<tspan>%</tspan>';
                    };
                });
            }
        }
    };

    // Progress arc - multiple colors
    var _progressArcMulti = function(element, size, goal) {
        if (typeof d3 == 'undefined') {
            console.warn('Warning - d3.min.js is not loaded.');
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if(element) {

            // Main variables
            var d3Container = d3.select(element),
                radius = size,
                thickness = 20,
                startColor = '#66BB6A',
                midColor = '#FFA726',
                endColor = '#EF5350';

            // Colors
            var color = d3.scale.linear()
                .domain([0, 70, 100])
                .range([startColor, midColor, endColor]);


            // Create chart
            // ------------------------------

            // Add svg element
            var container = d3Container.append("svg");
            
            // Add SVG group
            var svg = container
                .attr('width', radius * 2)
                .attr('height', radius + 20);


            // Construct chart layout
            // ------------------------------

            // Pie
            var arc = d3.svg.arc()
                .innerRadius(radius - thickness)
                .outerRadius(radius)
                .startAngle(-Math.PI / 2);


            // Append chart elements
            // ------------------------------

            //
            // Group arc elements
            //

            // Group
            var chart = svg.append('g')
                .attr('transform', 'translate(' + radius + ',' + radius + ')');

            // Background
            var background = chart.append('path')
                .datum({
                    endAngle: Math.PI / 2
                })
                .attr({
                    'd': arc,
                    'fill': '#eee'
                });

            // Foreground
            var foreground = chart.append('path')
                .datum({
                    endAngle: -Math.PI / 2
                })
                .style('fill', startColor)
                .attr('d', arc);

            // Counter value
            var value = svg.append('g')
                .attr('transform', 'translate(' + radius + ',' + (radius * 0.9) + ')')
                .append('text')
                .text(0 + '%')
                .attr({
                    'text-anchor': 'middle',
                    'fill': '#555'
                })
                .style({
                    'font-size': 19,
                    'font-weight': 400
                });


            //
            // Min and max text
            //

            // Group
            var scale = svg.append('g')
                .attr('transform', 'translate(' + radius + ',' + (radius + 15) + ')')
                .style({
                    'font-size': 12,
                    'fill': '#999'
                });

            // Max
            scale.append('text')
                .text(100)
                .attr({
                    'text-anchor': 'middle',
                    'x': (radius - thickness / 2)
                });

            // Min
            scale.append('text')
                .text(0)
                .attr({
                    'text-anchor': 'middle',
                    'x': -(radius - thickness / 2)
                });


            //
            // Animation
            //

            // Interval
            setInterval(function() {
                update(Math.random() * 100);
            }, 1500);

            // Update
            function update(v) {
                v = d3.format('.0f')(v);
                foreground.transition()
                    .duration(750)
                    .style('fill', function() {
                        return color(v);
                    })
                    .call(arcTween, v);

                value.transition()
                    .duration(750)
                    .call(textTween, v);
            }

            // Arc
            function arcTween(transition, v) {
                var newAngle = v / 100 * Math.PI - Math.PI / 2;
                transition.attrTween('d', function(d) {
                    var interpolate = d3.interpolate(d.endAngle, newAngle);
                    return function(t) {
                        d.endAngle = interpolate(t);
                        return arc(d);
                    };
                });
            }

            // Text
            function textTween(transition, v) {
                transition.tween('text', function() {
                    var interpolate = d3.interpolate(this.innerHTML, v),
                        split = (v + '').split('.'),
                        round = (split.length > 1) ? Math.pow(10, split[1].length) : 1;
                    return function(t) {
                        this.innerHTML = d3.format('.0f')(Math.round(interpolate(t) * round) / round) + '<tspan>%</tspan>';
                    };
                });
            }
        }
    };

    // Pie arc with legend
    var _pieArcWithLegend = function(element, size) {
        if (typeof d3 == 'undefined') {
            console.warn('Warning - d3.min.js is not loaded.');
            return;
        }

        // Initialize chart only if element exsists in the DOM
        if(element) {


            // Basic setup
            // ------------------------------

            // Add data set
            var data = arc_data;
            // Main variables
            var d3Container = d3.select(element),
                distance = 2, // reserve 2px space for mouseover arc moving
                radius = (size/2) - distance,
                sum = d3.sum(data, function(d) { return d.value; });



            // Tooltip
            // ------------------------------

            var tip = d3.tip()
                .attr('class', 'd3-tip')
                .offset([-10, 0])
                .direction('e')
                .html(function (d) {
                    return "<ul class='list-unstyled mb-1'>" +
                        "<li>" + "<div class='font-size-base my-1'>" + d.data.icon + d.data.status + "</div>" + "</li>" +
                        "<li>" + "Total: &nbsp;" + "<span class='font-weight-semibold float-right'>" + d.value + "</span>" + "</li>" +
                        "<li>" + "Share: &nbsp;" + "<span class='font-weight-semibold float-right'>" + (100 / (sum / d.value)).toFixed(2) + "%" + "</span>" + "</li>" +
                    "</ul>";
                });



            // Create chart
            // ------------------------------

            // Add svg element
            var container = d3Container.append("svg").call(tip);
            
            // Add SVG group
            var svg = container
                .attr("width", size)
                .attr("height", size / 2)
                .append("g")
                    .attr("transform", "translate(" + (size / 2) + "," + (size / 2) + ")");  



            // Construct chart layout
            // ------------------------------

            // Pie
            var pie = d3.layout.pie()
                .sort(null)
                .startAngle(-Math.PI / 2)
                .endAngle(Math.PI / 2)
                .value(function (d) { 
                    return d.value;
                }); 

            // Arc
            var arc = d3.svg.arc()
                .outerRadius(radius)
                .innerRadius(radius / 1.3);



            //
            // Append chart elements
            //

            // Group chart elements
            var arcGroup = svg.selectAll(".d3-arc")
                .data(pie(data))
                .enter()
                .append("g") 
                    .attr("class", "d3-arc")
                    .style({
                        'stroke': '#fff',
                        'stroke-width': 2,
                        'cursor': 'pointer'
                    });
            
            // Append path
            var arcPath = arcGroup
                .append("path")
                .style("fill", function (d) {
                    return d.data.color;
                });


            //
            // Interactions
            //

            // Mouse
            arcPath
                .on('mouseover', function(d, i) {

                    // Transition on mouseover
                    d3.select(this)
                    .transition()
                        .duration(500)
                        .ease('elastic')
                        .attr('transform', function (d) {
                            d.midAngle = ((d.endAngle - d.startAngle) / 2) + d.startAngle;
                            var x = Math.sin(d.midAngle) * distance;
                            var y = -Math.cos(d.midAngle) * distance;
                            return 'translate(' + x + ',' + y + ')';
                        });

                    $(element + ' [data-slice]').css({
                        'opacity': 0.3,
                        'transition': 'all ease-in-out 0.15s'
                    });
                    $(element + ' [data-slice=' + i + ']').css({'opacity': 1});
                })
                .on('mouseout', function(d, i) {

                    // Mouseout transition
                    d3.select(this)
                    .transition()
                        .duration(500)
                        .ease('bounce')
                        .attr('transform', 'translate(0,0)');

                    $(element + ' [data-slice]').css('opacity', 1);
                });

            // Animate chart on load
            arcPath
                .transition()
                    .delay(function(d, i) {
                        return i * 500;
                    })
                    .duration(500)
                    .attrTween("d", function(d) {
                        var interpolate = d3.interpolate(d.startAngle,d.endAngle);
                        return function(t) {
                            d.endAngle = interpolate(t);
                            return arc(d);  
                        }; 
                    });


            //
            // Append total text
            //

            svg.append('text')
                .attr('class', 'text-muted')
                .attr({
                    'class': 'half-donut-total',
                    'text-anchor': 'middle',
                    'dy': -33
                })
                .style({
                    'font-size': '12px',
                    'fill': '#999'
                })
                .text('Total');


            //
            // Append count
            //

            // Text
            svg
                .append('text')
                .attr('class', 'half-conut-count')
                .attr('text-anchor', 'middle')
                .attr('dy', -5)
                .style({
                    'font-size': '21px',
                    'font-weight': 500
                });

            // Animation
            svg.select('.half-conut-count')
                .transition()
                .duration(1500)
                .ease('linear')
                .tween("text", function(d) {
                    var i = d3.interpolate(this.textContent, sum);

                    return function(t) {
                        this.textContent = d3.format(",d")(Math.round(i(t)));
                    };
                });


            //
            // Legend
            //

            // Add legend list
            var legend = d3.select(element)
                .append('ul')
                .attr('class', 'chart-widget-legend')
                .selectAll('li')
                .data(pie(data))
                .enter()
                .append('li')
                .attr('data-slice', function(d, i) {
                    return i;
                })
                .attr('style', function(d, i) {
                    return 'border-bottom: solid 2px ' + d.data.color;
                })
                .text(function(d, i) {
                    return d.data.status + ': ';
                });

            // Legend text
            legend.append('span')
                .text(function(d, i) {
                    return d.data.value;
                });
        }
    };

 

    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _progressArcSingle("#arc_single", 78);
            _progressArcMulti("#arc_multi", 78, 700);

            _pieArcWithLegend("#pie_arc_legend", 170);
        }
    }
}();


// Initialize module
// ------------------------------

// When content loaded
document.addEventListener('DOMContentLoaded', function() {
    StatisticWidgets.init();
});
