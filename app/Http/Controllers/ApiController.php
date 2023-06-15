<?php 
    namespace App\Http\Controllers;

use App\Models\Locaciones;
use App\Models\Rols;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use App\Models\User;
use PhpParser\Node\Expr\New_;

    class ApiController extends Controller{

        // obtener usuario por su id / si para admin podemos hacer lo mismo pero solo eliminar el id isset($datos) && !empty($datos)
        public function users(Request $request){
            $users = User::with('rol');
            if ($request->has('active')) {
                $users = $users->where('active', true)->get();
            } else {
                $users = $users->get();
            }
                return $this->getImage($users);
        }

      
     
        public function registro(Request $request){
            try {
                    $response = ["messages" => ""];
                    // $datos = $request->all();
                    $datos = $request->getContent();
                    $datosJson=json_decode($datos);
                    if (isset($datosJson) && !empty($datosJson)) {
                        
                        $name = isset($datosJson->name) && !empty($datosJson->name) ? $datosJson->name: '';
                        $lastname = isset($datosJson->lastname) && !empty($datosJson->lastname) ? $datosJson->lastname: '';
                        $user = isset($datosJson->user) && !empty($datosJson->user) ? $datosJson->user: '';
                        $email = isset($datosJson->email) && !empty($datosJson->email) && filter_var($datosJson->email,FILTER_VALIDATE_EMAIL)  ? $datosJson->email: '';
                        $password = isset($datosJson->password) && !empty($datosJson->password) ? Hash::make( $datosJson->password): '';
                        $image = isset($datosJson->imagen) && !empty($datosJson->imagen) ? $datosJson->imagen: '';
                        $address = isset($datosJson->address) && !empty($datosJson->address) ? $datosJson->address: '';
                        $rol = isset($datosJson->id_rol) && !empty($datosJson->id_rol) ? $datosJson->id_rol: '';

                        $registro = new User();
                        $registro->name =  $name;
                        $registro->lastname= $lastname;
                        $registro->user= $user ;
                        $registro->email= $email ;
                        $registro->password= $password ;
                        $registro->image= $image;
                        $registro->address=$address ;
                        $registro->id_rol= $rol;
                        $registro->save();
                        
                        $response["messages"] = "Datos guard";
                            
                    } else {
                        $response['messages'] = "No se recibieron datos";
                    }
                        return response()->json($response);
                
            }catch (\Exception $e) {
                $response = [
                    "error" => $e
                ];
                 return response()->json($response, 500);
            }
        }
                
          
        //Mostrar Roles
        public function roles(Request $request){
            $rol = Rols::all();
            return response()->json($rol);
        }

        //Login
        public function login(Request $request){
            $response = ["status"=>0,"messages"=>"","data"=>[]];
            $datos = json_decode($request->getContent());
            $users = User::with('rol');
            $user = $users->where('user',$datos->user)->first();
      

            if(isset($user) && !empty($user)){
            if (Hash::check($datos->password, $user->password)) {
                $response['messages'] = "Usuario Listo";
                $response['data']['user'] = $this->getImages($user);
                $response['status'] = 1;
            
            } else {
                $response['messages'] = "Credenciales no Encontradas";
                $response['status'] = 0;
            }
            
            }else{
            $response['messages']="Usuario No Encontrado";
            }
            return response()->json($response);
        }

        public function getImages($user)
        {
            $user->image = asset($user->image); // Ruta relativa a la imagen en la carpeta "public"
            $user->image = str_replace("\\", '/', $user->image);
            return $user;
        }

        // public function getImage($users){
        //     $usersWithImage = $users->map(function ($user) {
        //         $user->image = asset($user->image); // Ruta relativa a la imagen en la carpeta "public"
        //         $user->image = str_replace("\\", '/',$user->image);
        //         return $user;
        //     });
            
        //     return response()->json($usersWithImage);
        // }

        
        //Mapa
        public function locations(Request $request){
            $response = Locaciones::all();
            return response()->json($response);
        }

    }

    

?>

