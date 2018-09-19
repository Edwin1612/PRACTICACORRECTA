<?php
	require_once('connection.php');

	//Se realiza la conexion a la base de datos, utilizando las constantes definidas en database_credentials.php
	

	function getPDO() 
	{
	    $host = DB_SERVER;
	    $dbname = DB_DATABASE;
	    $port = DB_PORT;
	    $connStr =  "mysql:host={$host};dbname={$dbname};port={$port}";
	    $dbOpt = array(
	        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
    );

    	return new PDO($connStr, DB_USER, DB_PASSWORD, $dbOpt);
	}

	$conn = getPDO();


	//Funcion que permite agregar un nuevo usuario a la base de datos, requiere nombre y correo.
	function add($nombre,$Posicion,$carrera,$email,$idddd){
		global $conn;
		//$sql = "INSERT INTO usuario (nombre,correo) VALUES ('$nombre','$correo')";
		$stmt = $conn->prepare('INSERT INTO sport_team (nombre,posicion,carrera,email,id_type) VALUES (:nombre,:posicion,:carrera,:email,:id_type)');
		//$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':nombre', $nombre);
		$stmt->bindParam(':posicion', $Posicion);
		$stmt->bindParam(':carrera', $carrera);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':id_type', $idddd);
		$stmt->execute();
		//$conn->query($sql);
	}

	//Funcion para agregar usuario, se le pide id ya que es necesario ya que son dos timpos de usuario.
	function update($id,$nombre,$Posicion,$carrera,$email){
		global $conn;
		$sql = "UPDATE sport_team SET nombre='$nombre', posicion='$Posicion', carrera='$carrera',email='$email' where id=$id";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}

	//Funcion que permite eliminar un usuario de la base de datos utilizando su id.
	function delete($id){
		global $conn;
		$sqlCmd = "DELETE FROM sport_team WHERE id=:id";
		$stmt = $conn->prepare($sqlCmd);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
	}

	//Funcion que permite obtener todos los registros encontrados en la tabla usuarios de la base de datos.
	function get_all(){
		global $conn;

		$stmt = $conn->prepare('SELECT *FROM user');
	// Ejecutamos el Statement.
		$stmt->execute();
		return $stmt;

	}

	//Funcion que permite realizar una busqueda de un usuario para obtener todos sus atributos mediante su id.
	function search($id){
		global $conn;
		$sql = "SELECT * FROM user where id=$id";
		$stmt = $conn->prepare($sql);
		$r = $conn->query($sql);
		return $r;
	}

	function count_users()
	{
		global $conn;
		$stmt = $conn->prepare('SELECT COUNT(*) FROM user');
		$stmt->execute();
		$fila = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);
		return $fila;
	}

	function count_types()
	{
		//Una senetencia sql que cuenta el numero de valores retornados, los asocio en grupo ya que solo hay dos tipos de usuario
		global $conn;
		$stmt = $conn->prepare('SELECT count(*) from user GROUP BY user_type_id');
		$stmt->execute();
		$r = $stmt->rowCount();
		return $r;
	}

	function count_status()
	{
		//Aqui igual solo una setencia sql para saber el numero de estatus por usuario
		global $conn;
		$stmt = $conn->prepare('SELECT count(*) from user GROUP BY status_id');
		$stmt->execute();
		$r = $stmt->rowCount();//Funcion que retorna el numero de elementos afectados o retornados.
		return $r;
	}

	function count_access()
	{
		//SSentencia select que  deuelve un numero de totales de filas.
		global $conn;
		$stmt = $conn->prepare('SELECT count(*) from user_log');
		$stmt->execute();
		$r = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);//Y lo retorno como array para poder trabajar en el index y obtener ese numero.
		return $r;
	}

	function count_active()
	{

		global $conn;
		//Senentecia sql que cuenta las filas con el valor activo en la columna name
		$stmt = $conn->prepare('SELECT count(*) from status where name ="Activo"');
		$stmt->execute();
		$r = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);//Y lo retorno como array para poder trabajar en el index y obtener ese numero.
		return $r;
	}

	function count_inactive()
	{
		//Senentecia sql que cuenta las filas con el valor Inactivo en la columna name
		global $conn;
		$stmt = $conn->prepare('SELECT count(*) from status where name ="Inactivo"');
		$stmt->execute();
		$r = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);//Y lo retorno como array para poder trabajar en el index y obtener ese numero.
		return $r;
	}
	function getAll($id)
	{
		global $conn;
		//Obtienes todos los jugadores dependiendo su id ya que existen dos tipos de jugadores
		$stmt = $conn->prepare('SELECT *from sport_team where id_type=:id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		return $stmt;
	}
	function selectAllFromTable($table)
  {
  	//Busca todos los datos de una cierta tabla en especial.
    global $conn;
    $stmt = $conn->prepare('SELECT *from '.$table);
    $stmt->execute();
    return $stmt;
  }


?>