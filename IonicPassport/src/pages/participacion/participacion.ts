import { Component } from '@angular/core';
import { NavController, NavParams, App, ToastController } from 'ionic-angular';

import { Observable } from 'rxjs/Observable';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { PreguntasPage } from '../preguntas/preguntas';
import { UserProvider } from '../../providers/user/user';
import { Refresher } from 'ionic-angular';


@Component({
  selector: 'page-participacion',
  templateUrl: 'participacion.html',
})
export class ParticipacionPage {

  encuestas: any;
  data:Observable<any>;
  public user:any;
  hola:any;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController,
            private userService: UserProvider) {

              this.userService.getUserInfo()
                .then((response: any) => {

                  this.user = response;
                  console.log("el id es: "+this.user.id);
                  this.hola = this.user.id;
                  console.log("el valor de hola es: "+this.hola);
                  this.http.get('http://integralgest.cl/infomuni/api/participation/'+this.hola)
                       .map(response => response.json())
                       .subscribe(data =>
                          {
                            this.encuestas = data;
                            console.log(data);
                          },
                          err => {
                            console.log("Oops!");
                            this.presentToast("No existen registros aún");
                        }
                       );
                })
                .catch(err => {


                })


  }

   presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000,
    });
    toast.present();
   }



   ionViewDidLoad() {
     

   }

  detalles(id, nombre) {
    this.navCtrl.push(PreguntasPage,{valor: id, valor2: nombre});
  }

  recargar(refresher:Refresher){
    console.log('Inicio refresher', refresher);//mensaje
    this.userService.getUserInfo()
      .then((response: any) => {

        this.user = response;
        console.log("el id es: "+this.user.id);
        this.hola = this.user.id;
        console.log("el valor de hola es: "+this.hola);
        this.http.get('http://integralgest.cl/infomuni/api/participation/'+this.hola)
             .map(response => response.json())
             .subscribe(data =>
                {
                  this.encuestas = data;
                  console.log(data);
                },
                err => {
                  console.log("Oops!");
                  this.presentToast("No existen registros aún");
              }
             );
      })
      .catch(err => {


      })

    setTimeout(() => {

      console.log('Termino refresher');//mensaje


      refresher.complete();//termino de animacion de carga
    }, 2000);
  }


}
