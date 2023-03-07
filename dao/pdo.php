<?php
    function pdo_get_connection(){
        $severname = "localhost";
        $username = "root";
        $password = "";
        try {
            //code...
            $conn = new PDO("mysql:host=$severname;dbname=dam;charset=utf8",$username.$password);// mở kết nối pdo
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// khai báo phương thức và kiểu trả vể kết quả lỗi
            return $conn;
        } catch (\Throwable $th) {
            //throw $th;
            echo "Connection failed: " . $e->getMessage();
        }  
    }
    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(), 1);
        //Hàm array_slice () trong php là một hàm trả về một mảng đảo ngược với mảng ban đầu.
        //func_get_args(): lấy mảng tất cả các tham số được truyền vào hàm.
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);//prepare chuẩn bị chuyển hóa câu lệnh sql
            $stmt->execute($sql_args);// thực thi câu lệnh sql
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
        }
        catch(PDOException $e){
        throw $e;
        }
        finally{
        unset($conn);
        }
    }
        

    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }

    function pdo_query_value($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return array_values($row)[0];
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
        


?>