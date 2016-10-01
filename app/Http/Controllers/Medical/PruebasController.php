<?php namespace App\Http\Controllers\Medical;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SoapClient;
use nusoap;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;


class PruebasController extends Controller {

	public function EnvioCorreo(Request $request)  {
		/*$nombre=$request->pnombre;
		$mail=$request->pemail;*/
		$nombre=$request->input("pnombre");
		$mail=$request->input("pemail");
		/*var_dump($request->input());*/
		try{
			// Add a new service to the wrapper
			SoapWrapper::add(function ($service) {
			    $service
			        ->name('currency')
			       // ->wsdl('http://localhost:8083/WsTcEmail/wsemail?wsdl')
			       	->wsdl('http://psmchimx.dyndns.org:8084/WsTcEmail/wsemail?wsdl')
			        ->trace(true);  });
			$data = ['Pdestinatario'=>$mail,'Pasunto'=>'Registro Paciente Exitoso','Pcontenido'=>'El paciente '.$nombre.' ha sido registrado correctamente en cMedic.com'];
			// Using the added service
			SoapWrapper::service('currency', function ($service) use ($data) {
				    //var_dump($service->getFunctions());
				    var_dump($service->call('SendEmail', [$data]));
				});
				return redirect('/#medical/pacientes')->withSuccess('¡Operación Exitosa!,  Notificación Enviada a: '.$nombre);
			}catch(Exception $e){
				return redirect('/#medical/pacientes')->withSuccess('¡Error de Operación! ->'.$e);	
			}

	    }


	public function EnvioCorreoPc(Request $request)  {
		/*$nombre=$request->pnombre;
		$mail=$request->pemail;*/
		$nombre=$request->input("cnombre");
		$mail=$request->input("cemail");
		$fecha=$request->input("cfecha");


		/*var_dump($request->input());*/
		try{
			// Add a new service to the wrapper
			SoapWrapper::add(function ($service) {
			    $service
			        ->name('currency')
			       // ->wsdl('http://localhost:8083/WsTcEmail/wsemail?wsdl')
			       	->wsdl('http://psmchimx.dyndns.org:8084/WsTcEmail/wsemail?wsdl')
			        ->trace(true);  });
			$data = ['Pdestinatario'=>$mail,'Pasunto'=>'Cita Agendada Con exito','Pcontenido'=>'La cita para el paciente '.$nombre.' ha sido agendada con exito en cMedic.com, favor de acudir a ella de manera puntual. Fecha de cita: '.$fecha.' '];
			// Using the added service
			SoapWrapper::service('currency', function ($service) use ($data) {
				    //var_dump($service->getFunctions());
				    var_dump($service->call('SendEmail', [$data]));
				});
				return redirect('/#medical/pacientes')->withSuccess('¡Operación Exitosa!,  Notificación Enviada a: '.$nombre);
			}catch(Exception $e){
				return redirect('/#medical/pacientes')->withSuccess('¡Error de Operación! ->'.$e);	
			}

	    }


	public function multiplicacion()
	    {
	        // Add a new service to the wrapper
	        SoapWrapper::add(function ($service) {
	            $service
	                ->name('currency')
	                ->wsdl('http://localhost:8080/WsServerCalcSoap/WsCalculadora?WSDL');  });

	        $data = ['n1'=>2,'n2'=>2];

	        // Using the added service
	        SoapWrapper::service('currency', function ($service) use ($data) {
	            //var_dump($service->getFunctions());
	            var_dump($service->call('multiplicacion', [$data]));
	        });
	    }


	/*TOMCAT PORT  SERVERPORT:8083, SHUTDOWN PORT:8007*/
	public function demo(){
	        // Add a new service to the wrapper
	        SoapWrapper::add(function ($service) {
	            $service
	                ->name('currency')
	                ->wsdl('http://www.webservicex.net/length.asmx?WSDL');  });

	        $data = ['LengthValue'=>100,'fromLengthUnit'=>'Centimeters','toLengthUnit'=>'Inches'];

	        // Using the added service
	        SoapWrapper::service('currency', function ($service) use ($data) {
	            var_dump($service->getFunctions());
	             print_r( var_dump($service->call('ChangeLengthUnit', [$data])));
	        });
	    }

	public function ws5(){
			$client= new \nusoap_client('http://localhost:8080/WsServerCalcSoap/WsCalculadora?WSDL','wsdl');
			$error=$client->getError();
			if($error){echo 'Error en el constructor'. $error;}
			$param=array('n1'=>'1','n2'=>'2');
			$result=$client->call('tns:multiplicacion',$param);
			if($client->fault){
					echo 'Fallo';
					print_r($result);
				}else{
					$error=$client->getError();
					if($error){
						echo 'Hay un error :'.$error;
					}else {
						echo 'resultado';
						print_r($result);
					}
				}
	}


	public function ws4(){
			$client= new \nusoap_client('http://localhost:8083/WsTcEmail/WsEmail?wsdl','wsdl');
			$error=$client->getError();
			if($error){echo 'Error en el constructor'. $error;}
			$param=array('eddz-maciel@hotmail.com','Asunto','Prueba');
			$result=$client->call('enviaMail',$param);
			if($client->fault){
					echo 'Fallo';
					print_r($result);
				}else{
					$error=$client->getError();
					if($error){
						echo 'Hay un error :'.$error;
					}else {
						echo 'resultado';
						print_r($result);
					}
				}
	}



	public function ws3(){
			$client= new \nusoap_client('http://www.webservicex.net/length.asmx?WSDL','wsdl');
			$error=$client->getError();
			if($error){echo 'Error en el constructor'. $error;}
			$param=array('LengthValue'=>100,'fromLengthUnit'=>'Centimeters','toLengthUnit'=>'Inches');
			$result=$client->call('ChangeLengthUnit',$param);
			if($client->fault){
					echo 'Fallo';
					print_r($result);
				}else{
					$error=$client->getError();
					if($error){
						echo 'Hay un error :'.$error;
					}else {
						echo 'resultado';
						print_r($result);
					}
				}
	}


	 public function getIndex()
	    {
		    $param = array(
				'destino' => 'eddz-maciel@hotmail.com',
				'subj' => 'Notificacion desde Laravel',
				'texto' => 'Esta es una notificacion mandado llamar desde laravel'
				);
	    	$client = new \nusoap_client('http://localhost:8080/EmailEddz/WsEmail?WSDL', true);
			$response = $client->call('enviarmail',$param);
			return ('Desde getIndex'.$response);

	    }

	public function ws2()
		{ 
			//This is your webservice server WSDL URL address
			$wsdl = "http://localhost:8080/WsServerCalcSoap/WsCalculadora?WSDL"; 
			//create client object
			$client = new \nusoap_client($wsdl, 'wsdl');
			 
			$err = $client->getError();
			if ($err) {
				// Display the error
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			        exit();
			} 
			//calling our first simple entry point
			$result1=$client->call('hello', array('name'=>'myname'));
			print_r($result1); 
	 	}


		public function callWebService()
			{
				$proxyhost = isset($_POST['proxyhost']) ? $_POST['proxyhost'] : '';
				$proxyport = isset($_POST['proxyport']) ? $_POST['proxyport'] : '';
				$proxyusername = isset($_POST['proxyusername']) ? $_POST['proxyusername'] : '';
				$proxypassword = isset($_POST['proxypassword']) ? $_POST['proxypassword'] : '';
				$client = new \nusoap_client('http://www.scottnichol.com/samples/hellowsdl2.php?wsdl&debug=1', 'wsdl',
										$proxyhost, $proxyport, $proxyusername, $proxypassword);
				$err = $client->getError();
				if ($err) {
						echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
					}

				$person = array('firstname' => 'Willi', 'age' => 22, 'gender' => 'male');
				$method = isset($_GET['method']) ? $_GET['method'] : 'function';
				if ($method == 'function') {
						$call = 'hello';
					} elseif ($method == 'instance') {
						$call = 'hellowsdl2.hello';
						} elseif ($method == 'class') {
							$call = 'hellowsdl2..hello';
							} else {
									$call = 'hello';
								}

				$result = $client->call($call, array('person' => $person));

				// Check for a fault
				if ($client->fault) {
					echo '<h2>Fault</h2><pre>';
					print_r($result);
					echo '</pre>';
					} 
				else {
					// Check for errors
					$err = $client->getError();
					if ($err) {
						// Display the error
						echo '<h2>Error</h2><pre>' . $err . '</pre>';
						} 
						else {
							// Display the result
							echo '<h2>Result</h2><pre>';
							print_r($result);
							echo '</pre>';
							}
					}
				echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
				echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
				echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
			}




		 public function hello()
		 {
		 	return "hola chiquito";
		 }


}
