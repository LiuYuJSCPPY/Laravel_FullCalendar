# Laravel 行事曆


![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/laravel%20%E6%97%A5%E6%AD%B7.PNG)



## 功能
 * Laravel
    * 首頁 : 當還不是使用者的時候，會直接到登入面進行登入。登入完畢才可以使用行事曆，行事歷只會出現該使用者的行事曆
    * AJAX 新增、更新、刪除
    
* 前端
  * 前台使用FullCalendar套件完成 
  * AJAX 新增、更新、刪除

## 技術與工具
* 前端:
  * HTML5
  * CSS3
  * jquery
  * AJAX
  * FullCalendar 套件
  
* 後端:
   * Laravel:
     * Authentication
     
 * 資料庫:
    * MySQL Workbench

## 步驟圖片與影片

* 當進到首頁時sever端，會去Session抓取資料判斷是否已經登入，當沒有登入的狀態會直接進到login頁面。

#### 以下是沒有登入的狀態
![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/Laravel_%E8%A1%8C%E4%BA%8B%E6%9B%86_%E7%99%BB%E5%85%A5%E7%8B%80%E6%85%8B.gif)

#### 以下是登入的狀態
![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/Laravel_%E8%A1%8C%E4%BA%8B%E6%9B%86_%E7%99%BB%E5%85%A5%E7%8B%80%E6%85%8B.gif)



* 新增
![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/%E6%96%B0%E5%A2%9E.PNG)

* 新增成功
![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/%E6%96%B0%E5%A2%9E1.PNG)

* 更新
![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/%E6%9B%B4%E6%96%B0.PNG)

* 刪除
![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/%E5%88%AA%E9%99%A4.PNG)

* 刪除成功
 ![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/%E5%88%AA%E9%99%A41.PNG)

## 操作影片
#### 使用者1
![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/Laravel_%E8%A1%8C%E4%BA%8B%E6%9B%86_%E4%BD%BF%E7%94%A8%E8%80%851.gif)

#### 使用者2

![image](https://github.com/LiuYuJSCPPY/Laravel_FullCalendar/blob/master/Laravel_%E8%A1%8C%E4%BA%8B%E6%9B%86_%E4%BD%BF%E7%94%A8%E8%80%852.gif)



## 操作說明

### 安裝

1. 遠端下載repo
```
https://github.com/LiuYuJSCPPY/Laravel_FullCalendar.git
```
2. 到 .env 資料庫使用者以及密碼請填寫

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelfullcalendar
DB_USERNAME=請輸入資料庫使用者
DB_PASSWORD=請輸入資料庫密碼
```
3. 請確保資料庫 schema名稱是否有: laravelfullcalendar

4. 請輸入指令 

```
php artisan migrate

```
5. 請輸入指令

```
php artisan serve

```

