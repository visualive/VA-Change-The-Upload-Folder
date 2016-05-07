# VA Change The Upload Directory

## インストール

1. 本プラグインをプラグインディレクトリにアップロードする
2. wp-config.php に、WP_CONTENT_DIR・WP_CONTENT_URL・UPLOADS 定数を追加する。必要に応じて WP_HOME・WP_SITEURL も追加する
3. 2 の変更に合わせてディレクトリ構造を変更する
4. 本プラグインを有効化

各定数については、Codex をご覧ください。

## Sample wp-config.php

```
<?php
define( 'WP_HOME',           'https://www.example.com' );
define( 'WP_SITEURL',        WP_HOME . '/cms' );
define( 'WP_CONTENT_DIR',    dirname( __FILE__ ) );
define( 'WP_CONTENT_URL',    WP_HOME );
define( 'WP_PLUGIN_DIR',     WP_CONTENT_DIR . '/extensions' );
define( 'WP_PLUGIN_URL',     WP_CONTENT_URL . '/extensions' );
define( 'PLUGINDIR',         'extensions' );
define( 'WPMU_PLUGIN_DIR',   WP_PLUGIN_DIR . '/extensions_mu' );
define( 'WPMU_PLUGIN_URL',   WP_PLUGIN_URL . '/extensions_mu' );
define( 'MUPLUGINDIR',       PLUGINDIR . '/extensions_mu' );
define( 'UPLOADS',           'medias' );
```
