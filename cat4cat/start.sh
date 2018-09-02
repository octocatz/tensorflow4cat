#!/bin/sh
imgname=$1
imgfile="$imgname"
. /usr/local/tensorflow/venv/bin/activate && python3 /usr/local/tf/label_image.py --image $imgfile --graph /usr/local/tf/retrained_graph.pb --labels /usr/local/tf/retrained_labels.txt --input_layer=Placeholder  > ./tf.log && deactivate
res=`tail -n 5 ./tf.log`
echo $res
