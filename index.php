<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tajawal:wght@200;300;400;500;700;800;900&family=Work+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        body{
            background-color:whitesmoke;
            font-family: 'tajawal' , sans-serif;
        }
        #father{
            width: 100%;
            font-size:20px;
        }
        main{
            float:left;
            border:1px solid gray ;
            padding: 5px;
        }
        input{
            padding: 4px;
            border: 2px solid black;
            text-align: center;
            font-size:17px;
            font-family: 'tajawal' , sans-serif;
        }
        aside{
            text-align: center;
            width:300px;
            float:right;
            border:1px solid black;
            padding: 10px;
            font-size:20px;
            background-color:silver;
            color:white;
        }
        #tbl{
            width:800px;
            font-size:20px;
            text-align:center;
        }
        #tbl:hover{
            background-color:gray;
            color : blue;
        }
        #tbl th {
            background-color:silver;
            font-size:20px;
            padding: 10px;
        }
        aside button{
            width:190px;
            padding: 8px;
            margin-top:8px;
            font-size:17px;
            font-weight:bold;
            font-family: 'tajawal' , sans-serif;
        }

    </style>
    <title>بيانات الطلاب</title>
</head>
<body dir='rtl'>
    <?php 
        #الاتصال مع قاعدة البيانات

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db   = 'Students';
        $connected = mysqli_connect($host , $user , $pass , $db);
        $result = mysqli_query($connected , "SELECT * FROM student");

        #button varible
        $id = '';
        $Name = '';
        $Address ='';
        if(isset($_POST['id'])){
            $id = strip_tags($_POST['id']);
        };
        if(isset($_POST['Name'])){
            $Name = strip_tags($_POST['Name']);
        };
        if(isset($_POST['Address'])){
            $Address = strip_tags($_POST['Address']);
        }
        $sqls='';
        if(isset($_POST['add'])){
            $sqls = "INSERT INTO student VALUE ($id , '$Name' , '$Address')";
            mysqli_query($connected , $sqls);
            header("location: index.php");
        };
        if(isset($_POST['del'])){
            $sqls = "DELETE FROM student WHERE Name ='$Name' or id = '$id'";
            mysqli_query($connected , $sqls);
            header("location: index.php");
        }



    
    ?>
    <div id="father">
        <form method="POST">
            <aside>
                <div id="div">
                    <img src="https://static.vecteezy.com/system/resources/previews/008/845/832/original/illustration-student-raises-his-hand-png.png" alt = "لوجو"  width="200px"/>
                    <h3>لوحة المدير</h3>
                    <label>رقم الطالب :</label><br>
                    <input type="text" name="id" id="id"/><br>
                    <label>اسم الطالب :</label><br>
                    <input type="text" name="Name" id="name"/><br>
                    <label>عنوان الطالب :</label><br>
                    <input type="text" name="Address" id="address"/><br>
                    <button name="add">اضافة</button>
                    <button name="del">حذف</button>
                </div>
            </aside>
            <!-- عرض البيانات  -->
            <main>
                <table id="tbl">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>اسم الطالب</th>
                        <th>عنوان الطالب</th>
                    </tr>
                    <?php 
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";

                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['Name']."</td>";
                            echo "<td>".$row['Address']."</td>";

                            echo "</tr>";
                        }
                    ?>
                </table>
            </main>

        </form>
    </div>
</body>
</html>
