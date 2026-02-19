<?php
    //incluir la conexion a la bd y el modelo del usuario
    include_once "config/db_conex.php";
    include_once "app/models/transporteModel.php";

     //crear clase del controlador

     class transporteController{
        private $model;

        //crear constructor
        public function __construct($connection){
            $this -> model = new transporteModel($connection);

        }
        //metodo para obtener la informacio del formulario

        public function insertartransporte(){
            //validar que l boton sea diferente de nulo
            if(isset($_POST['enviar'])){
                $destino = $_POST['destino'];
                $modo = $_POST['modo'];
                $seguimiento = $_POST['seguimiento'];
                $fechasalida = $_POST['fechasalida'];
                $placa = $_POST['placa'];
                $numunidad = $_POST['numunidad'];

                //MANDAR LOS DATOS AL METODO DE INSERTAR DEL MODELO
                $insert = $this -> model -> insertartransporte($destino,$modo,$seguimiento,$fechasalida,$placa,$numunidad);

                //verificar l insercion
                if($insert){
                    echo "<br> Registro exitoso";
                }else{
                    echo  "<br> Error en el registro";
                }

            }
           header("Location: index.php?action=registrarTransporte");
        }


        //Método (acción) para consultar usuarios y enviar a la vista
        public function consultartransporte(){
            //Guardar los usuariarios desde el modelo
            $usuarios = $this -> model -> consultartransporte();

            include "app/views/consultartransporte.php";
        }

        //Ventana que muestra la informacion de un transporte por su id
        public function editartransporte($id){
            $transporte = $this -> model -> consultarPorID($id);
            include "app/views/editartransporte.php";
        }

        public function eliminartransporte($id){
            if( $this -> model -> eliminartransporte($id)){
             header("Location: index.php?controller=transporte&action=consultarTransporte");
            }else{
               echo "No se puedo eliminar" ;
            }
            
        }



        //metodo para la actualizar registros del transporte elegido
        public function actualizartransporte(){
            $id = $_POST['id'];
            $destino = $_POST['destino'];
            $modo = $_POST['modo'];
            $seguimiento = $_POST['seguimiento'];
            $fechasalida = $_POST['fechasalida'];
            $placa = $_POST['placa'];
            $numunidad = $_POST['numunidad'];

            $update = $this -> model -> actualizartransporte($id, $destino, $modo, $seguimiento, $fechasalida, $placa, $numunidad);

            if($update){
                header("Location: index.php?controller=transporte&action=consultarTransporte"); 
            }else{
                //Dentro de este else se puede agregar un mensaje de error ya que si entra aqui significa que
                //la actualizaicon no se realizo 
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

    include_once "app/views/registrartransporte.php";


}
    }