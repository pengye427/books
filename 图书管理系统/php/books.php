<?php
$hide=$_REQUEST["hide"];
$conn=mysqli_connect("127.0.0.1","root","","h52002",3306);
mysqli_query($conn,"SET NAMES utf8");
// 在登录状态下
if($hide==0){
    $name=$_REQUEST["name"];
    $sql="SELECT vip FROM man WHERE name='$name'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $vip=$row["vip"];
    if($vip==1){
        $sql="SELECT id,name,price,count,zuozhe,jianjie FROM books WHERE vip=$vip";
        $result=mysqli_query($conn,$sql);
        $arr=[];
        while(($row=mysqli_fetch_assoc($result))!=null){
            array_push($arr,$row);
        }
        echo JSON_encode($arr);
    }else{
        $sql="SELECT id,name,price,count,zuozhe,jianjie FROM books WHERE vip=$vip";
        $result=mysqli_query($conn,$sql);
        $arr=[];
        while(($row=mysqli_fetch_assoc($result))!=null){
            array_push($arr,$row);
        }
        echo JSON_encode($arr);
    }
}else if($hide==1){
    $name=$_REQUEST["name"];
    $price=$_REQUEST["price"];
    $count=$_REQUEST["count"];
    $zuozhe=$_REQUEST["zuozhe"];
    $jianjie=$_REQUEST["jianjie"];
    $content=$_REQUEST["content"];
    $vip=$_REQUEST["vip"];
    $sql="INSERT INTO books VALUES(0,'$name',$price,$count,'$zuozhe','$jianjie','$content',$vip)";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>location='../html/success.html';sessionStorage['py']='新增成功'</script>";
    }else{
        echo "<script>location='../html/success.html';sessionStorage['py']='新增失败'</script>";
    }
}else if($hide==2){
    $id=$_REQUEST["id"];
    $sql="SELECT name,price,count,zuozhe,jianjie,content,vip FROM books WHERE id={$id}";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_row($result);
    echo json_encode($row);
}else if($hide==3){
    $id=$_REQUEST["id"];
    $name=$_REQUEST["name"];
    $price=$_REQUEST["price"];
    $count=$_REQUEST["count"];
    $zuozhe=$_REQUEST["zuozhe"];
    $jianjie=$_REQUEST["jianjie"];
    $content=$_REQUEST["content"];
    $vip=$_REQUEST["vip"];
    $sql="UPDATE books SET name='{$name}',price={$price},count={$count},zuozhe='{$zuozhe}',jianjie='{$jianjie}',content='{$content}',vip={$vip} WHERE id={$id}";// $sql="UPDATE books SET name='{$name}',price={$price},count={$count},zuozhe='{$zuozhe}',jianjie='{$jianjie}',content='{$content}',vip={$vip} WHERE id={$id}"; 
    $result=mysqli_query($conn,$sql);
     if($result){
        echo "<script>location='../html/success.html';sessionStorage['py']='修改成功'</script>";
    }else{
        echo "<script>location='../html/success.html';sessionStorage['py']='修改失败'</script>";
    } 
}else if($hide==4){
    $id=$_REQUEST["id"];
    $sql="DELETE FROM books WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    echo $result;
}else if($hide==5){
    $sql="SELECT name FROM man";
    $result=mysqli_query($conn,$sql);
    $arr=[];
    while(($row=mysqli_fetch_row($result))!=null){
        array_push($arr,$row);
    }
    echo JSON_encode($arr);
}else if($hide==6){
    $name=$_REQUEST["name"];
    $pwd=$_REQUEST["pwd"];
    $email=$_REQUEST["email"];
    $vip=$_REQUEST["vip"];
    $sql="INSERT INTO man VALUES(0,'$name','$email','$pwd','$vip')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>location='../html/success.html';sessionStorage['py']='注册成功'</script>";
    }else{
        echo "<script>location='../html/success.html';sessionStorage['py']='注册失败'</script>";
    }
}else if($hide==7){
    $name=$_REQUEST["name"];
    $pwd=$_REQUEST["pwd"];
    $sql="SELECT name,pwd,vip FROM man";
    $result=mysqli_query($conn,$sql);
    while(($row=mysqli_fetch_assoc($result))!=null){
        if($row["name"]==$name && $row["pwd"]==$pwd){
            $vip=$row["vip"];
            echo "<script>location='../html/success.html';sessionStorage['py']='登陆成功';sessionStorage['name']='${name}';sessionStorage['vip']=$vip</script>";
            return false;
        }
    }
    echo JSON_encode($arr);
    echo "<script>location='../html/success.html';sessionStorage['py']='登录失败'</script>";
}else if($hide==8){
    $id=$_REQUEST["id"];
    $sql="SELECT content FROM books WHERE id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_row($result);
    echo JSON_encode($row);
}








?>