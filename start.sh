#!/bin/sh
imgname=$1
imgfile="/home/redluckly/tf/$imgname"
. /home/redluckly/tensorflow/venv/bin/activate && python3 /home/redluckly/tf/label_image.py --image $imgfile --graph /home/redluckly/tf/retrained_graph.pb --labels /home/redluckly/tf/retrained_labels.txt --input_layer=Placeholder > ./tf.log && deactivate

res=`tail -n 5 ./tf.log`
echo $res
#echo $1


#. /home/redluckly/tensorflow/venv/bin/activate && python3 /home/redluckly/tf/label_image.py --image /home/redluckly/tf/cat1.jpg --graph /home/redluckly/tf/retrained_graph.pb --labels /home/redluckly/tf/retrained_labels.txt --input_layer=Placeholder && deactivate
