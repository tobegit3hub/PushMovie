<?php
 class mysql{
   private $db_host;//数据库主机
   private $db_name;//数据库用户名
   private $db_pass;//数据库密码
   private $db_database;//数据库名
   private $conn;//数据库连接标识
   private $code;//数据库编码
   private $prompt_error = 1;//错误提示，默认关闭，建议关闭

   //构造函数
   function __construct($db_host,$db_name,$db_pass,$db_database,$conn,$code){
     $this->db_host = $db_host;
	 $this->db_name = $db_name;
	 $this->db_pass = $db_pass;
	 $this->db_database = $db_database;
	 $this->code = $code;
	 $this->connect();
   }

   //数据库连接
   function connect(){
     if($this->conn = "pconn"){
	    //永久连接
		if(!$this->conn = mysql_pconnect($this->db_host,$this->db_name,$this->db_pass)){
		   $this->error("服务器连接失败！");
		}
	 }
	 else{
		//即时连接
	    if(!$this->conn = mysql_connect($this->db_host,$this->db_name,$this->db_pass)){
		   $this->error("服务器连接失败！");
		}
	 }  

	 if(!mysql_select_db($this->db_database,$this->conn)){
		   $this->error("数据库连接失败！");
	 }

	 //设置数据库字符编码
	 $this->query("SET NAMES '$this->code'");
	 
	 //设置时区
     date_default_timezone_set('PRC');
   }

   //数据库执行语句
   function query($sql){
        if(empty($sql)){
		    $this->error("数据库执行语句为空！");
		}
        
		if(!$query = mysql_query($sql)){
		   $this->error('Query Error:'.$sql);
		}

		return $query;
   }

   //返回结果集
   function fetch_array($query,$result_type = MYSQL_ASSOC){
	    if(empty($query)){
			$this->error("返回结果集条件为空！");
		}
		
		return mysql_fetch_array($query,$result_type);
   }
   
   //查询
   function select($table,$condition='',$parameters='*'){
	    if(empty($table)){
			$this->error("数据表不能为空！");
		}   
		
		if(!$sel = $this->query("select $parameters from $table $condition")){
			$this->error("查询表".$table."中的数据失败！");
		}
		
		return $sel;
   }

   //插入
   function insert($table,$column,$value){
        if(empty($table) or empty($column) or empty($value)){
		   $this->error("插入数据填写不完整！");
		}

        if(!$insert = $this->query("insert into `$table`($column) values($value)")){
		   $this->error("向表".$table."插入指定数据失败！");
		}
		
		return $insert;
   }

   //更新
   function update($table,$content,$condition=''){
        if(empty($table) or empty($content)){
		   $this->error("更新表".$table."中所需数据没有填写完整！");
		}

		if(!$update = $this->query("update $table set $content where $condition")){
		   $this->error("更新表".$table."中数据失败！");
		}
		
		return $update;
   }

   //删除
   function delete($table,$condition){
        if(empty($condition)){
		   $this->error("因没有设置条件，删除表".$table."中数据失败，");
		}

		if(!$delete = $this->query("delete from $table where $condition")){
		   $this->error("删除表".$table."中数据失败！");
		}
		
		return $delete;
   }

   //获取记录条数
   function num_rows($query){
        if($query == false){
		   $this->error("没有结果集供操作！");
		}

        $num = mysql_num_rows($query);

		return $num;
   }

   //错误提示
   function error($msg = ""){
	    if($this->prompt_error){
          $msg.= "\r\n".mysql_error();
		  die($msg);
	    }
   }
 }