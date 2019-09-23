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
<html style="height: 100%; margin: 0;">
<head>
    <title>AR:RM - {placename}{sub}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="scripts\leaflet\leaflet.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="scripts\leaflet\leaflet.js"></script>
    <style>html { overflow-y: hidden; }</style>
</head>
<body style="height: 100%; margin: 0;">

 <div class="w3-bar w3-black">
  <a href="index.html" class="w3-bar-item w3-button w3-mobile w3-green">Home</a>
  <span class="w3-bar-item w3-wide w3-display-topmiddle"><b>{mapshort} - {placename}{sub}</b></span>
  <span class="w3-bar-item w3-wide w3-right">Layers</span>
  <span class="w3-bar-item w3-wide">A Realm Remapped</span>

</div>

<div id="map" style="width: 100%; height: 100%; background: #000000;"></div>

<script type="text/javascript">
//variables
var mapSW = [0, 4096],
    mapNE = [4096, 0];

// declare map object
var map = L.map(\'map\').setView([0, 0], 1);


// reference the tiles
L.tileLayer(\'{placename}{sub}/{z}/{x}/{y}.png\', {
    minZoom: 2,
    maxZoom: 4,
    noWrap: true,
    crs: L.CRS.Simple,
}).addTo(map);

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
    iconUrl: \'icons/40.png\',
    iconSize: [32, 32],
    iconAnchor: [11, 21],
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
    iconUrl: \'icons/51.png\',
    iconSize: [18, 18],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon57 = L.icon({
    iconUrl: \'icons/57.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon65 = L.icon({
    iconUrl: \'icons/65.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon66 = L.icon({
    iconUrl: \'icons/66.png\',
    iconSize: [20, 20],
    iconAnchor: [11, 21],
    popupAnchor: [5, -32]
});

var icon68 = L.icon({
    iconUrl: \'icons/68.png\',
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



// markers and popups

var vista = L.layerGroup();
{vista}
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
var mapmarker = L.layerGroup().addTo(map);
{output}





//Layer Groups
var overlays = {
    "Vistas" : vista,
    "PositionMarker" : positionmarker,
    "Gimmick" : gimmick,
    "EventNPCs" : eventnpc,
    "BNPCs" : battlenpc,
    "DoL Leve Spots" : gathering,
    "PopRange" : poprange,
    "ExitRange" : exitrange,
    "EObj/Aether Current" : eventobject,
    "QuestMarker" : questmarker,
    "CollisionBox" : collisionbox,
    "ClientPath" : clientpath,
    "ServerPath" : serverpath,
    "TargetMarker" : targetmarker,
    "Treasure" : treasure,
    "Map Labels" : mapmarker,
    
}

// add layer control
L.control.layers(null, overlays).addTo(map);




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
        $gatheringitemcsv = $this->csv('GatheringItem');
        $eventitemcsv = $this->csv('EventItem');

        //this controls the map it will make, just change it to anything in map.exd
        $mapnumber = 11;


    // (optional) start a progress bar
        $this->io->progressStart($Level->total);

        $output =[];
        foreach ($mapcsv->data as $id => $Map){
            $id = $Map['id'];
            if ($id !=$mapnumber) continue;
            $number = 0;

            foreach ($mapmarkercsv->data as $key => $MapMarker) {
                $this->io->progressAdvance();
                $number++;
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



                    
                //pull the correct link from Map.csv to MapMarker.csv
                $MMRange = $Map['MapMarkerRange'];


                $formatkey = sprintf('%d.%s', $MMRange, $number);
                $X = $mapmarkercsv->at($formatkey)['X'];
                $pixX = ($X * 2);
                $Y = $mapmarkercsv->at($formatkey)['Y'];
                $pixY = ($Y * 2);
                $icon = $mapmarkercsv->at($formatkey)['Icon'];
                $PlaceName = $mapmarkercsv->at($formatkey)['PlaceName{Subtext}'];
                    $PlaceNameSub = $placenamecsv->at($PlaceName)['Name'];
                        $placenamesubfix = str_replace("\n", "<br>", $PlaceNameSub);
                if (empty($X))continue;
                $string =
                "var iconmarker". $number ." = L.icon({className: 'leaflet-div-icon2', iconUrl: 'icons/0". $icon .".png', iconAnchor: [11, 21]});\nvar marker". $number ." = L.marker(map.unproject([". (round($pixX, 1)) .", ". (round($pixY, 1)) ."], map.getMaxZoom()), {icon: iconmarker". $number ."}).openPopup().addTo(mapmarker);\nvar textmarker". $number ." = L.divIcon({iconSize: new L.Point(64, -10),html: \"<b>". $placenamesubfix ."</b>\"});
L.marker(map.unproject([". (round($pixX, 1)) .", ". (round($pixY, 1)) ."], map.getMaxZoom()), {icon: textmarker". $number ."}).addTo(mapmarker);\n";
                $output[] = $string;
            }
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
                $scale = $mapcsv->at($locationmap)['SizeFactor'];
                $c = $scale / 100.0;
                $offsetx = $mapcsv->at($locationmap)['Offset{X}'];
                $offsetValueX = ($locationX + $offsetx) * $c;
                    $NpcTLocX = ((41.0 / $c) * (($offsetValueX + 1024.0) / 2048.0) +1);
                    $NpcTPixelX = (($NpcTLocX - 1) * 50 * $c * 2);
                $offsety = $mapcsv->at($locationmap)['Offset{Y}'];
                $offsetValueY = ($locationY + $offsety) * $c;
                    $NpcTLocY = ((41.0 / $c) * (($offsetValueY + 1024.0) / 2048.0) +1);
                    $NpcTPixelY = (($NpcTLocY - 1) * 50 * $c * 2);
                    $string =
                "var treasure". $number ." = L.marker(map.unproject([". (round($NpcTPixelX, 1)) .", ". (round($NpcTPixelY, 1)) ."], map.getMaxZoom()), {icon: icontreasure}).bindPopup('<h3><b>". $MapName ."</b></h3>X: (". (round($NpcTLocX, 1)) .") Y: (". (round($NpcTLocY, 1)) .")<br><b>ID: ". $key ."<br>LevelID: ". $levelID ."'
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
                        \"<h3><b>Vista</b></h3><h4>". $vistaname ."</h4>X: (". (round($NpcTLocX, 1)) .") Y: (". (round($NpcTLocY, 1)) .")<br>Action: /". $action ."<br>Min Level: ". $vistaminlv ."\"
                    ).openPopup().addTo(vista);\n\n";
                $vista[] = $string;
            }
        

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
                } elseif ($eobjectname = 'aether current') {
                    $icon = 'current';
                }

            $string =
                "var eventobject". $id ." = L.marker(map.unproject([". (round($NpcPixelX, 1)) .", ". (round($NpcPixelY, 1)) ."], map.getMaxZoom()), {icon: icon". $icon ."})
                    .bindPopup(\"<h3><b>". $eobjectname ."</b></h3>X: (". (round($NpcLocX, 1)) .") Y: (". (round($NpcLocY, 1)) .")<br>LGBType: ". $type ."(EObj)<br>LevelID: ". $name ."<br>ObjectID: ". $object ."<br>Sgb Path: ". $sgbpath ."<br>Used in quest:<br><a href='https://ffxiv.gamerescape.com/wiki/". $dataqueststr ."'>". $dataquest ."</a><i></i>\"
                    ).openPopup().addTo(eventobject);\n\n";
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
{
            // Save some data
            $data = [
                '{output5}' => "\n\n$Total5",
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
                '{mapshort}' => $mapshort,
                '{placename}' => $placename,
                '{output}' => "\n\n$output",
                '{sub}' => $sub,
                '{treasure}' => "\n\n$treasure",
                '{vista}' => "\n\n$vista",

//                '{mapdata}' => $mapmarker,
            ];

            // format using Gamer Escape formatter and add to data array
            // need to look into using item-specific regex, if required.
            $this->data[] = GeFormatter::format(self::WIKI_FORMAT, $data);
        }

        // save our data to the filename: GeRecipeWiki.txt
        $this->io->progressFinish();
        $this->io->text('Saving ...');
        $info = $this->save(''. str_replace(" ", "_", $placename) .''. str_replace(" ", "_", $sub) .'.html', 999999);
        $this->io->table(
            [ 'Filename', 'Data Count', 'File Size' ],
            $info
        );
    }
}

//<span class="w3-bar-item w3-wide w3-right"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
//<input type="hidden" name="cmd" value="_s-xclick" />
//<input type="hidden" name="hosted_button_id" value="9FYZ36J2X39XY" />
//<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_SM.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
//<img alt="" border="0" src="https://www.paypal.com/en_GB/i/scr/pixel.gif" width="1" height="1" />
//</form></span>