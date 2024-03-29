# baseball talk

全国のプロ野球ファンが交流できる掲示板サービスです。

↓ 下記よりぜひご覧ください。

[https://frozen-tor-96422.herokuapp.com/](https://frozen-tor-96422.herokuapp.com/)

![イメージ画像1](./image-1.png)

![イメージ画像2](./image-2.png)

## このサービスを開発した目的、目指した課題解決

### このサービスを開発したきっかけ

コロナウイルスにより大学がオンライン授業になり、友達とプロ野球の話をする機会が減ってしまったことがきっかけです。小学生の頃にプロ野球を好きになってから今まで、毎日学校で友達とプロ野球の話をすることがとても楽しい時間でした。しかし、オンライン授業になってからは友達と会う回数も減り、プロ野球の話をする機会が減ってしまいました。そこで、この課題を解決しようと、自分の武器であるプログラミングスキルを活かし、学校の友達はもちろん、全国のプロ野球ファンの方々と、インターネットを通してプロ野球の話ができる（交流できる）サービスがあると良いなと思い、このサービスの開発をはじめました。

### 誰のために？

* 全国のプロ野球ファン
* 沢山の人とプロ野球の話で盛り上がりたい方

### 何ができる？

* 全国のプロ野球ファンと掲示板を通して交流することができる。
* いつでもどこでも好きなときに、プロ野球トークを楽しむことができる。
* 各球場の魅力や情報を共有,交換することができる。

## 技術・開発概要

### DB設計（ER図）

![ER図](./ER.png)

### 使用技術

* 言語：PHP 7.3.31
* フレームワーク：Laravel 6.20.43
* インフラ：AWS Cloud9
* データベース：MariaDB
* デプロイサーバー：heroku

### 開発人数
* 個人開発（1人）

## 開発過程

開発過程において、大変だった点、工夫した点についてです。

### 大変だった点、苦労した点

#### 1、Google map APIを使ったGoogleマップの表示

Google map APIを使ったGoogleマップの表示に苦戦しました。このサービスの場合、決まられたページに決められたマップを表示するのではなく、ユーザーが選択した球場に合わせて、その球場のマップを表示するという処理が必要でした。そのため、PHPの配列データをJSONに変換し、JavaScriptに渡す方法を用いました。この方法により実装することができました。

### 工夫した点

#### 1、ユーザーの特定モデルに対するアクションの認可

If文による条件分岐とPolicyを用いた認可により、ユーザーの特定モデルに対するアクションの認可機能を実装しました。具体的には、自分が作成したトーク,投稿のみ削除可能といった認可、自分のユーザー情報のみ編集,更新可能といった認可処理を実装しました。

#### 2、トークの人気ランキング機能の実装

「人気のトーク」において、各トークに存在する投稿の数（投稿数）を管理し、その投稿数の多い順にトークを表示することで、人気ランキング機能を実装しました。また、ランキング対象期間を「今月, 今週, 今日」から選択できるようにすることで、複数の人気ランキングによりトークを表示しました。

## 今後の課題

#### 機能の拡張

pusherを使った、投稿のリアルタイムかつ両方向の通信機能の組み込みや、多対多リレーションの実装によるユーザー同士のフォロー機能、また個人間のトーク機能や投稿に対する「いいね」機能を実装し、掲示板サービスから、より多くの方に利用されるSNSへと近づけていきたい。

#### ユーザーの利便性向上

上記の「機能の拡張」はもちろん、SNSログイン認証の導入や、このサービスのスマホアプリ版の開発にも挑戦し、より多くのユーザーに利用されるよう、ユーザーの利便性向上に努めたい。

#### AWS、インフラの知識をつける

VPCやSubnet、NATなどの要素を１つ１つ深く理解し、それらの必要性や仕組みの理解に努めたい。
