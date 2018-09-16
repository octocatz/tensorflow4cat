#!/bin/sh
imgname=$1
imgfile="$imgname"
. ./tensorflow/bin/activate && python3 ./train/label_image.py --image $imgfile --graph ./train/retrained_graph_max.pb --labels ./train/retrained_labels_max.txt --input_layer=Placeholder > ./tf.log && deactivate
res=`tail -n 20 ./tf.log`
echo $res
