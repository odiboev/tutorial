<?php
$hour = date('G');
if ($hour < 12 and $hour >5){
  echo "MOrning Bitch";
}
if ($hour >= 12 and $hour < 17) {
  echo "Afternoon";
}
if ($hour >=17 and $hour < 20) {
  echo "Night SHithead";
}
