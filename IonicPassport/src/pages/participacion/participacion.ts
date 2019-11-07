import { Component } from '@angular/core';
import { NavController, NavParams, App, ToastController } from 'ionic-angular';

import { Observable } from 'rxjs/Observable';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { PreguntasPage } from '../preguntas/preguntas';


@Component({
  selector: 'page-participacion',
  templateUrl: 'participacion.html',
})
export class ParticipacionPage {

  encuestas: any;
  data:Observable<any>;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController) {

              this.http.get('http://integralgest.cl/api/participation')
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
  }

   presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000,
    });
    toast.present();
   }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ParticipacionPage');
  }

  detalles(id, nombre) {
    this.navCtrl.push(PreguntasPage,{valor: id, valor2: nombre});
  }

}
