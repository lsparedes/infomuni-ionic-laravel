import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App, ToastController} from 'ionic-angular';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import { Validators, FormBuilder, FormGroup } from '@angular/forms';
import { ParticipacionPage } from '../participacion/participacion';
import { UserProvider } from '../../providers/user/user';

@IonicPage()
@Component({
  selector: 'page-preguntas',
  templateUrl: 'preguntas.html',
})

export class PreguntasPage {

 id = this.navParams.get('valor');
 unTextoRecibido: string;
 nombrenc:any;
 preguntas:any;
 respuestas:any;
 guardar:any;
 data:Observable<any>;
 composer: string;
 composersForm: FormGroup;
 public userDetails : any;
 public seleccion: any;
 public hola:any;
 user:any;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController,
              private formBuilder: FormBuilder,

              private userService: UserProvider) {

             console.log("El id de la encuesta seleccionada es: "+this.id);
             this.unTextoRecibido  = navParams.get("valor2");



             this.http.get('http://integralgest.cl/infomuni/api/preguntas/'+this.id)
             .map(response => response.json())
             .subscribe(data =>
                {
                  this.preguntas = data;
                  this.hola=data[0].id;
                  //console.log("esto vale hola aquí:"+this.hola);
                  console.log("preguntas: "+data);
                },
                err => {
                  console.log("Oops!");
                  this.presentToast("Error");
                }
             );

            this.http.get('http://integralgest.cl/infomuni/api/respuestas/'+this.id)
           .map(response => response.json())
           .subscribe(data =>
              {
                this.respuestas = data;
                console.log("respuestas: "+data);
              },
              err => {
                console.log("Oops!");
                this.presentToast("Error");
              }
            );

            this.composersForm = this.formBuilder.group({ composer: ['', Validators.required],
            })

  }



  ionViewDidLoad() {
    this.getUser();
  }

  getUser ()
  {

    this.userService.getUserInfo()
      .then((response: any) => {

        this.user = response;
        console.log("el id es: "+this.user.id);
      })
      .catch(err => {


      })
  }



  onChangeHandler(event: string) {
   console.log('event: '+event);
   this.seleccion = event;
  }

 postData(){

   var url='http://integralgest.cl/infomuni/api/participacion_create';
   let postData = new FormData();
   let identificador = this.user.id;
   console.log("el id es: "+identificador);
   console.log("la pregunta es: "+this.hola);
   console.log("seleccion: "+this.seleccion);
   console.log("encuesta: "+this.id);

   postData.append('username',identificador);
   postData.append('pregunta',this.hola);
   postData.append('respuesta_seleccionada',this.seleccion);
   postData.append('encuesta',this.id);


   this.data = this.http.post(url, postData);
   this.data.subscribe(data=>{
     console.log(data);
     this.presentToast("Encuesta respondida con éxito!");
     //this.navCtrl.push(ParticipacionPage);
     this.navCtrl.pop();
   })
 }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000,
    });
    toast.present();
  }

}
