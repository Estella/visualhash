<?php
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
//
// @Author Estella Mystagic
// twitter.com/Mystagic

class visual_hash {
  public function gen_hash_str($s,$h = 32, $q = 4) {
    header('Content-type: image/png');
    $hex = hash('sha512',$s);
    $hashar = explode(":",chunk_split($hex, 6, ":"));
    $colors = array();
    foreach($hashar as $triple) {
      list($RR,$GG,$BB) = array_pad( explode(",", chunk_split($triple, 2, ",")) ,3,0);
      $colorar = array('R' => hexdec($RR), 'G' => hexdec($GG), 'B' => hexdec($BB));
      $j = 0; for($j=0;$j < $q; $j++) { $colors[] = $colorar; }
    }
    $w = count($colors)-$q;
    $i = imagecreatetruecolor($w, $h) or die('Cannot Initialize new GD image stream');
    $y = 0;
    while ($y <= $h) {
      $x = 0;
      while ($x < $w) {
        $c = imagecolorallocate($i,$colors[$x]['R'],$colors[$x]['B'],$colors[$x]['G']);
        $j = 0; for($j=0;$j < $q; $j++) {  imagesetpixel($i,$x,$y,$c); $x++; }
      }
      $y++;
    }
    imagepng($i);
    imagedestroy($i);
  }
  public function gen_hash_file($f,$h = 32, $q = 4) {
    header('Content-type: image/png');
    $hex =   hash_file('sha512', $f);
    $hashar = explode(":",chunk_split($hex, 6, ":"));
    $colors = array();
    foreach($hashar as $triple) {
      list($RR,$GG,$BB) = array_pad( explode(",", chunk_split($triple, 2, ",")) ,3,0);
      $colorar = array('R' => hexdec($RR), 'G' => hexdec($GG), 'B' => hexdec($BB));
      $j = 0; for($j=0;$j < $q; $j++) { $colors[] = $colorar; }
    }
    $w = count($colors)-$q;
    $i = imagecreatetruecolor($w, $h) or die('Cannot Initialize new GD image stream');
    $y = 0;
    while ($y <= $h) {
      $x = 0;
      while ($x < $w) {
        $c = imagecolorallocate($i,$colors[$x]['R'],$colors[$x]['B'],$colors[$x]['G']);
        $j = 0; for($j=0;$j < $q; $j++) {  imagesetpixel($i,$x,$y,$c); $x++; }
      }
      $y++;
    }
    imagepng($i);
    imagedestroy($i);
  }
}
