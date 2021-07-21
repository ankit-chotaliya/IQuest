jQuery(document).ready(function($) {
  var ww = document. body. clientWidth;
if (ww < 600) {
$('#applied'). addClass('table-responsive');
$('#savedtable'). addClass('table-responsive');
} else if (ww >= 601) {
$('#applied'). removeClass('table-responsive');
$('#savedtable'). removeClass('table-responsive');
}
});
