#!/bin/bash

# agit color test
for size in 230 320 480 640
do
  # from 32 32 step to 256
  for color in $(seq 32 32 256)
  do 
    convert -geometry $size -colors $color image.gif export/image_s${size}_c${color}.gif
  done
done
  


