<?php
// =============================
// CARGA DE CONTROLADORES
// =============================
include_once "config/db_conex.php";
include_once "app/controllers/paqueteController.php";
include_once "app/controllers/UsuarioController.php";
include_once "app/controllers/transporteController.php";
include_once "app/controllers/transportistaController.php";
include_once "app/controllers/ReportController.php";
include_once "app/controllers/controladorController.php";

// =============================
// OBTENER PARAMETROS
// =============================
$controller = isset($_GET['controller']) ? $_GET['controller'] : null;
$action     = isset($_GET['action']) ? $_GET['action'] : null;


// =============================
// INSTANCIAR CONTROLADOR
// =============================
switch ($controller) {

    case 'paquete':
        $controllerInstance = new paqueteController($connection);
        break;
    
    case 'transporte':
        $controllerInstance = new transporteController($connection);
        break;
    
    case 'transportista':
        $controllerInstance = new transportistaController($connection);
        break;
    case 'usuario':
        $controllerInstance = new UsuarioController($connection);
        break;

    default:
        $controllerInstance = new controladorController();

}


// =============================
// ACCIONES
// =============================
switch ($action) {
    case 'menu':
        $controllerInstance->mostrarmenu();
        break;
    
    case 'registrarPaquete':
        $controllerInstance->registrarpaquete();
        break;

    case 'registrarTransporte':
        $controllerInstance->registrartransporte();
        break;

    case 'registrarTransportista':
        $controllerInstance->registrartransportista();
        break;
    
    case 'registrarUsuario':
        $controllerInstance->registrarusuario();
        break;

    case 'consultarPaquete':
        $controllerInstance->consultarPaquete();
        break;

    case 'consultarTransporte':
        $controllerInstance->consultartransporte();
        break;

    case 'consultarTransportista':
        $controllerInstance->consultartransportista();
        break;

        // ====== Usuario ======
    case 'insert':
            $controllerInstance -> insertarUsuario();
            break;

    // ====== PAQUETE ======
    case 'insertarpaquete':
        $controllerInstance->insertarpaquete();
        break;

    case 'consultarpaquete':
        $controllerInstance->consultarpaquete();
        break;

    case 'actualizarpaquete':
        $controllerInstance->actualizarpaquete();
        break;

    case 'editarPaquete':
        $controllerInstance->editarpaquete($_GET['id']);
        break;

    case 'eliminarPaquete':
        $controllerInstance->eliminarpaquete($_GET['id']);
        break;


    // ====== TRANSPORTE ======
    case 'inserttransporte':
        $controllerInstance->insertartransporte();
        break;

    case 'consult_transporte':
        $controllerInstance->consultartransporte();
        break;

    case 'updatetransporte':
        $controllerInstance->actualizartransporte();
        break;

    case 'editar_transporte':
        $controllerInstance->editartransporte($_GET['id']);
        break;

    case 'eliminar_transporte':
        $controllerInstance->eliminartransporte($_GET['id']);
        break;


    // ====== TRANSPORTISTA ======
    case 'inserttransportista':
        $controllerInstance->insertartransportista();
        break;

    case 'consult_transportista':
        $controllerInstance->consultartransportista();
        break;

    case 'update_transportista':
        $controllerInstance->actualizartransportista();
        break;

    case 'editar_transportista':
        $controllerInstance->editartransportista($_GET['id']);
        break;

    case 'eliminar_transportista':
        $controllerInstance->eliminartransportista($_GET['id']);
        break;


    // ====== REPORTES ======
    case 'pdf_report':
        $controllerInstance->generarPDF();
        break;

    case 'pdf_graph':
        $controllerInstance->generarGrafica();
        break;

    case 'backup':
        $controllerInstance->realiarRespaldoBD();
        break;

    case 'restore':
        $controllerInstance->restaurarBD();
        break;


    // ====== DEFAULT ======
    default:
        header("Location: index.php?action=menu");
        break;
}
?>
