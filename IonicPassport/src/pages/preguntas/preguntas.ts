import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App, ToastController} from 'ionic-angular';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';
import { Validators, FormBuilder, FormGroup } from '@angular/forms';
import { ParticipacionPage } from '../participacion/participacion';


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
 public  seleccion: any;
 public hola:any;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController,
              private formBuilder: FormBuilder,) {

             console.log("El id de la encuesta seleccionada es: "+this.id);
             this.unTextoRecibido  = navParams.get("valor2");

             const data = JSON.parse(localStorage.getItem('userData'));
             this.userDetails = data.userData;

             this.http.get('https://159.89.80.36/infomuni/consulta_pregunta_encuestas.php?id='+this.id)
             .map(response => response.json())
             .subscribe(data =>
                {
                  this.preguntas = data;
                  this.hola=data[0].id;
                  console.log("esto vale hola aquí:"+this.hola);
                  console.log(data);
                },
                err => {
                  console.log("Oops!");
                  this.presentToast("Error");
                }
             );

            this.http.get('https://159.89.80.36/infomuni/consulta_respuesta_encuestas.php?id='+this.id)
           .map(response => response.json())
           .subscribe(data =>
              {
                this.respuestas = data;
                console.log(data);
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
    console.log('ionViewDidLoad PreguntasPage');
  }

  onChangeHandler(event: string) {
   console.log('event: '+event);
   this.seleccion = event;
  }

 postData(){
   var url='https://159.89.80.36/app-infomuni/guardar_respuestas.php';
   let postData = new FormData();

   postData.append('username',this.userDetails.username);
   postData.append('pregunta',this.hola);
   postData.append('respuesta_seleccionada',this.seleccion);
   postData.append('id_encuesta',this.id);

   this.data = this.http.post(url, postData);
   this.data.subscribe(data=>{
     console.log(data);
     this.presentToast("Encuesta respondida con éxito!");
     this.navCtrl.push(ParticipacionPage);
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
