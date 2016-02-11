<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);?>
<!DOCTYPE html>
<html>
<head>
  <title>Russafa Map</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <style>
      html, body, #map-canvas {
        margin: 0;
        padding: 0;
        height: 100%;
      }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script type="text/javascript" src="js/oms.min.js"></script>
    <?php
$xml = file_get_contents('russafa_derive_waypoints.xml');
$xml = new SimpleXMLElement($xml);
$waypoints = array();

function sortFunction( $a, $b ) {
    return strtotime($a["date"]) - strtotime($b["date"]);
}

$i = 0;
foreach($xml->wpt as $k => $v){
  // echo '<pre>';
 $name = (array)$v->name;
 $date = (array)$v->cmt;
 $attributes = (array)$v->attributes();
 // echo '</pre>';
 $attributes = reset($attributes);
  $waypoints[$i]['name'] = $name[0];
  $waypoints[$i]['date'] = $date[0];
  $waypoints[$i]['lat'] = $attributes['lat'];
  $waypoints[$i]['lon'] = $attributes['lon'];
  $i = $i + 1;
};

usort($waypoints, "sortFunction");
// echo '<pre>';
// print_r($waypoints);
// echo '</pre>';
//die;
  ?>
  <script>

var map;
var infowindow = new google.maps.InfoWindow({
  maxWidth: 200
});

// var flagIcon_front = new google.maps.MarkerImage("http://googlemaps.googlermania.com/img/marker_flag.png");
// flagIcon_front.size = new google.maps.Size(35, 35);
// flagIcon_front.anchor = new google.maps.Point(0, 35);

// var flagIcon_shadow = new google.maps.MarkerImage("http://googlemaps.googlermania.com/img/marker_shadow.png");
// flagIcon_shadow.size = new google.maps.Size(35, 35);
// flagIcon_shadow.anchor = new google.maps.Point(0, 35);

function initialize() {
  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng('39.462820','-0.373353'),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var oms = new OverlappingMarkerSpiderfier(map);
  var myMarkers = new Array();
  
myMarkers[0] = {
    'Title' : 'Weeds Under Tree',
  'Desc' : 'The weeds are taking advantage of the space where the decorative tree is planted.',
    'Date' : '26-MAY-14 3:34:30PM',
    'Lat' : '39.461459918',
    'Long' : '-0.365198934',
   'Image' : 'DSC_9196.jpg'
};
myMarkers[1] = {
    'Title' : 'Bird Shit',
  'Desc' : 'Birds use the tree as a perch and defecate on the pavement leaving this pattern.',
    'Date' : '26-MAY-14 3:36:01PM',
    'Lat' : '39.461821513',
    'Long' : '-0.365308654',
   'Image' : 'DSC_9197.jpg'
};
myMarkers[2] = {
    'Title' : 'Erosion',
  'Desc' : 'The city surface wears out over time belying the true use of the city space.',
    'Date' : '26-MAY-14 3:36:55PM',
    'Lat' : '39.461737275',
    'Long' : '-0.365612414',
   'Image' : 'DSC_9198.jpg'
};
myMarkers[3] = {
    'Title' : 'Water',
  'Desc' : 'The reflection of the city in the water opens up another space. Water being an uncommon sight here- it has magical properties.',
    'Date' : '26-MAY-14 3:37:43PM',
    'Lat' : '39.461893430',
    'Long' : '-0.365464557',
   'Image' : 'DSC_9199.jpg'
};
myMarkers[4] = {
    'Title' : 'Erosion Wall',
  'Desc' : 'The veneer of the wall has broken off revealing the true nature of the building material.',
    'Date' : '26-MAY-14 3:40:47PM',
    'Lat' : '39.462876208',
    'Long' : '-0.366217671',
   'Image' : 'DSC_9200.jpg'
};
myMarkers[5] = {
    'Title' : 'Yellow Weed',
  'Desc' : 'A flower bursts forth from the soil proudly displaying its invitation for insects and bees.',
    'Date' : '26-MAY-14 3:42:44PM',
    'Lat' : '39.462923482',
    'Long' : '-0.366384136',
   'Image' : 'DSC_9203.jpg'
};
myMarkers[6] = {
    'Title' : 'Overgrown',
  'Desc' : 'These trees outside a hotel are looking overgrown.',
    'Date' : '26-MAY-14 3:44:10PM',
    'Lat' : '39.463179046',
    'Long' : '-0.366611117',
   'Image' : 'DSC_9204.jpg'
};
myMarkers[7] = {
    'Title' : 'Wear Cycle',
  'Desc' : 'Wear on the cycle path because it shows a commonly used path, and signs of wear the delimited space has worn',
    'Date' : '26-MAY-14 3:45:46PM',
    'Lat' : '39.463602332',
    'Long' : '-0.366272656',
   'Image' : 'DSC_9209.jpg'
};
myMarkers[8] = {
    'Title' : 'Pigeon',
  'Desc' : 'A common bird in the city, a non-human sign, \'strange stranger\' these pigeons don\'t obey the rules, but make use of the architecture and resources.',
    'Date' : '26-MAY-14 3:46:51PM',
    'Lat' : '39.463752536',
    'Long' : '-0.366183976',
   'Image' : 'DSC_9210.jpg'
};
myMarkers[9] = {
    'Title' : 'Weed Wall',
  'Desc' : 'An unusual sight to see a plant growing from the wall - not something intended.',
    'Date' : '26-MAY-14 3:48:15PM',
    'Lat' : '39.463586072',
    'Long' : '-0.366838854',
   'Image' : 'DSC_9211.jpg'
};
myMarkers[10] = {
    'Title' : 'Gathering',
  'Desc' : 'Eddies and flows of wind lead to these leaves gathering making the unseen seen.',
    'Date' : '26-MAY-14 3:50:08PM',
    'Lat' : '39.463405693',
    'Long' : '-0.367648043',
   'Image' : 'DSC_9212.jpg'
};
myMarkers[11] = {
    'Title' : 'Distr Leaves',
  'Desc' : '',
    'Date' : '26-MAY-14 3:53:07PM',
    'Lat' : '39.463315923',
    'Long' : '-0.368134193',
   'Image' : 'DSC_9214.jpg'
};
myMarkers[12] = {
    'Title' : 'Ants Shit',
  'Desc' : 'Ants make their home in the exposed soil like a city in a city.',
    'Date' : '26-MAY-14 3:56:37PM',
    'Lat' : '39.462445630',
    'Long' : '-0.367195252',
   'Image' : 'DSC_9216.jpg'
};
myMarkers[13] = {
    'Title' : 'Grass',
  'Desc' : 'Lush grass reminds me of green fields.',
    'Date' : '26-MAY-14 3:58:10PM',
    'Lat' : '39.461977668',
    'Long' : '-0.367044378',
   'Image' : 'DSC_9217.jpg'
};
myMarkers[14] = {
    'Title' : 'Fig',
  'Desc' : 'An overgrown fig tree blurs the boundaries between the house and the foliage.',
    'Date' : '26-MAY-14 3:59:29PM',
    'Lat' : '39.461840624',
    'Long' : '-0.366967684',
   'Image' : 'DSC_9218.jpg'
};
myMarkers[15] = {
    'Title' : 'Spider',
  'Desc' : 'A nest within a nest - a spider makes use of the space to survive leaving subtle traces.',
    'Date' : '26-MAY-14 4:00:28PM',
    'Lat' : '39.461861243',
    'Long' : '-0.366857881',
   'Image' : 'DSC_9219.jpg'
};
myMarkers[16] = {
    'Title' : 'Little Dry',
  'Desc' : 'I was attracted by the subtle and delicate nature of this plant balancing precariously.',
    'Date' : '26-MAY-14 4:02:01PM',
    'Lat' : '39.462024607',
    'Long' : '-0.366560156',
   'Image' : 'DSC_9222.jpg'
};
myMarkers[17] = {
    'Title' : 'Paint Peeling',
  'Desc' : 'Layers of paint applied, then wear and flake off like layers of the city.',
    'Date' : '26-MAY-14 4:04:24PM',
    'Lat' : '39.461448183',
    'Long' : '-0.367927412',
   'Image' : 'DSC_9224.jpg'
};
myMarkers[18] = {
    'Title' : 'Spiders Web',
  'Desc' : '',
    'Date' : '26-MAY-14 4:06:17PM',
    'Lat' : '39.462086800',
    'Long' : '-0.368482796',
   'Image' : 'DSC_9225.jpg'
};
myMarkers[19] = {
    'Title' : 'Pigeons',
  'Desc' : '',
    'Date' : '26-MAY-14 4:08:45PM',
    'Lat' : '39.462628439',
    'Long' : '-0.368996272',
   'Image' : 'DSC_9226.jpg'
};
myMarkers[20] = {
    'Title' : 'Wear Use',
  'Desc' : '',
    'Date' : '26-MAY-14 4:09:42PM',
    'Lat' : '39.463018700',
    'Long' : '-0.368917817',
   'Image' : 'DSC_9227.jpg'
};
myMarkers[21] = {
    'Title' : 'Marks Wall',
  'Desc' : 'Marks that betray an act of throwing something at the wall - what caused it?',
    'Date' : '26-MAY-14 4:10:32PM',
    'Lat' : '39.463090533',
    'Long' : '-0.368842464',
   'Image' : 'DSC_9228.jpg'
};
myMarkers[22] = {
    'Title' : 'Rust',
  'Desc' : 'Metal - a durable substance eats this pipe. I was attracted by its quality like burnt wood.',
    'Date' : '26-MAY-14 4:12:07PM',
    'Lat' : '39.463548772',
    'Long' : '-0.369355017',
   'Image' : 'DSC_9229.jpg'
};
myMarkers[23] = {
    'Title' : 'Trainers',
  'Desc' : 'A regular sight in a city - a meme - laces tied together and trainers slung over the telephone wire.',
    'Date' : '26-MAY-14 4:14:28PM',
    'Lat' : '39.463706855',
    'Long' : '-0.369398184',
   'Image' : 'DSC_9231.jpg'
};
myMarkers[24] = {
    'Title' : 'Graff',
  'Desc' : 'Rust and graffiti stylistically interplay in a kind of converation.',
    'Date' : '26-MAY-14 4:16:46PM',
    'Lat' : '39.463854712',
    'Long' : '-0.369812669',
   'Image' : 'DSC_9232.jpg'
};
myMarkers[25] = {
    'Title' : 'Corners Erosin',
  'Desc' : 'A sign that this corner is regularly rubbed on by passers-by polishing it and giving a shiny quality.',
    'Date' : '26-MAY-14 4:18:18PM',
    'Lat' : '39.463665616',
    'Long' : '-0.370384147',
   'Image' : 'DSC_9233.jpg'
};
myMarkers[26] = {
    'Title' : 'Buildg',
  'Desc' : '',
    'Date' : '26-MAY-14 4:21:42PM',
    'Lat' : '39.463756559',
    'Long' : '-0.370867699',
   'Image' : 'DSC_9234.jpg'
};
myMarkers[27] = {
    'Title' : 'Stray Leaf',
  'Desc' : 'An out of place object.',
    'Date' : '26-MAY-14 4:22:52PM',
    'Lat' : '39.463557405',
    'Long' : '-0.370688578',
   'Image' : 'DSC_9235.jpg'
};
myMarkers[28] = {
    'Title' : 'Rust Dust Gr',
  'Desc' : '',
    'Date' : '26-MAY-14 4:25:25PM',
    'Lat' : '39.463601746',
    'Long' : '-0.371272797',
   'Image' : 'DSC_9234.jpg'
};
myMarkers[29] = {
    'Title' : 'Fly Post',
  'Desc' : 'Layers of communication - a spot unintentionally delimited for this purpose.',
    'Date' : '26-MAY-14 4:26:50PM',
    'Lat' : '39.463555142',
    'Long' : '-0.371140195',
   'Image' : 'DSC_9238.jpg'
};
myMarkers[30] = {
    'Title' : 'Church',
  'Desc' : 'The construction of the old building displays building materials with a different quality- cut from the rock, not processed.',
    'Date' : '26-MAY-14 4:30:53PM',
    'Lat' : '39.462845698',
    'Long' : '-0.371342786',
   'Image' : 'DSC_9239.jpg'
};
myMarkers[31] = {
    'Title' : 'Piss Plot',
  'Desc' : 'A stinking demolished plot behind a broken fence reveals a take-over by nature.',
    'Date' : '26-MAY-14 4:33:32PM',
    'Lat' : '39.462773697',
    'Long' : '-0.370908519',
   'Image' : 'DSC_9244.jpg'
};
myMarkers[32] = {
    'Title' : 'Road Wear',
  'Desc' : 'The tarmac pitted away eroding the authority of the road.',
    'Date' : '26-MAY-14 4:34:57PM',
    'Lat' : '39.462697087',
    'Long' : '-0.370747084',
   'Image' : 'DSC_9248.jpg'
};
myMarkers[33] = {
    'Title' : 'Dirty Van',
  'Desc' : 'Focussing on patterns.',
    'Date' : '26-MAY-14 4:36:17PM',
    'Lat' : '39.462584853',
    'Long' : '-0.370448940',
   'Image' : 'DSC_9250.jpg'
};
myMarkers[34] = {
    'Title' : 'Shadw',
  'Desc' : 'The shadow is emphemeral.',
    'Date' : '26-MAY-14 4:37:10PM',
    'Lat' : '39.462531125',
    'Long' : '-0.370416669',
   'Image' : 'DSC_9251.jpg'
};
myMarkers[35] = {
    'Title' : 'Twig Sign',
  'Desc' : '',
    'Date' : '26-MAY-14 4:38:32PM',
    'Lat' : '39.462694488',
    'Long' : '-0.370424967',
   'Image' : 'DSC_9253.jpg'
};
myMarkers[36] = {
    'Title' : 'Weeds',
  'Desc' : '',
    'Date' : '26-MAY-14 4:40:12PM',
    'Lat' : '39.461951014',
    'Long' : '-0.369973266',
   'Image' : 'DSC_9254.jpg'
};
myMarkers[37] = {
    'Title' : 'Roof Plant',
  'Desc' : 'Looking up, the plant breaks the line of the top of the building.',
    'Date' : '26-MAY-14 4:41:51PM',
    'Lat' : '39.461967694',
    'Long' : '-0.369650647',
   'Image' : 'DSC_9257.jpg'
};
myMarkers[38] = {
    'Title' : 'Erosion Face',
  'Desc' : 'Showing the building eroding away.',
    'Date' : '26-MAY-14 4:44:07PM',
    'Lat' : '39.461334022',
    'Long' : '-0.369050754',
   'Image' : 'DSC_9260.jpg'
};
myMarkers[39] = {
    'Title' : 'Gathering Bars',
  'Desc' : '',
    'Date' : '26-MAY-14 4:45:26PM',
    'Lat' : '39.461102430',
    'Long' : '-0.368934078',
   'Image' : 'DSC_9261.jpg'
};
myMarkers[40] = {
    'Title' : 'Sign',
  'Desc' : 'A battered sign makes the unseen seen and tells a story.',
    'Date' : '26-MAY-14 4:46:56PM',
    'Lat' : '39.461027831',
    'Long' : '-0.368621098',
   'Image' : 'DSC_9262.jpg'
};
myMarkers[41] = {
    'Title' : 'Glanatures',
  'Desc' : 'A reversal of this process of looking for nature',
    'Date' : '26-MAY-14 4:49:32PM',
    'Lat' : '39.460907467',
    'Long' : '-0.368767278',
   'Image' : 'DSC_9263.jpg'
};
myMarkers[42] = {
    'Title' : 'Signad Ford',
  'Desc' : 'Plants unintentionally subvert the advertising.',
    'Date' : '26-MAY-14 4:51:36PM',
    'Lat' : '39.460890116',
    'Long' : '-0.369728096',
   'Image' : 'DSC_9265.jpg'
};
myMarkers[43] = {
    'Title' : 'Trapped Litter',
  'Desc' : '',
    'Date' : '26-MAY-14 4:54:55PM',
    'Lat' : '39.460378485',
    'Long' : '-0.370432595',
   'Image' : 'DSC_9269.jpg'
};
myMarkers[44] = {
    'Title' : 'Bent Sign',
  'Desc' : '',
    'Date' : '26-MAY-14 4:56:51PM',
    'Lat' : '39.459709190',
    'Long' : '-0.370836854',
   'Image' : 'DSC_9270.jpg'
};
myMarkers[45] = {
    'Title' : 'Grst',
  'Desc' : '',
    'Date' : '26-MAY-14 5:00:03PM',
    'Lat' : '39.460105821',
    'Long' : '-0.371209932',
   'Image' : 'DSC_9271.jpg'
};
myMarkers[46] = {
    'Title' : 'Carpet Splash',
  'Desc' : '',
    'Date' : '26-MAY-14 5:01:26PM',
    'Lat' : '39.460324422',
    'Long' : '-0.371272629',
   'Image' : 'DSC_9272.jpg'
};
myMarkers[47] = {
    'Title' : 'Pigeons Market',
  'Desc' : '',
    'Date' : '26-MAY-14 5:04:59PM',
    'Lat' : '39.461709950',
    'Long' : '-0.371372374',
   'Image' : 'DSC_9275.jpg'
};
myMarkers[48] = {
    'Title' : 'Doll Ass',
  'Desc' : 'Out of context this object looks absurd.',
    'Date' : '26-MAY-14 5:06:31PM',
    'Lat' : '39.461942716',
    'Long' : '-0.371478908',
   'Image' : 'DSC_9276.jpg'
};
myMarkers[49] = {
    'Title' : 'Moss Leaf',
  'Desc' : '',
    'Date' : '26-MAY-14 5:09:35PM',
    'Lat' : '39.462709492',
    'Long' : '-0.372132864',
   'Image' : 'DSC_9277.jpg'
};
myMarkers[50] = {
    'Title' : 'Cat P',
  'Desc' : '',
    'Date' : '26-MAY-14 5:11:59PM',
    'Lat' : '39.463549191',
    'Long' : '-0.371990539',
   'Image' : 'DSC_9279.jpg'
};
myMarkers[51] = {
    'Title' : 'Old Sign',
  'Desc' : '',
    'Date' : '26-MAY-14 5:14:12PM',
    'Lat' : '39.464175068',
    'Long' : '-0.372075113',
   'Image' : 'DSC_9280.jpg'
};
myMarkers[52] = {
    'Title' : 'Old Poster Tap',
  'Desc' : 'Evidence of a history of people not removing the selotape reveals its own pattern.',
    'Date' : '26-MAY-14 5:15:51PM',
    'Lat' : '39.463544497',
    'Long' : '-0.372187011',
   'Image' : 'DSC_9281.jpg'
};
myMarkers[53] = {
    'Title' : 'Disused Spot',
  'Desc' : '',
    'Date' : '26-MAY-14 5:17:46PM',
    'Lat' : '39.463534104',
    'Long' : '-0.373008186',
   'Image' : 'DSC_9282.jpg'
};
myMarkers[54] = {
    'Title' : 'Closed Street',
  'Desc' : 'This street was closed, looking down it through the bars felt like I was looking to a mirage where the city space had been left to its own devices.',
    'Date' : '26-MAY-14 5:20:49PM',
    'Lat' : '39.463794194',
    'Long' : '-0.374152316',
   'Image' : 'DSC_9283.jpg'
};
myMarkers[55] = {
    'Title' : 'Dem Space',
  'Desc' : '',
    'Date' : '26-MAY-14 5:24:15PM',
    'Lat' : '39.463527985',
    'Long' : '-0.374990674',
   'Image' : 'DSC_9291.jpg'
};
myMarkers[56] = {
    'Title' : 'Graf two',
  'Desc' : '',
    'Date' : '26-MAY-14 5:27:14PM',
    'Lat' : '39.463280886',
    'Long' : '-0.374627989',
   'Image' : 'DSC_9292.jpg'
};
myMarkers[57] = {
    'Title' : 'Concret Plant',
  'Desc' : '',
    'Date' : '26-MAY-14 5:30:00PM',
    'Lat' : '39.462174643',
    'Long' : '-0.374176456',
   'Image' : 'DSC_9293.jpg'
};
myMarkers[58] = {
    'Title' : 'Purple',
  'Desc' : '',
    'Date' : '26-MAY-14 5:31:31PM',
    'Lat' : '39.462103816',
    'Long' : '-0.373785272',
   'Image' : 'DSC_9294.jpg'
};
myMarkers[59] = {
    'Title' : 'Dems',
  'Desc' : '',
    'Date' : '26-MAY-14 5:33:37PM',
    'Lat' : '39.461998204',
    'Long' : '-0.372465793',
   'Image' : 'DSC_9296.jpg'
};
myMarkers[60] = {
    'Title' : 'Weat Door',
  'Desc' : '',
    'Date' : '26-MAY-14 5:34:36PM',
    'Lat' : '39.461844731',
    'Long' : '-0.372571824',
   'Image' : 'DSC_9298.jpg'
};
myMarkers[61] = {
    'Title' : 'Demss',
  'Desc' : '',
    'Date' : '26-MAY-14 5:39:10PM',
    'Lat' : '39.460314950',
    'Long' : '-0.372984465',
   'Image' : 'DSC_9300.jpg'
};
myMarkers[62] = {
    'Title' : 'Purple',
  'Desc' : '',
    'Date' : '26-MAY-14 5:42:05PM',
    'Lat' : '39.459042577',
    'Long' : '-0.371683845',
   'Image' : 'DSC_9301.jpg'
};
myMarkers[63] = {
    'Title' : 'Tree',
  'Desc' : '',
    'Date' : '26-MAY-14 5:43:27PM',
    'Lat' : '39.459306523',
    'Long' : '-0.371775711',
   'Image' : 'DSC_9304.jpg'
};
myMarkers[64] = {
    'Title' : 'Build Marks',
  'Desc' : '',
    'Date' : '26-MAY-14 5:44:13PM',
    'Lat' : '39.459564602',
    'Long' : '-0.372101851',
   'Image' : 'DSC_9305.jpg'
};
myMarkers[65] = {
    'Title' : 'Pave Weed',
  'Desc' : '',
    'Date' : '26-MAY-14 5:59:45PM',
    'Lat' : '39.459106531',
    'Long' : '-0.373572372',
   'Image' : 'DSC_9307.jpg'
};
myMarkers[66] = {
    'Title' : 'Dry Gar',
  'Desc' : '',
    'Date' : '26-MAY-14 6:01:30PM',
    'Lat' : '39.459399143',
    'Long' : '-0.373870768',
   'Image' : 'DSC_9309.jpg'
};
myMarkers[67] = {
    'Title' : 'Erod',
  'Desc' : '',
    'Date' : '26-MAY-14 6:04:50PM',
    'Lat' : '39.460209422',
    'Long' : '-0.375853507',
   'Image' : 'DSC_9310.jpg'
};
myMarkers[68] = {
    'Title' : 'Hair',
  'Desc' : '',
    'Date' : '26-MAY-14 6:06:35PM',
    'Lat' : '39.460625583',
    'Long' : '-0.376174450',
   'Image' : 'DSC_9312.jpg'
};
myMarkers[69] = {
    'Title' : 'Dem',
  'Desc' : '',
    'Date' : '26-MAY-14 6:08:58PM',
    'Lat' : '39.461348522',
    'Long' : '-0.377005180',
   'Image' : 'DSC_9314.jpg'
};
// myMarkers[70] = {
//     'Title' : 'Yo Soc',
//   'Desc' : '',
//     'Date' : '26-MAY-14 6:11:26PM',
//     'Lat' : '39.462063331',
//     'Long' : '-0.377103081',
//    'Image' : 'DSC_.jpg'
// };
// myMarkers[71] = {
//     'Title' : 'Demm',
//   'Desc' : '',
//     'Date' : '26-MAY-14 6:13:03PM',
//     'Lat' : '39.462407827',
//     'Long' : '-0.377184553',
//    'Image' : 'DSC_9314.jpg'
// };
// myMarkers[72] = {
//     'Title' : 'Crac',
//   'Desc' : '',
//     'Date' : '26-MAY-14 6:15:17PM',
//     'Lat' : '39.462469183',
//     'Long' : '-0.376404701',
//    'Image' : 'DSC_.jpg'
// };
// myMarkers[73] = {
//     'Title' : 'Treebroke',
//   'Desc' : '',
//     'Date' : '26-MAY-14 6:16:03PM',
//     'Lat' : '39.462673366',
//     'Long' : '-0.376034975',
//    'Image' : 'DSC_.jpg'
// };
  
  for (var i = 0; i < myMarkers.length; i++) {
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(myMarkers[i]['Lat'], myMarkers[i]['Long']),
      map: map,
      // icon: flagIcon_front,
      // shadow: flagIcon_shadow,
      title: myMarkers[i]['Title']
    });
    marker.setTitle((i + 1).toString());
    attachInfo(marker, i, myMarkers[i]['Title'], myMarkers[i]['Desc'], myMarkers[i]['Image']);
  };
  function getInfoWindowEvent(marker, message) {
    infowindow.close()
    infowindow.setContent(message);
    infowindow.open(map, marker);
  }
  function attachInfo(marker, num, title, desc, image) {
    var message = '<h3 style="padding:0px; margin:0px;">' + title + '</h3>' + '<br/>' + desc + '<br/>' + '<a target="_blank" href="images/' + image + '"><img style="width:200px;" src="images/' + image + '"/></a>';
    google.maps.event.addListener(marker, 'click', function () {
      map.setZoom(16);
      map.setCenter(marker.getPosition());
      var message = '<h3 style="padding:0px; margin:0px;">' + title + '</h3>' + '<br/>' + desc + '<br/>' + '<a target="_blank" href="images/' + image + '"><img style="width:200px;" src="images/' + image + '"/></a>';
      getInfoWindowEvent(marker, message);
    });
    oms.addMarker(marker); 
  }
  $(function() {
    $.ajax({
    type: "GET",
    //url: "http://localhost/russafa_derive_map/join.gpx",
    url: "http://www.andrewwelch.info/russafamap/join.gpx",
    dataType: "xml",
    success: function(xml) {
    var points = [];
    var bounds = new google.maps.LatLngBounds ();
    $(xml).find("trkpt").each(function() {
      var lat = $(this).attr("lat");
      var lon = $(this).attr("lon");
      var p = new google.maps.LatLng(lat, lon);
      points.push(p);
      bounds.extend(p);
    });
    var poly = new google.maps.Polyline({
      path: points,
      strokeColor: "#FF00AA",
      strokeOpacity: .7,
      strokeWeight: 4
    });
    poly.setMap(map);
     map.fitBounds(bounds);
    }
  });
});
}
google.maps.event.addDomListener(window, 'load', initialize);



    </script>
</head>
<body>
  <div id="map-canvas"></div>
</body>
</html>
