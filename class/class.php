<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
class Conectar
{
	public static function con()
	{
		
		$con = new mysqli("localhost", "root","" , "municipalidad");
		$con->select_db("municipalidad") or die( "Unable to select database");
		
		
		return $con;
	}
}
	
class Trabajo
{
	private $usuario=array();
	private $usuario2=array();
	private $empleado=array();
	private $empleados=array();
	private $cliente=array();
	private $proveedor=array();
	private $licencia=array();
	private $horas_extra=array();
	private $ausentismos=array();
	private $producto=array();
	private $pedido=array();
	private $pedido2=array();
	private $deudas=array();
	private $vencidos = array();
	private $nopagos = array();
	private $clientes = array();
	private $num = array();
	private $zonas = array();

	public function ingresar()
	{
		$user=$_POST["user"];
		$password=md5($_POST["pass"]);
		$sql="select * from usuario where username='$user' and password='$password'";
		$res=mysqli_query($sql, Conectar::con());
		if (mysql_num_rows($res)==0)
		{
			echo "
				<script type='text/javascript'>
				alert ('Los datos ingresados no existen en la base de datos');
				window.location='index.php';
				</script>
			";
		}
		
		else
		{
			if($reg=mysql_fetch_array($res))
			{
				$_SESSION["usuario"]=$reg["id_usuario"];
				header("Location:home.php");
			}
		}
	}
	

	public function add_empleado($nombre, $apellido, $dni, $numcuenta, $fechanacimiento, $estadocivil, $canthijos, $cuil, $telefono, $email, $direccion, $cp, $localidad, $provincia, $sector, $antiguedad)
	{
		$dias_disponibles=$antiguedad+10;
		$sql="insert into empleado values (null, '$nombre', '$apellido', $dni, $numcuenta, '$fechanacimiento', '$estadocivil', $canthijos, $cuil, '$telefono', '$email', '$direccion', 
			$cp, '$localidad', '$provincia', $sector, $antiguedad, $dias_disponibles)";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El empleado fue ingresado correctamente');
			window.location='alta_empleado.php';
		</script>";
	}

	public function add_cliente($nombre, $apellido, $cuit, $direccion, $localidad, $provincia, $telefono, $email, $categoria)
	{
		$sql="INSERT INTO `cliente`( `nombre`, `apellido`, `cuit`, `direccion`, `localidad`, `provincia`, `telefono`, `email`, `categoria`) VALUES ('$nombre','$apellido','$cuit','$direccion','$localidad','$provincia','$telefono','$email','$categoria')";
		$res=mysqli_query($sql, Conectar::con());
		if (!$res) {
    	die('Consulta no válida: ' . mysql_error());
		}
		echo "<script type='text/javascript'>
			alert('El cliente fue ingresado correctamente');
			window.location='alta_cliente.php';
		</script>";
	}

	public function add_proveedor($cuit, $nombre, $tipo, $direccion, $localidad, $provincia, $telefono, $email, $nrocuenta, $banco)
	{
		$sql="insert into proveedor values (null, $cuit, '$nombre', $tipo, '$direccion', '$localidad', '$provincia', '$telefono', '$email', $nrocuenta, '$banco')";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El proveedor fue ingresado correctamente');
			window.location='alta_proveedor.php';
		</script>";
	}

	public function add_usuario($id_empleado, $username, $password)
	{
		$pass=md5($password);
		$sql="insert into usuario values (null, '$username', '$pass', $id_empleado)";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El usuario fue ingresado correctamente');
			window.location='alta_usuario.php';
		</script>";
	}

	public function add_licencia($id_empleado, $tipo, $motivo, $desde, $hasta)
	{
		if ($tipo != 'otro'){$motivo = null;}
		$sql="insert licencia values (null, $id_empleado, '$tipo', '$motivo', '$desde', '$hasta', 'pendiente')";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('La licencia fue ingresada correctamente. La misma se encuentra en estado de aprobacion.');
			window.location='estado_licencia.php';
		</script>";
	}
		public function add_archivo($archivo,$num_exp,$codigo)
	{
		
		$sql="UPDATE `expediente` SET `nom_archivo`='$archivo' WHERE `cod_par`='$codigo' AND `num_exp`='$num_exp'";
		
		
		$res=mysqli_query($sql, Conectar::con());
		
		
	}


	public function buscar_empleado($op, $valor)
	{
		switch($op)
		{
			case 'dni':
				$sql="select e.*, u.* from empleado e inner join usuario u on u.id_empleado=e.id_empleado where nro_documento=$valor";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->empleado[]=$reg;
				}
				return $this->empleado;
			break;

			case 'apellido':
				$sql="select e.*, u.* from empleado e inner join usuario u on u.id_empleado=e.id_empleado where apellido='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->empleado[]=$reg;
				}
				return $this->empleado;
			break;

			case 'sector':
				$sql="select e.*, u.* from empleado e inner join usuario u on u.id_empleado=e.id_empleado where sector=$valor";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->empleado[]=$reg;
				}
				return $this->empleado;
			break;
		}
	}


	public function buscar_pedido($op, $valor)
	{
		switch($op)
		{
			case 'id_pedido':
				$sql="select p.*, c.* from pedido p inner join cliente c on p.id_cliente=c.id_cliente where id_pedido=$valor";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->pedido[]=$reg;
				}
				return $this->pedido;
			break;

			case 'apellido':
				$sql="select p.*, c.* from pedido p inner join cliente c on p.id_cliente=c.id_cliente where apellido='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->pedido[]=$reg;
				}
				return $this->pedido;
			break;

			case 'dni':
				$sql="select p.*, c.* from pedido p inner join cliente c on p.id_cliente=c.id_cliente where dni='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->pedido[]=$reg;
				}
				return $this->pedido;
			break;
		}
	}
	public function buscar_pedido2($op, $valor)
	{
		switch($op)
		{
			case 'nombre':
				$sql="SELECT `id_pedido`, `nombre`, `cliente`, `descripcion`, `fecha`, `importe`, `cuotas` FROM `pedido` WHERE `nombre`='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->pedido[]=$reg;
				}
				return $this->pedido;
			break;

			case 'fecha':
				$sql="SELECT `id_pedido`, `nombre`, `cliente`, `descripcion`, `fecha`, `importe`, `cuotas` FROM `pedido` WHERE `fecha`='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->pedido[]=$reg;
				}
				return $this->pedido;
			break;

			case 'cliente':
				$sql="SELECT `id_pedido`, `nombre`, `cliente`, `descripcion`, `fecha`, `importe`, `cuotas` FROM `pedido` WHERE `cliente`='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->pedido[]=$reg;
				}
				return $this->pedido;
			break;
		}
	}
	

	public function buscar_cliente($op, $valor)
	{
		switch($op)
		{
			case 'cuit':
				$sql="select * from cliente where cuit='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->cliente[]=$reg;
				}
				return $this->cliente;
			break;

			case 'nombre':
				$sql="select * from cliente where nombre='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->cliente[]=$reg;
				}
				return $this->cliente;
			break;

			case 'apellido':
				$sql="select * from cliente where apellido='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->cliente[]=$reg;
				}
				return $this->cliente;
			break;
		}
	}

		public function buscar_proveedor($op, $valor)
	{
		switch($op)
		{
			case 'cuit':
				$sql="select * from proveedor p inner join tipo_proveedor t on p.tipo=t.id_tipo_proveedor where cuit=$valor";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->proveedor[]=$reg;
				}
				return $this->proveedor;
			break;

			case 'nombre':
				$sql="select * from proveedor p inner join tipo_proveedor t on p.tipo=t.id_tipo_proveedor where nombre='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->proveedor[]=$reg;
				}
				return $this->proveedor;
			break;

			case 'tipo':
				$sql="select * from proveedor p inner join tipo_proveedor t on p.tipo=t.id_tipo_proveedor where tipo=$valor";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->proveedor[]=$reg;
				}
				return $this->proveedor;
			break;
		}
	}

	public function buscar_usuario($op, $valor)
	{
		switch($op)
		{
			case 'username':
				$sql="select * from usuario u inner join empleado e on u.id_empleado=e.id_empleado where username='$valor'";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->usuario2[]=$reg;
				}
				return $this->usuario2;
			break;

			case 'sector':
				$sql="select * from usuario u inner join empleado e on u.id_empleado=e.id_empleado where sector=$valor";
				$res=mysqli_query($sql,Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->usuario2[]=$reg;
				}
				return $this->usuario2;
			break;

		}
	}

	public function get_empleado($id_usuario)
	{
		$sql="select e.*, u.* from empleado e inner join usuario u on u.id_empleado=e.id_empleado where u.id_usuario=$id_usuario";
		$res=mysqli_query($sql, Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->empleado[]=$reg;
		}
		return $this->empleado;
	}

	public function get_empleados()
	{
		$sql="select * from empleado";
		$res=mysqli_query($sql, Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->empleados[]=$reg;
		}
		return $this->empleados;
	}
	public function get_clientes()
	{
		$sql="select * from cliente";
		$res=mysqli_query($sql, Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->clientes[]=$reg;
		}
		return $this->clientes;
	}

	public function get_licencias($id_usuario)
	{
		$sql="select l.id_licencia, l.id_empleado, l.estado, l.motivo, l.fecha_desde, l.fecha_hasta, e.id_empleado, e.nombre, e.apellido, e.nro_documento, e.sector, l.tipo, u.* from empleado e inner join usuario u on u.id_empleado=e.id_empleado inner join licencia l on l.id_empleado=e.id_empleado where u.id_usuario=$id_usuario";
		$res=mysqli_query($sql, Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->licencia[]=$reg;
		}
		return $this->licencia;
	}
	public function get_deudas()
	{
		$sql="SELECT `cliente` , `nombre` , `num_cuota` , `estado` , `fecha_ven`, `id_pedido`
			FROM `pedido`
			INNER JOIN deuda
			WHERE pedido.id_pedido = deuda.id_deuda";
		$res=mysqli_query($sql, Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->deudas[]=$reg;
		}
		return $this->deudas;
	}
	public function get_vencidos()
	{
		$sql="SELECT  `cliente` ,  `nombre` ,  `num_cuota` ,  `estado` ,  `fecha_ven`, `id_pedido`
		FROM  `pedido` 
		INNER JOIN deuda
		WHERE pedido.id_pedido = deuda.id_deuda
		AND deuda.estado =  'vencido'";
		$res=mysqli_query($sql, Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->vencidos[]=$reg;
		}
		return $this->vencidos;
	}
	public function get_nopagos()
	{
		$sql="SELECT  `cliente` ,  `nombre` ,  `num_cuota` ,  `estado` ,  `fecha_ven` , `id_pedido`
		FROM  `pedido` 
		INNER JOIN deuda
		WHERE pedido.id_pedido = deuda.id_deuda
		AND deuda.estado =  'no pago'";
		$res=mysqli_query($sql, Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->nopagos[]=$reg;
		}
		return $this->nopagos;
	}

	public function get_licencias_pendientes($id_usuario)
	{
		$sql="select l.*, e.*, u.* from empleado e inner join usuario u on u.id_empleado=e.id_empleado inner join licencia l on l.id_empleado=e.id_empleado where l.estado='pendiente' and id_usuario<>$id_usuario";
		$res=mysqli_query($sql, Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->licencia[]=$reg;
		}
		return $this->licencia;
	}

	public function get_cliente($id_cliente)
	{
		$sql="select * from cliente where id_cliente=$id_cliente";
		$res=mysqli_query($sql, Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->cliente[]=$reg;
		}
		return $this->cliente;
	}

	public function get_proveedor($id_proveedor)
	{
		$sql="select * from proveedor p inner join tipo_proveedor t on p.tipo=t.id_tipo_proveedor where id_proveedor=$id_proveedor";
		$res=mysqli_query($sql, Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->proveedor[]=$reg;
		}
		return $this->proveedor;
	}

	public function get_usuario($id_usuario)
	{
		$sql="select * from usuario u inner join empleado e on u.id_empleado=e.id_empleado where id_usuario=$id_usuario";
		$res=mysqli_query($sql,Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->usuario[]=$reg;
		}
		return $this->usuario;
	}

	public function get_pedido($id_pedido)
	{
		$sql="select p.*, c.* from pedido p inner join cliente c on p.id_cliente=c.id_cliente where id_pedido=$id_pedido";
		$res=mysqli_query($sql,Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->pedido[]=$reg;
		}
		return $this->pedido;
	}
	public function get_pedido2($id_pedido)
	{
		$sql="SELECT * FROM `pedido` WHERE `id_pedido`=$id_pedido";
		$res=mysqli_query($sql,Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->pedido[]=$reg;
		}
		return $this->pedido;
	}
	public function get_pedido3($id_pedido,$num_cuota)
	{
		$sql="	SELECT cli.nombre, cli.direccion, cli.cuit, deu.num_cuota, ped.descripcion, cli.telefono,deu.precio
				FROM pedido ped
				INNER JOIN deuda deu ON ped.id_pedido = deu.id_deuda
				INNER JOIN cliente cli ON cli.nombre = ped.cliente
				WHERE deu.id_deuda=$id_pedido and deu.num_cuota=$num_cuota";
		$res=mysqli_query($sql,Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->pedido[]=$reg;
		}
		return $this->pedido;
	}
	public function get_numero()
	{
		$sql="SELECT * FROM `factura` WHERE 1";
		$res=mysqli_query($sql,Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->num[]=$reg;
		}
		return $this->num;
	}
	public function actualizar_num($num)
	{
		$sql="UPDATE `factura` SET `numero`=$num+1 WHERE 1 LIMIT 1";
		$res=mysqli_query($sql,Conectar::con());
		
	}

		public function get_pedido_producto($id_pedido)
	{
		$sql="SELECT pe.id_pedido , pp.id_producto, pp.cantidad , pr.descripcion, pr.precio FROM pedido pe INNER JOIN pedido_producto pp ON pe.id_pedido = pp.id_pedido INNER JOIN producto pr ON pp.id_producto = pr.id_producto WHERE pe.id_pedido = $id_pedido";
		$res=mysqli_query($sql,Conectar::con());
		while ($reg=mysql_fetch_assoc($res))
		{
			$this->pedido2[]=$reg;
		}
		return $this->pedido2;
	}

	public function edit_empleado($id_empleado, $nombre, $apellido, $dni, $numcuenta, $fechanacimiento, $estadocivil, $canthijos, $cuil, $telefono, $email, $direccion, $cp, $localidad, $provincia, $sector, $antiguedad, $dias_disponibles)
	{
		$sql="update empleado set nombre='$nombre', apellido='$apellido', nro_documento=$dni, num_cuenta=$numcuenta, fecha_nacimiento='$fechanacimiento', estado_civil='$estadocivil', cantidad_hijos=$canthijos, cuil='$cuil', telefono='$telefono', email='$email', direccion='$direccion', 
			codigo_postal=$cp, localidad='$localidad', provincia='$provincia', sector=$sector, antiguedad=$antiguedad, dias_disponibles=$dias_disponibles where id_empleado=$id_empleado";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El empleado fue modificado correctamente');
			window.location='modificar_empleado.php';
		</script>";
	}

	public function edit_cliente($id_cliente, $nombre, $apellido, $cuit, $categoria, $direccion, $localidad, $provincia, $telefono,$email)
	{
		$sql="UPDATE `cliente` SET  `nombre`='$nombre',`apellido`='$apellido',`cuit`='$cuit',`categoria`='$categoria',`direccion`='$direccion',`localidad`='$localidad',`provincia`='$provincia',`telefono`='$telefono',`email`='$email' WHERE `id_cliente`= $id_cliente";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El cliente fue modificado correctamente');
			window.location='modificar_cliente.php';
		</script>";
	}
	public function edit_pedido($id_pedido, $nombre, $cliente, $descripcion, $fecha, $importe, $cuotas)
	{
		$sql="UPDATE `pedido` SET  `nombre`='$nombre',`cliente`='$cliente',`descripcion`='$descripcion',`fecha`='$fecha',`importe`='$importe',`cuotas`=$cuotas WHERE `id_pedido`= $id_pedido";
		
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El pedido fue modificado correctamente');
			window.location='modificar_pedido.php';
		</script>";
	}
	public function edit_proveedor($id_proveedor, $cuit, $nombre, $tipo, $direccion, $localidad, $provincia, $telefono, $email, $nrocuenta, $banco)
	{
		$sql="update proveedor set cuit=$cuit, nombre='$nombre', tipo=$tipo, direccion='$direccion', localidad='$localidad', provincia='$provincia', telefono='$telefono', email='$email', nro_cuenta=$nrocuenta, banco='$banco' where id_proveedor=$id_proveedor";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El proveedor fue modificado correctamente');
			window.location='modificar_proveedor.php';
		</script>";
	}

	public function edit_usuario($id_usuario, $username, $sector)
	{
		$sql="update usuario set username='$username', sector=$sector where id_usuario=$id_usuario";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El usuario fue modificado correctamente');
			window.location='modificar_usuario.php';
		</script>";
	}

	public function aprobar_licencia($id_licencia, $id_empleado)
	{
		$sql="update licencia set estado='aprobada' where id_licencia=$id_licencia";
		$sql2="update empleado set estado='Licencia' where id_empleado=$id_empleado";
		$res=mysqli_query($sql, Conectar::con());
		$res2=mysqli_query($sql2, Conectar::con());
		echo "<script type='text/javascript'>
			alert('La licencia ha sido aprobada');
			window.location='aprobar_licencias.php';
		</script>";
	}

	public function rechazar_licencia($id_licencia)
	{
		$sql="update licencia set estado='rechazada' where id_licencia=$id_licencia";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('La licencia ha sido rechazada');
			window.location='aprobar_licencias.php';
		</script>";
	}

	function dias_transcurridos($fecha_i,$fecha_f)
	{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
	}

	public function descontar_dias($id_empleado, $dias_disponibles)
	{
		$sql="update empleado set dias_disponibles=$dias_disponibles where id_empleado=$id_empleado";
		$res=mysqli_query($sql, Conectar::con());
	}

	public function delete_empleado($id_empleado)
	{
		$sql="delete from empleado where id_empleado=$id_empleado";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El empleado fue eliminado correctamente');
			window.location='eliminar_empleado.php';
		</script>";
	}

	public function delete_cliente($id_cliente)
	{
		$sql="delete from cliente where id_cliente=$id_cliente";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El cliente fue eliminado correctamente');
			window.location='eliminar_cliente.php';
		</script>";
	}
	public function delete_pedido($id_pedido)
	{
		$sql="delete from pedido where id_pedido=$id_pedido";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El pedido fue eliminado correctamente');
			window.location='eliminar_pedido.php';
		</script>";
	}

	public function delete_proveedor($id_proveedor)
	{
		$sql="delete from proveedor where id_proveedor=$id_proveedor";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El proveedor fue eliminado correctamente');
			window.location='eliminar_proveedor.php';
		</script>";
	}

	public function delete_usuario($id_usuario)
	{
		$sql="delete from usuario where id_usuario=$id_usuario";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El usuario fue eliminado correctamente');
			window.location='eliminar_usuario.php';
		</script>";
	}

	    public function set_ausentismo($id_usuario, $fecha)
    {
    	$sql="insert into ausentismos values ('$id_usuario', '$fecha')";
    	$res=mysqli_query($sql, Conectar::con());
    }

    public function update_estado($id_usuario, $estado)
    {
    	$sql="update empleado set estado = '$estado' where id_usuario = $id_usuario";
    	$res=mysqli_query($sql, Conectar::con());
    }
	
	public function add_horas($id_usuario, $fecha, $cant_horas)
	{
		$sql="insert into horas_extra values ('$id_usuario', '$fecha', '$cant_horas')";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('Se cargaron las horas correctamente');
			window.location='horas_extra.php';
		</script>";
	}

	public function get_horas_extra($id_usuario, $fechadesde, $fechahasta)
	{
		$sql="select * from horas_extra where id_usuario=$id_usuario and fecha between '$fechadesde' and '$fechahasta'";
		$res=mysqli_query($sql, Conectar::con());
				while($reg=mysql_fetch_assoc($res))
				{
					$this->horas_extra[]=$reg;
				}
				return $this->horas_extra;
	}

	public function get_ausentismos($id_usuario, $fechadesde, $fechahasta)
	{
		$sql="select count(*) as cantidad from ausentismos where id_usuario=$id_usuario and fecha between '$fechadesde' and '$fechahasta'";
		$res=mysqli_query($sql, Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->ausentismos[]=$reg;
		}
		return $this->ausentismos;
	}

		public function add_producto($descripcion, $precio)
	{
		$sql="insert into producto values (null, '$descripcion', '$precio')";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El producto fue ingresado correctamente');
			window.location='alta_producto.php';
		</script>";
	}
	public function add_pedido($nombre, $cliente, $descripcion, $fecha, $importe, $cuotas)
	{
		$sql="INSERT INTO `pedido`( `nombre`, `cliente`, `descripcion`, `fecha`, `importe`, `cuotas`) VALUES ('$nombre','$cliente','$descripcion','$fecha',$importe,$cuotas);";


		$res=mysqli_query($sql, Conectar::con());
		$ultimoid = mysql_insert_id();
			

		
		
		for ($i=1; $i <$cuotas+1 ; $i++) { 
			if (($i+date("m"))>12){
				
				$fechaven = (date("y")+1)."-".(($i+date("m"))-12)."-".date("d");
			}else{
				
				$fechaven = date("y")."-".($i+date("m"))."-".date("d");
			}
			$sql2="INSERT INTO `deuda`( `num_cuota`, `fecha_ven`, `estado`,`id_deuda`) VALUES ( $i,'$fechaven','no pago', '$ultimoid')";
			$res=mysql_query($sql2, Conectar::con());
			

		}



		echo "<script type='text/javascript'>
			alert('El pedido fue ingresado correctamente');
			window.location='alta_pedido.php';
		</script>";
	}
	public function add_productofac($descripcion, $precio,$id_cliente)
	{
		echo "vergamota";
		$sql="insert into pedido_factura values (null, '$descripcion', '$precio')";
		$res=mysqli_query($sql, Conectar::con());
		
	}

	public function get_productos()
	{
		$query = "SELECT * FROM producto";
		$result = mysqli_query($query, Conectar::con()); 
		while($row = mysql_fetch_assoc($result))
		{
			$this->producto[]=$row;
		}
		return $this->producto;
    }
    public function get_zonas()
	{
		$query = "SELECT * FROM zona";
		$result = mysqli_query(Conectar::con(),$query); 
		while($row = mysqli_fetch_assoc($result))
		{
			$this->zonas[]=$row;
		}
		return $this->zonas;
    }
    public function cargar_zona($cod,$zona)
	{
		
		$query = "UPDATE `parcela` SET `zona`='$zona' WHERE `codigo`='$cod'";
		$result = mysqli_query($query, Conectar::con()); 
		echo "<script type='text/javascript'>
			alert('la zona de ha modificado con exito');
			window.location='ver_parcela.php?codigo=$cod';
		</script>";

    }
    public function get_productosfac()
	{
		$query = "SELECT * FROM pedido_factura";
		$result = mysqli_query($query, Conectar::con()); 
		while($row = mysql_fetch_assoc($result))
		{
			$this->producto[]=$row;
		}
		return $this->producto;
    }

	public function get_producto($id_producto)
	{
		$sql="select * from producto where id_producto=$id_producto";
		$res=mysqli_query($sql, Conectar::con());
		if ($reg=mysql_fetch_assoc($res))
		{
			$this->producto[]=$reg;
		}
		return $this->producto;
	}

	public function edit_producto($id_producto, $descripcion, $precio)
	{
		$sql="update producto set descripcion='$descripcion', precio=$precio where id_producto=$id_producto";
		$res=mysqli_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El producto fue modificado correctamente');
			window.location='modificar_producto.php';
		</script>";
	}

	public function delete_producto($id_producto)
	{
		$sql="delete from producto where id_producto=$id_producto";
		$res=mysqli_query($sql, Conectar::con());
	}
	public function delete_productofac($id_pedido)
	{
		$sql="delete from pedido_factura where id_pedido=$id_pedido";
		$res=mysqli_query($sql, Conectar::con());
	}

	function fechaphp($fecha)
	{

		$dia=substr($fecha,8,2);
		$mes=substr($fecha,5,2);
		$año=substr($fecha,0,4);
		$this->fechaphp=$dia."-".$mes."-".$año;

		return $this->fechaphp;
	} 

	function fechabd($fecha)
	{

		$año=substr($fecha,6,4);
		$mes=substr($fecha,3,2);
		$dia=substr($fecha,0,2);
		$this->fechabd=$año."-".$mes."-".$dia;

		return $this->fechabd;
	} 

	function salir($id_usuario)
	{
		unset($id_usuario);
		session_destroy();
		header("Location: index.php");
	}
	function alertar()
	{
		 
		 
		
		$diainicio=19;
		 
		$diacompu= date("d");
		if($diainicio>15)
		{
			$dif=$diainicio-15;
			if  (($diacompu==(15-$dif)))
				{ echo "<script type='text/javascript'>
					alert('se supero el tiempo de prueba, el programa quedara inutilizable');
					$('#enlace1').hide();
					$('#enlace2').hide();
					$('#enlace3').hide();
					$('#enlace4').hide();
					$('#enlace5').hide();
					$('#enlace6').hide();
					$('#enlace7').hide();
					$('#enlace7').hide();
					$('#enl').hide();
					</script>";
				} 
		}else{

			if  (($diacompu-$diainicio)==15)
				{ echo "<script type='text/javascript'>
					alert('se supero el tiempo de prueba, el programa quedara inutilizable');
					
					
					$('#enlace1').hide();
					$('#enlace2').hide();
					$('#enlace3').hide();
					$('#enlace4').hide();
					$('#enlace5').hide();
					$('#enlace6').hide();
					$('#enlace7').hide();
					$('#enl').hide();
					</script>";
				}

			}
			
	
	}

	public function menu1()
	{
		echo '
			<div class="navbar navbar-inverse navbar-fixed-top"  style="background: rgba(0.7, 0.7, 0.8, 0.8);opacity: .8; ">
		      <div class="navbar-inner" style="height: 60px;"  >
		        <div class="container" style="margin-top: 10px;">
		          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="brand" href="home.php" style="color:white;" onmouseover="mouseOver4()" onmouseout="mouseOut4()" id="enl" >S.I.A.C.M.</a>
		          <div class="nav-collapse collapse">
		            <ul class="nav">
		              
		              <li><a href="cargar_parcela.php" onmouseover="mouseOver()" onmouseout="mouseOut()" style="color:white;font-family: Myriad Set Pro;font-size:20px;" id="enlace1" >CARGAR PARCELA</a></li>

		              

		            <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;font-family: Myriad Set Pro;font-size:20px;" id="enlace2" onmouseover="mouseOver2()" onmouseout="mouseOut2()">BUSCAR<b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                	  <li><a href="buscar_partido.php">POR PARTIDA/PARTIDO</a></li>
		                	  <li><a href="buscar_parcela.php">POR CODIGO DE PARCELA</a></li>
			                  <li><a href="buscar_nomenclatura.php">POR NOMENCLATURA CATASTRAL</a></li>
			                  <li><a href="buscar_p.php">POR PROPIETARIO</a></li>
			                  <li><a href="buscar_c.php">POR CONTRIBUYENTE</a></li>
			                  
		                </ul>
		              </li>

		          		
		              <li><a href="cargar_zona.php"  id="enlace3"  style="color:white;font-family: Myriad Set Pro;font-size:20px;"  onmouseover="mouseOver3()" onmouseout="mouseOut3()" >CARGAR ZONA</a></li>
		              <li><a href="logueo/logout.php"  id="enlace4"  style="color:white;font-family: Myriad Set Pro;font-size:20px;"   >CERRAR SESION</a></li>
		             

		              
					
		            </ul>

		          </div>
		        </div>
		      </div>
		    </div>
		    ';
	}

	public function menu2()
	{
		echo '
		<div class="navbar navbar-inverse navbar-fixed-top">
		      <div class="navbar-inner">
		        <div class="container">
		          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="brand" href="home.php">Corralon Carlos Casares</a>
		          <div class="nav-collapse collapse">
		            <ul class="nav">
		              <li><a href="home.php">Inicio</a></li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Proveedores<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="alta_proveedor.php">Ingresar un proveedor</a></li>
			                  <li><a href="modificar_proveedor.php">Modificar un proveedor</a></li>
			                  <li><a href="eliminar_proveedor.php">Borrar un proveedor</a></li>
			                  <li><a href="consultar_proveedor.php">Consultar un proveedor</a></li>
		                </ul>
		              </li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Empleados<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="gestionar_licencia.php">Gestionar licencia</a></li>
			                  <li><a href="estado_licencia.php">Ver estado de mis licencias</a></li>
		                </ul>
		              </li>
					<li><a href="salir.php">Cerrar sesion</a></li>
		            </ul>

		          </div>
		        </div>
		      </div>
		    </div>
		    ';
	}

	public function menu3()
	{
		echo '
		<div class="navbar navbar-inverse navbar-fixed-top">
		      <div class="navbar-inner">
		        <div class="container">
		          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="brand" href="home.php">Corralon Carlos Casares</a>
		          <div class="nav-collapse collapse">
		            <ul class="nav">
		              <li><a href="home.php">Inicio</a></li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="alta_cliente.php">Ingresar un cliente</a></li>
			                  <li><a href="modificar_cliente.php">Modificar un cliente</a></li>
			                  <li><a href="eliminar_cliente.php">Borrar un cliente</a></li>
			                  <li><a href="consultar_cliente.php">Consultar un cliente</a></li>
		                </ul>
		              </li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Empleados<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="gestionar_licencia.php">Gestionar licencia</a></li>
			                  <li><a href="estado_licencia.php">Ver estado de mis licencias</a></li>
		                </ul>
		              </li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="modificar_usuario.php">Generar reporte Transportista</a></li>
		                </ul>
		              </li>
		              <li><a href="salir.php">Cerrar sesion</a></li>
		            </ul>

		          </div>
		        </div>
		      </div>
		    </div>
		    ';
	}


	public function menu4()
	{
		echo '
		<div class="navbar navbar-inverse navbar-fixed-top">
		      <div class="navbar-inner">
		        <div class="container">
		          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="brand" href="home.php">Corralon Carlos Casares</a>
		          <div class="nav-collapse collapse">
		            <ul class="nav">
		              <li><a href="home.php">Inicio</a></li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Empleados<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="gestionar_licencia.php">Gestionar licencia</a></li>
			                  <li><a href="estado_licencia.php">Ver estado de mis licencias</a></li>
		                </ul>
		              </li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reportes<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="modificar_usuario.php">Generar reporte Transportista</a></li>
		                </ul>
		              </li>
		              <li><a href="salir.php">Cerrar sesion</a></li>
		            </ul>

		          </div>
		        </div>
		      </div>
		    </div>
		    ';
	}




	public function menu5()
	{
		echo '
		<div class="navbar navbar-inverse navbar-fixed-top">
		      <div class="navbar-inner">
		        <div class="container">
		          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="brand" href="home.php">Corralon Carlos Casares</a>
		          <div class="nav-collapse collapse">
		            <ul class="nav">
		              <li><a href="home.php">Inicio</a></li>

		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Empleados<b class="caret"></b></a>
		                <ul class="dropdown-menu">
			                  <li><a href="gestionar_licencia.php">Gestionar licencia</a></li>
			                  <li><a href="estado_licencia.php">Ver estado de mis licencias</a></li>
		                </ul>
		              </li>
		              <li><a href="salir.php">Cerrar sesion</a></li>
		            </ul>

		          </div>
		        </div>
		      </div>
		    </div>
		    ';
	}



	
}	

?>