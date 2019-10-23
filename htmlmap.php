<?php


namespace App\Parsers\GE;
use App\Parsers\CsvParseTrait;
use App\Parsers\ParseInterface;
//use Symfony\Component\Config\Resource\FileResource;

/**
 * php bin/console app:parse:csv GE:htmlmap
 */
class htmlmap implements ParseInterface



{

    use CsvParseTrait;

    // the wiki output format / template we shall use
    const WIKI_FORMAT = '
<!DOCTYPE html>
<!--map number : {mapnumber}-->
<html style="height: 100%; margin: 0;">
<title>A Realm Remapped - {placename}{sub}</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="scripts/leaflet/leaflet.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/easy-button.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link type="application/json+oembed" href="/oembed.json" />
<meta content="https://arealmremapped.com/images/embedlogo.png" property="og:image">
<meta content="A Realm Remapped - Showing the true Eorzea." property="og:title">
<meta content="{placename}{sub}
Aether Currents, Vistas, Treasure Maps, NPCs and more..." property="og:description">
<meta content="https://arealmremapped.com/images/embedlogo.png" property="og:image">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="https://http://arealmremapped.com/images/embedlogo.png">
<meta name="theme-color" content="#03fc03">
<script src="scripts/leaflet/leaflet.js"></script>
<!--<script src="scripts/leaflet/leaflet.map-hash.js"></script> -->
<script src="scripts/leaflet/leaflet-fullHash.js"></script>
<script src="assets/js/easy-button.js"></script>
</head>
<body style="height: 100%; margin: 0;">

 <div class="w3-bar w3-black">
  <a href="index.html" class="w3-bar-item w3-button w3-mobile w3-green">Home</a>
  <span class="w3-bar-item w3-wide"><b>{id} - {placename}{sub}</b></span>

</div>

<div id="map" style="width: 100%; height: 100%; background: #000000;"></div>

<script type="text/javascript">
//variables
var mapSW = [0, 4094],
    mapNE = [4094, 0];

// declare map object
//var map = L.map(\'map\').setView([0, 0], 1);


var baseurl = "{placename}{sub}/{z}/{x}/{y}.png",
    base = L.tileLayer(baseurl),

    map = new L.map("map", {
        center: [0, 0],
        zoom: 1,
        minZoom: 2,
        maxZoom: 4,
        noWrap: true,
        crs: L.CRS.Simple,
        //urlHash: true,
        layers: [base]
    });

// reference the tiles
//L.tileLayer("{placename}{sub}/{z}/{x}/{y}.png", {
//    minZoom: 2,
//    maxZoom: 4,
//    noWrap: true,
//    crs: L.CRS.Simple,
//}).addTo(map);

map.setMaxBounds(new L.LatLngBounds(
    map.unproject(mapSW, map.getMaxZoom()),
    map.unproject(mapNE, map.getMaxZoom())
));

//icons
var icon5 = L.icon({
    iconUrl: \'icons/5.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon6 = L.icon({
    iconUrl: \'icons/6.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon8 = L.icon({
    iconUrl: \'icons/8.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon9 = L.icon({
    iconUrl: \'icons/9.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon12 = L.icon({
    iconUrl: \'icons/12.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon14 = L.icon({
    iconUrl: \'icons/14.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon16 = L.icon({
    iconUrl: \'icons/16.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon40 = L.icon({
    iconUrl: \'icons/060401.png\',
    iconSize: [20, 20],
    iconAnchor: [10, 10],
    popupAnchor: [5, -32]
});

var icon41 = L.icon({
    iconUrl: \'icons/41.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon45 = L.icon({
    iconUrl: \'icons/45.png\',
    iconSize: [18, 18],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var iconcurrent = L.icon({
    iconUrl: \'icons/iconcurrent.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon49 = L.icon({
    iconUrl: \'icons/49.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon51 = L.icon({
    iconUrl: \'icons/060095.png\',
    iconSize: [32, 32],
    iconAnchor: [16, 16],
    popupAnchor: [5, -32]
});

var icon57 = L.icon({
    iconUrl: \'icons/060861.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon65 = L.icon({
    iconUrl: \'icons/060952.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon66 = L.icon({
    iconUrl: \'icons/060953.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon68 = L.icon({
    iconUrl: \'icons/060561.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var iconvista = L.icon({
    iconUrl: \'icons/060563.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icontreasure = L.icon({
    iconUrl: \'icons/16.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var iconfish = L.icon({
    iconUrl: \'icons/70.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});


// markers and popups

var mapmarker = L.layerGroup().addTo(map);
{output}
var fate = L.layerGroup();
{fate}
var vista = L.layerGroup();
{vista}
var currents = L.layerGroup();

var fishingspot = L.layerGroup();
{fishingspot}
var positionmarker = L.layerGroup();
{output5}
var gimmick = L.layerGroup();
{output6}
var eventnpc = L.layerGroup();
{output8}
var battlenpc = L.layerGroup();
{output9}
var aetheryte = L.layerGroup();
{output12}
var gathering = L.layerGroup();
{output14}
var poprange = L.layerGroup();
{output40}
var exitrange = L.layerGroup();
{output41}
var eventobject = L.layerGroup();
{output45}
var eventrange = L.layerGroup();
{output49}
var questmarker = L.layerGroup();
{output51}
var collisionbox = L.layerGroup();
{output57}
var clientpath = L.layerGroup();
{output65}
var serverpath = L.layerGroup();
{output66}
var targetmarker = L.layerGroup();
{output68}
var treasure = L.layerGroup();
{treasure}
var mappygathering = L.layerGroup();
{mappygathering}




//Layer Groups
var overlays = {
    "<img src=icons/060563.png width=18/>Vistas" : vista,
    "<img src=icons/current.png width=18/>Aether Currents" : currents,
    "<img src=icons/060501.png width=18/>FATEs" : fate,
    "<img src=icons/Map46_Icon.png width=18/>Fishingspots" : fishingspot,
    "<img src=icons/060408.png width=18/>PositionMarker" : positionmarker,
    "<img src=icons/51.png width=18/>Gimmick" : gimmick,
    "<img src=icons/8.png width=18/>EventNPCs" : eventnpc,
    "<img src=icons/9.png width=18/>BNPCs" : battlenpc,
    "<img src=icons/060433.png width=18/>DoL Leve Spots" : gathering,
    "<img src=icons/060401.png width=18/>PopRange" : poprange,
    "<img src=icons/060402.png width=18/>ExitRange" : exitrange,
    "<img src=icons/45.png width=18/>EObj" : eventobject,
    "<img src=icons/060095.png width=18/>QuestMarker" : questmarker,
    "<img src=icons/060861.png width=18/>CollisionBox" : collisionbox,
    "<img src=icons/060952.png width=18/>ClientPath" : clientpath,
    "<img src=icons/060953.png width=18/>ServerPath" : serverpath,
    "<img src=icons/060561.png width=18/>TargetMarker" : targetmarker,
    "<img src=icons/060354.png width=18/>Treasure" : treasure,
    "Map Labels" : mapmarker,
    "<img src=icons/060464.png width=18/>Experimental Gathering" : mappygathering,
    
}

// add layer control
L.control.layers(null, overlays,{collapsed:false}).addTo(map);


 var allMapLayers = {"base": base,
                        "vista" : vista,
                        "currents": currents,
                        "fates": fate,
                        "fishingspot": fishingspot,
                        "positionmarker": positionmarker,
                        "gimmick": gimmick,
                        "eventnpc": eventnpc,
                        "battlenpc": battlenpc,
                        "gathering": gathering,
                        "poprange": poprange,
                        "exitrange": exitrange,
                        "eventobject": eventobject,
                        "questmarker": questmarker,
                        "collisionbox": collisionbox,
                        "clientpath": clientpath,
                        "serverpath": serverpath,
                        "targetmarker": targetmarker,
                        "treasure": treasure,
                        "mapmarker": mapmarker,
                        "mappygathering": mappygathering};
var hash = new L.Hash(map, allMapLayers);

</script>


</body>
</html>
     ';


    public function parse()
    {
        
        // grab CSV files we want to use
        $Level = $this->csv('Level');
        $mapcsv = $this->csv('Map');
        $placenamecsv = $this->csv('PlaceName');
        $gatheringpointcsv = $this->csv('GatheringPoint');
        $gatheringpointbasecsv = $this->csv('GatheringPointBase');
        $GatheringTypecsv = $this->csv('GatheringType');
        $enpcresidentcsv = $this->csv('ENpcResident');
        $eobjnamecsv = $this->csv('EObjName');
        $mapmarkercsv = $this->csv('MapMarker');
        $treasurespotcsv = $this->csv('TreasureSpot');
        $treasurehuntrankcsv = $this->csv('TreasureHuntRank');
        $itemcsv = $this->csv('Item');
        $adventurecsv = $this->csv('Adventure');
        $emotecsv = $this->csv('Emote');
        $modelcharacsv = $this->csv('ModelChara');
        $bnpcbasecsv = $this->csv('BNpcBase');
        $exportedsgcsv = $this->csv('ExportedSG');
        $eobjcsv = $this->csv('EObj');
        $questcsv = $this->csv('Quest');
        $gatheringtypecsv = $this->csv('GatheringType');
        $gatheringpointbonuscsv = $this->csv('GatheringPointBonus');
        $gatheringconditioncsv = $this->csv('GatheringCondition');
        $gatheringpointbonustypecsv = $this->csv('GatheringPointBonusType');
        $gatheringitemcsv = $this->csv('GatheringItem');
        $eventitemcsv = $this->csv('EventItem');
        $fishingspotcsv = $this->csv('FishingSpot');
        $spearfishingitemcsv = $this->csv('SpearfishingItem');
        $mappymapcsv = $this->csv('xivapi_mappy_map_2019-10-09-01-33-14');
        $mappymemorycsv = $this->csv('xivapi_mappy_memory_2019-10-09-01-33-15');
        $fatecsv = $this->csv('Fate');
        $planeventcsv = $this->csv('planevent');

        //this controls the map it will make, just change it to anything in map.exd

        $mapnumber = 491;

    // php bin/console app:parse:csv GE:htmlmap
    // (optional) start a progress bar
        $this->io->progressStart($Level->total);

        $output =[];
        foreach ($mapcsv->data as $id => $Map){
            $id = $Map['id'];
            if ($id !=$mapnumber) continue;
            $number = 0;
            $placename = $placenamecsv->at($Map["PlaceName"])['Name'];
            foreach ($mapmarkercsv->data as $key => $MapMarker) {
                $this->io->progressAdvance($Level->total);

                $thekey = $MapMarker['id'];
                //create a range between 0.01 and 0.99
                $range = range(0, 1, 0.01);

                foreach ($range as $id)

                //Only pick the values set in the mapnumber variable above
                if ($thekey !=$mapnumber) continue;

                $decimals = range(0,99);
                //grab icon from MapMarker.csv (Testing purposes)

                    if ($Map["PlaceName{Sub}"] > 0) {
                        $sub = " - ".$placenamecsv->at($Map["PlaceName{Sub}"])['Name']."";
                        } elseif ($Map["PlaceName{Sub}"] < 1) {
                        $sub = "";
                    }

                    $teri = $Map['TerritoryType'];


                //pull the correct link from Map.csv to MapMarker.csv
                $MMRange = $Map['MapMarkerRange'];


                $formatkey = sprintf('%d.%s', $MMRange, $number);
                $X = $mapmarkercsv->at($formatkey)['X'];
                $pixX = ($X * 2);
                $Y = $mapmarkercsv->at($formatkey)['Y'];
                $pixY = ($Y * 2);
                $icon = $mapmarkercsv->at($formatkey)['Icon'];
                $number++;
                //get the type and link it to the data key
                $markertype = $mapmarkercsv->at($formatkey)['Data{Type}'];
                if ($markertype = 1) {
                    $markerdatakey = $placenamecsv->at($mapmarkercsv->at($formatkey)['Data{Key}'])['Name'];
                    $mapmarkeroutput = "<h4><b>Links to: ". $markerdatakey ."</b></h4><br>4<br>". $formatkey ."";
                } elseif ($markertype != 1) {
                    $markerdatakey = $placenamecsv->at($aetherytecsv->at($mapmarkercsv->at($formatkey)['Data{Key}'])['PlaceName'])['Name'];
                    $mapmarkeroutput = "<h4><b>Links to: ". $markerdatakey ."</b></h4><br>3<br>". $formatkey ."";
                }
                //} elseif ($markertype = 2) {
                //    $mapmarkeroutput = "2<br>";
                //} elseif ($markertype = 1) {
                //    $markerdatakey = $Map->at($mapmarkercsv->at($formatkey)['Data{Key}'])['PlaceName'];
                //    $mapmarkeroutput = "<h4><b>Links to: ". $markerdatakey ."</b></h4><br>1<br>". $formatkey ."";
                //}




                $mapshort = substr($Map['Id'], 0, 4);
                $mapcode = $Map['Id'];
                $placename1 = $mapmarkercsv->at($formatkey)['PlaceName{Subtext}'];
                    $placename2 = $placenamecsv->at($placename1)['Name'];
                        $placenamesubfix = str_replace("\n", "<br>", $placename2);
                if (empty($X))continue;
                $string =
                    " var iconmarker". $number ." = L.icon({className: 'leaflet-div-icon2', iconUrl: 'icons/0". $icon .".png',
                    iconAnchor: [11, 21], });\n\n
var marker". $number ." = L.marker(map.unproject([". (round($pixX, 1)) .", ". (round($pixY, 1)) ."], map.getMaxZoom()), {icon: iconmarker". $number ."})
                    .bindPopup(
                        \"". $markertype ."\"
                    ).openPopup().addTo(mapmarker);\n\n
var textmarker". $number ." = L.divIcon({iconSize: new L.Point(64, -10),html: \"<b>". $placenamesubfix ."</b>\"});\n
L.marker(map.unproject([". (round($pixX, 1)) .", ". (round($pixY, 1)) ."], map.getMaxZoom()), {icon: textmarker". $number ."}).addTo(mapmarker);\n\n";
                $output[] = $string;
            }
        }

             $mappygathering =[];
        foreach ($mappymapcsv->data as $id => $mappydata) {
            $type = $mappydata['Type'];
            $map = $mappydata['MapID'];
            $hash = $id;
            if ($map !=$mapnumber) continue;
            if ($type !='Gathering') continue;

            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $gpointid = $mappydata['ENpcResidentID'];
            //get the map positions for each object
            $PixX = ($mappydata["PixelX"] * 2);
            $PixY = ($mappydata["PixelY"] * 2);
            $PosX = $mappydata["PosX"];
            $PosY = $mappydata["PosY"];

            $gpoint = $gatheringpointcsv->at($gpointid)['GatheringPointBase'];
                $gpointbase = $gatheringpointbasecsv->at($gpoint)['GatheringType'];
                $gpointlimited = $gatheringpointbasecsv->at($gpoint)['IsLimited'];
                    $gpointtype =$gatheringtypecsv->at($gpointbase)['Name'];
                        if ($gpointtype != '●銛') {
                            $gpointtype = $gpointtype;
                        } elseif ($gpointtype = '●銛') {
                            $gpointtype = 'Spearfishing';
                        }
                        if ($gpointlimited != 'False') {
                            $gpointicon = $gatheringtypecsv->at($gpointbase)['Icon{Off}'];
                        } elseif ($gpointlimited = 'False') {
                            $gpointicon = $gatheringtypecsv->at($gpointbase)['Icon{Main}'];
                        }

                $gpointlevel = $gatheringpointbasecsv->at($gpoint)['GatheringLevel'];

                $gpointitem0 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[0]'])['Item'])['Name'];
                    if (empty($gpointitem0)) {
                        $gitem0 = '';
                    } elseif (!empty($gpointitem0)) {
                        $gitem0 = 'Item: ';
                    }
                $gpointitem1 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[1]'])['Item'])['Name'];
                    if (empty($gpointitem1)) {
                        $gitem1 = '';
                    } elseif (!empty($gpointitem1)) {
                        $gitem1 = '<br>Item: ';
                    }
                $gpointitem2 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[2]'])['Item'])['Name'];
                    if (empty($gpointitem2)) {
                        $gitem2 = '';
                    } elseif (!empty($gpointitem2)) {
                        $gitem2 = '<br>Item: ';
                    }
                $gpointitem3 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[3]'])['Item'])['Name'];
                    if (empty($gpointitem3)) {
                        $gitem3 = '';
                    } elseif (!empty($gpointitem3)) {
                        $gitem3 = '<br>Item: ';
                    }
                $gpointitem4 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[4]'])['Item'])['Name'];
                    if (empty($gpointitem4)) {
                        $gitem4 = '';
                    } elseif (!empty($gpointitem4)) {
                        $gitem4 = '<br>Item: ';
                    }
                $gpointitem5 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[5]'])['Item'])['Name'];
                    if (empty($gpointitem5)) {
                        $gitem5 = '';
                    } elseif (!empty($gpointitem5)) {
                        $gitem5 = '<br>Item: ';
                    }
                $gpointitem6 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[6]'])['Item'])['Name'];
                    if (empty($gpointitem6)) {
                        $gitem6 = '';
                    } elseif (!empty($gpointitem6)) {
                        $gitem6 = '<br>Item: ';
                    }
                $gpointitem7 = $itemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[7]'])['Item'])['Name'];
                    if (empty($gpointitem7)) {
                        $gitem7 = '';
                    } elseif (!empty($gpointitem7)) {
                        $gitem7 = '<br>Item: ';
                    }

                $items =
                "". $gitem0."". $gpointitem0 ."". $gitem1."". $gpointitem1 ."". $gitem2."". $gpointitem2 ."". $gitem3."". $gpointitem3 ."". $gitem4."". $gpointitem4 ."". $gitem5."". $gpointitem5 ."". $gitem6."". $gpointitem6 ."". $gitem7."". $gpointitem7 ."";

                $fishitem0 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[0]'])['Item'])['Name'];
                $fishitem1 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[1]'])['Item'])['Name'];
                $fishitem2 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[2]'])['Item'])['Name'];
                $fishitem3 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[3]'])['Item'])['Name'];
                $fishitem4 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[4]'])['Item'])['Name'];
                $fishitem5 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[5]'])['Item'])['Name'];
                $fishitem6 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[6]'])['Item'])['Name'];
                $fishitem7 = $itemcsv->at($spearfishingitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[7]'])['Item'])['Name'];

                $fishitems =
                "". $fishitem0 ."<br>". $fishitem1 ."<br>". $fishitem2 ."<br>". $fishitem3 ."<br>". $fishitem4 ."<br>". $fishitem5 ."<br>". $fishitem6 ."<br>". $fishitem7 ."<br>";


                if ($gpointtype != 'Spearfishing') {
                    $itemsnew = $items;
                } elseif ($gpointtype = 'Spearfishing') {
                    $itemsnew = $fishitems;
                }
            $gpointbonus0 = $gatheringpointcsv->at($gpointid)['GatheringPointBonus[0]'];
            $gpointbonus1 = $gatheringpointcsv->at($gpointid)['GatheringPointBonus[1]'];
            $conditionraw0 = $gatheringpointbonuscsv->at($gpointbonus0)['Condition'];
            $conditionvalue0 = $gatheringpointbonuscsv->at($gpointbonus0)['ConditionValue'];
            $bonustyperaw0 = $gatheringpointbonuscsv->at($gpointbonus0)['BonusType'];
            $bonusvalue0 = $gatheringpointbonuscsv->at($gpointbonus0)['BonusValue'];

            $conditionraw1 = $gatheringpointbonuscsv->at($gpointbonus1)['Condition'];
            $conditionvalue1 = $gatheringpointbonuscsv->at($gpointbonus1)['ConditionValue'];
            $bonustyperaw1 = $gatheringpointbonuscsv->at($gpointbonus1)['BonusType'];
            $bonusvalue1 = $gatheringpointbonuscsv->at($gpointbonus1)['BonusValue'];

            $condition0 = $gatheringconditioncsv->at($conditionraw0)['Text'];
            $condition1 = $gatheringconditioncsv->at($conditionraw1)['Text'];
            $fconfition0 = str_replace('<Value>IntegerParameter(1)</Value>', $conditionvalue0, $condition0);
            $fconfition1 = str_replace('<Value>IntegerParameter(1)</Value>', $conditionvalue1, $condition1);


            $bonus0 = $gatheringpointbonustypecsv->at($bonustyperaw0)['Text'];
            $bonus1 = $gatheringpointbonustypecsv->at($bonustyperaw1)['Text'];
            $fbonus0 = str_replace('<Value>IntegerParameter(1)</Value>', $bonusvalue0, $bonus0);
            $fbonus1 = str_replace('<Value>IntegerParameter(1)</Value>', $bonusvalue1, $bonus1);

            if (empty($fconfition0)) {
                        $gcondition0 = '';
                        $gbonus0 = '';
            } elseif (!empty($fconfition0)) {
                        $gcondition0 = '<br>If ';
                        $gbonus0 = $fbonus0;
            }

            if (empty($fconfition1)) {
                        $gcondition1 = '';
                        $gbonus1 = '';
            } elseif (!empty($fconfition1)) {
                        $gcondition1 = '<br>If ';
                        $gbonus1 = $fbonus1;
            }



            $string =
                "var mappygathermarker". $gpointid ." = L.icon({className: 'leaflet-div-icon2', iconUrl: 'icons/0". $gpointicon .".png', iconAnchor: [16, 16]});\nvar mappygathering". $gpointid ." = L.marker(map.unproject([". (round($PixX, 1)) .", ". (round($PixY, 1)) ."], map.getMaxZoom()), {icon: mappygathermarker". $gpointid ."})
                    .bindPopup(\"<h3><b>". $gpointtype ."</b></h3><h6>Level: ". $gpointlevel ."</h6>X: (". (round($PosX, 1)) .") Y: (". (round($PosY, 1)) .")<br>PointID: ". $gpointid ."<br><b>". $itemsnew . "</b><br>Limited: ". $gpointlimited ."<br>". $gcondition0 ."". $fconfition0 ."". $gbonus0 ."<br>". $gcondition1 ."". $fconfition1 ."". $gbonus1 ."<br>\"
                    ).openPopup().addTo(mappygathering);\n\n";
            $mappygathering[] = $string;
        }

        $fishingspot =[];
        foreach ($fishingspotcsv->data as $id => $fishspot){
            $fishteri = $fishspot['TerritoryType'];
            if ($teri !=$fishteri) continue;

                //gather data
                $levelreq = $fishspot['GatheringLevel'];
                $bigfishreach = $fishspot['BigFish{OnReach}'];
                $bigfishend = $fishspot['BigFish{OnEnd}'];
                $pixX = ($fishspot['X'] * 2);
                $pixY = ($fishspot['Z'] * 2);
                $radius = $fishspot['Radius'] / 4;
                $radiusanchor = $radius / 2;
                $placenamefish = $placenamecsv->at($fishspot['PlaceName'])['Name'];
                //items
                $item0 = $itemcsv->at($fishspot['Item[0]'])['Name'];
                $item1 = $itemcsv->at($fishspot['Item[1]'])['Name'];
                $item2 = $itemcsv->at($fishspot['Item[2]'])['Name'];
                $item3 = $itemcsv->at($fishspot['Item[3]'])['Name'];
                $item4 = $itemcsv->at($fishspot['Item[4]'])['Name'];
                $item5 = $itemcsv->at($fishspot['Item[5]'])['Name'];
                $item6 = $itemcsv->at($fishspot['Item[6]'])['Name'];
                $item7 = $itemcsv->at($fishspot['Item[7]'])['Name'];
                $item8 = $itemcsv->at($fishspot['Item[8]'])['Name'];
                $item9 = $itemcsv->at($fishspot['Item[9]'])['Name'];

                $string =
                " var fishingmarker". $id ." = L.icon({className: 'leaflet-div-icon2', iconUrl: 'icons/71.png',
                    iconSize: [". $radius .", ". $radius ."], iconAnchor: [". $radiusanchor .", ". $radiusanchor ."], });
                var fishingspot". $id ." = L.marker(map.unproject([". (round($pixX, 1)) .", ". (round($pixY, 1)) ."], map.getMaxZoom()), {icon: fishingmarker". $id ."})
                    .bindPopup(
                        \"<h3><b>Fishing Spot</b></h3><h4>". $placenamefish ."<br>Level Required: ". $levelreq ."<br>Big Fish Text: ". $bigfishreach ."<br>Big Fish End: ". $bigfishend ."<br>Fish: ". $item0 ."<br>Fish: ". $item1 ."<br>Fish: ". $item2 ."<br>Fish: ". $item3 ."<br>Fish: ". $item4 ."<br>Fish: ". $item5 ."<br>Fish: ". $item6 ."<br>Fish: ". $item7 ."<br>Fish: ". $item8 ."<br>Fish: ". $item9 ."<br>\"
                    ).openPopup().addTo(fishingspot);\n\n";
                $fishingspot[] = $string;
            }


        $Total5 =[];
        // loop through data
        foreach ($Level->data as $id => $LevelData) {
            $this->io->progressAdvance();

            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type != 5) continue;


            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c * 2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var positionmarker". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon5})
                    .bindPopup('<h3><b>Position Marker</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>'
                    ).openPopup().addTo(positionmarker);\n\n";
            $Total5[] = $string;

            
        };

            $treasure =[];
            $number = 0;
        foreach ($treasurespotcsv->data as $key => $spot){
            $key = $spot['id'];
            $locationmap = $Level->at($spot['Location'])['Map'];
            $levelID = $spot['Location'];
            if ($locationmap !=$mapnumber) continue;

                $locationX = $Level->at($spot['Location'])['X'];
                $locationY = $Level->at($spot['Location'])['Z'];
                $keylink = round($key, 0);
                $number++;
                $ItemID = $treasurehuntrankcsv->at($keylink)['ItemName'];
                $MapName = $itemcsv->at($ItemID)['Name'];
                if ($ItemID != 19770) {
                    $icon = $treasurehuntrankcsv->at($keylink)['Icon'];
                } elseif ($ItemID = 19770) {
                    $icon = 'thfmap';
                }
                $scale = $mapcsv->at($locationmap)['SizeFactor'];
                $c = $scale / 100.0;
                //if ($c < 1) {
                //    $c = 100;
                //} elseif ($c != 0) {
                //    $c = $scale / 100.0;
                //};
                $offsetx = $mapcsv->at($locationmap)['Offset{X}'];
                $offsetValueX = ($locationX + $offsetx) * $c;
                    $NpcTLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                    $NpcTPixelX = (($NpcTLocX - 1) * 50 * $c * 2);
                $offsety = $mapcsv->at($locationmap)['Offset{Y}'];
                $offsetValueY = ($locationY + $offsety) * $c;
                    $NpcTLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                    $NpcTPixelY = (($NpcTLocY - 1) * 50 * $c * 2);
                    $string =
                "var treasuremarker". $number ." = L.icon({className: 'leaflet-div-icon2', iconUrl: 'icons/0". $icon .".png',
                    iconAnchor: [19,19], iconSize: [28,28], });
                var treasure". $number ." = L.marker(map.unproject([". (round($NpcTPixelX, 1)) .", ". (round($NpcTPixelY, 1)) ."], map.getMaxZoom()), {icon: treasuremarker". $number ."}).bindPopup(\"<h3><b>". $MapName ."</b></h3>X: (". (round($NpcTLocX, 1)) .") Y: (". (round($NpcTLocY, 1)) .")<br><b>ID: ". $key ."<br>LevelID: ". $levelID ."\"
                    ).openPopup().addTo(treasure);\n\n";
                $treasure[] = $string;
            }

            $vista =[];
        foreach ($adventurecsv->data as $key => $vistadata){
            $key = $vistadata['id'];

            $locationmap = $Level->at($vistadata['Level'])['Map'];
            if ($locationmap !=$mapnumber) continue;
                $locationX = $Level->at($vistadata['Level'])['X'];
                $locationY = $Level->at($vistadata['Level'])['Z'];

                $vistaminlv = $vistadata['MinLevel'];
                $vistamaxlv = $vistadata['MaxLevel'];
                $action = $emotecsv->at($vistadata['Emote'])['Name'];
                $vistaname = $vistadata['Name'];
                $mintimeraw = substr_replace($vistadata['MinTime'], ':', -2, 0);
                $maxtimeraw = substr_replace($vistadata['MaxTime'], ':', -2, 0);
                $mintime = date("g:i a", strtotime($mintimeraw));
                $maxtime = date("g:i a", strtotime($maxtimeraw));
                $scale = $mapcsv->at($locationmap)['SizeFactor'];
                $c = $scale / 100.0;
                $offsetx = $mapcsv->at($locationmap)['Offset{X}'];
                $offsetValueX = ($locationX + $offsetx) * $c;
                    $NpcTLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                    $NpcTPixelX = (($NpcTLocX - 1) * 50 * $c *2);
                $offsety = $mapcsv->at($locationmap)['Offset{Y}'];
                $offsetValueY = ($locationY + $offsety) * $c;
                    $NpcTLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                    $NpcTPixelY = (($NpcTLocY - 1) * 50 * $c *2);
                    $string =
                "var vista". $key ." = L.marker(map.unproject([". (round($NpcTPixelX, 1)) .", ". (round($NpcTPixelY, 1)) ."], map.getMaxZoom()), {icon: iconvista})
                    .bindPopup(
                        \"<h3><b>Vista</b></h3><h4>". $vistaname ."</h4><h5>". $mintime ." - ". $maxtime ."</h5>X: (". (round($NpcTLocX, 1)) .") Y: (". (round($NpcTLocY, 1)) .")<br>Action: /". $action ."<br>Min Level: ". $vistaminlv ."\"
                    ).openPopup().addTo(vista);\n\n";
                $vista[] = $string;
            }
        
//start of section
             $Fate =[];
        foreach ($fatecsv->data as $id => $fatedata) {
            $map = $planeventcsv->at($fatedata['Location'])['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;

            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            //get the map positions for each object
            $scale = $mapcsv->at($map)['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $planeventcsv->at($fatedata['Location'])['X'];
            $NpcLevelY = $planeventcsv->at($fatedata['Location'])['Z'];
            $offsetx = $mapcsv->at($map)['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($map)['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var fate". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon6})
                    .bindPopup('<h3><b>Gimmick</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(Gimmick)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>'
                    ).openPopup().addTo(fate);\n\n";
            $Fate[] = $string;

        };
// end of section
//start of section
             $Total6 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type != 6) continue;

            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var gimmick". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon6})
                    .bindPopup('<h3><b>Gimmick</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(Gimmick)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>'
                    ).openPopup().addTo(gimmick);\n\n";
            $Total6[] = $string;

        };
// end of section
//start of section
             $Total8 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=8) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var eventnpc". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon8})
                    .bindPopup(\"<h3><b>". $objectname ."</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(ENpc)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i></i>\"
                    ).openPopup().addTo(eventnpc);\n\n";
            $Total8[] = $string;
        }
// end of section
//start of section
             $Total9 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=9) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $modelchara = $bnpcbasecsv->at($object)['ModelChara'];
            $model = $modelcharacsv->at($modelchara)['Model'];
            $base = $modelcharacsv->at($modelchara)['Base'];
            $variant = $modelcharacsv->at($modelchara)['Variant'];
            $string =
                "var battlenpc". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon9})
                    .bindPopup(\"<h3><b>Battle NPC</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(bnpc)<br>LevelID: ". $name ."<br>BNpcBaseID: ". $object ."<br>ModelChara: ". $modelchara ."<br>Model: ". $model ." / ". $base ." / ". $variant ."\"
                    ).openPopup().addTo(battlenpc);\n\n";
            $Total9[] = $string;
        }
// end of section
//start of section
             $Total12 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=12) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var aetheryte". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon12})
                    .bindPopup(\"<h3><b>Aetheryte</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(Aetheryte)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(aetheryte);\n\n";
            $Total12[] = $string;
        }
// end of section
//start of section
             $Total14 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=14) continue;
            elseif ($type <1) {
                $total14 = '000';
            }

            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;

            $gpoint = $gatheringpointcsv->at($object)['GatheringPointBase'];
                $gpointbase = $gatheringpointbasecsv->at($gpoint)['GatheringType'];
                    $gpointtype =$gatheringtypecsv->at($gpointbase)['Name'];
                        $gpointicon =$gatheringtypecsv->at($gpointbase)['Icon{Main}'];
                $gpointlevel = $gatheringpointbasecsv->at($gpoint)['GatheringLevel'];
                $gpointitem0 = $eventitemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[0]'])['Item'])['Name'];
                $gpointitem1 = $eventitemcsv->at($gatheringitemcsv->at($gatheringpointbasecsv->at($gpoint)['Item[1]'])['Item'])['Name'];

            //gatheringleves dont have bonus's but its here just incase
            //$gpointbonus0 = $gatheringpointcsv->at($object)['GatheringPointBonus[0]'];
            //$gpointbonus1 = $gatheringpointcsv->at($object)['GatheringPointBonus[1]'];

            $string =
                "var iconmarker". $id ." = L.icon({className: 'leaflet-div-icon2', iconUrl: 'icons/0". $gpointicon .".png', iconAnchor: [0, 0]});\nvar gathering". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: iconmarker". $id ."})
                    .bindPopup(\"<h3><b>Leve Gathering Spot</b></h3><h4>". $gpointtype ."</h4>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(gathering spot)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br>Slot[1]:<b>". $gpointitem0 ."</b><br>Slot[2]:<b>". $gpointitem1 ."</b><br>\"
                    ).openPopup().addTo(gathering);\n\n";
            $Total14[] = $string;
        }



//start of section
             $Total40 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=40) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var poprange". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon40})
                    .bindPopup(\"<h3><b>Pop Range</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(Pop Range)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(poprange);\n\n";
            $Total40[] = $string;
        }
// end of section
//start of section
             $Total41 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=41) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var exitrange". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon41})
                    .bindPopup(\"<h3><b>Exit Range</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(ExitRange)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(exitrange);\n\n";
            $Total41[] = $string;
        }
// end of section
//start of section
             $Total45 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=45) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            //$icon = $type;
            $sgbpathraw = $eobjcsv->at($object)['SgbPath'];
                $sgbpath = $exportedsgcsv->at($sgbpathraw)['SgbPath'];
            $dataraw = $eobjcsv->at($object)['Data'];
                $dataquest = $questcsv->at($dataraw)['Name'];
                    $dataqueststr = str_replace("'", "%27", $questcsv->at($dataraw)['Name']);

                if ($eobjectname != 'aether current') {
                    $icon = $type;
                    $addto = 'eventobject';
                } elseif ($eobjectname = 'aether current') {
                    $icon = 'current';
                    $addto = 'currents';
                }

            $string =
                "var eventobject". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon". $icon ."})
                    .bindPopup(\"<h3><b>". $eobjectname ."</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(EObj)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br>Sgb Path: ". $sgbpath ."<br>Used in quest:<br><a href='https://ffxiv.gamerescape.com/wiki/". $dataqueststr ."'>". $dataquest ."</a><i></i>\"
                    ).openPopup().addTo(". $addto .");\n\n";
            $Total45[] = $string;
        }
// end of section
//start of section
             $Total49 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=49) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var eventrange". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon49})
                    .bindPopup(\"<h3><b>EventRange</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(eventrange)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(eventrange);\n\n";
            $Total49[] = $string;
        }
// end of section
//start of section
             $Total51 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=51) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            //FAILED attempt at linking this to quest.exd
            //foreach ($questcsv->data as $id => $questdata) {
            //    //$questmainid = $questdata['ToDoMainLocation[0]'];
            //        $questname = $questcsv->at($questdata['ToDoMainLocation[0]'])['Name'];
            //    }
            $string =
                "var questmarker". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon51})
                    .bindPopup(\"<h3><b>Quest Marker</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(Quest Marker)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(questmarker);\n\n";
            $Total51[] = $string;
        }
// end of section
//start of section
             $Total57 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=57) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var collisionbox". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon57})
                    .bindPopup(\"<h3><b>Collision Box</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(collisionbox)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(collisionbox);\n\n";
            $Total57[] = $string;
        }
// end of section
//start of section
             $Total65 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=65) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var clientpath". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon65})
                    .bindPopup(\"<h3><b>Clientside Path</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(ClientPath)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(clientpath);\n\n";
            $Total65[] = $string;
        }
// end of section
//start of section
             $Total66 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=66) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var serverpath". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon66})
                    .bindPopup(\"<h3><b>Serverside Path</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(ServerPath)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(serverpath);\n\n";
            $Total66[] = $string;
        }
// end of section
//start of section
             $Total68 =[];
        foreach ($Level->data as $id => $LevelData) {
            $type = $LevelData['Type'];
            $map = $LevelData['Map'];
            $name = $id;
            if ($map !=$mapnumber) continue;
            if ($type !=68) continue;
            $mapshort = substr($mapcsv->at($map)['Id'], 0, 4);
            $mapplacename = $mapcsv->at($map)['PlaceName'];
            $placename = $placenamecsv->at($mapplacename)['Name'];
            $object = $LevelData['Object'];
            $objectname = $enpcresidentcsv->at($object)['Singular'];
            $eobjectname = $eobjnamecsv->at($object)['Singular'];
            //get the map positions for each object
            $scale = $mapcsv->at($LevelData["Map"])['SizeFactor'];
            $c = $scale / 100.0;
            $NpcLevelX = $LevelData["X"];
            $NpcLevelY = $LevelData["Z"];
            $offsetx = $mapcsv->at($LevelData["Map"])['Offset{X}'];
            $offsetValueX = ($NpcLevelX + $offsetx) * $c;
                $NpcLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                $NpcPixelX = (($NpcLocX - 1) * 50 * $c *2);
            $offsety = $mapcsv->at($LevelData["Map"])['Offset{Y}'];
                $offsetValueY = ($NpcLevelY + $offsety) * $c;
                $NpcLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                $NpcPixelY = (($NpcLocY - 1) * 50 * $c * 2);
            $icon = $type;
            $string =
                "var targetmarker". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon68})
                    .bindPopup(\"<h3><b>Target Marker</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(TargetMarker)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br><i>More Information Needed</i>\"
                    ).openPopup().addTo(targetmarker);\n\n";
            $Total68[] = $string;
        }
// end of section



            $output = implode($output);
            $fishingspot = implode($fishingspot);
            $Total5 = implode($Total5);
            $Total6 = implode($Total6);
            $Total8 = implode($Total8);
            $Total9 = implode($Total9);
            $Total12 = implode($Total12);
            $Total14 = implode($Total14);
            $Total40 = implode($Total40);
            $Total41 = implode($Total41);
            $Total45 = implode($Total45);
            $Total49 = implode($Total49);
            $Total51 = implode($Total51);
            $Total57 = implode($Total57);
            $Total65 = implode($Total65);
            $Total66 = implode($Total66);
            $Total68 = implode($Total68);
            $treasure = implode($treasure);
            $vista = implode($vista);
            $fate = implode($Fate);
            $mappygathering = implode($mappygathering);
{
            // Save some data
            $data = [
                '{output5}' => "\n\n$Total5",
                '{fishingspot}' => "\n\n$fishingspot",
                '{output6}' => "\n\n$Total6",
                '{output8}' => "\n\n$Total8",
                '{output9}' => "\n\n$Total9",
                '{output12}' => "\n\n$Total12",
                '{output14}' => "\n\n$Total14",
                '{output40}' => "\n\n$Total40",
                '{output41}' => "\n\n$Total41",
                '{output45}' => "\n\n$Total45",
                '{output49}' => "\n\n$Total49",
                '{output51}' => "\n\n$Total51",
                '{output57}' => "\n\n$Total57",
                '{output65}' => "\n\n$Total65",
                '{output66}' => "\n\n$Total66",
                '{output68}' => "\n\n$Total68",
                '{fate}' => "\n\n$fate",
                '{mapshort}' => $mapshort,
                '{id}' => $mapcode,
                '{placename}' => $placename,
                '{mapnumber}' => $mapnumber,
                '{output}' => "\n\n$output",
                '{sub}' => $sub,
                '{treasure}' => "\n\n$treasure",
                '{vista}' => "\n\n$vista",
                '{mappygathering}' => "\n\n$mappygathering",

//                '{mapdata}' => $mapmarker,
            ];

            // format using Gamer Escape formatter and add to data array
            // need to look into using item-specific regex, if required.
            $this->data[] = GeFormatter::format(self::WIKI_FORMAT, $data);

        }

        // save our data to the filename: GeRecipeWiki.txt
        $this->io->progressFinish();
        $this->io->text('Saving ... map number '. $mapnumber .'');
        $info = $this->save(''. str_replace(" ", "_", $placename) .''. str_replace(" ", "_", $sub) .'.html', 999999);
        //$info = $this->save('pvp.html', 999999);
        $this->io->table(
            [ 'Filename', 'Data Count', 'File Size' ],
            $info

        );

    }

}