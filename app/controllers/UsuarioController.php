<?php
    //incluir la conexion a la bd y el modelo del usuario
    include_once "config/db_conex.php";
    include_once "app/models/UsuarioModel.php";

     //crear clase del controlador

     class UsuarioController{
        private $model;

        //crear constructor
        public function __construct($connection){
            $this -> model = new UsuarioModel($connection);

        }
        //metodo para obtener la informacio del formulario

        public function insertarUsuario(){
            //validar que l boton sea diferente de nulo
            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];
                $contrasena = $_POST['contrasena'];
                $rol = $_POST['rol'];

                //MANDAR LOS DATOS AL METODO DE INSERTAR DEL MODELO
                $insert = $this -> model -> insertarUsuario($nombre,$edad,$contrasena,$rol);

                //verificar l insercion
                if($insert){
                    echo "<br> Registro exitoso";
                }else{
                    echo  "<br> Error en el registro";
                }

            }
            header("Location: index.php?action=registrarUsuario");
        }


        //Método (acción) para consultar usuarios y enviar a la vista
        public function consultarUsuarios(){
            //Guardar los usuariarios desde el modelo
            $usuarios = $this -> model -> consultarUsuarios();

            include "app/views/consult.php";
        }

        public function editarUsuario($id){
             $usuario = $this -> model -> consultarPorID($id);
             include "app/views/edit.php";
        }

        public function eliminarUsuario($id){
            if( $this -> model -> eliminarUsuario($id)){
             header("Location: index.php?action=consult");
            }else{
               echo "No se puedo eliminar" ;
            }
            
        }



        //metodo para la actualizar registros
        public function actualizarUsuario(){
            if(isset($_GET['id'])){
                $id_browser = (int) $_GET['id'];

                $row = $this -> model -> consultarPorID($id_browser);

                include_once "app/views/edit.php";

                return;

        }
        if(isset($_POST['editar'])){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $contrasena = $_POST['contrasena'];
            $rol = $_POST['rol'];

            $update = $this -> model -> actualizarUsuario($id, $nombre, $edad, $contrasena, $rol);

            if($update){
                header("Location: index.php?action=consult"); 
            }else{
                header("Location: index.php?action=update"); 
            }
        }
        include_once "app/views/edit.php"; 
     }

     //Metodo para realizar respaldo
     public function realiarRespaldoBD(){
    
$server = "localhost";
$user = "root";
$password = "";
$db = "noticias";

$backup=$this-> model -> backup_tables($server,$user,$password,$db);
        
echo $backup;
$fecha = date("y-m-d");

//CRear un nuevo archivo y asignar un nombre 

header("Content-disposition: attachment; filename=db_backup-".$fecha.".sql"); ///Aqui le puse el punto 
//El archivo se configura para descargar 
header("Content-type: MIME");
//AÑadir el contenido del archivo guardado en el sistema 
readfile("config/Backups/db-backup-".$fecha."sql");

    }

//Metodo para realizar la restauracion 
public function restaurarBD(){
    $fecha = date("Y-m-d");
    $ruta= "config/Backups/db-backup-".$fecha.".sql";
    $restore = $this -> model -> restaurarBD($ruta);

    include_once "app/views/form_insertar.php";


}
    }