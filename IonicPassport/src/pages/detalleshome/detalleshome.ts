import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App, ToastController} from 'ionic-angular';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
import { Observable } from 'rxjs/Observable';

@IonicPage()
@Component({
  selector: 'page-detalleshome',
  templateUrl: 'detalleshome.html',
})

export class DetalleshomePage {

 id = this.navParams.get('valor');
 tipo = this.navParams.get('valor2');
 detallehome:any;
 data:Observable<any>;
 public nombre:any;

  constructor(public navCtrl: NavController,
              public navParams: NavParams,
              public app: App,
              public http: Http,
              private toastCtrl:ToastController) {

       console.log("El valor del id seleccionado es: "+this.id);
       console.log("El valor del tipo seleccionado es: "+this.tipo);

       this.http.get('https://159.89.80.36/app-infomuni/detalles_home.php?id='+this.id+'&tipo='+this.tipo)
       .map(response => response.json())
       .subscribe(data =>
          {
            this.detallehome = data;
            this.nombre = data[0].nombre;
            console.log(data);
          },
          err => {
            console.log("Oops!");
            this.presentToast("No existen registros aún");
          }
       );
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DetalleshomePage');
  }

  presentToast(msg) {
    let toast = this.toastCtrl.create({
      message: msg,
      duration: 2000
    });
    toast.present();
  }

}
