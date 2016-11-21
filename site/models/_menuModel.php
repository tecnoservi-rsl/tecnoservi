<?php

class _menuModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    

public function menu($id = false){

	if ($id!=false) {
		$sql = "SELECT menu.* FROM menu,permisos,role,usuario WHERE\n"
    . "menu.id_menu=permisos.id_menu and \n"
    . "role.id_role = permisos.id_role and\n"
    . "permisos.permiso=1 and \n"
    . "role.id_role=usuario.id_role and\n"
    . "usuario.id_usuario=".$id;
	$menu = $this->_db->query($sql);
	return $menu->fetchall();
		
	}else{
		$sql = "SELECT DISTINCT menu.* FROM menu,permisos,role,usuario WHERE\n"
    . "menu.id_menu=permisos.id_menu and \n"
    . "role.id_role = permisos.id_role and\n"
    . "permisos.permiso=1 and \n"
    . "role.id_role=4";
	$menu = $this->_db->query($sql);
	return $menu->fetchall();


	}

	
}



    public function traer_menus(){


    $sql="select * from menu";
       

        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetchall();


    }
      public function traer_roles(){


    $sql="select * from role";
       

        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetchall();


    }

 public function traer_permisos($id,$id2){


$sql = "SELECT permisos.* FROM role,permisos,menu WHERE role.id_role = permisos.id_role and permisos.id_menu=menu.id_menu and menu.id_menu ='$id' and role.id_role='$id2'";    
        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetch();


    }

     public function permisos_ch($menu,$rol,$estado){

        $retVal = ($estado=='true') ? "1" : "0" ;

$sql = "SELECT COUNT(permisos.id_permisos) as numero FROM permisos WHERE id_menu = $menu   and id_role = $rol";
        $datos = $this->_db->query($sql);
$rs=$datos->fetch();
    if ($rs['numero']==0) {

        $sql="INSERT INTO permisos values('',$menu,$rol,$retVal)";
        $this->_db->query($sql);
    }else{

$sql = "UPDATE permisos SET permiso = $retVal WHERE id_menu = $menu AND id_role= $rol";  

        $datos = $this->_db->query($sql);
    }



    }



}

?>
