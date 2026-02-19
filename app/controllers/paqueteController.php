<?php
    //incluir la conexion a la bd y el modelo del usuario
    include_once "config/db_conex.php";
    include_once "app/models/paqueteModel.php";

     //crear clase del controlador

     class paqueteController{
        private $model;

        //crear constructor
        public function __construct($connection){
            $this -> model = new paqueteModel($connection);

        }
        //metodo para obtener la informacio del formulario

        public function insertarpaquete(){
            //validar que l boton sea diferente de nulo
            if(isset($_POST['enviar'])){
                $codigoseg = $_POST['codigoseg'];
                $descripcion = $_POST['descripcion'];
                $fechareg = $_POST['fechareg'];
                $peso = $_POST['peso'];
                $region = $_POST['region'];
                $direccion = $_POST['direccion'];

                //MANDAR LOS DATOS AL METODO DE INSERTAR DEL MODELO
                $insert = $this -> model -> insertarpaquete($codigoseg,$descripcion,$fechareg,$peso,$region,$direccion);

                //verificar l insercion
                if($insert){
                    echo "<br> Registro exitoso";
                }else{
                    echo  "<br> Error en el registro";
                }

            }
             header("Location: index.php?action=registrarPaquete");
        }


        //Método (acción) para consultar usuarios y enviar a la vista
        public function consultarpaquete(){
            //Guardar los usuariarios desde el modelo
            $usuarios = $this -> model -> consultarpaquete();

            include "app/views/consultarpaquete.php";
        }

        public function editarpaquete($id){
            $paquete = $this->model->consultarPorID($id);
            include "app/views/editarpaquete.php";
        }

        public function eliminarpaquete($id){
            if( $this -> model -> eliminarpaquete($id)){
             header("Location: index.php?action=consultarPaquete");
            }else{
               echo "No se puedo eliminar" ;
            }
            
        }



        //metodo para la actualizar registros
        public function actualizarpaquete(){
            $id = $_POST['id_paquete'];
            $codigoseg = $_POST['codigoseg'];
            $descripcion = $_POST['descripcion'];
            $fechareg = $_POST['fechareg'];
            $peso = $_POST['peso'];
            $region = $_POST['region'];
            $direccion = $_POST['direccion'];

            $update = $this->model->actualizarpaquete(
                $id,
                $codigoseg,
                $descripcion,
                $fechareg,
                $peso,
                $region,
                $direccion
            );

            if($update){
                header("Location: index.php?action=consultarPaquete");
                exit();
            }else{
                echo "Error al actualizar";
            }
                
        }

     //Metodo para realizar respaldo
     public function realiarRespaldoBD(){
    
$server = "localhost";
$user = "root";
$password = "";
$db = "paqueteria";

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

    include_once "app/views/registrarpaquete.php";


}
    }