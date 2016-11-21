<?php


class _menuController extends Controller
{
	
	private $_menu;
	
	
    public function __construct() {
        parent::__construct();
      $this->_menu=$this->loadModel('_menu');
		
    }

    public function index()
    {

 
			$this->_view->setJs(array('js','jscolor'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'menus';

        	$menu=$this->_menu->traer_menus();
        	$role=$this->_menu->traer_roles();
        	$matris = Array();
        	for ($i=0; $i < count($menu) ; $i++) { 

        		for ($y=0; $y < count($role); $y++) { 

        					$vn=$this->_menu->traer_permisos($menu[$i]['id_menu'],$role[$y]['id_role']);
        	        		if ($vn=='') {
        	        			$matris[$i][$y]['permiso']='0';
        	        		}else{
        	        		$matris[$i][$y]=$this->_menu->traer_permisos($menu[$i]['id_menu'],$role[$y]['id_role']);
	
        	        		}
        	        		
        	        		}
        		
        		

        	

        	}

                $color=Array();

                 $fl=fopen(ROOT . 'layout'.DS.DEFAULT_LAYOUT.DS.'css'.DS.'css.info',"r");

                 while (!feof($fl)) {

                    $color[]=fgets($fl);


                 }
                 fclose($fl);

                 $this->_view->colores=$color;




            $this->_view->views=scandir(ROOT . 'site'.DS.'views');


        	


           



        	$this->_view->menus=$menu;
			$this->_view->rol=$role;
			$this->_view->matris=$matris;
			$this->_view->renderizar('index');
			
				
			
	}


    public function estilos(){


        $nav=$_GET['nav'];
        $letra_nav=$_GET['letra_nav'];
        $letra_nav_principal=$_GET['letra_nav_principal'];
        $letra_nav_hover=$_GET['letra_nav_hover'];

        $header=$_GET['header'];
        $header_letra_border=$_GET['header-letra-border'];


        $titulos=$_GET['titulos'];
        $titulo_letra_border=$_GET['titulo-letra-border'];
        $pie=$_GET['pie'];
        $pie_letra_border=$_GET['pie-letra-border'];
        $fondo=$_GET['fondo'];
        $ancho_header=$_GET['ancho_header'];



            $fl=fopen(ROOT . 'layout'.DS.DEFAULT_LAYOUT.DS.'css'.DS.'referencia.css',"r");
            $linea="";
            $i=1;
            while (!feof($fl)) {

                /*nav*/
                if ($i==2)
                {
                $linea .= "background-color: #$nav;\n";
                fgets($fl);

                }else if($i==5){
                $linea .= "color: #$letra_nav; \n";
                fgets($fl);
                }else if($i==8){
                $linea .= "color: #$letra_nav_principal; \n";
                fgets($fl);
                }else if($i==11){
                $linea .= "color: #$letra_nav_hover; \n";
                fgets($fl);
                /*header*/
                }else if($i==16){
                $linea .= "background-color: #$header; \n";
                fgets($fl);
                }else if($i==18){
                $linea .= "color: #$header_letra_border; \n";
                fgets($fl);
                }else if($i==19){
                $linea .= "border-color: #$header_letra_border; \n";
                fgets($fl);
                 }else if($i==17){
                $linea .= "min-height: ".$ancho_header."px;\n";
                fgets($fl);
                /*titulo*/
                }else if($i==22){
                $linea .= "color: #$titulo_letra_border; \n";
                fgets($fl);

                }else if($i==23){
                $linea .= "border-color: #$titulo_letra_border; \n";
                fgets($fl);

                }else if($i==29){
                $linea .= "background-color: #$titulos;\n";
                fgets($fl);

                /*pie*/

                }else if($i==34){
                $linea .= "background-color: #$pie;\n";
                fgets($fl);

                 }else if($i==37){
                $linea .= "color: #$pie_letra_border;\n";
                fgets($fl);

                 }else if($i==41){
                $linea .= "border-color: #$pie_letra_border;\n";
                fgets($fl);
                 /*fondo*/
              }else if($i==44){
                $linea .= "background-color: #$fondo;\n";
                fgets($fl);
                

                }else{
                    $linea .= fgets($fl);
                }
                
            $i++;
            }

            fclose($fl);

            $fl=fopen(ROOT . 'layout'.DS.DEFAULT_LAYOUT.DS.'css'.DS.'layout.css',"w+");
            fputs($fl,$linea);
            fclose($fl);

             $fl=fopen(ROOT . 'layout'.DS.DEFAULT_LAYOUT.DS.'css'.DS.'css.info',"w+");
            fputs($fl,$nav."\n");
            fputs($fl,$letra_nav."\n");
            fputs($fl,$letra_nav_principal."\n");
            fputs($fl,$letra_nav_hover."\n");
            fputs($fl,$header."\n");
            fputs($fl,$header_letra_border."\n");
            fputs($fl,$titulos."\n");
            fputs($fl,$titulo_letra_border."\n");
            fputs($fl,$pie."\n");
            fputs($fl,$pie_letra_border."\n");
            fputs($fl,$fondo."\n");
            fputs($fl,$ancho_header);

            fclose($fl);




    }


    function permisos_ch(){


        $this->_menu->permisos_ch($_GET['menu'],$_GET['rol'],$_GET['estado']);

    }



}


?>