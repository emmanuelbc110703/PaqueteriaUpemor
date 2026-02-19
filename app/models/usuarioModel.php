<?php

//crer clase del modelo

    class UsuarioModel{
        private $connection;

        //constructor de la clase

        public function __construct($connection){
            $this -> connection = $connection;
        }

        //metodo para insertar usuarios 
        public function insertarUsuario($nombre,$edad,$contrasena,$rol){
            //crear statemente

            $sql_statemente = "INSERT INTO usuario(nombre,edad,contrasena,rol) VALUES (?,?,?,?)";
            
            //preparar el statement
            $statement = $this -> connection -> prepare($sql_statemente);
            $statement -> bind_param("siss", $nombre,$edad,$contrasena,$rol);
            
            //enviar la ejecuaion del estatement
            return $statement -> execute();

        }

        //Método para consultar usuarios
        public function consultarUsuarios(){

            $sql_statemente =  "SELECT * FROM usuario";

            $result = $this -> connection -> query($sql_statemente);
            return $result;
        }

        //metodo para consulta un solo usuario
        public function consultarPorID($id_browser){
            //logica para la operacion de la bd
            $sql_statement = "SELECT * FROM  usuario WHERE id = ?";

            $statement = $this -> connection -> prepare($sql_statement);
            $statement -> bind_param("i", $id_browser);
            //EJECUATAR Y GUARDAR EL RESULTADO EN UNA VARIABLE
            $statement-> execute();

            $result = $statement -> get_result();
            return $result -> fetch_assoc();
        }

        //mETODO PARA LA ACTUALIZACION DE REGRESITROS

        public function actualizarUsuario($id, $nombre,$edad,$contrasena,$rol) {
            $sql_statement = "UPDATE usuario SET nombre = ?, edad = ?, contrasena = ?, rol = ?  WHERE id = ?"; 

            $statement = $this -> connection -> prepare($sql_statement); 
            $statement -> bind_param("sissi", $nombre,$edad,$contrasena,$rol,$id);
            
            return $statement -> execute(); 
        }

        public function eliminarUsuario($id){
            $sql_statement = "DELETE FROM usuario WHERE id = ?";
            $statement = $this -> connection -> prepare($sql_statement); 
            $statement -> bind_param("i", $id);
            
            return $statement -> execute(); 
        }

        public function backup_tables($host,$user,$pass,$name,$tables = '*'){
            $return='';
            $link = new mysqli($host,$user,$pass,$name);
            
            // Se obtienen los nombres de las tablas de datos si se eligen todas
            if($tables == '*')
            {
                $tables = array();
                $result = $link->query('SHOW TABLES');
                // Guardar tablas de la base de datos
                while($row = mysqli_fetch_row($result))
                {
                    $tables[] = $row[0];
                }
            }
            else
            {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
            }
            
            // Obtener los registros de la tabla de datos
            foreach($tables as $table)
            {
                $result = $link->query('SELECT * FROM '.$table);
                $num_fields = mysqli_num_fields($result);

                
                $row2 = mysqli_fetch_row($link->query('SHOW CREATE TABLE '.$table));
                $return .= "\n\nDROP TABLE IF EXISTS `$table`;\n";
                $return.= "\n\n".$row2[1].";\n\n";
                
                for ($i = 0; $i < $num_fields; $i++)
                {
                    while($row = mysqli_fetch_row($result))
                    {
                        $return.= 'INSERT INTO '.$table.' VALUES(';
                        for($j=0; $j<$num_fields; $j++) 
                        {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = preg_replace("/\n/","\\n",$row[$j]);
                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                        if ($j<($num_fields-1)) { $return.= ','; }
                        }
                        $return.= ");\n";
                    }
                }
                $return.="\n\n\n";
            }

            // Guardar el nombre de la tabla de datos
            $fecha=date("Y-m-d");
            // Abrir el archivo para escribir las consultas. 
            $handle = fopen('config/Backups/db-backup-'.$fecha.'.sql','w+');
                fwrite($handle,$return);
                fclose($handle);
        }

        //Metodo para la restauracion de la BD
        public function restaurarBD($ruta){
            //Guardar los querrys del scrip
            $querry_archivo = file_get_contents($ruta);

            if($this-> connection -> multi_query($querry_archivo)){

                do{
                    //Verificar el almacenanmiento de los resultados
                    if($result = $this -> connection -> store_result()){
                        $result -> free();//Free libera el espacio de memoria de la variable
                    }
                }while($this -> connection -> more_results() && $this-> connection -> next_result());

                    return "Restauracion exitosa";
            }else{
                return "Error en la restauracion";
            }
        }
        
    }