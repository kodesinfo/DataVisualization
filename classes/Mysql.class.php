<<<<<<< HEAD
<?php
/**
 * Mysql 함수
 * Simple PHP MySQL Class ( https://gist.github.com/mloberg/1181537/9ee5e7baf0528a604348f1d1bed721ef6d79d1fe ) added
 * 
 * @file
 * @author  Kodes <mook@kode.co.kr>
 * @version 1.1
 *
 * @section LICENSE
 * 
 * https://www.kodes.co.kr
 */

class Mysql
{
	static private $link = null;
	static private $info = array(
		'last_query' => null,
		'num_rows' => null,
		'insert_id' => null
	);
	static private $connection_info = array();
	static private $where;
	static private $limit;
	static private $order;
	
	function __construct($host, $user, $pass, $db){
		self::$connection_info = array('host' => $host, 'user' => $user, 'pass' => $pass, 'db' => $db);
	}
	
	function __destruct(){
		if(is_resource(self::$link)) mysqli_close(self::$link);
	}
	
	/**
	 * Setter method
	 */
	static private function set($field, $value){
		self::$info[$field] = $value;
	}
	
	/**
	 * Getter methods
	 */
	public function last_query(){
		return self::$info['last_query'];
	}
	
	public function num_rows(){
		return self::$info['num_rows'];
	}
	
	public function insert_id(){
		return self::$info['insert_id'];
	}
	

	public function totRows($table){
		$link =& self::connection();
		$select="count(*)";
		$sql = sprintf("SELECT %s FROM %s%s", $select, $table, self::extra());
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row[$select];
	}
	/**
	 * Create or return a connection to the MySQL server.
	 */
	
	static private function connection(){
		if(!is_resource(self::$link) || empty(self::$link)){
			if($link = mysqli_connect(self::$connection_info['host'], self::$connection_info['user'], self::$connection_info['pass'], self::$connection_info['db'])){
				mysqli_set_charset($link, 'utf8');
				self::$link = $link;
			}else{
				throw new Exception('Could not connect to MySQL database.');
			}
		}
		return self::$link;
	}
	
	/**
	 * MySQL Where methods
	 */
	
	static private function __where($info, $type = 'AND'){
		$link =& self::connection();
		$where = self::$where;

		foreach($info as $row => $value){
			$sign = "=";
			if(is_array($value)){
				$sign = $value[0];
				$value = $value[1];
			}

			if(empty($where)){
				$where = sprintf("WHERE `%s` %s '%s'", $row, $sign ,mysqli_real_escape_string($link, $value));
			}else if(preg_match('/[a-z_]+[(][^)]*[)]/i',$value)){
				$where .= sprintf(" %s `%s` %s %s", $type, $row, $sign, $value);
			}else{
				$where .= sprintf(" %s `%s` %s '%s'", $type, $row, $sign, mysqli_real_escape_string($link, $value));
			}
		}
		self::$where = $where;
	}
	
	public function where($field, $equal = null){
		if($field ==""){
			return $this;
		}
		if(is_array($field)){
			self::__where($field);
		}else{
			self::__where(array($field => $equal));
		}
		return $this;
	}
	
	public function and_where($field, $equal = null){
		return $this->where($field, $equal);
	}
	
	public function or_where($field, $equal = null){
		if(is_array($field)){
			self::__where($field, 'OR');
		}else{
			self::__where(array($field => $equal), 'OR');
		}
		return $this;
	}

	/**
	 * MySQL Skip method
	 */
	
	public function limit($limit){
		self::$limit = 'LIMIT '.$limit;
		return $this;
	}
	
	/**
	 * MySQL Order By method
	 */
	
	public function orderBy($by, $order_type = 'DESC'){
		$order = self::$order;
		if(is_array($by)){
			foreach($by as $field => $type){
				if(is_int($field) && !preg_match('/(DESC|desc|ASC|asc)/', $type)){
					$field = $type;
					$type = $order_type;
				}
				if(empty($order)){
					$order = sprintf("ORDER BY `%s` %s", $field, $type);
				}else{
					$order .= sprintf(", `%s` %s", $field, $type);
				}
			}
		}else{
			if(empty($order)){
				$order = sprintf("ORDER BY `%s` %s", $by, $order_type);
			}else{
				$order .= sprintf(", `%s` %s", $by, $order_type);
			}
		}
		self::$order = $order;
		return $this;
	}
	
	/**
	 * MySQL query helper
	 */
	
	static private function extra(){
		$extra = '';
		if(!empty(self::$where)) $extra .= ' '.self::$where;
		if(!empty(self::$order)) $extra .= ' '.self::$order;
		if(!empty(self::$limit)) $extra .= ' '.self::$limit;
		// cleanup
		self::$where = null;
		self::$order = null;
		self::$limit = null;
		return $extra;
	}
	
	/**
	 * MySQL Query methods
	 */
	
	public function query($qry, $return = false){
		$link =& self::connection();
		self::set('last_query', $qry);
		$result = mysqli_query($link, $qry);

		if(is_resource($result)){
			self::set('num_rows', mysqli_num_rows($result));
		}

		if($return){
			if(preg_match('/LIMIT 1/', $qry)){
				$data = mysqli_fetch_assoc($result);
				mysqli_free_result($result);
				return $data;
			}else{
				$data = array();
				while($row = mysqli_fetch_assoc($result)){
					$data[] = $row;
				}
				mysqli_free_result($result);
				return $data;
			}
		}
		return true;
	}
	
	public function get($table, $select = '*'){
		$link =& self::connection();
		if(is_array($select)){
			$cols = '';
			foreach($select as $col){
				$cols .= "`{$col}`,";
			}
			$select = substr($cols, 0, -1);
		}
		$sql = sprintf("SELECT %s FROM %s%s", $select, $table, self::extra());

		self::set('last_query', $sql);
		$result = mysqli_query($link, $sql);

		if(!$result){
			throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			$data = false;
		}else{
			$num_rows = mysqli_num_rows($result);

			self::set('num_rows', $num_rows);

			if($num_rows == 0){
				$data = false;
			}else{
				$data = array();
				while($row = mysqli_fetch_assoc($result)){
					$data[] = $row;
				}
			}
		}

		mysqli_free_result($result);
		return $data;
	}

	public function maxRowNum($table, $select = '*'){
		$link =& self::connection();
		$sql = sprintf("SELECT %s FROM %s %s", $select, $table, self::$where);
		$result = mysqli_query($link, $sql);
		return mysqli_num_rows($result);
	}

	public function insert($table, $data){
		$link =& self::connection();
		$columnType = $this->getCoulmnType($table);

		$fields = '';
		$values = '';
		foreach($data as $col => $value){
			$fields .= sprintf("`%s`,", $col);

			if(preg_match("/(INT|FLOAT|DECIMAL|DOUBLE)/i",$columnType[$col]['Type'])){
				$value = ($value==""?0:$value);
				$values .= sprintf("%s,", mysqli_real_escape_string($link, $value));
			}else{
				$values .= sprintf("'%s',", mysqli_real_escape_string($link, $value));
			}
		}
		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);
		$sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $fields, $values);

		self::set('last_query', $sql);
		if(!mysqli_query($link,$sql)){
			throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
		}else{
			self::set('insert_id', mysqli_insert_id($link));
			return true;
		}
	}

	public function upsert($table, $data){
		$link =& self::connection();
		$columnType = $this->getCoulmnType($table);

		$fields = '';
		$values = '';
		$updtStm = '';

		foreach($data as $col => $value){
			$fields .= sprintf("`%s`,", $col);

			if(preg_match("/(INT|FLOAT|DECIMAL|DOUBLE)/i",$columnType[$col]['Type'])){
				$value = ($value==""?0:$value);
			}

			$values .= sprintf("'%s',", mysqli_real_escape_string($link, $value));
			$updtStm .= $col."=".sprintf("'%s',", mysqli_real_escape_string($link, $value));
		}

		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);
		$sql = sprintf("INSERT INTO %s (%s) VALUES (%s) ON DUPLICATE KEY UPDATE %s", $table, $fields, $values, substr($updtStm, 0, -1) );

		self::set('last_query', $sql);

		if(!mysqli_query($link,$sql)){
			throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
		}else{
			self::set('insert_id', mysqli_insert_id($link));
			self::$where = null;
			return true;
		}
	}

	public function update($table, $info){
		if(empty(self::$where)){
			throw new Exception("Where is not set. Can't update whole table.");
		}else{
			$link =& self::connection();
			$columnType = $this->getCoulmnType($table);

			$update = '';
			foreach($info as $col => $value){
				if(preg_match("/(INT|FLOAT|DECIMAL|DOUBLE)/i",$columnType[$col]['Type'])){
					$value = ($value==""?0:$value);
					$update .= sprintf("`%s`=%s, ", $col,  mysqli_real_escape_string($link, $value));
				}else{
					$update .= sprintf("`%s`='%s', ", $col,  mysqli_real_escape_string($link, $value));
				}
			}
			$update = substr($update, 0, -2);
			$sql = sprintf("UPDATE %s SET %s%s", $table, $update, self::extra());
			self::set('last_query', $sql);
			if(!mysqli_query($link,$sql)){
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			}else{
				return true;
			}
		}
	}
	
	public function getCoulmnType($table){
		$list = $this->query("show columns from ".$table,true);
		
		foreach($list as $key => $val){
			$columnType[$val['Field']] = $val;
		}
			
		return $columnType;
	}

	public function delete($table){
		if(empty(self::$where)){
			throw new Exception("Where is not set. Can't delete whole table.");
		}else{
			$link =& self::connection();
			$sql = sprintf("DELETE FROM %s%s", $table, self::extra());
			self::set('last_query', $sql);
			if(!mysqli_query($link,$sql)){
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			}else{
				return true;
			}
		}
	}

	// 테이블이 유무를 판단
	public function existTable($table){
		$link =& self::connection();
		
		$sql = sprintf("SELECT table_name FROM INFORMATION_SCHEMA.TABLES WHERE table_name = '%s'", $table);
		$result = mysqli_query($link, $sql);

		if(mysqli_num_rows($result)){
			return true;
		}else{
			return false;
		}
		
	}

	// 테이블을 만든다.
	public function creatTable($table, $field, $keyField){
		$strField='';
		$strKeyField='';

		if(!$this->existTable($table)){
			$link =& self::connection();

			foreach($field as $key => $val){
				if($val!=""){
					if(in_array($key,$keyField)){
						$strKeyField.=sprintf("`%s`,",$val);
					}
					$strField.=sprintf("`%s` varchar(100),",$val);
				}
			}
			$sql = sprintf("CREATE TABLE %s (%s PRIMARY KEY (%s)) ", $table, $strField, substr($strKeyField,0,-1));
			
			self::set('last_query', $sql);
			if(!mysqli_query($link, $sql)){
				throw new Exception('Error executing MySQL creating table: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	// 테이블 정보를 수정한다.
	public function alterTable($table, $field, $keyField){
		if($this->existTable($table)){
			$link =& self::connection();
			// 필드 정보를 가지고 온다.
			$fieldInfo = $this->getFieldInfo($table);
			$orgField = array_column($fieldInfo,"Field");
			$orgKey = array_filter(array_column($fieldInfo,"Key"));

			// Field 추가 삭제등의 변경사항 처리
			//Field 삭제
			foreach(array_diff($orgField,$field) as $key => $val){
				$sql=sprintf("alter table %s drop %s",$table,$val);
				mysqli_query($link, $sql);
			}
			
			foreach(array_diff($field,$orgField) as $key => $val){
				if($val!=""){
					$sql=sprintf("alter table %s add %s varchar(100)",$table,$val);
					mysqli_query($link, $sql);
				}
			}

			// table의 키필드 목록을 가지고 온다.
			foreach($orgKey as $key => $val){
				$orgKeyField[]=$orgField[$key];
			}
			// 새로운 키필드 목록을 만든다.
			foreach($keyField as $key => $val){
				$newKeyField[]=$field[$val];
			}
			
			$diffKey = array_merge(array_diff($newKeyField,$orgKeyField),array_diff($orgKeyField,$newKeyField));

			// 키필드가 원 테이블과 다르면 primary key변경
			if($diffKey[0]!=""){
				$sql = sprintf("alter table %s drop primary key",$table);
				mysqli_query($link, $sql);
				$sql = sprintf("alter table %s add primary key(%s)",$table,implode(",", $newKeyField));
				mysqli_query($link, $sql);
			}

		
		}else{
			 $this->creatTable($table, $field, $keyField);
		}
	}

	// 테이블 필드 정보를 가지고 온다.
	public function getFieldInfo($table){
		$data = array();
		$link =& self::connection();
		$sql = sprintf("desc `%s`",$table);
		$result = mysqli_query($link, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}

=======
<?php
/**
 * Mysql 함수
 * Simple PHP MySQL Class ( https://gist.github.com/mloberg/1181537/9ee5e7baf0528a604348f1d1bed721ef6d79d1fe ) added
 * 
 * @file
 * @author  Kodes <mook@kode.co.kr>
 * @version 1.1
 *
 * @section LICENSE
 * 
 * https://www.kodes.co.kr
 */

class Mysql
{
	static private $link = null;
	static private $info = array(
		'last_query' => null,
		'num_rows' => null,
		'insert_id' => null
	);
	static private $connection_info = array();
	static private $where;
	static private $limit;
	static private $order;
	
	function __construct($host, $user, $pass, $db){
		self::$connection_info = array('host' => $host, 'user' => $user, 'pass' => $pass, 'db' => $db);
	}
	
	function __destruct(){
		if(is_resource(self::$link)) mysqli_close(self::$link);
	}
	
	/**
	 * Setter method
	 */
	static private function set($field, $value){
		self::$info[$field] = $value;
	}
	
	/**
	 * Getter methods
	 */
	public function last_query(){
		return self::$info['last_query'];
	}
	
	public function num_rows(){
		return self::$info['num_rows'];
	}
	
	public function insert_id(){
		return self::$info['insert_id'];
	}
	

	public function totRows($table){
		$link =& self::connection();
		$select="count(*)";
		$sql = sprintf("SELECT %s FROM %s%s", $select, $table, self::extra());
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row[$select];
	}
	/**
	 * Create or return a connection to the MySQL server.
	 */
	
	static private function connection(){
		if(!is_resource(self::$link) || empty(self::$link)){
			if($link = mysqli_connect(self::$connection_info['host'], self::$connection_info['user'], self::$connection_info['pass'], self::$connection_info['db'])){
				mysqli_set_charset($link, 'utf8');
				self::$link = $link;
			}else{
				throw new Exception('Could not connect to MySQL database.');
			}
		}
		return self::$link;
	}
	
	/**
	 * MySQL Where methods
	 */
	
	static private function __where($info, $type = 'AND'){
		$link =& self::connection();
		$where = self::$where;

		foreach($info as $row => $value){
			$sign = "=";
			if(is_array($value)){
				$sign = $value[0];
				$value = $value[1];
			}

			if(empty($where)){
				$where = sprintf("WHERE `%s` %s '%s'", $row, $sign ,mysqli_real_escape_string($link, $value));
			}else if(preg_match('/[a-z_]+[(][^)]*[)]/i',$value)){
				$where .= sprintf(" %s `%s` %s %s", $type, $row, $sign, $value);
			}else{
				$where .= sprintf(" %s `%s` %s '%s'", $type, $row, $sign, mysqli_real_escape_string($link, $value));
			}
		}
		self::$where = $where;
	}
	
	public function where($field, $equal = null){
		if($field ==""){
			return $this;
		}
		if(is_array($field)){
			self::__where($field);
		}else{
			self::__where(array($field => $equal));
		}
		return $this;
	}
	
	public function and_where($field, $equal = null){
		return $this->where($field, $equal);
	}
	
	public function or_where($field, $equal = null){
		if(is_array($field)){
			self::__where($field, 'OR');
		}else{
			self::__where(array($field => $equal), 'OR');
		}
		return $this;
	}

	/**
	 * MySQL Skip method
	 */
	
	public function limit($limit){
		self::$limit = 'LIMIT '.$limit;
		return $this;
	}
	
	/**
	 * MySQL Order By method
	 */
	
	public function orderBy($by, $order_type = 'DESC'){
		$order = self::$order;
		if(is_array($by)){
			foreach($by as $field => $type){
				if(is_int($field) && !preg_match('/(DESC|desc|ASC|asc)/', $type)){
					$field = $type;
					$type = $order_type;
				}
				if(empty($order)){
					$order = sprintf("ORDER BY `%s` %s", $field, $type);
				}else{
					$order .= sprintf(", `%s` %s", $field, $type);
				}
			}
		}else{
			if(empty($order)){
				$order = sprintf("ORDER BY `%s` %s", $by, $order_type);
			}else{
				$order .= sprintf(", `%s` %s", $by, $order_type);
			}
		}
		self::$order = $order;
		return $this;
	}
	
	/**
	 * MySQL query helper
	 */
	
	static private function extra(){
		$extra = '';
		if(!empty(self::$where)) $extra .= ' '.self::$where;
		if(!empty(self::$order)) $extra .= ' '.self::$order;
		if(!empty(self::$limit)) $extra .= ' '.self::$limit;
		// cleanup
		self::$where = null;
		self::$order = null;
		self::$limit = null;
		return $extra;
	}
	
	/**
	 * MySQL Query methods
	 */
	
	public function query($qry, $return = false){
		$link =& self::connection();
		self::set('last_query', $qry);
		$result = mysqli_query($link, $qry);

		if(is_resource($result)){
			self::set('num_rows', mysqli_num_rows($result));
		}

		if($return){
			if(preg_match('/LIMIT 1/', $qry)){
				$data = mysqli_fetch_assoc($result);
				mysqli_free_result($result);
				return $data;
			}else{
				$data = array();
				while($row = mysqli_fetch_assoc($result)){
					$data[] = $row;
				}
				mysqli_free_result($result);
				return $data;
			}
		}
		return true;
	}
	
	public function get($table, $select = '*'){
		$link =& self::connection();
		if(is_array($select)){
			$cols = '';
			foreach($select as $col){
				$cols .= "`{$col}`,";
			}
			$select = substr($cols, 0, -1);
		}
		$sql = sprintf("SELECT %s FROM %s%s", $select, $table, self::extra());

		self::set('last_query', $sql);
		$result = mysqli_query($link, $sql);

		if(!$result){
			throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			$data = false;
		}else{
			$num_rows = mysqli_num_rows($result);

			self::set('num_rows', $num_rows);

			if($num_rows == 0){
				$data = false;
			}else{
				$data = array();
				while($row = mysqli_fetch_assoc($result)){
					$data[] = $row;
				}
			}
		}

		mysqli_free_result($result);
		return $data;
	}

	public function maxRowNum($table, $select = '*'){
		$link =& self::connection();
		$sql = sprintf("SELECT %s FROM %s %s", $select, $table, self::$where);
		$result = mysqli_query($link, $sql);
		return mysqli_num_rows($result);
	}

	public function insert($table, $data){
		$link =& self::connection();
		$columnType = $this->getCoulmnType($table);

		$fields = '';
		$values = '';
		foreach($data as $col => $value){
			$fields .= sprintf("`%s`,", $col);

			if(preg_match("/(INT|FLOAT|DECIMAL|DOUBLE)/i",$columnType[$col]['Type'])){
				$value = ($value==""?0:$value);
				$values .= sprintf("%s,", mysqli_real_escape_string($link, $value));
			}else{
				$values .= sprintf("'%s',", mysqli_real_escape_string($link, $value));
			}
		}
		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);
		$sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $fields, $values);

		self::set('last_query', $sql);
		if(!mysqli_query($link,$sql)){
			throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
		}else{
			self::set('insert_id', mysqli_insert_id($link));
			return true;
		}
	}

	public function upsert($table, $data){
		$link =& self::connection();
		$columnType = $this->getCoulmnType($table);

		$fields = '';
		$values = '';
		$updtStm = '';

		foreach($data as $col => $value){
			$fields .= sprintf("`%s`,", $col);

			if(preg_match("/(INT|FLOAT|DECIMAL|DOUBLE)/i",$columnType[$col]['Type'])){
				$value = ($value==""?0:$value);
			}

			$values .= sprintf("'%s',", mysqli_real_escape_string($link, $value));
			$updtStm .= $col."=".sprintf("'%s',", mysqli_real_escape_string($link, $value));
		}

		$fields = substr($fields, 0, -1);
		$values = substr($values, 0, -1);
		$sql = sprintf("INSERT INTO %s (%s) VALUES (%s) ON DUPLICATE KEY UPDATE %s", $table, $fields, $values, substr($updtStm, 0, -1) );

		self::set('last_query', $sql);

		if(!mysqli_query($link,$sql)){
			throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
		}else{
			self::set('insert_id', mysqli_insert_id($link));
			self::$where = null;
			return true;
		}
	}

	public function update($table, $info){
		if(empty(self::$where)){
			throw new Exception("Where is not set. Can't update whole table.");
		}else{
			$link =& self::connection();
			$columnType = $this->getCoulmnType($table);

			$update = '';
			foreach($info as $col => $value){
				if(preg_match("/(INT|FLOAT|DECIMAL|DOUBLE)/i",$columnType[$col]['Type'])){
					$value = ($value==""?0:$value);
					$update .= sprintf("`%s`=%s, ", $col,  mysqli_real_escape_string($link, $value));
				}else{
					$update .= sprintf("`%s`='%s', ", $col,  mysqli_real_escape_string($link, $value));
				}
			}
			$update = substr($update, 0, -2);
			$sql = sprintf("UPDATE %s SET %s%s", $table, $update, self::extra());
			self::set('last_query', $sql);
			if(!mysqli_query($link,$sql)){
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			}else{
				return true;
			}
		}
	}
	
	public function getCoulmnType($table){
		$list = $this->query("show columns from ".$table,true);
		
		foreach($list as $key => $val){
			$columnType[$val['Field']] = $val;
		}
			
		return $columnType;
	}

	public function delete($table){
		if(empty(self::$where)){
			throw new Exception("Where is not set. Can't delete whole table.");
		}else{
			$link =& self::connection();
			$sql = sprintf("DELETE FROM %s%s", $table, self::extra());
			self::set('last_query', $sql);
			if(!mysqli_query($link,$sql)){
				throw new Exception('Error executing MySQL query: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			}else{
				return true;
			}
		}
	}

	// 테이블이 유무를 판단
	public function existTable($table){
		$link =& self::connection();
		
		$sql = sprintf("SELECT table_name FROM INFORMATION_SCHEMA.TABLES WHERE table_name = '%s'", $table);
		$result = mysqli_query($link, $sql);

		if(mysqli_num_rows($result)){
			return true;
		}else{
			return false;
		}
		
	}

	// 테이블을 만든다.
	public function creatTable($table, $field, $keyField){
		$strField='';
		$strKeyField='';

		if(!$this->existTable($table)){
			$link =& self::connection();

			foreach($field as $key => $val){
				if($val!=""){
					if(in_array($key,$keyField)){
						$strKeyField.=sprintf("`%s`,",$val);
					}
					$strField.=sprintf("`%s` varchar(100),",$val);
				}
			}
			$sql = sprintf("CREATE TABLE %s (%s PRIMARY KEY (%s)) ", $table, $strField, substr($strKeyField,0,-1));
			
			self::set('last_query', $sql);
			if(!mysqli_query($link, $sql)){
				throw new Exception('Error executing MySQL creating table: '.$sql.'. MySQL error '.mysqli_errno($link).': '.mysqli_error($link));
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	// 테이블 정보를 수정한다.
	public function alterTable($table, $field, $keyField){
		if($this->existTable($table)){
			$link =& self::connection();
			// 필드 정보를 가지고 온다.
			$fieldInfo = $this->getFieldInfo($table);
			$orgField = array_column($fieldInfo,"Field");
			$orgKey = array_filter(array_column($fieldInfo,"Key"));

			// Field 추가 삭제등의 변경사항 처리
			//Field 삭제
			foreach(array_diff($orgField,$field) as $key => $val){
				$sql=sprintf("alter table %s drop %s",$table,$val);
				mysqli_query($link, $sql);
			}
			
			foreach(array_diff($field,$orgField) as $key => $val){
				if($val!=""){
					$sql=sprintf("alter table %s add %s varchar(100)",$table,$val);
					mysqli_query($link, $sql);
				}
			}

			// table의 키필드 목록을 가지고 온다.
			foreach($orgKey as $key => $val){
				$orgKeyField[]=$orgField[$key];
			}
			// 새로운 키필드 목록을 만든다.
			foreach($keyField as $key => $val){
				$newKeyField[]=$field[$val];
			}
			
			$diffKey = array_merge(array_diff($newKeyField,$orgKeyField),array_diff($orgKeyField,$newKeyField));

			// 키필드가 원 테이블과 다르면 primary key변경
			if($diffKey[0]!=""){
				$sql = sprintf("alter table %s drop primary key",$table);
				mysqli_query($link, $sql);
				$sql = sprintf("alter table %s add primary key(%s)",$table,implode(",", $newKeyField));
				mysqli_query($link, $sql);
			}

		
		}else{
			 $this->creatTable($table, $field, $keyField);
		}
	}

	// 테이블 필드 정보를 가지고 온다.
	public function getFieldInfo($table){
		$data = array();
		$link =& self::connection();
		$sql = sprintf("desc `%s`",$table);
		$result = mysqli_query($link, $sql);
		
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		return $data;
	}

>>>>>>> remotes/origin/main
}