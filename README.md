# kob_la_base ベースシステム


Laravel9で作成したログインまわりのみのベースシステムです。

下記2点について解説します。
- ベースシステムをローカル環境で動かす手順
- ベースシステムを新規開発プロジェクトに移植する。

<br>

## ベースシステムをローカル環境で動かす手順


① Gitが利用できる環境をご用意ください。

 Windowsでしたら「Git for Windows」が便利です。
 
 <br>
 

② PHP8.0以上、MySQLが動作する環境をご用意ください。
 XAMPPが便利です。
 
 <br>

③ コマンドラインツール(Git Bashなど）を起動してください。

 Git BashはGit for windowsに付属するツールです。
 
 <br>


④ Windowsで開発している場合、以下のコマンドを実行してください。

```
exec winpty bash
```
<br>


⑤cd コマンドでプロジェクトをインストールする任意のディレクトリへ移動します。


例

```
cd git
```

<br>

⑥ GitHubからプロジェクトを取り込みます。

```
git clone git@github.com:amaraimusi/kob_la_base.git
```

<br>

⑦ 開発環境のphp.iniを開きmemory_limitの容量を確認してください。「512M」だと後述のvendorインストールでメモリ不足エラーが発生しますので3Gくらいに書き換えてください。

```
memory_limit=512M ←変更前
memory_limit=3G ←変更後
```

<br>


⑧ 下記のcomposerコマンドでvendorをインストールしてください。環境に合わせたパッケージがvendorに自動インストールされます。

```
cd kob_la_base/dev
composer update
```

※次のような書き方もできます。→「php composer.phar update」

<br>




⑨ MySQLコマンドもしくはphpMyAdminにてkob_la_baseデータベースを作成してください。照合順序はutf8mb4_general_ciを選択してください。



```
例
CREATE DATABASE kob_la_base COLLATE utf8mb4_general_ci
```

⑩ kob_la_base.sqlダンプファイル(kob_la_base/doc/kob_la_base.sql)をインポートしてください。

マイグレーションはご用意しておりません。phpmyadminかmysqlコマンドなどをご利用ください。

<br>


⑪　.envを用意し開発環境に合わせたDB設定に書き換えてください。

.env.exampleをコピーし、「.env」ファイルを作成することもできます。

kob_la_base/.env.example → コピー → kob_la_base/.env

.envファイルの設定例


```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=kob_la_base
DB_USERNAME=root
DB_PASSWORD=
```

<br>


⑫　シンボリックリンクを設定してください。（htdocsディレクトリにプロジェクトを作成している場合は不要です。）


Windowsでシンボリックリンクを作成するには、Windows PowerShellを管理者権限で開き、下記コマンドを実行します。


パスは各自のPC環境に合わせて書き換えてください。

```
cmd /c mklink /D C:\xampp\htdocs\kob_la_base C:\Users\user\git\kob_la_base
```

※Windows PowerShellを管理者権限で開く方法→Windows PowerShellのアイコンを右クリック→「管理者として実行する」

<br>


⑬ URLへアクセスし、ログイン画面が表示されれば成功です。

```
例
http://localhost/kob_la_base/dev/public/
```

<br>

⑭　検証用のアカウントは以下の通りです。
いずれのアカウントもパスワードは「abcd1234」になります。

```
master2207                    マスター権限
himiko                        管理者権限
yamatotakeru@example.com      管理者権限
ni_n_toku_tennou@example.com  管理者権限
```

他にも数件のユーザーアカウントをご用意しています。詳しくはデータベースのusersテーブルを参照してください。

<br><br>


## ベースシステムを新規開発プロジェクトに移植する。


① 新規開発プロジェクトのディレクトリにkob_la_baseのdevフォルダを丸ごとコピーします。

devフォルダの場所→ kob_la_base/dev

<br>

② kob_la_baseデータベースの下記テーブルを新規開発プロジェクトのデータベースにインポートします。
- failed_jobs
- migrations
- password_resets
- personal_access_tokens
- sessions
- users

<br><br>







