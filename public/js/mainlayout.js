/* ------------------------------------------------------------------------------
 *
 *  # Dashboard configuration
 *
 *  Demo dashboard configuration. Contains charts and plugin initializations
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var Dashboard = function () {


    //
    // Setup module components
    //

    // Setup Switchery
    var _componentSwitchery = function() {
        if (typeof Switchery == 'undefined') {
            console.warn('Warning - switchery.min.js is not loaded.');
            return;
        }

        // Initialize multiple switches
        var switches = Array.prototype.slice.call(document.querySelectorAll('.form-input-switchery'));
        switches.forEach(function(html) {
            var switchery = new Switchery(html);
        });
    };

 

    return {
        initComponents: function() {
            _componentSwitchery();
            // _componentDaterange();
            // _componentIconLetter();
        },
        initCharts: function() {

            
            // Donut charts
            // _MarketingCampaignsDonutChart('#campaigns-donut', 42);
            // _CampaignStatusDonutChart('#campaign-status-pie', 42);
            // _BarChart('#hours-available-bars', 24, 40, true, 'elastic', 1200, 50, '#EC407A', 'hours');
              // _BarChart('#goal-bars', 24, 40, true, 'elastic', 1200, 50, '#5C6BC0', 'goal');
             // _BarChart('#members-online', 24, 50, true, 'elastic', 1200, 50, 'rgba(255,255,255,0.5)', 'members');
               // _chartSparkline('#server-load', 'area', 30, 50, 'basis', 750, 2000, 'rgba(255,255,255,0.5)');
             // _DailyRevenueLineChart('#today-revenue', 50);
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    Dashboard.initComponents();
    Dashboard.initCharts();
});