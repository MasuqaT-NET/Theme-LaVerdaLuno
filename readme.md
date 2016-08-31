# Theme-LaVerdaLuno
WordPress theme for my blog "La Verda Luno"  
[http://blog.masuqat.net/]()

Base: Bones designed by Eddie Machado  
[http://themble.com/bones]()

Inspired by Flato
[http://themememe.com/flato]()

Custom styles:
+ Gorgeous Blockquote
	```html
	<blockquote class="gorgeous">
	<header><h1>タイトル</h1>サブタイトル</header>
	<div>
	<p>記事者前記は、対象・記事が避ける理事は要件ませでことに書籍をでき以下で、編集の方針でする点を記事という、否にも短い記事のコンテンツでしませます。</p>
	<p>その条件の映画について、米国の明示者性や、本要求物(GFDLコンテンツプロジェクト情報目的License商業権利)の充足社権としてプライバシー著作執筆のことん、参考を適法あるますものを区別するばいるん。</p>
	</div>
	<footer>引用:<a href="http://google.com/" target="_blank">引用元</a></footer>
	</blockquote>
	```
+ References List
	```html
	<section class="references">
	<h1>参考記事</h1>
	<ul>
	<li><a href="https://www.google.co.jp/">Google</a></li>
	<li><a href="https://www.microsoft.com/ja-jp/">Microsoft</a></li>
	<li><a href="http://www.apple.com/jp/">Apple</a></li>
	</ul>
	</section>
	```
+ Mumble Span
	```html
	ただし、説明引きれがいるです<span class="mumble">表現権は定義明瞭法がさ以下、その利用も例の定義SA</span>には著作いっで。
	```
+ Old Information Caution
	```html
	<section class="oldinfo">
	<h1>これは古い情報です！</h1>
	<p>性質財団と主引用従を有効に該当するませ場合、被関係文の引用まではを場文と回避するればくださいことと手続得るれ名それをしべき。</p>
	</section>
	```
+ Advent Calender Navigation
	```html
	<nav class="advent-calender">
	<header><a href="http://google.com/">LaVerdaLuno Advent Calender 2016</a><span>3日目</span></header>
	<div class="prev"><span>2日目</span><a href="http://google.com/">Metro UI</a></div>
	<div class="next"><span>4日目</span><a href="http://google.com/">Material UI</a></div>
	</nav>
	```

Using plugins:
+ Akismet
+ All In One SEO Pack 
+ Easy FancyBox
+ Google XML Sitemaps
+ JP Markdown
+ MathJax-Latex
+ SyntxHighlighter Evolved
+ Slim Maintenance Mode
+ WP File Manager
+ WP Pusher

Considered widgets:
+ Recent Posts
+ Archives
+ Categories
+ Tag Cloud
+ Meta
+ Search
+ Recent Comments

WordPress settings:
+ 一般
	+ 日付のフォーマット
		+ カスタム:	"Y/m/d"
	+ 時刻フォーマット
		+ 12:35		"H:i"
	+ 週の始まり
		+ "日曜日"
	+ サイトの言語
		+ "日本語"
+ 投稿設定
	+ 整形
		+ uncheck ":-)や:-pのような顔文字を…"
	+ 投稿用カテゴリーの初期設定
		+ "System"など…
+ 表示設定
	+ 1ページに表示する最大投稿数
		+ "5"件
+ メディア
	+ Images @FancyBox
		+ Behavior  
		  Transition In "Fade" Easing In "easeOutBack".
		  Transition Out "Fade" Easing Out "easeInBack".
		+ Appearance  
		  Title Position "Inside"
+ パーマリンク設定
	+ 共通設定
		+ 日付と投稿名

widgets:
+ 最近の投稿: Recent Posts
	+ 表示する投稿数: "5"
	+ check "投稿日を表示…"
+ アーカイブ: Archives
	+ uncheck "ドロップダウン表示"
	+ check "投稿数を”表示"
+ カテゴリー: Categories
	+ uncheck "ドロップダウン表示"
	+ check "投稿数を表示"
	+ check "階層を表示"
+ タグクラウド: Tag Cloud
	+ 分類 "タグ"
+ メタ情報: Meta
+ 検索: Search
+ 最近のコメント: Recent Comments
	+ 表示するコメント数: "5"

menues:
+ Nav
	+ Profile
	+ About
	+ Series
		+ 何か1
		+ 何か2
	+ Index

License: MIT (changed from WTFPL)

Note:
We should make the folder "categories" on "uploads" directory.  
Blog which uses this theme should be placed as domain like http://hoge.org/ or http://blog.hoge.org/ etc.

Todo:
+ make format style except 'standard', 'status' and 'aside'.