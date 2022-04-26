Laravel・Vue学習のため、ECアプリを作成しました（MPA）。

# 開発環境
- Laravel8
- Vue2
- MySQL8

# 機能
- 商品のCRUD機能
- ショップのCRUD機能
- カテゴリー分類（2階層）
- 商品のお気に入り機能（Ajax通信）
- マルチログイン（ユーザー、ショップ）

# 画面
- トップ画面  
<img width="20%" alt="index" src="https://gyazo.com/e1bfd8fd8165daccb643092b3d8da2b1/raw"> <img width="58%" alt="index" src="https://gyazo.com/d7cef558dc33ac0815ba59a1438040b4/raw">

- カテゴリー一覧画面・カテゴリー詳細画面  
<img width="25%" alt="index" src="https://gyazo.com/d0c597ed4ba24574a95cd87239a1cd97/raw"> <img width="25%" alt="index" src="https://gyazo.com/e32af1b9699d47eb6a958268f62bf80f/raw"> 

- 商品詳細画面  
<img width="17%" alt="index" src="https://gyazo.com/30550209050ef59bf9455448d518c431/raw"> <img width="58%" alt="index" src="https://gyazo.com/dc5c3a3db2f03df91484ae703d20ea37/raw"> 

- 商品登録・更新画面  
<img width="50%" alt="index" src="https://gyazo.com/850b141a09b1020834bcad478919f128/raw"> 

- ショップ詳細画面・ショップの取扱商品一覧画面  
<img width="30%" alt="index" src="https://gyazo.com/a9604495fc073685a6793ea215fbb965/raw"> <img width="58%" alt="index" src="https://gyazo.com/e1dc62677081ccbb2efef6fa36be71d6/raw"> 



# DB設計
## ER図
![art text](https://gyazo.com/e0c9b65a8bbc49267128627a7a56c951/raw)

## users table
|Column|Type|Options|
|------|----|-------|
|name|string||
|email|string|unique|
|password|string||

### Association
- has_many :items, through :likes
- has_many :items, through :carts


## parent_cats table
|Column|Type|Options|
|------|----|-------|
|name|string||
|icon|string|nullable|


## categories table
|Column|Type|Options|
|------|----|-------|
|name|string||
|parent_id|references||

### Association
- has_many :items
- belongs_to :parent_cat


## shops table
|Column|Type|Options|
|------|----|-------|
|name|string||
|email|string|unique|
|password|string||

### Association
- has_many :items
- has_one :shop_info


## shop_infos table
|Column|Type|Options|
|------|----|-------|
|shop_id|references||
|post_code|integer||
|address|string||
|content|text||
|url|text||
|tel|string|nullable|
|holiday|string|nullable|
|open|time|nullable|
|close|time|nullable|


## items table
|Column|Type|Options|
|------|----|-------|
|shop_id|references||
|category_id|references||
|price|integer||
|name|string||
|content|string||
|postage|string||

### Association
- has_many :item_imgs
- belongs_to :category, shop
- has_many :users, through :likes
- has_many :users, through :carts


## item_imgs table
|Column|Type|Options|
|------|----|-------|
|item_id|references||
|name|string||

### Association
- belongs_to :item


## likes table
|Column|Type|Options|
|------|----|-------|
|item_id|references||
|user_id|references||

### Association
- belongs_to :user
- belongs_to :item


## carts table
|Column|Type|Options|
|------|----|-------|
|item_id|references||
|user_id|references||
|count|integer||
|is_bought|boolean|default: false|

### Association
- belongs_to :user
- belongs_to :item

