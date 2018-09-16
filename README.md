# tensorflow4cat

## Images

![tensorweb1](https://github.com/octocatz/tensorflow4cat/blob/images/tensor1.png)

![tensorweb2](https://github.com/octocatz/tensorflow4cat/blob/images/tensor2.png)

## Architecture

![architecture](https://github.com/octocatz/tensorflow4cat/blob/images/tensorflow4cat.png)


## Scraping
```
pip install google_images_download

googleimagesdownload -k "xxx cat"
```
## Training
```
python retrain.py \
  --bottleneck_dir=bottlenecks \
  --how_many_training_steps=100 \
  --model_dir=inception \
  --summaries_dir=training_summaries/basic \
  --output_graph=retrained_graph.pb \
  --output_labels=retrained_labels.txt \
  --image_dir=gakusyu_data
```
