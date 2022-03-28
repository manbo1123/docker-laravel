<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories') -> insert([
            ['name' => 'レディースファッション', 'parent_id'=>1],
            ['name' => 'メンズファッション', 'parent_id'=>1],
            ['name' => '腕時計、アクセサリー', 'parent_id'=>1],

            ['name' => 'ドリンク、水、お酒', 'parent_id'=>2],
            ['name' => 'スイーツ、洋菓子', 'parent_id'=>2],
            ['name' => '和菓子、中華菓子', 'parent_id'=>2],
            ['name' => 'スナック、お菓子、おつまみ', 'parent_id'=>2],
            ['name' => '米、雑穀、粉類', 'parent_id'=>2],
            ['name' => '魚介類、海産物', 'parent_id'=>2],
            ['name' => '肉、ハム、ソーセージ', 'parent_id'=>2],
            ['name' => 'フルーツ', 'parent_id'=>2],
            ['name' => '野菜', 'parent_id'=>2],
            ['name' => '麺類、パスタ', 'parent_id'=>2],
            ['name' => 'パン、シリアル', 'parent_id'=>2],
            ['name' => 'チーズ、乳製品、卵', 'parent_id'=>2],
            ['name' => '惣菜、料理', 'parent_id'=>2],
            ['name' => '漬物、佃煮、ふりかけ', 'parent_id'=>2],
            ['name' => '豆腐、納豆、こんにゃく', 'parent_id'=>2],
            ['name' => '乾物、乾燥豆類、缶詰', 'parent_id'=>2],
            ['name' => '調味料、料理の素、油', 'parent_id'=>2],
            ['name' => '製菓材料、パン材料', 'parent_id'=>2],
            ['name' => '非常用食品', 'parent_id'=>2],
            ['name' => 'その他食品', 'parent_id'=>2],

            ['name' => '釣り', 'parent_id'=>3],
            ['name' => 'アウトドア、キャンプ、登山', 'parent_id'=>3],
            ['name' => 'カヌー、カヤック、ボート', 'parent_id'=>3],
            ['name' => 'プレジャーボート、ヨット', 'parent_id'=>3],
            ['name' => '旅行用品', 'parent_id'=>3],
            ['name' => '海外おみやげ', 'parent_id'=>3],
            ['name' => 'その他アウトドア用品', 'parent_id'=>3],

            ['name' => 'コンタクトレンズ、ケア用品', 'parent_id'=>4],
            ['name' => 'メガネ、老眼鏡', 'parent_id'=>4],
            ['name' => '補聴器', 'parent_id'=>4],
            ['name' => 'ダイエット', 'parent_id'=>4],
            ['name' => 'マッサージ、リラクゼーション', 'parent_id'=>4],
            ['name' => 'アロマグッズ', 'parent_id'=>4],
            ['name' => '冷え対策、保温グッズ', 'parent_id'=>4],
            ['name' => '暑さ対策、冷却グッズ', 'parent_id'=>4],
            ['name' => '花粉症対策グッズ', 'parent_id'=>4],
            ['name' => '禁煙グッズ', 'parent_id'=>4],
            ['name' => 'いびき防止グッズ', 'parent_id'=>4],
            ['name' => '健康アクセサリー', 'parent_id'=>4],
            ['name' => '健康飲料', 'parent_id'=>4],
            ['name' => '特定保健用食品(トクホ)', 'parent_id'=>4],
            ['name' => 'バランス栄養、栄養調整食品', 'parent_id'=>4],
            ['name' => 'サプリメント', 'parent_id'=>4],
            ['name' => '医薬品、医薬部外品', 'parent_id'=>4],
            ['name' => '鍼、灸、治療器', 'parent_id'=>4],
            ['name' => '矯正用品、補助ベルト', 'parent_id'=>4],
            ['name' => '健康管理、計測計', 'parent_id'=>4],
            ['name' => '衛生医療用品、救急用品', 'parent_id'=>4],
            ['name' => '衛生日用品', 'parent_id'=>4],
            ['name' => 'オーラルケア', 'parent_id'=>4],
            ['name' => '介護用品', 'parent_id'=>4],
            ['name' => 'その他ダイエット、健康', 'parent_id'=>4],

            ['name' => 'スキンケア、基礎化粧品', 'parent_id'=>5],
            ['name' => 'ベースメイク', 'parent_id'=>5],
            ['name' => 'コフレ、セット', 'parent_id'=>5],
            ['name' => 'メイクアップ', 'parent_id'=>5],
            ['name' => 'まつ毛、つけまつ毛用品', 'parent_id'=>5],
            ['name' => 'メイク道具', 'parent_id'=>5],
            ['name' => 'ネイル', 'parent_id'=>5],
            ['name' => '香水', 'parent_id'=>5],
            ['name' => 'フェイスケア', 'parent_id'=>5],
            ['name' => 'ボディケア', 'parent_id'=>5],
            ['name' => '日焼け止め', 'parent_id'=>5],
            ['name' => '脱毛、除毛', 'parent_id'=>5],
            ['name' => '制汗剤、デオドラント', 'parent_id'=>5],
            ['name' => 'レディースヘアケア', 'parent_id'=>5],
            ['name' => 'メンズヘアケア', 'parent_id'=>5],
            ['name' => 'メンズシェービング用品', 'parent_id'=>5],
            ['name' => 'メンズスキンケア、メイク', 'parent_id'=>5],

            ['name' => 'スマホ', 'parent_id'=>6],
            ['name' => 'タブレットPC', 'parent_id'=>6],
            ['name' => 'SIMカード', 'parent_id'=>6],
            ['name' => 'スマホ、タブレットアクセサリー、周辺機器', 'parent_id'=>6],
            ['name' => 'スマートウォッチ、ウェアラブル端末', 'parent_id'=>6],
            ['name' => 'ノートパソコン', 'parent_id'=>6],
            ['name' => 'デスクトップパソコン', 'parent_id'=>6],
            ['name' => 'ディスプレイ、モニター', 'parent_id'=>6],
            ['name' => 'プリンター、複合機', 'parent_id'=>6],
            ['name' => 'パソコン周辺機器', 'parent_id'=>6],
            ['name' => 'PCパーツ', 'parent_id'=>6],
            ['name' => 'PCサプライ、アクセサリー', 'parent_id'=>6],
            ['name' => 'ソフトウェア', 'parent_id'=>6],
            ['name' => '携帯電話', 'parent_id'=>6],
            ['name' => 'その他', 'parent_id'=>6],

            ['name' => 'テレビ、映像機器', 'parent_id'=>7],
            ['name' => 'オーディオ機器', 'parent_id'=>7],
            ['name' => 'カメラ', 'parent_id'=>7],
            ['name' => '望遠鏡、光学機器', 'parent_id'=>7],

            ['name' => 'テレビ、映像機器', 'parent_id'=>8],
            ['name' => '冷暖房器具、空調家電', 'parent_id'=>8],
            ['name' => '生活家電', 'parent_id'=>8],
            ['name' => 'キッチン家電', 'parent_id'=>8],
            ['name' => '美容家電', 'parent_id'=>8],
            ['name' => '健康家電', 'parent_id'=>8],
            ['name' => '情報家電', 'parent_id'=>8],
            ['name' => '電池、充電池', 'parent_id'=>8],
            ['name' => 'カメラ', 'parent_id'=>8],
            ['name' => 'オーディオ機器', 'parent_id'=>8],
            ['name' => '望遠鏡、光学機器', 'parent_id'=>8],

            ['name' => 'テレビ台、キャビネット', 'parent_id'=>9],
            ['name' => 'ラック、シェルフ、本棚', 'parent_id'=>9],
            ['name' => 'チェスト、衣類収納', 'parent_id'=>9],
            ['name' => 'プラケース、押入れ収納', 'parent_id'=>9],
            ['name' => 'キッチン収納', 'parent_id'=>9],
            ['name' => 'ランドリー、サニタリー収納', 'parent_id'=>9],
            ['name' => 'ソファ、ソファベッド', 'parent_id'=>9],
            ['name' => 'テーブル', 'parent_id'=>9],
            ['name' => '椅子、スツール、座椅子', 'parent_id'=>9],
            ['name' => 'デスク、机', 'parent_id'=>9],
            ['name' => 'パーテーション、衝立', 'parent_id'=>9],
            ['name' => '照明、電球', 'parent_id'=>9],
            ['name' => 'ベッド、マットレス', 'parent_id'=>9],
            ['name' => '布団、寝具', 'parent_id'=>9],
            ['name' => 'こたつ', 'parent_id'=>9],
            ['name' => 'カーテン、ブラインド', 'parent_id'=>9],
            ['name' => 'カーペット、ラグ、マット', 'parent_id'=>9],
            ['name' => 'クッション、座布団', 'parent_id'=>9],
            ['name' => 'ファブリック、カバー類', 'parent_id'=>9],
            ['name' => 'インテリア時計', 'parent_id'=>9],
            ['name' => 'ウォールデコレーション', 'parent_id'=>9],
            ['name' => 'インテリア雑貨', 'parent_id'=>9],
            ['name' => 'ミラー、ドレッサー', 'parent_id'=>9],
            ['name' => '玄関家具', 'parent_id'=>9],
            ['name' => '子供部屋家具', 'parent_id'=>9],
            ['name' => 'オフィス家具', 'parent_id'=>9],

            ['name' => '生花', 'parent_id'=>10],
            ['name' => 'プリザーブドフラワー', 'parent_id'=>10],
            ['name' => 'ドライフラワー', 'parent_id'=>10],
            ['name' => 'ハーバリウム', 'parent_id'=>10],
            ['name' => 'フラワーアレンジメント', 'parent_id'=>10],
            ['name' => 'リース', 'parent_id'=>10],
            ['name' => '造花、アートフラワー', 'parent_id'=>10],
            ['name' => 'サボテン、多肉植物', 'parent_id'=>10],
            ['name' => '観葉植物', 'parent_id'=>10],
            ['name' => '人工観葉、フェイクグリーン', 'parent_id'=>10],
            ['name' => '人工芝', 'parent_id'=>10],
            ['name' => '盆栽、苔玉', 'parent_id'=>10],
            ['name' => '種、種子', 'parent_id'=>10],
            ['name' => '球根、種芋', 'parent_id'=>10],
            ['name' => '苗', 'parent_id'=>10],
            ['name' => '苗木、植木', 'parent_id'=>10],
            ['name' => '水生植物', 'parent_id'=>10],
            ['name' => '花瓶、花台', 'parent_id'=>10],
            ['name' => 'アレンジメント用品、資材', 'parent_id'=>10],
            ['name' => '園芸用品', 'parent_id'=>10],
            ['name' => 'その他花、ガーデニング', 'parent_id'=>10],

            ['name' => 'キッチン、台所用品', 'parent_id'=>11],
            ['name' => 'スリッパ', 'parent_id'=>11],
            ['name' => 'タオル', 'parent_id'=>11],
            ['name' => 'バス、洗面所用品', 'parent_id'=>11],
            ['name' => 'トイレ用品', 'parent_id'=>11],
            ['name' => '洗濯用品', 'parent_id'=>11],
            ['name' => 'ゴミ箱、ダストボックス', 'parent_id'=>11],
            ['name' => '掃除用具', 'parent_id'=>11],
            ['name' => '芳香剤、消臭剤、除湿剤', 'parent_id'=>11],
            ['name' => '蚊取り、防虫、害虫駆除', 'parent_id'=>11],
            ['name' => '文具、ステーショナリー', 'parent_id'=>11],
            ['name' => '防災、防犯、セーフティ', 'parent_id'=>11],
            ['name' => '冠婚葬祭、宗教用品', 'parent_id'=>11],
            ['name' => 'カタログギフト', 'parent_id'=>11],
            ['name' => 'ギフト券（コード販売）', 'parent_id'=>11],
            ['name' => 'ギフト券（券、カード販売）', 'parent_id'=>11],
            ['name' => 'その他キッチン、日用品、文具', 'parent_id'=>11],

            ['name' => '庭、ガーデニング', 'parent_id'=>12],
            ['name' => '住宅設備', 'parent_id'=>12],
            ['name' => '道具、工具', 'parent_id'=>12],
            ['name' => '材料、部品', 'parent_id'=>12],
            ['name' => '業務、産業用', 'parent_id'=>12],
            ['name' => 'オフィス用品', 'parent_id'=>12],
            ['name' => 'その他DIY、業務、産業用品', 'parent_id'=>12],

            ['name' => '犬用品', 'parent_id'=>13],
            ['name' => '猫用品', 'parent_id'=>13],
            ['name' => '熱帯魚、アクアリウム用品', 'parent_id'=>13],
            ['name' => '鳥用品', 'parent_id'=>13],
            ['name' => '小動物用品', 'parent_id'=>13],
            ['name' => '昆虫用品', 'parent_id'=>13],
            ['name' => '爬虫類、両生類用品', 'parent_id'=>13],
            ['name' => 'メモリアル、オーナーズグッズ', 'parent_id'=>13],
            ['name' => '生き物、生体', 'parent_id'=>13],
            ['name' => '動物用医薬品', 'parent_id'=>13],
            ['name' => 'その他ペット用品、生き物', 'parent_id'=>13],

            ['name' => '楽器、器材', 'parent_id'=>14],
            ['name' => '手芸、ハンドクラフト', 'parent_id'=>14],
            ['name' => 'コレクション、趣味', 'parent_id'=>14],
            ['name' => '画材、アート用品', 'parent_id'=>14],
            ['name' => '美術、工芸品', 'parent_id'=>14],
            ['name' => 'コスプレ衣装', 'parent_id'=>14],
            ['name' => '実験、工作', 'parent_id'=>14],
            ['name' => '占い、開運', 'parent_id'=>14],
            ['name' => 'その他楽器、手芸、コレクション', 'parent_id'=>14],

            ['name' => 'テレビゲーム', 'parent_id'=>15],
            ['name' => 'おもちゃ', 'parent_id'=>15],
            ['name' => 'フィギュア', 'parent_id'=>15],
            ['name' => 'ラジコン', 'parent_id'=>15],
            ['name' => 'ミニカー', 'parent_id'=>15],
            ['name' => '食玩、プライズ、カプセル', 'parent_id'=>15],
            ['name' => '模型、プラモデル', 'parent_id'=>15],
            ['name' => 'パズル', 'parent_id'=>15],
            ['name' => 'ボードゲーム', 'parent_id'=>15],
            ['name' => 'トレーディングカード', 'parent_id'=>15],
            ['name' => 'カードゲーム', 'parent_id'=>15],
            ['name' => 'パーティグッズ', 'parent_id'=>15],
            ['name' => '乗用玩具', 'parent_id'=>15],
            ['name' => '季節玩具', 'parent_id'=>15],
            ['name' => 'ダーツ', 'parent_id'=>15],
            ['name' => 'ビリヤード', 'parent_id'=>15],
            ['name' => '将棋', 'parent_id'=>15],
            ['name' => '囲碁', 'parent_id'=>15],
            ['name' => '麻雀', 'parent_id'=>15],
            ['name' => 'その他おもちゃ', 'parent_id'=>15],

            ['name' => 'おむつ、トイレ用品', 'parent_id'=>16],
            ['name' => '衛生用品、ヘルスケア', 'parent_id'=>16],
            ['name' => 'お風呂、バス用品', 'parent_id'=>16],
            ['name' => '授乳、食事用品', 'parent_id'=>16],
            ['name' => 'ベビー服、シューズ', 'parent_id'=>16],
            ['name' => 'ベビー用寝具、ベッド', 'parent_id'=>16],
            ['name' => 'ベビー用家具', 'parent_id'=>16],
            ['name' => 'ベビー用セーフティグッズ', 'parent_id'=>16],
            ['name' => '抱っこ紐、おんぶ紐', 'parent_id'=>16],
            ['name' => 'スリング', 'parent_id'=>16],
            ['name' => 'ベビーカー', 'parent_id'=>16],
            ['name' => 'ベビーシート、チャイルドシート', 'parent_id'=>16],
            ['name' => 'お名前シール、ネームラベル', 'parent_id'=>16],
            ['name' => 'おもちゃ、教材', 'parent_id'=>16],
            ['name' => '子ども服、シューズ', 'parent_id'=>16],
            ['name' => '子ども用寝具、ベッド', 'parent_id'=>16],
            ['name' => '子ども用家具', 'parent_id'=>16],
            ['name' => 'バッグ、ランドセル', 'parent_id'=>16],
            ['name' => '子ども用セーフティグッズ', 'parent_id'=>16],
            ['name' => '子ども用自転車、三輪車', 'parent_id'=>16],
            ['name' => 'マタニティウエア', 'parent_id'=>16],
            ['name' => '授乳、産後ウェア', 'parent_id'=>16],
            ['name' => 'マタニティ、産後用品', 'parent_id'=>16],
            ['name' => '出産祝い、出産記念品', 'parent_id'=>16],
            ['name' => '記念、行事用品', 'parent_id'=>16],
            ['name' => 'その他ベビー、キッズ、マタニティ用品', 'parent_id'=>16],

            ['name' => 'ゴルフ', 'parent_id'=>17],
            ['name' => 'スノーボード', 'parent_id'=>17],
            ['name' => 'スキー', 'parent_id'=>17],
            ['name' => 'フィットネス、トレーニング', 'parent_id'=>17],
            ['name' => 'マラソン、ランニング', 'parent_id'=>17],
            ['name' => '野球', 'parent_id'=>17],
            ['name' => 'サッカー、フットサル', 'parent_id'=>17],
            ['name' => 'テニス', 'parent_id'=>17],
            ['name' => 'バスケットボール', 'parent_id'=>17],
            ['name' => 'バレーボール', 'parent_id'=>17],
            ['name' => 'ソフトボール', 'parent_id'=>17],
            ['name' => 'バドミントン', 'parent_id'=>17],
            ['name' => '卓球', 'parent_id'=>17],
            ['name' => 'ラグビー', 'parent_id'=>17],
            ['name' => '陸上、トラック、フィールド', 'parent_id'=>17],
            ['name' => 'ヨガ、ピラティス', 'parent_id'=>17],
            ['name' => '武道、格闘技', 'parent_id'=>17],
            ['name' => 'ダンス、バレエ', 'parent_id'=>17],
            ['name' => '新体操、器械体操', 'parent_id'=>17],
            ['name' => 'ストリート系スポーツ', 'parent_id'=>17],
            ['name' => 'マリンスポーツ', 'parent_id'=>17],
            ['name' => '水泳', 'parent_id'=>17],
            ['name' => 'コンプレッションウエア', 'parent_id'=>17],
            ['name' => 'スポーツ用下着（汎用）', 'parent_id'=>17],
            ['name' => 'スポーツアクセサリー', 'parent_id'=>17],
            ['name' => 'スポーツバッグ（汎用）', 'parent_id'=>17],
            ['name' => 'スポーツケア用品', 'parent_id'=>17],
            ['name' => '体育器具、用品', 'parent_id'=>17],
            ['name' => 'その他の競技種目', 'parent_id'=>17],

            ['name' => '自動車', 'parent_id'=>18],
            ['name' => 'バイク', 'parent_id'=>18],
            ['name' => '自転車', 'parent_id'=>18],

            ['name' => '邦楽', 'parent_id'=>19],
            ['name' => '洋楽', 'parent_id'=>19],
            ['name' => 'KーPOP', 'parent_id'=>19],
            ['name' => 'ワールドミュージック', 'parent_id'=>19],
            ['name' => 'アニメ、ゲーム', 'parent_id'=>19],
            ['name' => 'キッズ、ファミリー', 'parent_id'=>19],
            ['name' => 'インディーズ', 'parent_id'=>19],
            ['name' => 'クラシック', 'parent_id'=>19],
            ['name' => 'ジャズ、フュージョン', 'parent_id'=>19],
            ['name' => 'ヒーリング、ニューエイジ', 'parent_id'=>19],
            ['name' => 'サウンドトラック', 'parent_id'=>19],
            ['name' => 'インストゥルメンタル', 'parent_id'=>19],
            ['name' => '実用', 'parent_id'=>19],
            ['name' => 'その他', 'parent_id'=>19],
            ['name' => 'チケット', 'parent_id'=>19],

            ['name' => '邦画', 'parent_id'=>20],
            ['name' => '洋画', 'parent_id'=>20],
            ['name' => 'アニメーション', 'parent_id'=>20],
            ['name' => 'ミュージック', 'parent_id'=>20],
            ['name' => 'テレビドラマ', 'parent_id'=>20],
            ['name' => 'お笑い、バラエティ', 'parent_id'=>20],
            ['name' => 'アイドル、イメージ', 'parent_id'=>20],
            ['name' => 'スポーツ、フィットネス', 'parent_id'=>20],
            ['name' => 'キッズ、ファミリー', 'parent_id'=>20],
            ['name' => '演劇、ミュージカル', 'parent_id'=>20],
            ['name' => '趣味、実用、教養', 'parent_id'=>20],
            ['name' => 'その他', 'parent_id'=>20],

            ['name' => 'コミック、アニメ', 'parent_id'=>21],
            ['name' => '文芸', 'parent_id'=>21],
            ['name' => '雑誌', 'parent_id'=>21],
            ['name' => 'アイドル写真集', 'parent_id'=>21],
            ['name' => 'ビジネス、経済', 'parent_id'=>21],
            ['name' => 'コンピュータ', 'parent_id'=>21],
            ['name' => 'エンターテインメント', 'parent_id'=>21],
            ['name' => '子ども', 'parent_id'=>21],
            ['name' => '生活', 'parent_id'=>21],
            ['name' => '趣味', 'parent_id'=>21],
            ['name' => '芸術', 'parent_id'=>21],
            ['name' => '歴史、心理、教育', 'parent_id'=>21],
            ['name' => '学習参考書', 'parent_id'=>21],
            ['name' => '語学、辞書', 'parent_id'=>21],
            ['name' => '医学、薬学、看護', 'parent_id'=>21],
            ['name' => 'ゲーム攻略本', 'parent_id'=>21],
            ['name' => '地図、ガイド', 'parent_id'=>21],
            ['name' => '就職、資格', 'parent_id'=>21],
            ['name' => '法律、社会', 'parent_id'=>21],
            ['name' => '理学、工学', 'parent_id'=>21],
            ['name' => '楽譜、音楽書', 'parent_id'=>21],
            ['name' => '洋書', 'parent_id'=>21],
            ['name' => '電子書籍', 'parent_id'=>21],
            ['name' => '関連グッズ', 'parent_id'=>21],

            ['name' => 'お掃除、訪問サービス', 'parent_id'=>22],
            ['name' => 'レンタル', 'parent_id'=>22],
            ['name' => 'リフォーム', 'parent_id'=>22],
            ['name' => '衣料品お直し', 'parent_id'=>22],
            ['name' => 'クリーニング', 'parent_id'=>22],
            ['name' => 'ペット関連サービス', 'parent_id'=>22],
            ['name' => 'サービスクーポン、引換券', 'parent_id'=>22],
            ['name' => '車関連サービス', 'parent_id'=>22],
            ['name' => 'その他サービス', 'parent_id'=>22],
        ]);
    }
}