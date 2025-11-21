# GX Smart Life WordPress Theme

再生可能エネルギー会社「GXスマートライフ株式会社」のための専用WordPressテーマ

## テーマ概要

GX Smart Life Themeは、太陽光発電・蓄電池システムの販売・施工を行う企業向けに設計されたカスタムWordPressテーマです。
千葉県市原市を拠点とする企業の信頼性とプロフェッショナリズムを表現しながら、優れたユーザーエクスペリエンスを提供します。

## 主な機能

### コア機能
- ✅ レスポンシブデザイン（モバイル、タブレット、デスクトップ対応）
- ✅ Swiperカルーセル（トップページのヒーローセクション）
- ✅ カスタム投稿タイプ（施工例）
- ✅ カスタムタクソノミー（施工タイプ）
- ✅ 会社プロフィールウィジェット
- ✅ Google Analytics 4統合
- ✅ SEO最適化（Schema.org対応）
- ✅ ソーシャルメディア統合
- ✅ LINE公式アカウント連携

### ページテンプレート
1. **トップページ** (`front-page.php`)
   - Swiperカルーセル
   - ソリューション紹介カード
   - 特徴セクション
   - 最新のお知らせ
   - CTA（お問い合わせ誘導）

2. **サービスページ** (`template-service.php`)
   - ヒーローバナー
   - メリット一覧
   - CTA

3. **施工例ギャラリー** (`template-gallery.php`)
   - グリッドレイアウト
   - カテゴリーフィルター
   - カスタム投稿タイプ対応

4. **お問い合わせページ** (`template-contact.php`)
   - 複数の連絡方法表示
   - お問い合わせフォーム
   - 会社情報

5. **基本ページ** (`page.php`)
6. **個別投稿** (`single.php`)
7. **アーカイブ** (`archive.php`)
8. **検索結果** (`search.php`)
9. **404エラー** (`404.php`)

## インストール方法

### 1. テーマのアップロード
```bash
# FTPまたはWordPress管理画面からアップロード
wp-content/themes/gx-smartlife-theme/
```

### 2. テーマの有効化
1. WordPress管理画面にログイン
2. 「外観」→「テーマ」に移動
3. 「GX Smart Life Theme」を選択して「有効化」

### 3. 推奨プラグインのインストール
- Contact Form 7（お問い合わせフォーム）
- Yoast SEO または Rank Math（SEO最適化）
- Autoptimize（パフォーマンス最適化）

## カスタマイズ

### テーマカスタマイザー設定

WordPress管理画面「外観」→「カスタマイズ」から以下の設定が可能です：

#### 会社情報
- 会社名
- 代表者名
- 電話番号
- メールアドレス
- 所在地
- Facebook URL
- Twitter/X URL
- LINE公式アカウントURL

#### アナリティクス
- Google Analytics トラッキングID

### メニュー設定

1. 「外観」→「メニュー」に移動
2. 新しいメニューを作成
3. 以下のページを追加：
   - トップページ
   - 卒FIT
   - BCP対策
   - お知らせ
   - パートナー
   - 施工例
   - 会社概要
   - お問い合わせ
   - プライバシーポリシー
4. メニューの位置を「Primary Menu」に設定

### ウィジェット設定

#### サイドバー (`sidebar-1`)
推奨ウィジェット：
1. 会社プロフィール（カスタムウィジェット）
2. 検索
3. 最新の投稿
4. カテゴリー
5. アーカイブ

#### フッター (`footer-1`)
任意のウィジェットを配置可能

## カスタム投稿タイプ

### 施工例 (Installation Examples)

施工実績を管理するためのカスタム投稿タイプ

**スラッグ:** `installation`

**タクソノミー:** `installation_type`
- 地上設置
- 屋根設置
- 蓄電池システム
- 産業用

**使用方法:**
1. WordPress管理画面「Installation Examples」→「Add New」
2. タイトル、本文、アイキャッチ画像を設定
3. 施工タイプを選択
4. 公開

## テーマ構造

```
gx-smartlife-theme/
├── assets/
│   ├── css/
│   │   └── responsive.css
│   ├── js/
│   │   ├── navigation.js
│   │   └── swiper-init.js
│   └── images/
│       └── (プレースホルダー画像)
├── page-templates/
│   ├── template-service.php
│   ├── template-gallery.php
│   └── template-contact.php
├── template-parts/
│   ├── hero-carousel.php
│   ├── company-sidebar.php
│   └── post-card.php
├── 404.php
├── archive.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── page.php
├── search.php
├── sidebar.php
├── single.php
├── style.css
└── README.md
```

## デザイン仕様

### カラーパレット
- **プライマリブルー:** #337ab7
- **ダークブルー:** #296292
- **ビビッドブルー:** #3886c9
- **アクセント（赤）:** #cf2e2e
- **アクセント（オレンジ）:** #ff6900
- **アクセント（グリーン）:** #00d084
- **ニュートラル（グレー）:** #abb8c3
- **ダークグレー:** #32373c

### タイポグラフィ
- **フォントファミリー:** システムフォント（日本語対応）
- **基本フォントサイズ:** 16px
- **見出しスケール:** 14px - 42px

### ブレークポイント
- **モバイル:** 〜599px
- **タブレット:** 600px - 781px
- **デスクトップ:** 782px〜

## 外部ライブラリ

### CSS
- Swiper 11.0.0
- Font Awesome 5.15.4

### JavaScript
- Swiper.js 11.0.0

## ブラウザサポート

- Chrome（最新版）
- Firefox（最新版）
- Safari（最新版）
- Edge（最新版）
- iOS Safari 12+
- Android Chrome 90+

## パフォーマンス最適化

### 推奨設定
1. 画像最適化プラグインの使用
2. キャッシュプラグインの導入
3. CDNの利用（オプション）
4. 不要なプラグインの削除

### 画像サイズ
- **ヒーロー画像:** 3000x1500px
- **カード画像:** 600x400px
- **サムネイル:** 300x200px

## アクセシビリティ

- セマンティックHTML5マークアップ
- ARIA属性の適切な使用
- キーボードナビゲーション対応
- スクリーンリーダー対応
- 十分なカラーコントラスト

## SEO機能

- Schema.org構造化データ
- メタタグ最適化
- XMLサイトマップ対応（プラグイン使用）
- Open Graph対応
- レスポンシブデザイン（モバイルSEO）

## トラブルシューティング

### カルーセルが表示されない
- Swiperライブラリが正しく読み込まれているか確認
- ブラウザのコンソールでJavaScriptエラーを確認

### レイアウトが崩れる
- ブラウザキャッシュをクリア
- CSSファイルが正しく読み込まれているか確認

### メニューが動作しない
- JavaScriptが有効になっているか確認
- navigation.jsが正しく読み込まれているか確認

## サポートとドキュメント

### 問い合わせ先
- **会社名:** GXスマートライフ株式会社
- **代表者:** 鈴木繁樹
- **電話:** 070-2668-7130
- **メール:** info@gx-smartlife.com
- **所在地:** 千葉県市原市

## ライセンス

GNU General Public License v2 or later

## 更新履歴

### Version 1.0.0 (2025-01-21)
- 初回リリース
- 全コア機能実装
- レスポンシブデザイン対応
- Swiperカルーセル実装
- カスタム投稿タイプ実装
- SEO最適化

## クレジット

- **テーマ開発:** GX Smart Life Development Team
- **Swiper:** https://swiperjs.com/
- **Font Awesome:** https://fontawesome.com/
- **WordPress:** https://wordpress.org/

---

© 2025 GXスマートライフ株式会社. All Rights Reserved.
