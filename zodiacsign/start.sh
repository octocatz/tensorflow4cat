#!/bin/sh
imgname=$1
imgfile="$imgname"
. ./tensorflow/bin/activate && python3 ./train/label_image.py --image $imgfile --graph ./train/retrained_graph.pb --labels ./train/retrained_labels.txt --input_layer=Placeholder > ./tf.log && deactivate
res=`head -n 10 ./tf.log`
echo $res