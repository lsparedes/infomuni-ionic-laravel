import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App, ToastController} from 'ionic-angular';

import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';

@IonicPage()
@Component({
  selector: 'page-detalleseventos',
  templateUrl: 'detalleseventos.html',
})

export class DetalleseventosPage {

 id = this.navParams.get('valor');
 detalles:any;
 data:Observable<any>;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController) {

              console.log("El valor del id seleccionado es: "+this.id);

              this.http.get('http://localhost:8000/api/eventos/'+this.id)
               .map(response => response.json())
               .subscribe(data =>
                  {
                    this.detalles = data;
                    console.log(data);
                  },
                  err => {
                    console.log("Oops!");
                    this.presentToast("No existen detalles para este nuevo evento");
                  }
              );

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetalleseventosPage');
  }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000
    });
    toast.present();
  }
}
