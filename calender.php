<?php
// 基本時間變數 if (get不到url已存在之年月值) 則 (抓當下的年月值)
$year = $_GET["year"] ?? date("Y");
$month = $_GET["month"]  ?? date("m");
// 月數字前補零
$month = str_pad($month, 2, "0", STR_PAD_LEFT);
// 本月最多幾天
$days = date("t", mktime(0, 0, 0, $month, 1, $year));

//本月第一天為禮拜幾
$firstDayWeek = date("w", mktime(0, 0, 0, $month, 1, $year));

// 月份更換功能
// 1.前一個月 if $month==1 則 $year-1 $month==12；else $month-1 $year不變
if ($month ==1) {
    $prevYear =  $year-1;
    $prevMonth = 12;
} else {
    $prevYear=$year;
    $prevMonth=$month-1;
}

// 2.下一個月 if $month==12 則 $year+1 $month==1；else $month+1 $year不變
if ($month ==12) {
    $nextYear =  $year+1;
    $nextMonth = 1;
} else {
    $nextYear=$year;
    $nextMonth=$month+1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calender</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="./CSS/style2.css">
  
</head>
<body>
<section class="col1">
    <header>
        <a href="./calender.php?year=<?=$prevYear?>&month=<?=$prevMonth?>"><span class="material-icons">arrow_back_ios</span></a>
        <h2><?=$year."&nbsp;".$month?></h2>
        <a href="./calender.php?year=<?=$nextYear?>&month=<?=$nextMonth?>"><span class="material-icons">arrow_forward_ios</span></a>
    </header>
    <table>
        <thead>
            <tr>
            <td>Sun</td>
            <td>Mon</td>
            <td>Tue</td>
            <td>Wed</td>
            <td>Thu</td>
            <td>Fri</td>
            <td>Sat</td>
            </tr>
        </thead>
        <tbody>
           <?php
           $num=1;

           while ($num<=$days) {
               // 固定rows數
               for ($j=0;$j<6;$j++) {
                   echo "<tr>";
                   for ($i=0;$i<7;$i++) {
                       //  $num>總天數 or 迴圈數<第一天位置且$num==1 ->輸出空白格
                       if ($num>$days || ($i<$firstDayWeek && $num==1)) {
                           echo "<td>&nbsp;</td>" ;
                       } else {
                           echo "<td> $num</td>";
                           $num+=1;
                       }
                   }
                   echo "</tr>";
               }
           }
           ?>
            
        </tbody>
    </table>
    </section>
    <div class="col2">
        <section class="sec1">
            <div class="clock">
                <div class="clock-face">
                    <div class="hand hour-hand"></div>
                    <div class="hand min-hand"></div>
                    <div class="hand second-hand"></div>
                </div>
            </div>
        </section>
    </div>

    <script src="./all.js"></script>
</body>
</html>