    /* Sparkline Charts
     * -------
     * Here we will create a few charts using Sparkline Charts
     */

$(function() {

    //INITIALIZE SPARKLINE CHARTS
    $(".sparkline").each(function() {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });

    /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
    drawDocSparklines();

});

function drawDocSparklines() {

    // Bar + line composite charts
    $('#compositebar').sparkline('html', {
        type: 'bar',
        barWidth: '10',
        barSpacing: '5',
        width: '90%',
        height: '50px',
        barColor: '#fff'
    });
    $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {
        composite: true,
        fillColor: false,
        lineColor: 'gray'
    });

    // var $el = $(".sparkline[data-type='bar']");
    //
    // var values = $el.data('values').split(',').map(parseFloat);
    // var type = $el.data('type') || 'line' ;
    // var height = $el.data('height') || 'auto';
    //
    // var parentWidth = $el.parent().width();
    // var valueCount = values.length;
    // var barSpacing = 1;
    //
    // var barWidth = Math.round(((parentWidth*0.9) - ( valueCount - 1 ) * barSpacing ) / valueCount);
    //
    // $el.sparkline(values, {width:'100%', type: type, height: height, barWidth: barWidth, barSpacing: barSpacing});

}
