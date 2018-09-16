###Tensorflowで
###ネコの画像認識Webつくってみた

+++
###Who?

(Photo)
Name:
Department:
Joined Company:2009
Work:SystemIntegrate/DevOps...

+++
###前提
- インフラ・エンジニア
- 機械学習ははじめて
- 数学や統計学も初心者
- 言語はPHP/JavaScript/Perlなど
+++
###機械学習ってはやってますよね！
- ニュース
- 話題
- 情報は聞くけどさわったことない
→本当に使えるレベルで動くの？🤔

+++
###これから話すこと
Tensorflowを使ってネコの画像認識を試してみた話

+++
###話さないこと
機械学習の統計とか数学的な話

+++
###Agenda
- Tensorflow?
- やったこと
- 辛かったこと
- 良かったこと
- まとめ

+++
###Tensolflow?
ほにゃらら
（詳しいことはWebで）

+++
###やったこと
- ネコの画像をスクレイピング
- 画像を学習させる
- 画像を与えて認識できるかチェックしてみる

+++
###環境
- GCP VMインスタンス(n1-standard-1(vCPU x 1、メモリ 3.75 GB))
- OS Debian 4.9
- Python 3.5.3

+++
###流れ
- スクレイピング
- 学習
- 画像認識の実行

+++
###チュートリアルのイメージ
インストールして
https://www.tensorflow.org/install/install_mac
画像認識
https://www.tensorflow.org/tutorials/images/image_recognition

+++
###まずはスクレイピング
```
pip3 install google_images_download
googleimagesdownload -k "Scottish Fold"
```

+++
###画像をとってきた
```
-rw-r--r-- 1 xxx xxx   19369 Sep 16 09:04 18. scottish_fold2.jpg
-rw-r--r-- 1 xxx xxx    5604 Sep 16 09:04 16. 220px-white_scottishfold.jpg
-rw-r--r-- 1 xxx xxx  688222 Sep 16 09:04 99. 6.jpg
-rw-r--r-- 1 xxx xxx   75596 Sep 16 09:04 95. scottish_fold_white_550x367.jpg
-rw-r--r-- 1 xxx xxx  140625 Sep 16 09:04 82. angus.jpg
-rw-r--r-- 1 xxx xxx   10598 Sep 16 09:04 68. scottish334.jpg
-rw-r--r-- 1 xxx xxx  201425 Sep 16 09:04 44. animal023_0702_4k.jpg
-rw-r--r-- 1 xxx xxx   24863 Sep 16 09:04 38. 250px-scottish_fold_cat.jpg
-rw-r--r-- 1 xxx xxx   42854 Sep 16 09:04 35. fabio-petroni-scottish-fold-cat_a-g-13454525-14258384.jpg
-rw-r--r-- 1 xxx xxx   54599 Sep 16 09:04 15. 1.jpg
-rw-r--r-- 1 xxx xxx  117165 Sep 16 09:04 11. 16979752-curious-striped-scottish-fold-kitten.jpg
-rw-r--r-- 1 xxx xxx  715242 Sep 16 09:04 10. scottish-fold-cats-michael-d3f35258_cfa6cf2b.jpg
-rw-r--r-- 1 xxx xxx   17777 Sep 16 09:04 55. scottish-fold-1.jpg
-rw-r--r-- 1 xxx xxx  233039 Sep 16 09:04 50. adult-male-blue-scottish-fold-cat-with-golden-eyes-standing-looking-picture-id505322557.jpg
```
+++
###選別する
例。これはネコじゃない。削除。

+++
###Tensorflowのインストール
```
sudo apt-get install -y git build-essential libssl-dev language-pack-id
pip3 install --upgrade pip
pip3 install tensorflow
```

+++
###学習させる

```
python3 retrain.py \
  --bottleneck_dir=bottlenecks \
  --how_many_training_steps=100 \
  --model_dir=inception \
  --summaries_dir=training_summaries/basic \
  --output_graph=retrained_graph.pb \
  --output_labels=retrained_labels.txt \
  --image_dir=gakusyu_data
```
@[3](training_steps：学習回数)
@[8](gakusyu_data：学習させる画像フォルダ)
+++
###画像を認識・判別できるか試してみる
```
python3 label_image.py --xxx.jpg --graph retrained_graph.pb --labels retrained_labels.txt
```

+++
###ファイル名のエラー
```
OSError: [Errno 36] File name too long: "bottlenecks/British Shorthair/85. pet-cat-mammal-whiskers-vertebrate-british-shorthair-european-shorthair-chartreux-russian-blue-korat-cat-mia-small-to-medium-sized-cats-cat-like-mammal-domestic-short-haired-cat-american-shorthair-blue-cat's-743876.jpg_https~tfhub.dev~google~imagenet~inception_v3~feature_vector~1.txt"
```
ファイル名長いのね。mv。

###こんどはファイルサイズ
```
RuntimeError: Error during processing file gakusyu_data_max/Singapura cat/4. moonwalker_the_singapura.jpg (Invalid JPEG data or crop window, data size 1671168
	 [[Node: DecodeJpeg = DecodeJpeg[acceptable_fraction=1, channels=3, dct_method="", fancy_upscaling=true, ratio=1, try_recover_truncated=false, _device="/job:localhost/replica:0/task:0/device:CPU:0"](_arg_DecodeJPGInput_0_0)]]
```  
今度はファイルサイズ。ごっそり消す。つらみがすごい。

+++
###結果が5種類しかでない
```
egyptianmau: 0.66
bengal: 0.07
american shorthair: 0.05
singapura cat: 0.04
abyssinian: 0.03
```
+++
###全件出るようにする
```label_image.py
top_k = results.argsort()[-5:][::-1] #上位5件のみ
labels = load_labels(label_file)
for i in top_k:
  print(labels[i], results[i])
```
```
top_k = results.argsort()[::-1]
labels = load_labels(label_file)
for i in top_k:
  print('{}: {:.2f}'.format(labels[i], results[i]))
```
+++
###学習件数をかえてみる
100→500の差。すごい。

+++
###ネコの違いは判別できたか？
- 似てる種類はわからない。
- むしろあってるかどうかもよくわからない。
- 明確な違いがある動物でやるといいかも。

+++
###まとめ
- 壁が結構多い。
- 公式ドキュメントは英語のみ。
- Stackoverflowとかに聞いても微妙。
- むしろ壁しかない。
- でも動きが実感できる。
- アイデア次第で色々つくれそう。

+++
###もっとこうしたい

tensorflow.js 使ってみたい。

+++
END

