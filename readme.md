## 校園RFID系統
### 系統說明
這是一套要搭配RFID讀卡機使用的系統，是為了增加學生證用途而設計的，可以讓學生證不僅僅用來搭公車捷運、借圖書館，還可以用在活動報到、會議簽到、器材借用等方面。

### 系統需求
+ PHP 5.4+
+ Laravel
+ MySQL

### 安裝說明
1. 在app/config/database.php設定資料庫連線資訊

2. 在該系統根目錄執行下列命令：
php artisan key:generate
php artisan migrate
php artisan db:seed
3. 將學號與悠遊卡內碼對應表匯入contrast資料表
4. 使用預設的帳號密碼登入，記得進入系統之後要修改預設帳密
	+ 帳號：admin
	+ 密碼：123456789
5. 大功告成，開始享受吧！

### 作者
+ 暱稱：聽風
+ 個人網站：http://me.coder.tw



