<?php
    include_once "app/models/ReportModel.php";
    include_once "config/db_conex.php";
    include_once "public/libraries/fpdf/fpdf.php";
    include_once "public/libraries/phplot/phplot.php";

    class ReportController{

        private $model;

        public function __construct($connection){

            $this -> model = new ReportModel($connection);


        }



        //Metodo para generar el reporte pdf

        public function generarPDF(){

            $usuarios = $this -> model -> consultarUsuarios();

            //Hacer instancia a la clase de  FPDF y añadir una pagina 

            $pdf = new FPDF();
            $pdf -> AddPage(); //Agrega la pagina 
            
            //TITULO DEL DOCUMENTO

            $pdf -> SetFont('Arial', 'B', 7); //Indica el tipo de letra 
            $pdf -> Cell(0,10,"Usuarios de la base de datos",0,1,'C');
            $pdf -> Ln(10);

            //CABECERA DE LA TABLA 
            $pdf -> SetFont('Arial','B','7');
            $pdf -> SetFillColor(0,0,0);
            $pdf -> SetTextColor(255,255,255);

            $pdf -> Cell(10, 10, 'ID', 1, 0, 'C', true);
            $pdf -> Cell(20, 10, 'Nombre', 1, 0, 'C', true);
            $pdf -> Cell(10, 10, 'Edad', 1, 0, 'C', true);
            $pdf -> Cell(20, 10, 'App', 1, 0, 'C', true);
            $pdf -> Cell(20, 10, 'Apm', 1, 0, 'C', true);
            $pdf -> Cell(20, 10, 'fecha', 1, 0, 'C', true);
            $pdf -> Cell(30, 10, 'Correo', 1, 0, 'C', true);
            $pdf -> Cell(20, 10, 'Numero', 1, 0, 'C', true);
            $pdf -> Cell(20, 10, 'Contraseña', 1, 0, 'C', true);
            $pdf -> Ln(); 

            //Cuerpo de la tbla 

            $pdf -> SetFont('Arial','B','7');
            $pdf-> SetTextColor(0,0,0);

            $edades=0;
            $i=0;


            foreach($usuarios as $Upelobos){
                $pdf -> Cell(10,10,$Upelobos['id_usu'],1,0,'C');
                $pdf -> Cell(20,10,$Upelobos['nombre'],1,0,'C');
                $pdf -> Cell(10,10,$Upelobos['edad'],1,0,'C');
                $pdf -> Cell(20,10,$Upelobos['app'],1,0,'C');
                $pdf -> Cell(20,10,$Upelobos['apm'],1,0,'C');
                $pdf -> Cell(20,10,$Upelobos['fecha'],1,0,'C');
                $pdf -> Cell(30,10,$Upelobos['correo'],1,0,'C');
                $pdf -> Cell(20,10,$Upelobos['numero'],1,0,'C');
                $pdf -> Cell(20,10,$Upelobos['contra'],1,0,'C');
                $pdf -> Ln(); 
                
                $edades += (int) $Upelobos['edad'];
                $i++;
            }

            $promedioEdad = $edades / $i;

            $pdf -> ln(10);
            $pdf -> Cell(0,10,'Promedio edad: '.number_format($promedioEdad,2),0,1);
            $pdf -> Output('D','Reporte de usuarios.pdf');

        }

        //Metodo para generar grafica con pdf 
        public function generarGrafica(){

            $data = $this -> model -> consultarProductor();
            
            //Creacion de la grafica 

            $plot = new PHPlot(800, 600);  //Tamaño de la grafica
            $plot -> SetImageBorderType('plain');
            $plot -> SetPlotType('bars');//Tipode grafica
            $plot -> SetDataType('text-data');
            $plot -> SetDataValues($data);  //La informacion en la grafica 
            
            $plot ->SetTitle('Edades de Usuarios');
            $plot -> SetXTitle('Nombre');
            $plot -> SetYTitle('Edad');
            $plot -> SetShading(5);
            $plot -> SetDataColors('#32a852');

            $filename = 'public/media/graphs/grafica_precio.png';

            $plot -> SetOutputFile($filename);
            $plot -> SetIsInline(true);//Permite guardar la grafica en el sistema 
            $plot -> DrawGraph();//Genera la grafica 

            //CREACION DEL PDF
            $pdf = new FPDF();
            $pdf -> AddPage();
            $pdf -> SetFont('Arial','B','16');
            $pdf -> Cell(0,10,'Reporte de edad',0,1,'C');

            $pdf -> Image($filename,30,40,50,100);
            $pdf -> Output('D','Grafica de Edades.pdf');

        }


    }

?>