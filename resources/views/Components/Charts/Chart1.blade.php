<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.8.5/d3.min.js"></script>
<div class="form-1 chart-1">
    @if (!isset($_GET['FromDate_FILTERBYDATE']) AND !isset($_GET['EndDate_FILTERBYDATE']))
    <div class="chart-header">LIVE DATA</div> 
    @endif
    <div id="chart-wrap"></div>
</div>
<script>
    const wrap = d3.select('#chart-wrap');
    let wrapWidth = parseInt(wrap.style('width'));
    let wrapHeight; 
    const colorsArray = [
        @if (!empty($NumberOfVessels_IDLE))
        '#52f781', 
        @else
        '#fff', 
        @endif
        @if (!empty($NumberOfVessels_DOCKING))
        '#03AED2', 
        @else
        '#fff', 
        @endif
        @if (!empty($NumberOfVessels_BREAKDOWN))
        '#da1e28',  
        @else
        '#fff', 
        @endif
        @if (!empty($NumberOfVessels_MAINTENANCE))
        '#aaa', 
        @else
        '#fff', 
        @endif
        @if (!empty($NumberOfVessels_INSPECTION))
        '#ff832b', 
        @else
        '#fff', 
        @endif
        @if (!empty($NumberOfVessels_BUNKERY))
        '#8a3ffc',
        @else
        '#fff', 
        @endif
        @if (
            ($NumberOfVessels_IDLE == 0) AND
            ($NumberOfVessels_DOCKING == 0) AND
            ($NumberOfVessels_BREAKDOWN == 0) AND
            ($NumberOfVessels_MAINTENANCE == 0) AND
            ($NumberOfVessels_INSPECTION == 0) AND
            ($NumberOfVessels_BUNKERY == 0) 
        )
            '#52f781',
        @endif
    ];  
    const formatPerc = d3.format('.0%');
    let width;
    let height;
    let total;
    let pieRadius;
    let pie;
    let arc;

    // Tooltip functions
    const tooltipMouseMove = (d) => {
        const xArc = arc.centroid(d)[0] + (width / 3);
        const yArc = arc.centroid(d)[1] + (height / 3);
        
        tooltipChart
        .html(() => {
            return (
            `<div class="chart-tooltip-wrap">
                <p>Percentage: ${formatPerc(d.value / total)}</p>
                <p>Value: ${d.value}</p>
            </div>
            `
            );
        })
        .style('visibility', 'visible')
        .style('top', 0)
        .style('left', 0)
        .style("transform", `translate(${xArc + 200}px, ${yArc + 50}px)`);
    }

    const tooltipMouseOut = () => {
    tooltipChart
        .style('visibility', 'hidden')
    }

    // Pie
    if (wrapWidth <= 479) {
    width = 250;
    height = 250;
    } else {
    width = 300;
    height = 300;
    }

    pieRadius = Math.min(width / 2, height / 2);

    pie = d3.pie()
    .value((d) => { return d.value; })
    .padAngle(0.03);

    arc = d3.arc()
    .outerRadius(pieRadius)
    .innerRadius(pieRadius / 2);

    // Animation function
    const animate = (f) => {
    f.innerRadius = 0;
    let interp = d3.interpolate({ startAngle: 0, endAngle: 0 }, f);

    return (t) => { return arc(interp(t)); }
    }

    // SVG
    const svg = wrap.append('svg')
    .attr('width', width)
    .attr('height', height);

    // SVG aria tags
    svg.append('title')
    .attr('id','chart-title')
    .html('Vessels');

    svg.append('desc')
    .attr('id','chart-desc')
    .html('Displays arbitrary values for items.');

    svg.attr('aria-labelledby','chart-title chart-desc');

    tooltipChart = wrap.append('div')
        .attr('class','chart-tooltip')
        .style('visibility', 'hidden');

    const g = svg.append('g')
    .attr('width', width)
    .attr('height', height)
    .attr('class','group')
    .style('transform', `translate(${width / 2}px, ${height / 2}px)`);
 
    // Create chart
    async function createDonut() { 
    const data = [  
        { value: {{ $NumberOfVessels_IDLE }} },
        { value: {{ $NumberOfVessels_DOCKING }} },
        { value: {{ $NumberOfVessels_BREAKDOWN }} },
        { value: {{ $NumberOfVessels_MAINTENANCE }} },
        { value: {{ $NumberOfVessels_INSPECTION }} },
        { value: {{ $NumberOfVessels_BUNKERY }} }, 
        @if (
            ($NumberOfVessels_IDLE == 0) AND
            ($NumberOfVessels_DOCKING == 0) AND
            ($NumberOfVessels_BREAKDOWN == 0) AND
            ($NumberOfVessels_MAINTENANCE == 0) AND
            ($NumberOfVessels_INSPECTION == 0) AND
            ($NumberOfVessels_BUNKERY == 0) 
        )
            { value: {{ $NumberOfVessels }} },
        @endif
    ];
    // Descending data
    @if (
        ($NumberOfVessels_IDLE == 0) AND
        ($NumberOfVessels_DOCKING == 0) AND
        ($NumberOfVessels_BREAKDOWN == 0) AND
        ($NumberOfVessels_MAINTENANCE == 0) AND
        ($NumberOfVessels_INSPECTION == 0) AND
        ($NumberOfVessels_BUNKERY == 0) 
    )
        data.sort((a, b) => {
            return d3.descending(+a.value, +b.value);
        });
    @endif
    total = d3.sum(data, (d) => { return d.value; });
    
    // Pie slices
    const legendLabels = {
        "#52f781" : "Ready", 
        "#03AED2" : "Docking", 
        "#da1e28" : "Breakdown", 
        "#aaa" : "Maintenance", 
        "#ff832b" : "Inspection", 
        "#8a3ffc" : "Bunkery"
    };
    const slices = g.selectAll('.arc')
        .data(pie(data))
        .enter()
        .append('path')
        .attr('class', 'slices') 
        .attr('fill', (d,i) => { return colorsArray[i]; })
        .on('mouseover', (event, d) => {
        const f = d;
        tooltipMouseMove(f);
        })
        .on('click', function(d, i) {
            let Loader = document.querySelector('.loader');
            this.classList.add(this.getAttribute('fill')); 
            window.location = '/Availability?FilterValue=' + legendLabels[this.getAttribute('fill')];
            setTimeout(() => {
                Loader.style.display = 'none';
            }, 9000);
            Loader.style.display = 'flex';
        })
        .on('mouseout', () => {
        tooltipMouseOut();
        })
        .transition()
        .duration(1000)
        .delay(100)
        .attrTween('d', animate); 
    // Text values in slices
    const text = g.selectAll('.text')
        .data(pie(data))
        .enter()
        .append('text')
        .attr('transform', (d) => { return `translate(${arc.centroid(d)})`; })
        .attr('class', 'text')
        .style('opacity', '0')
        .text((d,i) => { return formatPerc(d.value / total) })
        .transition()
        .duration(300)
        .delay(700)
        .style('opacity', '1');
    
    // Legend
    const colorsArray1 = ['#52f781', '#03AED2', '#da1e28', '#aaa', '#ff832b', '#8a3ffc'];
    const createLegend = (parent, data, cat, color) => {
        const legendLabels = ["Ready", "Docking", "Breakdown", "Maintenance", "Inspection", "Bunkery"];
        parent.append('div')
            .attr('class', 'legend')
            .selectAll('div')
            .data(legendLabels)
            .enter()
            .append('div')
            .attr('class', 'legend-group')
            .html((Label, i) => {
            return(`
                <div class="legend-box" style="background-color: ${color[i]};"></div>
                <p class="legend-label">${Label}</p>
            `);
            });
        }
    createLegend(wrap, data, 'name', colorsArray1);
    }
    createDonut();

    const resize = () => {
        let wrapWidth = parseInt(wrap.style('width'));
        if (wrapWidth <= 479) {
        width = 250;
        height = 250;
        } else {
        width = 300;
        height = 300;
        }
        
        svg.attr('width', width)
        .attr('height', height);

        g.attr('width', width)
        .attr('height', height)
        .style('transform', `translate(${width / 2}px, ${height / 2}px)`);
    
        pieRadius = Math.min(width / 2, height / 2);

        arc = d3.arc()
        .outerRadius(pieRadius)
        .innerRadius(pieRadius / 2);
 
        d3.selectAll('.slices')
        .attr('d', arc)
        .on('mouseover', (event, d) => {
            const f = d;
            tooltipMouseMove(f);
        })
        .on('mouseout', () => {
            tooltipMouseOut();
        });
    
        d3.selectAll('.text')
        .attr('transform', (d) => { return `translate(${arc.centroid(d)})`; })

        
    }

    d3.select(window).on('resize', resize);

    var div = document.createElement('div');
    div.textContent = 'Availability Report'; 
    var chartContainer = document.getElementById('chart-wrap'); 
    chartContainer.insertBefore(div, chartContainer.firstChild);
    var Close = document.createElement('p');
    Close.classList.add('Close');
    Close.textContent = '✖'; 
    var chartContainer = document.getElementById('chart-wrap'); 
    chartContainer.insertBefore(Close, chartContainer.firstChild);

    const Chart1 = document.querySelector('.chart-1');
    Close.addEventListener('click', () => {
        Chart1.style.display = 'none';
    });

    let Data = document.querySelectorAll('.slices');
    Data.forEach(Value => {
        Value.addEventListener('click', () => {
            console.log(1)
        })
    });
</script>