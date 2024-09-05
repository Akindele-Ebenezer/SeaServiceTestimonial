<script src="cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script defer>
    function sliceSize(dataNum, dataTotal) {
        return (dataNum / dataTotal) * 360;
    }
    function addSlice(sliceSize, pieElement, offset, sliceID, color) {
    $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
    var offset = offset - 1;
    var sizeRotation = -179 + sliceSize;
    $("."+sliceID).css({
        "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
    });
    $("."+sliceID+" span").css({
        "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
        "background-color": color
    });
    }
    function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
    var sliceID = "s"+dataCount+"-"+sliceCount;
    var maxSize = 179;
    while (sliceSize > 0) {
        sliceID = "s" + dataCount + "-" + sliceCount;
        var currentSliceSize = Math.min(sliceSize, maxSize);
        addSlice(currentSliceSize, pieElement, offset, sliceID, color);
        offset += currentSliceSize;
        sliceSize -= currentSliceSize;
        sliceCount++;
    } 
    }
   
  __Vessels__.forEach(Vessel => {
    Vessel.addEventListener('click', () => { 
    var listData = [];
    function createPie(dataElement, pieElement) {
    // var listData = [];
    $(dataElement+" span").each(function(index, el) {
        listData.push(Number($(this).html().split(" ")[0])); 
    });
    var listTotal = 0;
    for(var i=0; i<listData.length; i++) {
        listTotal += listData[i];
    }
    var offset = 0;
    var color = [
        "#03AED2", 
        "#8a3ffc", 
        "#ff832b", 
        "#eee", 
        "#da1e28", 
        "#52f781", 
        "turquoise", 
        "forestgreen", 
        "navy", 
        "gray"
    ];
    for(var i=0; i<listData.length; i++) {
        var size = sliceSize(listData[i], listTotal);
        iterateSlices(size, pieElement, offset, i, 0, color[i]);
        $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
        offset += size;
    }
    }
    createPie(".pieID.legend", ".pieID.pie");
    Chart4Modal_CloseButton.addEventListener('click', () => {
        listData.length = 0; 
    })
    })
  });
</script>