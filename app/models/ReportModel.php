<?php  
    class ReportModel{

        private $connection;

        public function __construct($connection){
            $this -> connection = $connection; 
        }

        //Metodo para la consulta a la base de datos
        public function consultarUsuarios(){

            $sql_statement = "SELECT * FROM usuario";

            $result = $this -> connection -> query($sql_statement);

            return $result; 

        }

         //Metodo para consultar productor

        public function consultarProductor(){

            $sql_statement= "SELECT * FROM usuario";

            $result = $this -> connection -> query($sql_statement);

            $data = [];

            while($row = $result -> fetch_assoc()){
                $data[]= [$row['nombre'], $row['edad']];

            }
            return $data;
        
        }

    }

?>