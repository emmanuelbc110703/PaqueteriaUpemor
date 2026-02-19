<?php
    //incluir la conexion a la bd y el modelo del usuario
    include_once "config/db_conex.php";
    include_once "app/models/transportistaModel.php";

     //crear clase del controlador

     class transportistaController{
        private $model;

        //crear constructor
        public function __construct($connection){
            $this -> model = new transportistaModel($connection);

        }
        //metodo para obtener la informacio del formulario

        public function insertartransportista(){
            //validar que l boton sea diferente de nulo
            if(isset($_POST['enviar'])){
                $nombre = $_POST['nombre'];
                $edad = $_POST['edad'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $matricula = $_POST['matricula'];
                $tipolicencia = $_POST['tipolicencia'];
                $ultimafecha = $_POST['ultimafecha'];

                //MANDAR LOS DATOS AL METODO DE INSERTAR DEL MODELO
                $insert = $this -> model -> insertartransportista($nombre,$edad,$telefono,$correo,$matricula,$tipolicencia,$ultimafecha);

                //verificar l insercion
                if($insert){
                    echo "<br> Registro exitoso";
                }else{
                    echo  "<br> Error en el registro";
                }

            }
            header("Location: index.php?action=registrarTransportista");
        }


        //Método (acción) para consultar usuarios y enviar a la vista
        public function consultartransportista(){
            //Guardar los usuariarios desde el modelo
            $usuarios = $this -> model -> consultartransportista();

            include "app/views/consultartransportista.php";
        }

        public function editartransportista($id){
            $transportista = $this -> model -> consultarPorID($id);
            include "app/views/editartransportista.php";
        }

        public function eliminartransportista($id){
            if( $this -> model -> eliminartransportista($id)){
             header("Location: index.php?controller=transportista&action=consultarTransportista");
            }else{
               echo "No se puedo eliminar" ;
            }
            
        }



        //metodo para la actualizar registros
        public function actualizartransportista(){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $matricula = $_POST['matricula'];
            $tipolicencia = $_POST['tipolicencia'];
            $ultimafecha = $_POST['ultimafecha'];

            $update = $this -> model -> actualizartransportista($id, $nombre, $edad, $telefono, $correo, $matricula, $tipolicencia, $ultimafecha);

            
            if($update){
                header("Location: index.php?controller=transportista&action=consultarTransportista"); 
            }else{
                //Aqui se puede agregar un mensaje de alerta para cuando la actualizacion sea incorrecta
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

    include_once "app/views/registrartransportista.php";


}
    }