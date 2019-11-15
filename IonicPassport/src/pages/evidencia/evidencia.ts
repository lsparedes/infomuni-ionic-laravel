import { Component } from '@angular/core';
import { NavController, NavParams, App, ToastController } from 'ionic-angular';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { DenunciaPage } from '../denuncia/denuncia';
import { Observable } from 'rxjs/Observable';


//@IonicPage()
@Component({
  selector: 'page-evidencia',
  templateUrl: 'evidencia.html',
})
export class EvidenciaPage {

  denuncias:any;
  data:Observable<any>;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController) {

              this.http.get('http://integralgest.cl/infomuni/api/denuncia')
                   .map(response => response.json())
                   .subscribe(data =>
                      {
                        this.denuncias = data;
                        console.log(data);
                      },
                      err => {
                        console.log("Oops!");
                        this.presentToast("No existen registros aún");
                      }
                    );
  }

  denunciar(){
    this.navCtrl.push(DenunciaPage);
  }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000
    });
    toast.present();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad EvidenciaPage');
  }

}
